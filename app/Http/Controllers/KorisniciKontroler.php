<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Modeli\Korisnik;

class KorisniciKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $korisnici = Korisnik::all();
        return view('korisnici')->with(compact('korisnici'));
    }

    public function postDodavanje(Request $r)
    {

        $this->validate($r, [
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:190'],
            'password' => ['required', 'min:4', 'confirmed'],
        ]);

        //Check-box
        if ($r->admin) {
            $levelc = 0;
        } else {
            $levelc = 10;
        }

        $korisnik = new Korisnik();
        $korisnik->name = $r->name;
        $korisnik->username = $r->username;
        $korisnik->password = bcrypt($r->password);
        $korisnik->level = $levelc;

        $korisnik->save();

        Session::flash('uspeh', 'Korisnik je uspešno dodat!');
        return redirect()->route('korisnici');
    }

    public function getPregled($id)
    {
        $korisnik = Korisnik::find($id);
        return view('korisnici_pregled')->with(compact('korisnik'));
    }

    public function postIzmena(Request $r, $id)
    {

        if ($r->password) {
            $this->validate($r, [
                'name' => ['required', 'max:255'],
                'username' => ['required', 'max:190'],
                'password' => ['required', 'min:4', 'confirmed'],
            ]);
            $pass = bcrypt($r->password);
        } else {
            $this->validate($r, [
                'name' => ['required', 'max:255'],
                'username' => ['required', 'max:190'],
            ]);
            $pass = null;
        }

        //Check-box
        if ($r->admin) {
            $levelc = 0;
        } else {
            $levelc = 10;
        }

        $korisnik = Korisnik::find($id);
        $korisnik->name = $r->name;
        $korisnik->username = $r->username;
        $korisnik->level = $levelc;
        if ($pass) {
            $korisnik->password = $pass;
        }
        $korisnik->save();

        Session::flash('uspeh', 'Podaci o korisniku su uspešno izmenjeni!');
        return redirect()->route('korisnici');
    }

    public function postBrisanje(Request $r)
    {

        $data = Korisnik::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Korisnik je uspešno obrisan!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja korisnika. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}
