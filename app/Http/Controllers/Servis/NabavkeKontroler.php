<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use Redirect;
use URL;
use App\Http\Controllers\Kontroler;
use App\Modeli\Nabavka;
use App\Modeli\Dobavljac;
use App\Modeli\VrstaUredjaja;

// use URL;

class NabavkeKontroler extends Kontroler
{

    public function getLista()
    {
        $nabavke = Nabavka::all();
        return view('servis.nabavke')->with(compact('nabavke'));
    }

    public function getDodavanje(Request $request)
    {
        $dobavljaci = Dobavljac::all();
        return view('servis.nabavke_dodavanje')->with(compact('dobavljaci'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'dobavljac_id' => [
                'required',
            ],
            'datum' => [
                'required',
            ],
            'garancija' => [
                'required',
                'integer',
            ],
        ]);

        $nabavka = new Nabavka();
        $nabavka->dobavljac_id = $request->dobavljac_id;
        $nabavka->datum = $request->datum;
        $nabavka->garancija = $request->garancija;
        $nabavka->napomena = $request->napomena;
        $nabavka->save();

        Session::flash('uspeh', 'Nabavka je uspešno dodata!');
        return redirect()->route('nabavke');
    }

    public function getIzmena($id)
    {
        $data = Nabavka::find($id);
        $dobavljaci = Dobavljac::all();
        return view('servis.nabavke_izmena')->with(compact('data', 'dobavljaci'));
    }

    public function getDetalj($id)
    {
        $nabavka = Nabavka::find($id);
        $vrste = VrstaUredjaja::whereIn('id', config('ikt.vrste_nabavka_id'))->get();
        return view('servis.nabavke_detalj')->with(compact('nabavka', 'vrste'));
    }

    public function postIzmena(Request $request, $id)
    {
        $this->validate($request, [
            'dobavljac_id' => [
                'required',
            ],
            'datum' => [
                'required',
            ],
            'garancija' => [
                'required',
                'integer',
            ],
        ]);

        $nabavka = Nabavka::find($id);
        $nabavka->dobavljac_id = $request->dobavljac_id;
        $nabavka->datum = $request->datum;
        $nabavka->garancija = $request->garancija;
        $nabavka->napomena = $request->napomena;
        $nabavka->save();

        Session::flash('uspeh', 'Nabavka je uspešno izmenjena!');
        return redirect()->route('nabavke.detalj', $id);
    }

    public function postBrisanje(Request $request)
    {
        $nabavka = Nabavka::find($request->idBrisanje);
        $nema_stavke = $nabavka->stavke->isEmpty();
        $ruta = URL::previous();
        if ($nema_stavke) {
            $odgovor = $nabavka->delete();
            if ($odgovor) {
                Session::flash('uspeh', 'Stavka je uspešno obrisana!');
                return redirect()->route('nabavke');
            } else {
                Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
            }
        }
        if (!$nema_stavke) {
            Session::flash('greska', 'Nije moguće obrisati nabavku jer postoje stavke koje su vezane za nju!');
        }
        return redirect($ruta);
    }

}
