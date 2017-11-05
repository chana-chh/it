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
                'unique:otpremnice,broj'
            ],
            'datum' => [
                'required',
            ],
            'dobavljac_id' => [
                'required',
                'integer',
            ],
        ]);

        $otpremnica = new Otpremnica();
        $otpremnica->broj = $request->broj;
        $otpremnica->racun_id = $request->racun_id;
        $otpremnica->datum = $request->datum;
        $otpremnica->dobavljac_id = $request->dobavljac_id;
        $otpremnica->broj_profakture = $request->broj_profakture;
        $otpremnica->napomena = $request->napomena;
        $otpremnica->save();

        Session::flash('uspeh', 'Otpremnica je uspešno dodata!');
        return redirect()->route('otpremnice');
    }

    public function postDodavanjeSlike(Request $request, $id)
    {
        $this->validate($request, [
            'slika' => [
                'required',
                'image',
                'mimes:jpeg,png,jpg',
                'max:2048',
            ],
        ]);

        $otpremnica = Otpremnica::find($id);

        $img = $request->slika;
        $ime_slike = $id . '_' . time() . '.' . $request->slika->getClientOriginalExtension();
        $lokacija = public_path('images/otpremnice/' . $ime_slike);
        $image = Image::make($img);
        $image->save($lokacija);

        $slika = new OtpremnicaSlika();
        $slika->otpremnica_id = $id;
        $slika->src = $ime_slike;
        $slika->save();

        Session::flash('uspeh', 'Scan je uspešno dodat!');
        return redirect()->route('otpremnice.detalj', $id);
    }

    public function postBrisanjeSlike(Request $request)
    {
        $slika = OtpremnicaSlika::find($request->idBrisanje);
        $putanja = public_path('images/otpremnice/') . $slika->src;
        $odgovor = $slika->delete();
        if ($odgovor) {
            unlink($putanja);
            Session::flash('uspeh', 'Scan je uspešno obrisan!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

    public function getIzmena($id)
    {
        $data = Otpremnica::find($id);
        $racuni = Racun::all();
        $dobavljaci = Dobavljac::all();
        return view('servis.otpremnice_izmena')->with(compact('data', 'racuni', 'dobavljaci'));
    }

    public function getDetalj($id)
    {
        $otpremnica = Otpremnica::find($id);
        $stavke = Otpremnica::find($id)->stavke()->paginate(5);
        return view('servis.otpremnice_detalj')->with(compact('otpremnica', 'stavke'));
    }

    public function postIzmena(Request $request, $id)
    {
        $this->validate($request, [
            'broj' => [
                'required',
                'max:50',
                'unique:otpremnice,broj,' . $id
            ],
            'datum' => [
                'required',
            ],
            'dobavljac_id' => [
                'required',
                'integer',
            ],
        ]);

        $data = Otpremnica::find($id);
        $data->broj = $request->broj;
        $data->racun_id = $request->racun_id;
        $data->datum = $request->datum;
        $data->dobavljac_id = $request->dobavljac_id;
        $data->broj_profakture = $request->broj_profakture;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Otpremnica je uspešno izmenjena!');
        return redirect()->route('otpremnice');
    }

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
