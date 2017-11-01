<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Image;
use App\Http\Controllers\Kontroler;
use App\Modeli\Otpremnica;
use App\Modeli\OtpremnicaSlika;
use App\Modeli\Racun;
use App\Modeli\Dobavljac;

class OtpremniceKontroler extends Kontroler
{

    public function getLista()
    {
        $otpremnice = Otpremnica::all();
        return view('servis.otpremnice')->with(compact('otpremnice'));
    }

    public function getDodavanje($id_racuna = null)
    {
        $racuni = Racun::all();
        $dobavljaci = Dobavljac::all();
        return view('servis.otpremnice_dodavanje')->with(compact('racuni', 'dobavljaci', 'id_racuna'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'broj' => [
                'required',
                'max:50',
            ],
            'datum' => [
                'required',
            ],
            'dobavljac_id' => [
                'required',
                'integer',
            ],
        ]);

        $data = new Otpremnica();
        $data->broj = $request->broj;
        $data->racun_id = $request->racun_id;
        $data->datum = $request->datum;
        $data->dobavljac_id = $request->dobavljac_id;
        $data->broj_profakture = $request->broj_profakture;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Otpremnica je uspešno dodata!');
        return redirect()->route('otpremnice');
    }

//    public function postDodavanjeSlike(Request $request, $id)
//    {
//        $this->validate($request, [
//            'slika' => [
//                'required',
//                'image',
//                'mimes:jpeg,png,jpg',
//                'max:2048',
//            ],
//        ]);
//
//        $racun = Racun::find($id);
//
//        $img = $request->slika;
//        $ime_slike = $id . '_' . $racun->broj . '_' . time() . '.' . $request->slika->getClientOriginalExtension();
//        $lokacija = public_path('images/racuni/' . $ime_slike);
////        $resize_img = Image::make($img)->heighten(300, function ($constraint) {
////            $constraint->upsize();
////        });
//        $image = Image::make($img);
//        $image->save($lokacija);
//
//        $slika = new RacunSlika();
//        $slika->racun_id = $id;
//        $slika->src = $ime_slike;
//        $slika->save();
//
//        Session::flash('uspeh', 'Scan je uspešno dodat!');
//        return redirect()->route('racuni.detalj', $id);
//    }
//
//    public function postBrisanjeSlike(Request $request)
//    {
//        $slika = RacunSlika::find($request->idBrisanje);
//        $putanja = public_path('images/racuni/') . $slika->src;
//        $odgovor = $slika->delete();
//        if ($odgovor) {
//            unlink($putanja);
//            Session::flash('uspeh', 'Scan je uspešno obrisan!');
//        } else {
//            Session::flash('greska', 'Došlo je do greške prilikom brisanja. Pokušajte ponovo, kasnije!');
//        }
//        return Redirect::back();
//    }
//
//    public function getIzmena($id)
//    {
//        $data = Racun::find($id);
//        $ugovori = UgovorOdrzavanje::all();
//        return view('servis.racuni_izmena')->with(compact('data', 'ugovori'));
//    }
//
//    public function getDetalj($id)
//    {
//        $racun = Racun::find($id);
//        return view('servis.racuni_detalj')->with(compact('racun'));
//    }
//
//    public function postIzmena(Request $request, $id)
//    {
//        $this->validate($request, [
//            'ugovor_id' => [
//                'required',
//                'integer',
//            ],
//            'broj' => [
//                'required',
//                'max:50',
//            ],
//            'datum' => [
//                'required',
//            ],
//            'iznos' => [
//                'required',
//                'min:0',
//            ],
//            'pdv' => [
//                'required',
//                'min:0',
//            ],
//            'ukupno' => [
//                'required',
//                'min:0',
//            ],
//        ]);
//
//        $data = Racun::find($id);
//        $data->ugovor_id = $request->ugovor_id;
//        $data->broj = $request->broj;
//        $data->datum = $request->datum;
//        $data->iznos = $request->iznos;
//        $data->pdv = $request->pdv;
//        $data->ukupno = $request->ukupno;
//        $data->napomena = $request->napomena;
//        $data->save();
//
//        Session::flash('uspeh', 'Račun je uspešno izmenjen!');
//        return redirect()->route('racuni');
//    }

    public function postBrisanje(Request $request)
    {
        $data = Otpremnica::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Otpreminca je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('otpremnice');
    }

}
