<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Telefon;
use App\Modeli\Kancelarija;

class TelefoniKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:centrala')->except('getLista');
    }

    public function getLista()
    {

        $data = Telefon::with('kancelarija', 'kancelarija.sprat', 'kancelarija.lokacija')->get();
        $kancelarije = Kancelarija::all();
        return view('sifarnici.telefoni')->with(compact('data', 'kancelarije'));
    }

    public function getListaUvecana()
    {
        $data = Telefon::all();
        return view('sifarnici.telefoni_uvecani')->with(compact('data'));
    }

    public function getDodavanje()
    {
        $kancelarije = Kancelarija::all();
        return view('sifarnici.telefoni_dodavanje')->with(compact('kancelarije'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'broj' => [
                'required',
            ],
            'kancelarija_id' => [
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

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $telefoni = Telefon::find($request->id);
            $kancelarije = Kancelarija::with([
                        'lokacija',
                        'sprat'])->get();
            return response()->json(array(
                        'kancelarije' => $kancelarije,
                        'telefoni' => $telefoni));
        }
    }

    public function postIzmena(Request $request)
    {

        $id = $request->idModal;
        $this->validate($request, [
            'brojModal' => [
                'required',
            ],
            'kancelarija_idModal' => [
                'required',
            ],
        ]);

        $data = Telefon::find($id);
        $data->broj = $request->brojModal;
        $data->vrsta = $request->vrstaModal;
        $data->kancelarija_id = $request->kancelarija_idModal;
        $data->napomena = $request->napomenaModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {
        $data = Telefon::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}
