<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Racun;
use App\Modeli\RacunSlika;

class RacuniKontroler extends Kontroler
{
    public function getLista()
    {
        $racuni = Racun::all();
        return view('servis.racuni')->with(compact('racuni'));
    }

//    public function getDodavanje()
//    {
//        return view('servis.ugovori_dodavanje');
//    }
//
//    public function postDodavanje(Request $request)
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
//        $data = new UgovorOdrzavanje();
//        $data->broj = $request->broj;
//        $data->iznos_sredstava = $request->iznos_sredstava;
//        $data->datum_zakljucivanja = $request->datum_zakljucivanja;
//        $data->datum_raskida = $request->datum_raskida;
//        $data->napomena = $request->napomena;
//        $data->save();
//
//        Session::flash('uspeh', 'Ugovor o održavanju je uspešno dodat!');
//        return redirect()->route('ugovori');
//    }
//
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

