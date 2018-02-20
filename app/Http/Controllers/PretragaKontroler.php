<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Modeli\Zaposleni;
use App\Modeli\Kancelarija;
use App\Modeli\Servis;

class PretragaKontroler extends Controller
{

    public function getPretraga()
    {
        $zap = Zaposleni::with('uprava', 'mobilni', 'emailovi', 'kancelarija', 'kancelarija.telefoni', 'kancelarija.lokacija', 'kancelarija.sprat')->orderBy('ime', 'asc')->orderBy('prezime', 'asc')->get();
        $kanc = Kancelarija::with('lokacija', 'sprat', 'telefoni', 'zaposleni', 'zaposleni.uprava', 'zaposleni.mobilni', 'zaposleni.emailovi')->orderBy('naziv', 'asc')->get();
        return view('pretraga')->with(compact('zap', 'kanc'));
    }

    public function getPrijavaKvara()
    {
        $kvarovi = Servis::all();
        $zap = Zaposleni::with('uprava', 'kancelarija', 'kancelarija.lokacija', 'kancelarija.sprat')->orderBy('ime', 'asc')->orderBy('prezime', 'asc')->get();
        $kanc = Kancelarija::with('lokacija', 'sprat')->orderBy('naziv', 'asc')->get();
        return view('kvar')->with(compact('zap', 'kanc', 'kvarovi'));
    }

    public function postPrijavaKvara(Request $request)
    {
        $this->validate($request, [
            'zaposleni_id' => [
                'required',
                'integer',
            ],
            'kancelarija_id' => [
                'required',
                'integer',
            ],
            'opis_kvara' => [
                'required',
            ],
        ]);

        $broj_prijave = $request->zaposleni_id . '-' . $request->kancelarija_id . '-' . time();
        $datum_prijave = date('Y-m-d', time());
        $ip_prijave = $request->ip();
        $racunar_prijave = gethostbyaddr($ip_prijave);
        $opis_kvara = $request->opis_kvara . ' - ' . $request->napomena;

        $servis = new Servis();
        $servis->broj_prijave = $broj_prijave;
        $servis->zaposleni_id = $request->zaposleni_id;
        $servis->kancelarija_id = $request->kancelarija_id;
        $servis->datum_prijave = $datum_prijave;
        $servis->ip_prijave = $ip_prijave;
        $servis->ime_racunara_prijave = $racunar_prijave;
        $servis->opis_kvara_zaposleni = $opis_kvara;
        $servis->status_id = 1;
        $servis->save();

        Session::flash('uspeh', 'Kvar je uspešno prijavljen.');
        return redirect()->route('status', $servis->id);
    }

    public function getStatus($id)
    {
        $servis = Servis::find($id);
        return view('status')->with(compact('servis'));
    }

}
