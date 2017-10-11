<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;

use App\Modeli\Kancelarija;
use App\Modeli\Sprat;
use App\Modeli\Lokacija;

class KancelarijeKontroler extends Kontroler
{
    public function getLista()
    {
    	   $kancelarije = Kancelarija::all();
    	   $lokacije = Lokacija::all();
           $spratovi = Sprat::orderBy('id')->get();
    	return view('sifarnici.kancelarije')->with(compact ('kancelarije', 'lokacije', 'spratovi'));
    }

    public function postDetalj(Request $req)
        {
            if($req->ajax()){
                $id = $req->id;
                $kancelarije = Kancelarija::find($id);
                $lokacije = Lokacija::all();
                $spratovi = Sprat::orderBy('id')->get();
                return response()->json(array('kancelarije'=>$kancelarije,'lokacije'=>$lokacije, 'spratovi'=>$spratovi));
            }
        }


        public function postDodavanje(Request $req)
    {
        
        $this->validate($req, [
                'naziv' => ['required',
                'max:50'],
            ]);

        $kancelarija = new Kancelarija();
        $kancelarija->naziv = $req->naziv;
        $kancelarija->sprat_id = $req->sprat_id;
        $kancelarija->lokacija_id = $req->lokacija_id;
        $kancelarija->napomena = $req->napomena;
        $kancelarija->save();
        
        Session::flash('uspeh','Stavka je uspešno dodata!');
        return redirect()->route('kancelarije');
    }

    public function postIzmena(Request $req)
        {
            $this->validate($req, [
                'nazivModal' => ['required',
                'max:50']
            ]);

            	$id = $req -> edit_id;
            	$kancelarija = Kancelarija::find($id);
            	$kancelarija -> naziv = $req -> nazivModal;
            	$kancelarija->sprat_id = $req->sprat_idModal;
        		$kancelarija->napomena = $req->napomenaModal;
        		$kancelarija->lokacija_id = $req->lokacija_idModal;
            	$kancelarija -> save();

            Session::flash('uspeh','Stavka je uspešno izmenjena!');
            return Redirect::back();
        }

        public function postBrisanje(Request $req)
    {	
    		    $id = $req->id;
        		$kancelarija = Kancelarija::find($id);
        		$odgovor = $kancelarija->delete();
        		if ($odgovor) {
        		Session::flash('uspeh','Stavka je uspešno obrisana!');
        		}
        		else{
        		Session::flash('greska','Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        		}
    }
}
