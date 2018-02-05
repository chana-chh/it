<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use Image;
use App\Http\Controllers\Kontroler;
use App\Modeli\Otpremnica;
use App\Modeli\OtpremnicaSlika;
use App\Modeli\Racun;
use App\Modeli\Dobavljac;
use App\Modeli\VrstaUredjaja;

class OtpremniceKontroler extends Kontroler
{

    public function getLista()
    {
        $otpremnice = Otpremnica::all();
        $dobavljaci = Dobavljac::all();
        $racuni = Racun::all();
        return view('servis.otpremnice')->with(compact('otpremnice', 'dobavljaci', 'racuni'));
    }

    public function getListaPretraga(Request $request)
    {
        $parametri = $request->session()->get('parametri_za_filter_otpremnica', null);
        $otpremnice = $this->naprednaPretraga($parametri);
        return view('servis.otpremnice_pretraga')->with(compact('otpremnice'));
    }

    public function postListaPretraga(Request $request)
    {
        $request->session()->put('parametri_za_filter_otpremnica', $request->all());
        return redirect()->route('otpremnice.pretraga');
    }

    private function naprednaPretraga($params)
    {
        $rezultat = null;
        $where = [];
        if ($params['broj']) {
            $where[] = [
                'broj',
                'like',
                '%' . $params['broj'] . '%'];
        }
        if ($params['dobavljac_id'] !== null) {
            $where[] = [
                'dobavljac_id',
                '=',
                $params['dobavljac_id']
            ];
        }
        if ($params['racun_id'] !== null) {
            $where[] = [
                'racun_id',
                '=',
                $params['racun_id']
            ];
        }
        if ($params['broj_profakture']) {
            $where[] = [
                'broj_profakture',
                'like',
                '%' . $params['broj_profakture'] . '%'];
        }
        if ($params['napomena']) {
            $where[] = [
                'napomena',
                'like',
                '%' . $params['napomena'] . '%'];
        }
        if (!$params['datum_1'] && !$params['datum_2']) {
            $rezultat = Otpremnica::where($where)->get();
        }
        if ($params['datum_1'] && !$params['datum_2']) {
            $where[] = [
                'datum',
                '=',
                $params['datum_1']];
            $rezultat = Otpremnica::where($where)->get();
        }
        if ($params['datum_1'] && $params['datum_2']) {
            $rezultat = Otpremnica::where($where)->whereBetween('datum', [
                        $params['datum_1'],
                        $params['datum_2']
                    ])->get();
        }
        return $rezultat;
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

        $img = $request->slika;
        $ime_slike = $id . '_' . time() . '.' . $request->slika->getClientOriginalExtension();
        $lokacija = public_path('images/otpremnice/' . $ime_slike);
        $resize_img = Image::make($img)->heighten(800, function ($constraint) {
                    $constraint->upsize();
                })->encode('jpg', 75);
        $resize_img->save($lokacija);

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
        return redirect()->back();
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
        $vrste = VrstaUredjaja::whereIn('id', config('ikt.vrste_otpremnica_id'))->get();
        return view('servis.otpremnice_detalj')->with(compact('otpremnica', 'vrste'));
    }

    public function postIzmena(Request $request, $id)
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
        $otpremnica = Otpremnica::findOrFail($request->idBrisanje);
        $id = $otpremnica->id;
        if (count($otpremnica->slike) > 0 || count($otpremnica->stavke) > 0) {
            Session::flash('greska', 'Nije moguće obrisati otpremnicu jer postoje stavke koje su vezane za nju!');
            return redirect()->route('otpremnice.detalj', $id);
        }

        $odgovor = $otpremnica->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Otpremnica je uspešno obrisana!');
            return redirect()->route('otpremnice');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja otpremnice. Pokušajte ponovo, kasnije!');
            return redirect()->route('otpremnice.detalj', $id);
        }
    }

}
