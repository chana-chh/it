<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Kancelarija;
use App\Modeli\Sprat;
use App\Modeli\Lokacija;

class KancelarijeKontroler extends Kontroler
{

    public function getLista()
    {
        $kancelarije = Kancelarija::all();
        $lokacije = Lokacija::all();
        $spratovi = Sprat::orderBy('id')->get();
        return view('sifarnici.kancelarije')->with(compact('kancelarije', 'lokacije', 'spratovi'));
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $kancelarije = Kancelarija::find($request->id);
            $lokacije = Lokacija::all();
            $spratovi = Sprat::orderBy('id')->get();
            return response()->json(array(
                        'kancelarije' => $kancelarije,
                        'lokacije' => $lokacije,
                        'spratovi' => $spratovi));
        }
    }

    public function getDetalj($id)
    {
        $kancelarija = Kancelarija::find($id);
        return view('sifarnici.kancelarije_detalj')->with(compact('kancelarija'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'naziv' => [
                'required',
                'max:50',
                'unique_with:sprat_id,lokacija_id',
            ],
        ]);

        $kancelarija = new Kancelarija();
        $kancelarija->naziv = $request->naziv;
        $kancelarija->sprat_id = $request->sprat_id;
        $kancelarija->lokacija_id = $request->lokacija_id;
        $kancelarija->napomena = $request->napomena;
        $kancelarija->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('kancelarije');
    }

    public function postIzmena(Request $request)
    {
        $this->validate($request, [
            'nazivModal' => [
                'required',
                'max:50',
            // 'unique_with:sprat_id,lokacija_id', ???????????????
            ]
        ]);

        $kancelarija = Kancelarija::find($request->idModal);
        $kancelarija->naziv = $request->nazivModal;
        $kancelarija->sprat_id = $request->sprat_idModal;
        $kancelarija->napomena = $request->napomenaModal;
        $kancelarija->lokacija_id = $request->lokacija_idModal;
        $kancelarija->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {

        $kancelarija = Kancelarija::find($request->idBrisanje);
        $odgovor = $kancelarija->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('kancelarije');
    }

}
