<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\TipBaterije;

class BaterijeKontroler extends Kontroler
{

    public function getLista()
    {
        $data = TipBaterije::all();
        return view('sifarnici.baterije')->with(compact('data'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'naziv' => ['required', 'max:50'],
            'kapacitet' => ['required', 'max:30'],
            'napon' => ['required', 'max:30'],
            'dimenzije' => ['required', 'max:30'],
        ]);

        $data = new TipBaterije();
        $data->naziv = $request->naziv;
        $data->modeli_baterija = $request->modeli_baterija;
        $data->kapacitet = $request->kapacitet;
        $data->napon = $request->napon;
        $data->dimenzije = $request->dimenzije;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('baterije');
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $data = TipBaterije::find($request->id);
            return response()->json($data);
        }
    }

    public function postIzmena(Request $request)
    {
        $id = $request->idModal;
        $this->validate($request, [
            'nazivModal' => ['required', 'max:50'],
            'kapacitetModal' => ['required', 'max:30'],
            'naponModal' => ['required', 'max:30'],
            'dimenzijeModal' => ['required', 'max:30'],
        ]);

        $data = TipBaterije::find($id);
        $data->naziv = $request->nazivModal;
        $data->modeli_baterija = $request->modeliModal;
        $data->kapacitet = $request->kapacitetModal;
        $data->napon = $request->naponModal;
        $data->dimenzije = $request->dimenzijeModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {
        $data = TipBaterije::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}
