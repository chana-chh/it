<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Mobilni;
use App\Modeli\Zaposleni;

class MobilniKontroler extends Kontroler {

    public function getLista() {
        $data = Mobilni::all();
        $radnici = Zaposleni::all();
        return view('sifarnici.mobilni')->with(compact('data', 'radnici'));
    }

    public function postDodavanje(Request $request) {
        
        $this->validate($request, [
            'broj' => [
                'required',
            ],
        ]);

         //Check-box
            if ($request->mobilni_dodavanje_sluzbeni) {
                $sluzbenic = 1;
            } else {
                $sluzbenic = 0;
            }

        $data = new Mobilni();
        $data->broj = $request->broj;
        $data->sluzbeni = $sluzbenic;
        $data->zaposleni_id = $request->zaposleni_id;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('mobilni');
    }

    public function postDetalj(Request $request) {
        if($request->ajax()){
                $id = $request->id;
                $mobilni = Mobilni::find($id);
                $zaposleni = Zaposleni::all();
                return response()->json(array('zaposleni'=>$zaposleni,'mobilni'=>$mobilni));
            }
    }

    public function postIzmena(Request $request) {
        
        $id = $request->idModal;
        $this->validate($request, [
            'brojModal' => [
                'required',
            ],
        ]);

         //Check-box
            if ($request->mobilni_izmena_sluzbeni) {
                $sluzbenic = 1;
            } else {
                $sluzbenic = 0;
            }

        $data = Mobilni::find($id);
        $data->broj = $request->brojModal;
        $data->sluzbeni = $sluzbenic;
        $data->zaposleni_id = $request->zaposleni_idModal;
        $data->napomena = $request->napomenaModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request) {
        $data = Mobilni::find($request->id);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
    }

}

