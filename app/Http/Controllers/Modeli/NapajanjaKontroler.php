<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;

Use App\Modeli\NapajanjeModel;
Use App\Modeli\Proizvodjac;
Use App\Modeli\Napajanje;
Use App\Modeli\Racunar;



class NapajanjaKontroler extends Kontroler
{
    public function getLista()
    {
    	$model = NapajanjeModel::all();
    	return view('modeli.napajanja')->with(compact ('model'));
    }

    public function getDodavanje()
    {
        $proizvodjaci = Proizvodjac::all();
        return view('modeli.napajanja_dodavanje')->with(compact ('proizvodjaci'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
               'naziv' => ['required','unique:napajanja_modeli,naziv'],
               'proizvodjac_id' => ['required']
            ]);

        $data = new NapajanjeModel();
        $data->naziv = $request->naziv;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->snaga = $request->snaga;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh','Model napajanja je uspešno dodat!');
        return redirect()->route('napajanja.modeli');
    }

    public function getIzmena($id)
    {
        $model = NapajanjeModel::find($id);
        $proizvodjaci = Proizvodjac::all();
        return view('modeli.napajanja_izmena')->with(compact ('model', 'proizvodjaci'));
    }

    public function postIzmena(Request $request, $id)
    {

            $this->validate($request, [
                'naziv' => ['required','max:50','unique:napajanja_modeli,naziv,' .$id],
                'proizvodjac_id' => ['required']
            ]);
        
        $data = NapajanjeModel::find($id);
        $data->naziv = $request->naziv;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->snaga = $request->snaga;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh','Podaci o modelu napajanja su uspešno izmenjeni!');
        return redirect()->route('napajanja.modeli');
    }

    public function getDetalj($id)
    {
        $model = NapajanjeModel::find($id);
        $racunari = DB::table('napajanja')->where([
            ['napajanje_model_id', '=', $id],
            ['racunar_id', '<>', null],
        ])->count();
        return view('modeli.napajanja_detalj')->with(compact ('model', 'racunari'));
    }

    public function postBrisanje(Request $request) {
        
        $data = NapajanjeModel::find($request->idBrisanje);
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
        $model = NapajanjeModel::find($id);
        $racunari = Racunar::whereHas('napajanja', function($query) use ($id){
            $query->where('napajanja.napajanje_model_id', '=', $id);
        })->get();
        return view('modeli.napajanja_racunari')->with(compact ('racunari', 'model'));
    }

    public function getUredjaji($id)
    {   
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $napajanja = Napajanje::with(['racunar', 'stavkaOtpremnice.otpremnica'])->where('napajanje_model_id', '=', $id)->get();
        $model = NapajanjeModel::find($id);
        return view('modeli.napajanja_uredjaji')->with(compact ('napajanja', 'model'));
    }

}
