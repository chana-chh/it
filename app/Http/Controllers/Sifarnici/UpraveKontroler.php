<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;

use App\Modeli\Uprava;

class UpraveKontroler extends Kontroler
{
     public function getLista()
    {
    	$uprave = Uprava::all();
    	return view('sifarnici.uprave')->with(compact ('uprave'));
    }

    public function postDodavanje(Request $req)
    {
        $this->validate($req, [
            'naziv' => [
                'required',
                'max:190',
                'unique:s_uprave,naziv',
            	],
        	]);

        $uprava = new Uprava();
        $uprava->naziv = $req->naziv;
        $uprava->save();

        Session::flash('uspeh','Stavka je uspešno dodata!');
        return redirect()->route('uprave');
    }

        public function postDetalj(Request $req)
        {
            if($req->ajax()){
                $id = $req->id;
                $uprava = Uprava::find($id);
                return response()->json($uprava);
            }
        }

        public function postIzmena(Request $req)
        {
            $id = $req -> edit_id;
            $this->validate($req, [
            'nazivModal' => [
                'required',
                'max:190',
                'unique:s_uprave,naziv,'.$id,],
        	]);

            $uprava = Uprava::find($id);
            $uprava -> naziv = $req -> nazivModal;
            $uprava -> save();

            Session::flash('uspeh','Stavka je uspešno izmenjena!');
            return Redirect::back();
        }

        public function postBrisanje(Request $req)
        {   
            $id = $req->id;
            $uprava = Uprava::find($id);
            $odgovor = $uprava->delete();
            
            if ($odgovor) {
                Session::flash('uspeh','Stavka je uspešno obrisana!');
            }
            else{
                Session::flash('greska','Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
            }
        }
}
