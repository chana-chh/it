<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Yajra\Datatables\Datatables;
Use App\Modeli\Racunar;
use App\Modeli\Zaposleni;
use App\Modeli\Uprava;
use App\Modeli\Kancelarija;
use App\Modeli\Proizvodjac;
use App\Modeli\Nabavka;
use App\Modeli\OperativniSistem;
use App\Modeli\OsnovnaPlocaModel;
use App\Modeli\OsnovnaPloca;

class RacunariKontroler extends Kontroler
{

    public function getLista()
    {

        return view('oprema.racunari')->with(compact('uredjaj'));
    }

    public function getAjax()
    {
        $racunari = Racunar::with('kancelarija', 'zaposleni')->get();

        return Datatables::of($racunari)
                        ->editColumn('zaposleni.naziv', function ($model) {
                            if ($model->zaposleni) {
                                return '<a href="' . route('zaposleni.detalj', $model->zaposleni->id) . '">' . $model->zaposleni->imePrezime() . '</a>';
                            }
                            return " ";
                        })
                        ->editColumn('kancelarija.naziv', function ($model) {

                            if ($model->kancelarija) {
                                return '<a href="' . route('kancelarije.detalj.get', $model->kancelarija->id) . '">' . $model->kancelarija->sviPodaci() . '</a>';
                            }
                            return " ";
                        })
                        ->addColumn('akcije', 'sifarnici.inc.dugmici_racunari')
                        ->rawColumns([
                            'akcije',
                            'zaposleni.naziv',
                            'kancelarija.naziv'])
                        ->make(true);
    }

    public function getDetalj($id)
    {
        $uredjaj = Racunar::find($id);
        return view('oprema.racunari_detalj')->with(compact('uredjaj'));
    }

    public function getDodavanje()
    {
        $proizvodjaci = Proizvodjac::all();
        $zaposleni = Zaposleni::all();
        $kancelarije = Kancelarija::all();
        $nabavke = Nabavka::all();
        $os = OperativniSistem::all();
        return view('oprema.racunari_dodavanje')->with(compact ('proizvodjaci', 'zaposleni', 'kancelarije', 'nabavke', 'os'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'stavka_nabavke_id' => ['required'],
                'erc_broj' => ['required', 'max:100'],
                'ime' => ['required', 'max:100'],
            ]);

            if ($request->laptop) {
                $laptopc = 1;
            } else {
                $laptopc = 0;
            }
            if ($request->server) {
                $serverc = 1;
            } else {
                $serverc = 0;
            }
             if ($request->brend) {
                $brendc = 1;
            } else {
                $brendc = 0;
            }


        $uredjaj = new Racunar();
        $uredjaj->vrsta_uredjaja_id = 1; //Računari imaju šifru 1
        $uredjaj->laptop = $laptopc;
        $uredjaj->brend = $brendc;
        $uredjaj->server = $serverc;
        $uredjaj->proizvodjac_id = $request->proizvodjac_id;
        $uredjaj->inventarski_broj = $request->inventarski_broj;
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->erc_broj = $request->erc_broj;
        $uredjaj->ime = $request->ime;
        $uredjaj->zaposleni_id = $request->zaposleni_id;
        $uredjaj->kancelarija_id = $request->kancelarija_id;
        $uredjaj->stavka_nabavke_id = $request->stavka_nabavke_id;
        $uredjaj->os_id = $request->os_id;
        $uredjaj->ocena = 0;
        $uredjaj->link = $request->link;
        $uredjaj->napomena = $request->napomena;
        $uredjaj->reciklirano = 0;

        $uredjaj->save();

        Session::flash('uspeh','Računar je uspešno dodat!');
        return redirect()->route('racunari.oprema');
    }

    public function getAplikacije($id){

        $uredjaj = Racunar::find($id);
        $aplikacije = $uredjaj->aplikacije;

        return view('oprema.racunari_aplikacije')->with(compact('aplikacije', 'uredjaj'));
    }

        public function getPloce($id)
    {
        $uredjaj = Racunar::find($id);
        $modeli = OsnovnaPlocaModel::all();
        $ploce = OsnovnaPloca::neraspordjeni()->get();
        return view('oprema.racunari_ploce')->with(compact ('modeli', 'uredjaj', 'ploce'));
    }

    public function getIzvadiPlocu($id)
    {
        $uredjaj = Racunar::find($id);
        $ploca = OsnovnaPloca::find($uredjaj->osnovnaPloca->id);
        $uredjaj->ploca_id = null;
        $odgovor = $uredjaj->save();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Osnovna ploča je uspešno izvađena!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom vađenja ploče. Pokušajte ponovo, kasnije!');
        }
        
        return Redirect::back();
    }

    public function postDodajPlocuNovu(Request $request, $id)
    {
        $racunar = Racunar::find($id);

        if ($racunar->osnovnaPloca) {
            Session::flash('greska', 'Prvo izvadite staru plocu da biste dodali novu!');
        }
        else{
            $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'osnovna_ploca_model_id' => ['required']
            ]);
        $ploca = new OsnovnaPloca();
        $ploca->serijski_broj = $request->serijski_broj;
        $ploca->vrsta_uredjaja_id = 6;
        $ploca->osnovna_ploca_model_id = $request->osnovna_ploca_model_id;
        $ploca->napomena = $request->napomena;
        $ploca->save();

        $racunar->ploca_id = $ploca->id;
        $racunar->save();
        Session::flash('uspeh', 'Osnovna ploča je uspešno dodata!');
        }
        return Redirect::back();
    }

    public function postDodajPlocuPostojecu(Request $request, $id)
    {
        $racunar = Racunar::find($id);
        if ($racunar->osnovnaPloca) {
            Session::flash('greska', 'Prvo izvadite staru plocu da biste dodali novu!');
        }
        else{
        $ploca = OsnovnaPloca::find($request->ploca_id);
        $racunar->ploca_id = $ploca->id;
        $racunar->save();
        Session::flash('uspeh', 'Osnovna ploča je uspešno dodata!');
        }
        
        return Redirect::back();
    }

}
