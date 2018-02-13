<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Sprat;

class SpratoviKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin')->except('getLista');
    }

    public function getLista()
    {
        $data = Sprat::all();
        return view('sifarnici.spratovi')->with(compact('data'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'naziv' => [
                'required',
                'max:50',
                'unique:s_spratovi,naziv',
            ],
        ]);

        $data = new Sprat();
        $data->naziv = $request->naziv;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('spratovi');
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $data = Sprat::find($request->id);
            return response()->json($data);
        }
    }

    public function postIzmena(Request $request)
    {

        $this->validate($request, [
            'nazivModal' => [
                'required',
                'max:50',
                'unique:s_spratovi,naziv,' . $request->idModal,
            ],
        ]);
        $data = Sprat::find($request->idModal);
        $data->naziv = $request->nazivModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {
        $data = Sprat::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}
