<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;

use App\Modeli\Dobavljac;

class DobavljaciKontroler extends Kontroler
{
    public function getLista()
    {
    	$data = Dobavljac::all();
    	return view('sifarnici.dobavljaci')->with(compact ('data'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'naziv' => [
                'required',
                'max:190',
                'unique:s_dobavljaci,naziv',
            ],
        ]);

        $data = new Dobavljac();
        $data->naziv = $request->naziv;
        $data->adresa_ulica = $request->adresa_ulica;
        $data->adresa_broj = $request->adresa_broj;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh','Stavka je uspešno dodata!');
        return redirect()->route('dobavljaci');
    }

        public function postDetalj(Request $request)
        {
            if($request->ajax()){
                $data = Dobavljac::find($request->id);
                return response()->json($data);
            }
        }

        public function postIzmena(Request $request)
        {
            $id = $request->idModal;
            $this->validate($request, [
                'nazivModal' => ['required',
                'max:190',
                'unique:s_dobavljaci,naziv,'.$id,]
            ]);

            $data = Dobavljac::find($id);
            $data -> naziv = $request -> nazivModal;
            $data->adresa_ulica = $request->adresaModal;
        	$data->adresa_broj = $request->brojModal;
        	$data->napomena = $request->napomenaModal;
            $data -> save();

            Session::flash('uspeh','Stavka je uspešno izmenjena!');
            return Redirect::back();
        }

        public function postBrisanje(Request $request)
        {   
            $data = Dobavljac::find($request->idBrisanje);
            $odgovor = $data->delete();
            
            if ($odgovor) {
                Session::flash('uspeh','Stavka je uspešno obrisana!');
            } else {
                Session::flash('greska','Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
            }
            return Redirect::back();
        }
}
