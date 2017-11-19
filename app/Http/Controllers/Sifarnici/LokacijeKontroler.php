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
    	$data = Lokacija::all();
    	return view('sifarnici.lokacije')->with(compact ('data'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'naziv' => [
                'required',
                'max:190',
                'unique:s_lokacije,naziv',
            ],
        ]);

        $data = new Lokacija();
        $data->naziv = $request->naziv;
        $data->adresa_ulica = $request->adresa_ulica;
        $data->adresa_broj = $request->adresa_broj;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh','Stavka je uspešno dodata!');
        return Redirect::back();
    }

    public function postAjax(Request $request)
    {
        $this->validate($request, [
            'nazivLokacije' => [
                'required',
                'max:190',
                'unique:s_lokacije,naziv',
            ],
        ]);

        $data = new Lokacija();
        $data->naziv = $request->nazivLokacije;
        $data->adresa_ulica = $request->ulicaLokacije;
        $data->adresa_broj = $request->brojLokacije;
        $data->napomena = $request->napomenaLokacije;
        $data->save();
        
        return response()->json(['status' => '1', 'novi_id' => $data->id, 'novi_naziv' => $data->naziv]);
    }


        public function postDetalj(Request $request)
        {
            if($request->ajax()){
                $data = Lokacija::find($request->id);
                return response()->json($data);
            }
        }

        public function postIzmena(Request $request)
        {
            $id = $request->idModal;
            $this->validate($request, [
                'nazivModal' => ['required',
                'max:190',
                'unique:s_lokacije,naziv,'.$id,]
            ]);

            $data = Lokacija::find($id);
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
            $data = Lokacija::find($request->idBrisanje);
            $odgovor = $data->delete();
            
            if ($odgovor) {
                Session::flash('uspeh','Stavka je uspešno obrisana!');
            } else {
                Session::flash('greska','Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
            }
            return Redirect::back();
        }
}
