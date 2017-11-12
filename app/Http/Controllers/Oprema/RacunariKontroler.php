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
        return view('oprema.racunari_dodavanje')->with(compact ('proizvodjaci', 'zaposleni', 'kancelarije', 'nabavke'));
    }

}
