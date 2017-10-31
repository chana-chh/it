<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;

Use App\Modeli\SkenerModel;
Use App\Modeli\Proizvodjac;
Use App\Modeli\Skener;
Use App\Modeli\Racunar;



class SkeneriKontroler extends Kontroler
{
    public function getLista()
    {
    	$model = SkenerModel::all();
    	return view('modeli.skeneri')->with(compact ('model'));
    }

    public function getDodavanje()
    {
        $proizvodjaci = Proizvodjac::all();
        return view('modeli.skeneri_dodavanje')->with(compact ('proizvodjaci'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
               'naziv' => ['required','max:50','unique:skeneri_modeli,naziv'],
               'proizvodjac_id' => ['required'],
               'format' => ['max:20'],
               'rezolucija' => ['max:20']
            ]);

        $data = new SkenerModel();
        $data->naziv = $request->naziv;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->format = $request->format;
        $data->rezolucija = $request->rezolucija;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh','Model skenera je uspešno dodat!');
        return redirect()->route('skeneri.modeli');
    }

    public function getIzmena($id)
    {
        $model = SkenerModel::find($id);
        $proizvodjaci = Proizvodjac::all();
        return view('modeli.skeneri_izmena')->with(compact ('model', 'proizvodjaci'));
    }

    public function postIzmena(Request $request, $id)
    {

            $this->validate($request, [
                'naziv' => ['required','max:50','unique:skeneri_modeli,naziv,' .$id],
                'proizvodjac_id' => ['required'],
                'format' => ['max:20'],
               'rezolucija' => ['max:20']
            ]);
        
        $data = SkenerModel::find($id);
        $data->naziv = $request->naziv;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->format = $request->format;
        $data->rezolucija = $request->rezolucija;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh','Podaci o modelu skeneri su uspešno izmenjeni!');
        return redirect()->route('skeneri.modeli');
    }

    public function getDetalj($id)
    {
        $model = SkenerModel::find($id);
        $racunari = DB::table('skeneri')->where([
            ['skener_model_id', '=', $id],
            ['racunar_id', '<>', null],
        ])->count();
        return view('modeli.skeneri_detalj')->with(compact ('model', 'racunari'));
    }

    public function postBrisanje(Request $request) {
        
        $data = SkenerModel::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

    public function getRacunari($id)
    {   
        // Dobra fora za uvlachenje id u funkciju, kao i eliminisanje sa WhereHas
        $model = SkenerModel::find($id);
        $racunari = Racunar::whereHas('skeneri', function($query) use ($id){
            $query->where('skeneri.skener_model_id', '=', $id);
        })->get();
        return view('modeli.skeneri_racunari')->with(compact ('racunari', 'model'));
    }

    public function getUredjaji($id)
    {   
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $skeneri = Skener::with(['racunar', 'stavkaOtpremnice.otpremnica'])->where('skener_model_id', '=', $id)->get();
        $model = SkenerModel::find($id);
        return view('modeli.skeneri_uredjaji')->with(compact ('skeneri', 'model'));
    }

}
