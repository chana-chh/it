<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;

use App\Modeli\Proizvodjac;
use App\Modeli\Lokacija;
use App\Modeli\Povezivanje;

class PovezivanjeKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin')->except('getLista');
    }

    public function getLista()
    {
        $povezivanje = Povezivanje::with('lokacija', 'proizvodjac')->get();
        $lokacije = Lokacija::orderBy('naziv')->get();
        $proizvodjaci = Proizvodjac::orderBy('naziv')->get();
        return view('sifarnici.povezivanje')->with(compact('povezivanje', 'lokacije', 'proizvodjaci'));
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $povezivanje = Povezivanje::find($request->id);
            $lokacije = Lokacija::all();
            $proizvodjaci = Proizvodjac::orderBy('naziv')->get();
            return response()->json(array(
                        'povezivanje' => $povezivanje,
                        'lokacije' => $lokacije,
                        'proizvodjaci' => $proizvodjaci));
        }
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'tip' => [
                'max:75'
            ],
            'brzina' => [
                'max:50'
            ]
        ]);

        $povezivanje = new Povezivanje();
        $povezivanje->tip = $request->tip;
        $povezivanje->brzina = $request->brzina;
        $povezivanje->lokacija_id = $request->lokacija_id;
        $povezivanje->proizvodjac_id = $request->proizvodjac_id;
        $povezivanje->cena = $request->cena;
        $povezivanje->napomena = $request->napomena;
        $povezivanje->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('povezivanje');
    }

    public function postIzmena(Request $request)
    {
        $this->validate($request, [
            'tip' => [
                'max:75'
            ],
            'brzina' => [
                'max:50'
            ]
        ]);

        $povezivanje = Povezivanje::find($request->idModal);
        $povezivanje->tip = $request->tipModal;
        $povezivanje->brzina = $request->brzinaModal;
        $povezivanje->lokacija_id = $request->lokacija_idModal;
        $povezivanje->proizvodjac_id = $request->proizvodjac_idModal;
        $povezivanje->cena = $request->cenaModal;
        $povezivanje->napomena = $request->napomenaModal;
        $povezivanje->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {

        $povezivanje = Povezivanje::find($request->idBrisanje);
        $odgovor = $povezivanje->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('povezivanje');
    }

}
