<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Aplikacija;
use App\Modeli\Proizvodjac;

class AplikacijeKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin')->except('getLista');
        $this->middleware('can:korisnik')->only('getLista');
    }

    public function getLista()
    {
        $aplikacije = Aplikacija::all();
        $proizvodjaci = Proizvodjac::all();
        return view('sifarnici.aplikacije')->with(compact('aplikacije', 'proizvodjaci'));
    }

    public function getListaRacunari($id)
    {
        $aplikacija = Aplikacija::find($id);
        $racunari = $aplikacija->racunari;
        return view('sifarnici.aplikacije_racunari')->with(compact('racunari', 'aplikacija'));
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $aplikacija = Aplikacija::find($request->id);
            $proizvodjaci = Proizvodjac::all();
            return response()->json(array('aplikacija' => $aplikacija, 'proizvodjaci' => $proizvodjaci));
        }
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'naziv' => ['required',
                'max:50'],
            'proizvodjac_id' => ['required',
            ],
        ]);

        if ($request->legalan) {
            $legalan = 1;
        } else {
            $legalan = 0;
        }

        if ($request->microsoft) {
            $microsoft = 1;
        } else {
            $microsoft = 0;
        }

        $data = new Aplikacija();
        $data->naziv = $request->naziv;
        $data->legalan = $legalan;
        $data->microsoft = $microsoft;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->opis = $request->opis;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('aplikacije');
    }

    public function postIzmena(Request $request)
    {
        $this->validate($request, [
            'nazivModal' => ['required',
                'max:50'],
            'proizvodjac_idModal' => ['required',
            ],
        ]);

         if ($request->legalanModal) {
            $legalan = 1;
        } else {
            $legalan = 0;
        }

        if ($request->microsoftModal) {
            $microsoft = 1;
        } else {
            $microsoft = 0;
        }

        $data = Aplikacija::find($request->idModal);
        $data->naziv = $request->nazivModal;
        $data->legalan = $legalan;
        $data->microsoft = $microsoft;
        $data->proizvodjac_id = $request->proizvodjac_idModal;
        $data->opis = $request->opisModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {

        $data = Aplikacija::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}
