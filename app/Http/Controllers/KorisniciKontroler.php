<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Modeli\Korisnik;
use App\Modeli\Role;

class KorisniciKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $korisnici = Korisnik::all();
        $uloge = Role::all();
        return view('korisnici')->with(compact('korisnici', 'uloge'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'name' => [
                'required',
                'max:255'],
            'username' => [
                'required',
                'max:190'],
            'password' => [
                'required',
                'min:4',
                'confirmed'],
            'role_id' => [
                'required'
            ],
        ]);

        $korisnik = new Korisnik();
        $korisnik->name = $request->name;
        $korisnik->username = $request->username;
        $korisnik->password = bcrypt($request->password);
        $korisnik->role_id = $request->role_id;

        $korisnik->save();

        Session::flash('uspeh', 'Korisnik je uspešno dodat!');
        return redirect()->route('korisnici');
    }

    public function getPregled($id)
    {
        $korisnik = Korisnik::find($id);
        $uloge = Role::all();
        return view('korisnici_pregled')->with(compact('korisnik', 'uloge'));
    }

    public function postIzmena(Request $request, $id)
    {

        if ($request->password) {
            $this->validate($request, [
                'name' => [
                    'required',
                    'max:255'],
                'username' => [
                    'required',
                    'max:190'],
                'password' => [
                    'required',
                    'min:4',
                    'confirmed'],
                'role_id' => [
                    'required'
                ],
            ]);
            $pass = bcrypt($request->password);
        } else {
            $this->validate($request, [
                'name' => [
                    'required',
                    'max:255'],
                'username' => [
                    'required',
                    'max:190'],
                'role_id' => [
                    'required'
                ],
            ]);
            $pass = null;
        }

        $korisnik = Korisnik::find($id);
        $korisnik->name = $request->name;
        $korisnik->username = $request->username;
        $korisnik->role_id = $request->role_id;
        if ($pass) {
            $korisnik->password = $pass;
        }
        $korisnik->save();

        Session::flash('uspeh', 'Podaci o korisniku su uspešno izmenjeni!');
        return redirect()->route('korisnici');
    }

    public function postBrisanje(Request $request)
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
