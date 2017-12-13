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
        $proizvodjaci = Proizvodjac::all();
        $tip = TipMemorije::all();
        $soketi = Soket::all();
        return view('modeli.osnovne_ploce_dodavanje')->with(compact ('proizvodjaci', 'tip', 'soketi'));
    }

    public function postDodavanje(Request $request)
    {   

        $this->validate($request, [
                'naziv' => ['required','unique:osnovne_ploce_modeli,naziv'],
                'cipset' => ['required'],
                'proizvodjac_id' => ['required'],
                'tip_memorije_id' => ['required'],
                'soket_id' => ['required'],
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
        $data->naziv = $request->naziv;
        $data->cipset = $request->cipset;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->tip_memorije_id = $request->tip_memorije_id;
        $data->soket_id = $request->soket_id;
        $data->usb_tri = $usb_tric;
        $data->integrisana_grafika = $integrisana_grafikac;
        $data->ocena = $request->ocena;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh','Model osnovne ploče je uspešno dodata!');
        return redirect()->route('osnovne_ploce.modeli');
    }

    public function getIzmena($id)
    {
        $osnovna_ploca = OsnovnaPlocaModel::find($id);
        $proizvodjaci = Proizvodjac::all();
        $tip = TipMemorije::all();
        $soketi = Soket::all();
        return view('modeli.osnovne_ploce_izmena')->with(compact ('osnovna_ploca', 'proizvodjaci', 'tip', 'soketi'));
    }

    public function postIzmena(Request $request, $id)
    {

            $this->validate($request, [
                'naziv' => ['required','unique:osnovne_ploce_modeli,naziv,' .$id],
                'cipset' => ['required'],
                'proizvodjac_id' => ['required'],
                'tip_memorije_id' => ['required'],
                'soket_id' => ['required'],
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
        
        $data = OsnovnaPlocaModel::find($id);
        $data->naziv = $request->naziv;
        $data->cipset = $request->cipset;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->tip_memorije_id = $request->tip_memorije_id;
        $data->soket_id = $request->soket_id;
        $data->usb_tri = $usb_tric;
        $data->integrisana_grafika = $integrisana_grafikac;
        $data->ocena = $request->ocena;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh','Podaci o modelu osnovne ploče su uspešno izmenjeni!');
        return redirect()->route('osnovne_ploce.modeli');
    }

    public function getDetalj($id)
    {
        $osnovna_ploca = OsnovnaPlocaModel::find($id);
        $ploce_id = OsnovnaPloca::where('osnovna_ploca_model_id', '=',  $id)->pluck('id');

        $racunari = Racunar::whereIn('ploca_id', $ploce_id)->count();
        return view('modeli.osnovne_ploce_detalj')->with(compact ('osnovna_ploca', 'racunari'));
    }

    public function postBrisanje(Request $request) {
        
        $data = OsnovnaPlocaModel::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('osnovne_ploce.modeli');
    }

    public function getRacunari($id)
    {   
        // Dobra fora za uvlachenje id u funkciju, kao i eliminisanje sa WhereHas (koji by the way poziva tabelu a ne relaciju iz modela)
        $model = OsnovnaPlocaModel::find($id);
        $racunari = Racunar::whereHas('osnovnaPloca', function($query) use ($id){
            $query->where('osnovne_ploce.osnovna_ploca_model_id', '=', $id);
        })->get();
        return view('modeli.osnovne_ploce_racunari')->with(compact ('racunari', 'model'));
    }

    public function getUredjaji($id)
    {   
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $osnovne_ploce = OsnovnaPloca::with(['racunar', 'stavkaOtpremnice.otpremnica'])->where('osnovna_ploca_model_id', '=', $id)->get();
        $model = OsnovnaPlocaModel::find($id);
        return view('modeli.osnovne_ploce_uredjaji')->with(compact ('osnovne_ploce', 'model'));
    }

}
