<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;

use App\Modeli\Lokacija;

class LokacijeKontroler extends Kontroler
{
    public function getLista()
    {
    	$lokacije = Lokacija::all();
    	return view('sifarnici.lokacije')->with(compact ('lokacije'));
    }

    public function postDodavanje(Request $req)
    {
        $this->validate($req, [
            'naziv' => [
                'required',
                'max:190',
                'unique:s_lokacije,naziv',
            ],
        ]);

        $lokacija = new Lokacija();
        $lokacija->naziv = $req->naziv;
        $lokacija->adresa_ulica = $req->adresa_ulica;
        $lokacija->adresa_broj = $req->adresa_broj;
        $lokacija->napomena = $req->napomena;
        $lokacija->save();

        Session::flash('uspeh','Stavka je uspešno dodata!');
        return redirect()->route('lokacije');
    }

        public function postDetalj(Request $req)
        {
            if($req->ajax()){
                $id = $req->id;
                $lokacija = Lokacija::find($id);
                return response()->json($lokacija);
            }
        }

        public function postIzmena(Request $req)
        {
            $id = $req -> edit_id;
            $this->validate($req, [
                'nazivModal' => ['required',
                'max:190',
                'unique:s_lokacije,naziv,'.$id,]
            ]);

            $lokacija = Lokacija::find($id);
            $lokacija -> naziv = $req -> nazivModal;
            $lokacija->adresa_ulica = $req->adresa_ulicaModal;
        	$lokacija->adresa_broj = $req->adresa_brojModal;
        	$lokacija->napomena = $req->napomenaModal;
            $lokacija -> save();

            Session::flash('uspeh','Stavka je uspešno izmenjena!');
            return Redirect::back();
        }

        public function postBrisanje(Request $req)
        {   
            $id = $req->id;
            $lokacija = Lokacija::find($id);
            $odgovor = $lokacija->delete();
            
            if ($odgovor) {
                Session::flash('uspeh','Stavka je uspešno obrisana!');
            }
            else{
                Session::flash('greska','Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
            }
        }
}
