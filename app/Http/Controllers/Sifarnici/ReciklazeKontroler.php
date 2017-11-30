<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Reciklaza;

class ReciklazeKontroler extends Kontroler
{

    public function getLista()
    {
        $data = Reciklaza::all();
        return view('sifarnici.reciklaze')->with(compact('data'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'datum' => [
                'required',
                'date',
            ],
        ]);

        $data = new Reciklaza();
        $data->datum = $request->datum;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('reciklaze');
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $data = Reciklaza::find($request->id);
            return response()->json($data);
        }
    }

    public function postIzmena(Request $request)
    {

        $this->validate($request, [
            'datumModal' => [
                'required',
                'date',
            ],
        ]);
        $data = Reciklaza::find($request->idModal);
        $data->datum = $request->datumModal;
        $data->napomena = $request->napomenaModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {
        $data = Reciklaza::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}
