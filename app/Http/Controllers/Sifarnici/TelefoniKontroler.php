<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Telefon;
use App\Modeli\Kancelarija;

class TelefoniKontroler extends Kontroler {

    public function getLista() {
        $data = Telefon::all();
        $kancelarije = Kancelarija::all();
        return view('sifarnici.telefoni')->with(compact('data', 'kancelarije'));
    }

    public function postDodavanje(Request $request) {
        $this->validate($request, [
            'broj' => [
                'required',
            ],
        ]);

        $data = new Telefon();
        $data->broj = $request->broj;
        $data->vrsta = $request->vrsta;
        $data->kancelarija_id = $request->kancelarija_id;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('telefoni');
    }

    public function postDetalj(Request $request) {
        if ($request->ajax()) {
            $data = Telefon::find($request->id);
            return response()->json($data);
        }
    }

    public function postIzmena(Request $request) {
        $id = $request->idModal;
        $this->validate($request, [
            'nazivModal' => [
                'required',
                'unique:s_monitori_povezivanje,naziv,' . $id,
            ],
        ]);

        $data = Telefon::find($id);
        $data->naziv = $request->nazivModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request) {
        $data = Telefon::find($request->id);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
    }

}

