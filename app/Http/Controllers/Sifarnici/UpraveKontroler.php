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
    	$data = Uprava::all();
    	return view('sifarnici.uprave')->with(compact ('data'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'naziv' => [
                'required',
                'max:190',
                'unique:s_uprave,naziv',
            	],
        	]);

        $data = new Uprava();
        $data->naziv = $request->naziv;
        $data->save();

        Session::flash('uspeh','Stavka je uspešno dodata!');
        return redirect()->route('uprave');
    }

        public function postDetalj(Request $request)
        {
            if($request->ajax()){
                $data = Uprava::find($request->id);
                return response()->json($data);
            }
        }

        public function postIzmena(Request $request)
        {
            $id = $request -> idModal;
            $this->validate($request, [
            'nazivModal' => [
                'required',
                'max:190',
                'unique:s_uprave,naziv,'.$id,],
        	]);

            $data = Uprava::find($id);
            $data -> naziv = $request -> nazivModal;
            $data -> save();

            Session::flash('uspeh','Stavka je uspešno izmenjena!');
            return Redirect::back();
        }

        public function postBrisanje(Request $request)
        {   
            $data = Uprava::find($request->idBrisanje);
            $odgovor = $data->delete();
            if ($odgovor) {
                Session::flash('uspeh','Stavka je uspešno obrisana!');
            }
            else{
                Session::flash('greska','Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
            }
            return Redirect::back();
        }
}
