<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;

Use App\Modeli\MemorijaModel;
Use App\Modeli\Proizvodjac;
Use App\Modeli\TipMemorije;
Use App\Modeli\Memorija;
Use App\Modeli\Racunar;



class MemorijeKontroler extends Kontroler
{
    public function getLista()
    {
    	$memorije = MemorijaModel::all();
    	return view('modeli.memorije')->with(compact ('memorije'));
    }

    public function getDodavanje()
    {
        $memorije = MemorijaModel::all();
        $proizvodjaci = Proizvodjac::all();
        $tip = TipMemorije::all();
        return view('modeli.memorije_dodavanje')->with(compact ('memorije', 'proizvodjaci', 'tip'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
                'proizvodjac_id' => ['required'],
                'tip_memorije_id' => ['required'],
                'brzina' => ['required', 'integer'],
                'kapacitet' => ['required', 'integer'],
                'ocena' => ['required', 'integer'],
            ]);

        $data = new MemorijaModel();
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->tip_memorije_id = $request->tip_memorije_id;
        $data->brzina = $request->brzina;
        $data->kapacitet = $request->kapacitet;
        $data->ocena = $request->ocena;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh','Model memorije je uspešno dodata!');
        return redirect()->route('memorije.modeli');
    }

    public function getIzmena($id)
    {
        $memorija = MemorijaModel::find($id);
        $proizvodjaci = Proizvodjac::all();
        $tip = TipMemorije::all();
        return view('modeli.memorije_izmena')->with(compact ('memorija', 'proizvodjaci', 'tip'));
    }

    public function postIzmena(Request $request, $id)
    {

            $this->validate($request, [
                'proizvodjac_id' => ['required'],
                'tip_memorije_id' => ['required'],
                'brzina' => ['required', 'integer'],
                'kapacitet' => ['required', 'integer'],
                'ocena' => ['required', 'integer'],
            ]);
        
        $data = MemorijaModel::find($id);
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->tip_memorije_id = $request->tip_memorije_id;
        $data->brzina = $request->brzina;
        $data->kapacitet = $request->kapacitet;
        $data->ocena = $request->ocena;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh','Podaci o modelu memorije su uspešno izmenjeni!');
        return redirect()->route('memorije.modeli');
    }

    public function getDetalj($id)
    {
        $memorija = MemorijaModel::find($id);
        $racunari = DB::table('memorije')->where([
            ['memorija_model_id', '=', $id],
            ['racunar_id', '<>', null],
        ])->count();
        return view('modeli.memorije_detalj')->with(compact ('memorija', 'racunari'));
    }

    public function postBrisanje(Request $request) {
        
        $data = MemorijaModel::find($request->idBrisanje);
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
        $model = MemorijaModel::find($id);
        $racunari = Racunar::whereHas('memorije', function($query) use ($id){
            $query->where('memorije.memorija_model_id', '=', $id);
        })->get();
        return view('modeli.memorije_racunari')->with(compact ('racunari', 'model'));
    }

    public function getUredjaji($id)
    {   
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $memorije = Memorija::with(['racunar', 'stavkaOtpremnice.otpremnica'])->where('memorija_model_id', '=', $id)->get();
        $model = MemorijaModel::find($id);
        return view('modeli.memorije_uredjaji')->with(compact ('memorije', 'model'));
    }

}
