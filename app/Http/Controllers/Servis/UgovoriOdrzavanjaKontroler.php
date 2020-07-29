<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Carbon\Carbon;
use App\Http\Controllers\Kontroler;
use App\Modeli\UgovorOdrzavanje;
use App\Modeli\Dobavljac;

class UgovoriOdrzavanjaKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin')->except([
            'getLista',
            'getDetalj'
        ]);
        $this->middleware('can:korisnik')->only([
            'getLista',
            'getDetalj'
        ]);
    }

    public function getLista()
    {
        $ugovori = UgovorOdrzavanje::all();
        return view('servis.ugovori')->with(compact('ugovori'));
    }

    public function getAktivni()
    {

        $ugovori_datum = UgovorOdrzavanje::whereDate('datum_raskida', '>', Carbon::now())->get();
        $ugovori = $ugovori_datum->where('preostalo', '>', 600);
        return view('servis.ugovori_aktivni')->with(compact('ugovori'));
    }

    public function getDodavanje()
    {
        $dobavljaci = Dobavljac::all();
        return view('servis.ugovori_dodavanje')->with(compact('dobavljaci'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'broj' => [
                'required',
                'max:50',
            ],
            'iznos_sredstava' => [
                'required',
                'min:0',
            ],
            'datum_zakljucivanja' => [
                'required',
            ],
            'datum_raskida' => [
                'required',
            ],
            'dobavljac_id' => [
                'required',
            ],
        ]);

        $data = new UgovorOdrzavanje();
        $data->broj = $request->broj;
        $data->predmet_ugovora = $request->predmet_ugovora;
        $data->iznos_sredstava = $request->iznos_sredstava;
        $data->dobavljac_id = $request->dobavljac_id;
        $data->datum_zakljucivanja = $request->datum_zakljucivanja;
        $data->datum_raskida = $request->datum_raskida;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Ugovor o održavanju je uspešno dodat!');
        return redirect()->route('ugovori');
    }

    public function getIzmena($id)
    {
        $data = UgovorOdrzavanje::find($id);
        $dobavljaci = Dobavljac::all();

        return view('servis.ugovori_izmena')->with(compact('data', 'dobavljaci'));
    }

    public function getDetalj($id)
    {
        $data = UgovorOdrzavanje::find($id);
        $racuni = UgovorOdrzavanje::find($id)->racuni()->paginate(10);
        return view('servis.ugovori_detalj')->with(compact('data', 'racuni'));
    }

    public function postIzmena(Request $request, $id)
    {
        $this->validate($request, [
            'broj' => [
                'required',
                'max:50',
            ],
            'iznos_sredstava' => [
                'required',
                'min:0',
            ],
            'datum_zakljucivanja' => [
                'required',
            ],
            'datum_raskida' => [
                'required',
            ],
            'dobavljac_id' => [
                'required',
            ],
        ]);

        $data = UgovorOdrzavanje::find($id);
        $data->broj = $request->broj;
        $data->predmet_ugovora = $request->predmet_ugovora;
        $data->dobavljac_id = $request->dobavljac_id;
        $data->iznos_sredstava = $request->iznos_sredstava;
        $data->datum_zakljucivanja = $request->datum_zakljucivanja;
        $data->datum_raskida = $request->datum_raskida;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Ugovor o održavanju je uspešno izmenjen!');
        return redirect()->route('ugovori');
    }

    public function postBrisanje(Request $request)
    {
        $data = UgovorOdrzavanje::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('ugovori');
    }

}
