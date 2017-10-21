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
    	$data = Zaposleni::all();
    	return view('sifarnici.zaposleni')->with(compact ('data'));
    }

    public function getDodavanje()
    {
    	$uprave = Uprava::all();
    	$kancelarije = Kancelarija::all();
    	return view('sifarnici.zaposleni_dodavanje')->with(compact ('uprave', 'kancelarije'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
                'ime' => ['required',
                'max:50'],
                'prezime' => ['required',
                'max:100'],
                'slika' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

        $img = $request->slika;
        $ime_slike = $request->ime.time().'.'.$request->slika->getClientOriginalExtension();
        $lokacija = public_path('images/slike_zaposlenih/'.$ime_slike);
        $resize_img = Image::make($img)->heighten(300, function ($constraint) {
            $constraint->upsize();
        });
        $resize_img->save($lokacija);

        $zaposleni = new Zaposleni();
        $zaposleni->ime = $request->ime;
        $zaposleni->prezime = $request->prezime;
        $zaposleni->uprava_id = $request->uprava_id;
        $zaposleni->kancelarija_id = $request->kancelarija_id;
        $zaposleni->napomena = $request->napomena;
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

    public function getIzmena($id)
    {
        $zaposleni = Zaposleni::find($id);
        $uprave = Uprava::all();
        $kancelarije = Kancelarija::all();
        return view('sifarnici.zaposleni_izmena')->with(compact ('zaposleni', 'uprave', 'kancelarije'));
    }

    public function postIzmena(Request $request, $id)
    {

        $zaposleni = Zaposleni::find($id);
        
        if ($request->slika) {
            $this->validate($request, [
                'ime' => ['required',
                'max:50'],
                'prezime' => ['required',
                'max:100'],
                'slika' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

        $img = $request->slika;
        $ime_slike = $request->ime.time().'.'.$request->slika->getClientOriginalExtension();
        $lokacija = public_path('images/slike_zaposlenih/'.$ime_slike);
        $resize_img = Image::make($img)->heighten(300, function ($constraint) {
            $constraint->upsize();
        });
        $resize_img->save($lokacija);
        unlink(public_path('images/slike_zaposlenih/').$zaposleni->src);
        }
        else{
            $this->validate($request, [
                'ime' => ['required',
                'max:50'],
                'prezime' => ['required',
                'max:100'],
            ]);
            $ime_slike = null;
        }
        
        $zaposleni->ime = $request->ime;
        $zaposleni->prezime = $request->prezime;
        $zaposleni->uprava_id = $request->uprava_id;
        $zaposleni->kancelarija_id = $request->kancelarija_id;
        $zaposleni->napomena = $request->napomena;
        
        if ($ime_slike) {
           $zaposleni->src = $ime_slike;
        }
        $zaposleni->save();

        Session::flash('uspeh','Podaci o zaposlenom su uspešno izmenjeni!');
        return redirect()->route('zaposleni');
    }

    public function postBrisanje(Request $request)
        {   
            $zaposleni = Zaposleni::find($request->idBrisanje);
            $odgovor = $zaposleni->delete();
            if ($odgovor) {
                Session::flash('uspeh','Zaposleni je uspešno obrisan!');
            }
            else{
                Session::flash('greska','Došlo je do greške prilikom brisanja zaposlenog. Pokušajte ponovo, kasnije!');
            }
            return Redirect::back();
        }

}
