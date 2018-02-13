<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Proizvodjac;

class ProizvodjaciKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $data = Proizvodjac::all();
        return view('sifarnici.proizvodjaci')->with(compact('data'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'naziv' => [
                'required',
                'max:190',
                'unique:s_proizvodjaci,naziv',
            ],
        ]);

        $proizvodjac = new Proizvodjac();
        $proizvodjac->naziv = $request->naziv;
        $proizvodjac->link = $request->link;
        $proizvodjac->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('proizvodjaci');
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $data = Proizvodjac::find($request->id);
            return response()->json($data);
        }
    }

    public function postIzmena(Request $request)
    {
        $id = $request->idModal;
        $this->validate($request, [
            'nazivModal' => [
                'required',
                'max:190',
                'unique:s_proizvodjaci,naziv,' . $id,
            ],
        ]);

        $data = Proizvodjac::find($id);
        $data->naziv = $request->nazivModal;
        $data->link = $request->linkModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {
        $data = Proizvodjac::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}
