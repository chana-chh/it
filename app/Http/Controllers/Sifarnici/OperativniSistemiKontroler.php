<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\OperativniSistem;

class OperativniSistemiKontroler extends Kontroler
{

    public function getLista()
    {
        $data = OperativniSistem::all();
        return view('sifarnici.operativni_sistemi')->with(compact('data'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'naziv' => [
                'required',
                'unique:operativni_sistemi,naziv',
            ],
        ]);

        $data = new OperativniSistem();
        $data->naziv = $request->naziv;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('operativni_sistemi');
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $data = OperativniSistem::find($request->id);
            return response()->json($data);
        }
    }

    public function postIzmena(Request $request)
    {
        $id = $request->idModal;
        $this->validate($request, [
            'nazivModal' => [
                'required',
                'unique:operativni_sistemi,naziv,' . $id,
            ],
        ]);

        $data = OperativniSistem::find($id);
        $data->naziv = $request->nazivModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {
        $data = OperativniSistem::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}

