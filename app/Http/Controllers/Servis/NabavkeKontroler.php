<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Kontroler;
use App\Modeli\Nabavka;
use App\Modeli\Dobavljac;
use App\Modeli\VrstaUredjaja;

class NabavkeKontroler extends Kontroler
{

    public function getLista()
    {
        $nabavke = Nabavka::all();
        $dobavljaci = Dobavljac::all();
        return view('servis.nabavke')->with(compact('nabavke', 'dobavljaci'));
    }

    public function getListaPretraga(Request $request)
    {
        $parametri = $request->session()->get('parametri_za_filter_nabavki', null);
        $nabavke = $this->naprednaPretraga($parametri);
        return view('servis.nabavke_pretraga')->with(compact('nabavke'));
    }

    public function postListaPretraga(Request $request)
    {
        $request->session()->put('parametri_za_filter_nabavki', $request->all());
        return redirect()->route('nabavke.pretraga');
    }

    private function naprednaPretraga($params)
    {
        $rezultat = null;
        $where = [];
        if ($params['dobavljac_id'] !== null) {
            $where[] = [
                'dobavljac_id',
                '=',
                $params['dobavljac_id']
            ];
        }
        if ($params['garancija']) {
            $operator = $params['operator_garancija'] ? $params['operator_garancija'] : '=';
            $where[] = [
                'garancija',
                $operator,
                $params['garancija']];
        }
        if ($params['napomena']) {
            $where[] = [
                'napomena',
                'like',
                '%' . $params['napomena'] . '%'];
        }
        if (!$params['datum_1'] && !$params['datum_2']) {
            $rezultat = Nabavka::where($where)->get();
        }
        if ($params['datum_1'] && !$params['datum_2']) {
            $where[] = [
                'datum',
                '=',
                $params['datum_1']];
            $rezultat = Nabavka::where($where)->get();
        }
        if ($params['datum_1'] && $params['datum_2']) {
            $rezultat = Nabavka::where($where)->whereBetween('datum', [
                        $params['datum_1'],
                        $params['datum_2']
                    ])->get();
        }
        return $rezultat;
    }

    public function getDodavanje()
    {
        $dobavljaci = Dobavljac::all();
        return view('servis.nabavke_dodavanje')->with(compact('dobavljaci'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'dobavljac_id' => [
                'required',
            ],
            'datum' => [
                'required',
            ],
            'garancija' => [
                'required',
                'integer',
            ],
        ]);

        $nabavka = new Nabavka();
        $nabavka->dobavljac_id = $request->dobavljac_id;
        $nabavka->datum = $request->datum;
        $nabavka->garancija = $request->garancija;
        $nabavka->napomena = $request->napomena;
        $nabavka->save();

        Session::flash('uspeh', 'Nabavka je uspešno dodata!');
        return redirect()->route('nabavke');
    }

    public function getIzmena($id)
    {
        $data = Nabavka::find($id);
        $dobavljaci = Dobavljac::all();
        return view('servis.nabavke_izmena')->with(compact('data', 'dobavljaci'));
    }

    public function getDetalj($id)
    {
        $nabavka = Nabavka::find($id);
        $vrste = VrstaUredjaja::whereIn('id', config('ikt.vrste_nabavka_id'))->get();
        return view('servis.nabavke_detalj')->with(compact('nabavka', 'vrste'));
    }

    public function postIzmena(Request $request, $id)
    {
        $this->validate($request, [
            'dobavljac_id' => [
                'required',
            ],
            'datum' => [
                'required',
            ],
            'garancija' => [
                'required',
                'integer',
            ],
        ]);

        $nabavka = Nabavka::find($id);
        $nabavka->dobavljac_id = $request->dobavljac_id;
        $nabavka->datum = $request->datum;
        $nabavka->garancija = $request->garancija;
        $nabavka->napomena = $request->napomena;
        $nabavka->save();

        Session::flash('uspeh', 'Nabavka je uspešno izmenjena!');
        return redirect()->route('nabavke.detalj', $id);
    }

    public function postBrisanje(Request $request)
    {
        $nabavka = Nabavka::findOrFail($request->idBrisanje);
        $id = $nabavka->id;
        $nema_stavke = $nabavka->stavke->isEmpty();
        if ($nema_stavke) {
            $odgovor = $nabavka->delete();
            if ($odgovor) {
                Session::flash('uspeh', 'Nabavka je uspešno obrisana!');
                return redirect()->route('nabavke');
            } else {
                Session::flash('greska', 'Došlo je do greške prilikom brisanja nabavke. Pokušajte ponovo, kasnije!');
            }
        } else {
            Session::flash('greska', 'Nije moguće obrisati nabavku jer postoje stavke koje su vezane za nju!');
        }
        return redirect()->route('nabavke.detalj', $id);
    }

}
