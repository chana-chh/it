<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;

use App\Modeli\Proizvodjac;

class ProizvodjaciKontroler extends Kontroler
{
    public function getLista()
    {
    	$proizvodjaci = Proizvodjac::all();
    	return view('sifarnici.proizvodjaci')->with(compact ('proizvodjaci'));
    }

    public function postDodavanje(Request $req)
    {
        $this->validate($req, [
            'naziv' => [
                'required',
                'max:190',
                'unique:s_proizvodjaci,naziv',
            ],
            'link' => [
                'required'
            ]
        ]);

        $proizvodjac = new Proizvodjac();
        $proizvodjac->naziv = $req->naziv;
        $proizvodjac->link = $req->link;
        $proizvodjac->save();

        Session::flash('uspeh','Stavka je uspešno dodata!');
        return redirect()->route('proizvodjaci');
    }

        public function postDetalj(Request $req)
        {
            if($req->ajax()){
                $id = $req->id;
                $proizvodjac = Proizvodjac::find($id);
                return response()->json($proizvodjac);
            }
        }

        public function postIzmena(Request $req)
        {
            $id = $req -> edit_id;
            $this->validate($req, [
                'nazivModal' => ['required',
                'max:190',
                'unique:s_proizvodjaci,naziv,'.$id,],
                'linkModal' => ['required']
            ]);

            $proizvodjac = Proizvodjac::find($id);
            $proizvodjac -> naziv = $req -> nazivModal;
            $proizvodjac -> link = $req -> linkModal;
            $proizvodjac -> save();

            Session::flash('uspeh','Stavka je uspešno izmenjena!');
            return Redirect::back();
        }

        public function postBrisanje(Request $req)
        {   
            $id = $req->id;
            $proizvodjac = Proizvodjac::find($id);
            $odgovor = $proizvodjac->delete();
            
            if ($odgovor) {
                Session::flash('uspeh','Stavka je uspešno obrisana!');
            }
            else{
                Session::flash('greska','Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
            }
        }
}
