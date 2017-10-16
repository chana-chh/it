<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Email;
use App\Modeli\Zaposleni;

class EmailKontroler extends Kontroler {

    public function getLista() {
        $data = Email::all();
        $radnici = Zaposleni::all();
        return view('sifarnici.email')->with(compact('data', 'radnici'));
    }

    public function postDodavanje(Request $request) {
        
        $this->validate($request, [
            'broj' => [
                'required',
            ],
        ]);

         //Check-box
            if ($request->email_dodavanje_sluzbena) {
                $sluzbenic = 1;
            } else {
                $sluzbenic = 0;
            }

        $data = new Email();
        $data->adresa = $request->adresa;
        $data->sluzbena = $sluzbenic;
        $data->zaposleni_id = $request->zaposleni_id;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('mobilni');
    }

    public function postDetalj(Request $request) {
        if($request->ajax()){
                $id = $request->id;
                $email = Email::find($id);
                $zaposleni = Zaposleni::all();
                return response()->json(array('zaposleni'=>$zaposleni,'email'=>$email));
            }
    }

    public function postIzmena(Request $request) {
        
        $id = $request->idModal;
        $this->validate($request, [
            'adresaModal' => [
                'required',
            ],
        ]);

         //Check-box
            if ($request->email_izmena_sluzbena) {
                $sluzbenic = 1;
            } else {
                $sluzbenic = 0;
            }

        $data = Email::find($id);
        $data->adresa = $request->adresaModal;
        $data->sluzbena = $sluzbenic;
        $data->zaposleni_id = $request->zaposleni_idModal;
        $data->napomena = $request->napomenaModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request) {
        $data = Email::find($request->id);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
    }

}
