<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Kontroler;
use App\Modeli\Mobilni;

class ZaposleniMobilniKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function postDodavanje(Request $req)
    {

        $this->validate($req, [
            'mobilni_dodavanje_broj' => ['required'],
        ]);

        //Check-box
        if ($req->mobilni_dodavanje_sluzbeni) {
            $sluzbenic = 1;
        } else {
            $sluzbenic = 0;
        }

        $zaposleni_id = $req->zaposleni_id;

        $mobilni = new Mobilni();
        $mobilni->broj = $req->mobilni_dodavanje_broj;
        $mobilni->sluzbeni = $sluzbenic;
        $mobilni->zaposleni_id = $zaposleni_id;
        $mobilni->napomena = $req->mobilni_dodavanje_napomena;

        $mobilni->save();

        Session::flash('uspeh', 'Broj mobilnog telefona korisnika je uspešno dodata!');
        return redirect()->route('zaposleni.detalj', $zaposleni_id);
    }

    public function postBrisanje(Request $req)
    {
        $mobilni = Mobilni::find($req->id);
        $odgovor = $mobilni->delete();

        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
    }

    public function postDetalj(Request $req)
    {
        if ($req->ajax()) {
            $id = $req->id;
            $mobilni = Mobilni::find($id);
            return response()->json($mobilni);
        }
    }

    public function postIzmena(Request $req)
    {
        $this->validate($req, [
            'mobilni_izmena_broj' => ['required'],
        ]);

        if ($req->mobilni_izmena_sluzbeni) {
            $sluzbenic = 1;
        } else {
            $sluzbenic = 0;
        }

        $mobilni = Mobilni::find($req->mobilni_id);
        $mobilni->broj = $req->mobilni_izmena_broj;
        $mobilni->sluzbeni = $sluzbenic;
        $mobilni->zaposleni_id = $req->zaposleni_id;
        $mobilni->napomena = $req->mobilni_izmena_napomena;

        $mobilni->save();

        Session::flash('uspeh', 'Broj telefona je uspešno izmenjen!');
        return redirect()->route('zaposleni.detalj', $req->zaposleni_id);
    }

}
