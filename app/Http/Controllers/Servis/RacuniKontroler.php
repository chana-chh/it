<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Racun;
use App\Modeli\RacunSlika;
use App\Modeli\UgovorOdrzavanje;

class RacuniKontroler extends Kontroler
{

    public function getLista()
    {
        $racuni = Racun::all();
        return view('servis.racuni')->with(compact('racuni'));
    }

    public function getDodavanje()
    {
        $ugovori = UgovorOdrzavanje::all();
        return view('servis.racuni_dodavanje')->with(compact('ugovori'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'ugovor_id' => [
                'required',
                'integer',
            ],
            'broj' => [
                'required',
                'max:50',
            ],
            'datum' => [
                'required',
            ],
            'iznos' => [
                'required',
                'min:0',
            ],
            'pdv' => [
                'required',
                'min:0',
            ],
            'ukupno' => [
                'required',
                'min:0',
            ],
        ]);

        $data = new Racun();
        $data->ugovor_id = $request->ugovor_id;
        $data->broj = $request->broj;
        $data->datum = $request->datum;
        $data->iznos = $request->iznos;
        $data->pdv = $request->pdv;
        $data->ukupno = $request->ukupno;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Račun je uspešno dodat!');
        return redirect()->route('racuni');
    }

//    public function getIzmena($id)
//    {
//        $data = UgovorOdrzavanje::find($id);
//
//        return view('servis.ugovori_izmena')->with(compact('data'));
//    }

    public function getDetalj($id)
    {
        $racun = Racun::find($id);
        return view('servis.racuni_detalj')->with(compact('racun'));
    }

//    public function postIzmena(Request $request, $id)
//    {
//        $this->validate($request, [
//            'broj' => [
//                'required',
//                'max:50',
//            ],
//            'iznos_sredstava' => [
//                'required',
//                'min:0',
//            ],
//            'datum_zakljucivanja' => [
//                'required',
//            ],
//            'datum_raskida' => [
//                'required',
//            ],
//        ]);
//
//        $data = UgovorOdrzavanje::find($id);
//        $data->broj = $request->broj;
//        $data->iznos_sredstava = $request->iznos_sredstava;
//        $data->datum_zakljucivanja = $request->datum_zakljucivanja;
//        $data->datum_raskida = $request->datum_raskida;
//        $data->napomena = $request->napomena;
//        $data->save();
//
//        Session::flash('uspeh', 'Ugovor o održavanju je uspešno izmenjen!');
//        return redirect()->route('ugovori');
//    }
//
//    public function postBrisanje(Request $request)
//    {
//        $data = UgovorOdrzavanje::find($request->idBrisanje);
//        $odgovor = $data->delete();
//        if ($odgovor) {
//            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
//        } else {
//            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
//        }
//        return Redirect::back();
//    }
}
