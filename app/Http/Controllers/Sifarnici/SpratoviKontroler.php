<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;

use App\Modeli\Sprat;

class SpratoviKontroler extends Kontroler
{
     public function getLista()
    {
    	$spratovi = Sprat::all();
    	return view('sifarnici.spratovi')->with(compact ('spratovi'));
    }

    public function postDodavanje(Request $req)
    {
        $this->validate($req, [
            'naziv' => [
                'required',
                'max:50',
                'unique:s_spratovi,naziv',
            	],
        	]);

        $sprat = new Sprat();
        $sprat->naziv = $req->naziv;
        $sprat->save();

        Session::flash('uspeh','Stavka je uspešno dodata!');
        return redirect()->route('spratovi');
    }

        public function postDetalj(Request $req)
        {
            if($req->ajax()){
                $id = $req->id;
                $sprat = Sprat::find($id);
                return response()->json($sprat);
            }
        }

        public function postIzmena(Request $req)
        {
            
            $this->validate($req, [
            'naziv' => [
                'required',
                'max:50',
                'unique:s_spratovi,naziv',
            	],
        	]);

            $id = $req -> edit_id;
            $sprat = Sprat::find($id);
            $sprat -> naziv = $req -> nazivModal;
            $sprat -> save();

            Session::flash('uspeh','Stavka je uspešno izmenjena!');
            return Redirect::back();
        }

        public function postBrisanje(Request $req)
        {   
            $id = $req->id;
            $sprat = Sprat::find($id);
            $odgovor = $sprat->delete();
            
            if ($odgovor) {
                Session::flash('uspeh','Stavka je uspešno obrisana!');
            }
            else{
                Session::flash('greska','Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
            }
        }
}
