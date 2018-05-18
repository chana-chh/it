<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Modeli\Zaposleni;
use App\Modeli\Kancelarija;
use App\Modeli\Servis;
use App\Modeli\Uprava;
use App\Modeli\Lokacija;
use DB;

class PretragaKontroler extends Controller
{

    public function getPretraga()
    {
        $zap = Zaposleni::with('uprava', 'mobilni', 'emailovi', 'kancelarija', 'kancelarija.telefoni', 'kancelarija.lokacija', 'kancelarija.sprat')->orderBy('ime', 'asc')->orderBy('prezime', 'asc')->get();
        $kanc = Kancelarija::with('lokacija', 'sprat', 'telefoni', 'zaposleni', 'zaposleni.uprava', 'zaposleni.mobilni', 'zaposleni.emailovi')->orderBy('naziv', 'asc')->get();
        return view('pretraga')->with(compact('zap', 'kanc'));
    }

    public function getNaprednaPretraga()
    {
        $zap = null;
        $uprave = Uprava::all();
        $lokacije = Lokacija::all();
        $staro = null;

        return view('napredna_pretraga')->with(compact('zap', 'uprave', 'lokacije', 'staro'));
    }

    public function postNaprednaPretraga(Request $request)
    {
        $where = [];

        $prezime = $request->prezime;
        $ime = $request->ime;
        $uprava = $request->uprava;
        $lokacija = $request->lokacija;
        $email = $request->email;
        $kancelarija = $request->kancelarija;

        $staro = $request->all();

        if ($prezime) {
            $where[] = ['prezime', 'like', '%' . $prezime . '%'];
        }
        if ($ime) {
            $where[] = ['ime', 'like', '%' . $ime . '%'];
        }
        if ($uprava) {
            $where[] = ['zaposleni.uprava_id', '=', $uprava];
        }
        if ($lokacija) {
            $where[] = ['s_kancelarije.lokacija_id', '=', $lokacija];
        }
        if ($email) {
            $where[] = ['adrese_e_poste.adresa', 'like', '%' . $email . '%'];
        }
        if ($kancelarija) {
            $where[] = ['s_kancelarije.naziv', 'like', '%' . $kancelarija . '%'];
        }

        $zap = DB::table('zaposleni')
                ->leftJoin('s_uprave', 'zaposleni.uprava_id', '=', 's_uprave.id')
                ->leftJoin('s_kancelarije', 'zaposleni.kancelarija_id', '=', 's_kancelarije.id')
                ->leftJoin('s_spratovi', 's_kancelarije.sprat_id', '=', 's_spratovi.id')
                ->leftJoin('s_lokacije', 's_kancelarije.lokacija_id', '=', 's_lokacije.id')
                ->leftJoin('telefoni', function($join) {
                    $join->on('telefoni.kancelarija_id', '=', 's_kancelarije.id');
                })
                ->leftJoin('mobilni', function($join) {
                    $join->on('zaposleni.id', '=', 'mobilni.zaposleni_id');
                })
                ->leftJoin('adrese_e_poste', function($join) {
                    $join->on('zaposleni.id', '=', 'adrese_e_poste.zaposleni_id');
                })
                ->select(DB::raw(
                                'zaposleni.id as zaposleni_id,
                                zaposleni.ime as ime_zaposlenog,
                                zaposleni.prezime as prezime_zaposlenog,
                                zaposleni.uprava_id,
                                zaposleni.src as src,
                                s_uprave.naziv as uprava,
                                zaposleni.radno_mesto as radno_mesto_zaposlenog,
                                s_kancelarije.id as id_kancelarije,
                                s_kancelarije.naziv as kancelarija,
                                s_kancelarije.napomena as kancelarija_napomena,
                                s_spratovi.naziv as sprat,
                                s_lokacije.naziv as lokacija,
                                GROUP_CONCAT(DISTINCT adrese_e_poste.adresa SEPARATOR "#") as emailovi,
                                GROUP_CONCAT(DISTINCT mobilni.broj SEPARATOR "#") as mobilni,
                                GROUP_CONCAT(DISTINCT telefoni.broj SEPARATOR "#") as telefoni'
                ))
                ->where($where)
                ->groupBy("zaposleni.id")
                ->get();

        $uprave = Uprava::all();
        $lokacije = Lokacija::all();
        // dd($zap);
        return view('napredna_pretraga')->with(compact('zap', 'uprave', 'lokacije', 'staro'));
    }

    public function getPrijavaKvara()
    {
        $kvarovi = Servis::all();
        $zap = Zaposleni::with('uprava', 'kancelarija', 'kancelarija.lokacija', 'kancelarija.sprat')->orderBy('ime', 'asc')->orderBy('prezime', 'asc')->get();
        $kanc = Kancelarija::with('lokacija', 'sprat')->orderBy('naziv', 'asc')->get();
        return view('kvar')->with(compact('zap', 'kanc', 'kvarovi'));
    }

    public function postPrijavaKvara(Request $request)
    {
        $this->validate($request, [
            'zaposleni_id' => [
                'required',
                'integer',
            ],
            'kancelarija_id' => [
                'required',
                'integer',
            ],
            'opis_kvara' => [
                'required',
            ],
        ]);

        $broj_prijave = $request->zaposleni_id . '-' . $request->kancelarija_id . '-' . time();
        $datum_prijave = date('Y-m-d', time());
        $ip_prijave = $request->ip();
        $racunar_prijave = gethostbyaddr($ip_prijave);
        $opis_kvara = $request->opis_kvara . ' - ' . $request->napomena;

        $servis = new Servis();
        $servis->broj_prijave = $broj_prijave;
        $servis->zaposleni_id = $request->zaposleni_id;
        $servis->kancelarija_id = $request->kancelarija_id;
        $servis->datum_prijave = $datum_prijave;
        $servis->ip_prijave = $ip_prijave;
        $servis->ime_racunara_prijave = $racunar_prijave;
        $servis->opis_kvara_zaposleni = $opis_kvara;
        $servis->status_id = 1;
        $servis->save();

        Session::flash('uspeh', 'Kvar je uspešno prijavljen.');
        return redirect()->route('status', $servis->id);
    }

    public function getStatus($id)
    {
        $servis = Servis::find($id);
        return view('status')->with(compact('servis'));
    }

    public function getForma()
    {  
        return view('forma');
    }

    public function getPlan($id)
    {
        $kancelarija = Kancelarija::find($id);
        
        $slika = null;

        switch ($kancelarija->lokacija_id) {
            case 1:
                if ($kancelarija->sprat_id == 8) {
                    $slika = "../images/opstina5.jpg";
                }elseif ($kancelarija->sprat_id == 7) {
                    $slika = "../images/opstina4.jpg";
                }elseif ($kancelarija->sprat_id == 6) {
                    $slika = "../images/opstina3.jpg";
                }elseif ($kancelarija->sprat_id == 5) {
                    $slika = "../images/opstina2.jpg";
                }elseif ($kancelarija->sprat_id == 4) {
                    $slika = "../images/opstina1.jpg";
                }elseif ($kancelarija->sprat_id == 3) {
                    $slika = "../images/opstinaprizemlje.jpg";
                }elseif ($kancelarija->sprat_id == 1) {
                    $slika = "../images/opstinapodrum.jpg";
                }
                break;
            
            default:
                $slika = null;
                break;
        }

        return view('plan')->with(compact('kancelarija', 'slika'));
    }

}
