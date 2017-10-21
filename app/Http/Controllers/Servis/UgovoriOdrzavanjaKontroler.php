<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\UgovorOdrzavanje;

class UgovoriOdrzavanjaKontroler extends Kontroler
{

    public function getLista()
    {
        $ugovori = UgovorOdrzavanje::all();
        return view('servis.ugovori')->with(compact('ugovori'));
    }
    
    public function getDodavanje()
    {
    	return view('servis.ugovori_dodavanje');
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
        ]);

        $data = new UgovorOdrzavanje();
        $data->broj = $request->broj;
        $data->iznos_sredstava = $request->iznos_sredstava;
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
        
    	return view('servis.ugovori_izmena')->with(compact ('data'));
    }

//    public function postDetalj(Request $request)
//    {
//        if ($request->ajax()) {
//            $data = Soket::find($request->id);
//            return response()->json($data);
//        }
//    }
//
//    public function postIzmena(Request $request)
//    {
//        $id = $request->idModal;
//        $this->validate($request, [
//            'nazivModal' => [
//                'required',
//                'unique:s_soketi,naziv,' . $id,
//            ],
//        ]);
//
//        $data = Soket::find($id);
//        $data->naziv = $request->nazivModal;
//        $data->save();
//
//        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
//        return Redirect::back();
//    }
//
    public function postBrisanje(Request $request)
    {
        $data = UgovorOdrzavanje::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }
}
