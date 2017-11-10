<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Nabavka;

class NabavkeKontroler extends Kontroler
{

    public function getLista()
    {
        $nabavke = Nabavka::all();
        return view('servis.nabavke')->with(compact('nabavke'));
    }

//
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
//
//    public function getDetalj($id)
//    {
//        $data = UgovorOdrzavanje::find($id);
//        $racuni = UgovorOdrzavanje::find($id)->racuni()->paginate(10);
//        return view('servis.ugovori_detalj')->with(compact('data', 'racuni'));
//    }
//
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
//        return redirect()->route('ugovori');
//    }
}