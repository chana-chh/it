<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Licenca;

class LicenceKontroler extends Kontroler
{

    public function getLista()
    {
        $data = Licenca::all();
        return view('sifarnici.licence')->with(compact('data'));
    }

     public function getDodavanje()
    {
        return view('sifarnici.licence_dodavanje');
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'tip_licence' => ['required', 'max:50'],
            'proizvod' => ['required', 'max:50'],
            'datum_pocetka_vazenja' => ['date'],
            'datum_prestanka_vazenja' => ['date'],
        ]);

        $data = new Licenca();
        $data->tip_licence = $request->tip_licence;
        $data->proizvod = $request->proizvod;
        $data->kljuc = $request->kljuc;
        $data->broj_aktivacija = $request->broj_aktivacija;
        $data->datum_pocetka_vazenja = $request->datum_pocetka_vazenja;
        $data->datum_prestanka_vazenja = $request->datum_prestanka_vazenja;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Licenca je uspešno dodata!');
        return redirect()->route('licence');
    }

    public function getDetalj($id)
    {
        $model = Licenca::find($id);
        return view('sifarnici.licence_detalj')->with(compact('model'));
    }

    public function getIzmena($id)
    {
        $model = Licenca::find($id);

        return view('sifarnici.licence_izmena')->with(compact('model'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'tip_licence' => ['required', 'max:50'],
            'proizvod' => ['required', 'max:50'],
            'datum_pocetka_vazenja' => ['date'],
            'datum_prestanka_vazenja' => ['date'],
        ]);

        $data = Licenca::find($id);
        $data->tip_licence = $request->tip_licence;
        $data->proizvod = $request->proizvod;
        $data->kljuc = $request->kljuc;
        $data->broj_aktivacija = $request->broj_aktivacija;
        $data->datum_pocetka_vazenja = $request->datum_pocetka_vazenja;
        $data->datum_prestanka_vazenja = $request->datum_prestanka_vazenja;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Podaci licence su uspešno izmenjeni!');
        return redirect()->route('licence');
    }

    public function postBrisanje(Request $request)
    {
        $data = Licenca::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Licenca je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja licence. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}
