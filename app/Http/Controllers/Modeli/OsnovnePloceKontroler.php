<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;

Use App\Modeli\OsnovnaPlocaModel;
Use App\Modeli\OsnovnaPloca;
Use App\Modeli\Proizvodjac;
Use App\Modeli\TipMemorije;
Use App\Modeli\Soket;
Use App\Modeli\Racunar;



class OsnovnePloceKontroler extends Kontroler
{
    public function getLista()
    {
    	$osnovne_ploce = OsnovnaPlocaModel::all();
    	return view('modeli.osnovne_ploce')->with(compact ('osnovne_ploce'));
    }

    public function getDodavanje()
    {
        $memorije = OsnovnaPlocaModel::all();
        $proizvodjaci = Proizvodjac::all();
        $tip = TipMemorije::all();
        $soket = Soket::all();
        return view('modeli.osnovne_ploce_dodavanje')->with(compact ('memorije', 'proizvodjaci', 'tip', 'soket'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
                'naziv' => ['required','unique:osnovne_ploce_modeli,naziv'],
                'proizvodjac_id' => ['required'],
                'tip_memorije_id' => ['required'],
                'soket_id' => ['required'],
                'usb_tri' => ['required'],
                'integrisana_grafika' => ['required'],
                'ocena' => ['required', 'integer'],
            ]);

         if ($request->usb_tri) {
                $usb_tric = 1;
            } else {
                $usb_tric = 0;
            }

         if ($request->integrisana_grafika) {
                $integrisana_grafikac = 1;
            } else {
                $integrisana_grafikac = 0;
            }

        $data = new OsnovnaPlocaModel();
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->tip_memorije_id = $request->tip_memorije_id;
        $data->brzina = $request->brzina;
        $data->kapacitet = $request->kapacitet;
        $data->ocena = $request->ocena;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh','Model osnovne ploče je uspešno dodata!');
        return redirect()->route('memorije.modeli');
    }

    public function getIzmena($id)
    {
        $memorija = OsnovnaPlocaModel::find($id);
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
        
        $data = OsnovnaPlocaModel::find($id);
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
        $memorija = OsnovnaPlocaModel::find($id);
        $racunari = DB::table('memorije')->where([
            ['memorija_model_id', '=', $id],
            ['racunar_id', '<>', null],
        ])->count();
        return view('modeli.memorije_detalj')->with(compact ('memorija', 'racunari'));
    }

    public function postBrisanje(Request $request) {
        
        $data = OsnovnaPlocaModel::find($request->idBrisanje);
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
        $model = OsnovnaPlocaModel::find($id);
        $racunari = Racunar::whereHas('memorije', function($query) use ($id){
            $query->where('memorije.memorija_model_id', '=', $id);
        })->get();
        return view('modeli.memorije_racunari')->with(compact ('racunari', 'model'));
    }

    public function getUredjaji($id)
    {   
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $memorije = Memorija::with(['racunar', 'stavkaOtpremnice.otpremnica'])->where('memorija_model_id', '=', $id)->get();
        $model = OsnovnaPlocaModel::find($id);
        return view('modeli.memorije_uredjaji')->with(compact ('memorije', 'model'));
    }

}
