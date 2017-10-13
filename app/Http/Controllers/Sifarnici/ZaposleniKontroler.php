<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use Image;
use App\Modeli\Zaposleni;
use App\Modeli\Uprava;
use App\Modeli\Kancelarija;


class ZaposleniKontroler extends Kontroler
{
    public function getLista()
    {
    	$zaposleni = Zaposleni::all();
    	return view('sifarnici.zaposleni')->with(compact ('zaposleni'));
    }

    public function getDodavanje()
    {
    	$uprave = Uprava::all();
    	$kancelarije = Kancelarija::all();
    	return view('sifarnici.zaposleni_dodavanje')->with(compact ('uprave', 'kancelarije'));
    }

    public function postDodavanje(Request $req)
    {

        $this->validate($req, [
                'ime' => ['required',
                'max:50'],
                'prezime' => ['required',
                'max:100'],
                'slika' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

        $img = $req->slika;
        $ime_slike = $req->ime.time().'.'.$req->slika->getClientOriginalExtension();
        $lokacija = public_path('images/slike_zaposlenih/'.$ime_slike);
        $resize_img = Image::make($img)->heighten(300, function ($constraint) {
            $constraint->upsize();
        });
        $resize_img->save($lokacija);

        $zaposleni = new Zaposleni();
        $zaposleni->ime = $req->ime;
        $zaposleni->prezime = $req->prezime;
        $zaposleni->uprava_id = $req->uprava_id;
        $zaposleni->kancelarija_id = $req->kancelarija_id;
        $zaposleni->napomena = $req->napomena;
        $zaposleni->src = $ime_slike;

        $zaposleni->save();

        Session::flash('uspeh','Zaposleni je uspešno dodata!');
        return redirect()->route('zaposleni');
    }

    public function getDetalj($id)
    {
        $zaposleni = Zaposleni::find($id);
        return view('sifarnici.zaposleni_detalj')->with(compact ('zaposleni'));
    }
}
