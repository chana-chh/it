<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Kontroler;
use App\Modeli\NabavkaStavka;
use App\Modeli\Proizvodjac;
use App\Modeli\VrstaUredjaja;
use App\Modeli\Monitor;
use App\Modeli\MonitorModel;
use App\Modeli\Stampac;
use App\Modeli\StampacModel;
use App\Modeli\Skener;
use App\Modeli\SkenerModel;
use App\Modeli\Ups;
use App\Modeli\UpsModel;
use App\Modeli\Projektor;
use App\Modeli\MrezniUredjaj;
use App\Modeli\Racunar;

class NabavkeStavkeKontroler extends Kontroler
{

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'nabavka_id' => [
                'required',
            ],
            'vrsta_uredjaja_id' => [
                'required',
            ],
            'naziv' => [
                'required',
                'max:255',
            ],
            'kolicina' => [
                'required',
            ],
        ]);

        $stavka = new NabavkaStavka();
        $stavka->nabavka_id = $request->nabavka_id;
        $stavka->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $stavka->naziv = $request->naziv;
        $stavka->kolicina = $request->kolicina;
        $stavka->jedinica_mere = $request->jedinica_mere;
        $stavka->napomena = $request->napomena;
        $stavka->save();

        Session::flash('uspeh', 'Stavka nabavke je uspešno dodata!');
        return redirect()->route('nabavke.detalj', $request->nabavka_id);
    }

    public function getDetalj($id)
    {
        $stavka = NabavkaStavka::find($id);
        $proizvodjaci = Proizvodjac::all();
        $modeli_monitora = MonitorModel::all();
        $modeli_stampaca = StampacModel::all();
        $modeli_skenera = SkenerModel::all();
        $modeli_upseva = UpsModel::all();
        return view('servis.nabavke_stavke_detalj')->with(compact('stavka', 'proizvodjaci', 'modeli_monitora', 'modeli_stampaca', 'modeli_skenera', 'modeli_upseva'));
    }

    public function getIzmena($id)
    {
        $stavka = NabavkaStavka::find($id);
        $vrste = VrstaUredjaja::whereIn('id', config('ikt.vrste_nabavka_id'))->get();
        return view('servis.nabavke_stavke_izmena')->with(compact('stavka', 'vrste'));
    }

    public function postIzmena(Request $request, $id)
    {
        $this->validate($request, [
            'naziv' => [
                'required',
                'max:255',
            ],
            'kolicina' => [
                'required',
            ],
        ]);

        $stavka = NabavkaStavka::find($id);
        $stavka->naziv = $request->naziv;
        $stavka->kolicina = $request->kolicina;
        $stavka->jedinica_mere = $request->jedinica_mere;
        $stavka->napomena = $request->napomena;
        $stavka->save();

        Session::flash('uspeh', 'Stavka nabavke je uspešno izmenjena!');
        return redirect()->route('nabavke.stavke.detalj', $id);
    }

    public function postBrisanje(Request $request)
    {
        $stavka = NabavkaStavka::findOrFail($request->idBrisanje);
        $id = $stavka->id;
        $id_nabavke = $stavka->nabavka_id;
        $ima_uredjaja = $stavka->uredjaji();
        if ($ima_uredjaja) {
            Session::flash('greska', 'Nije moguće obrisati stavku nabavke jer postoje uređaji koji su vezani za nju!');
        } else {
            $odgovor = $stavka->delete();
            if ($odgovor) {
                Session::flash('uspeh', 'Satvka je uspešno obrisana!');
                return redirect()->route('nabavke.detalj', $id_nabavke);
            } else {
                Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
            }
        }
        return redirect()->route('nabavke.stavke.detalj', $id);
    }

    /*
     * Dodavanje uredjaja kroz nabavku
     */

    public function postMonitoriDodavanje(Request $request)
    {
        $this->validate($request, [
            'stavka_nabavke_id' => [
                'required',
                'integer',
            ],
            'vrsta_uredjaja_id' => [
                'required',
                'integer',
            ],
            'inventarski_broj' => [
                'max:10',
            ],
            'serijski_broj' => [
                'required',
                'max:10',
            ],
            'monitor_model_id' => [
                'required',
                'integer',
            ],
        ]);

        $monitor = new Monitor();
        $monitor->stavka_nabavke_id = $request->stavka_nabavke_id;
        $monitor->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $monitor->inventarski_broj = $request->inventarski_broj;
        $monitor->serijski_broj = $request->serijski_broj;
        $monitor->monitor_model_id = $request->monitor_model_id;
        $monitor->save();

        Session::flash('uspeh', 'Monitor je uspešno dodat!');
        return redirect()->route('nabavke.stavke.detalj', $request->stavka_nabavke_id);
    }

    public function postStampaciDodavanje(Request $request)
    {
        $this->validate($request, [
            'stavka_nabavke_id' => [
                'required',
                'integer',
            ],
            'vrsta_uredjaja_id' => [
                'required',
                'integer',
            ],
            'inventarski_broj' => [
                'max:10',
            ],
            'serijski_broj' => [
                'required',
                'max:10',
            ],
            'stampac_model_id' => [
                'required',
                'integer',
            ],
        ]);

        $stampac = new Stampac();
        $stampac->stavka_nabavke_id = $request->stavka_nabavke_id;
        $stampac->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $stampac->inventarski_broj = $request->inventarski_broj;
        $stampac->serijski_broj = $request->serijski_broj;
        $stampac->stampac_model_id = $request->stampac_model_id;
        $stampac->save();

        Session::flash('uspeh', 'Štampač je uspešno dodat!');
        return redirect()->route('nabavke.stavke.detalj', $request->stavka_nabavke_id);
    }

    public function postSkeneriDodavanje(Request $request)
    {
        $this->validate($request, [
            'stavka_nabavke_id' => [
                'required',
                'integer',
            ],
            'vrsta_uredjaja_id' => [
                'required',
                'integer',
            ],
            'inventarski_broj' => [
                'max:10',
            ],
            'serijski_broj' => [
                'required',
                'max:10',
            ],
            'skener_model_id' => [
                'required',
                'integer',
            ],
        ]);

        $skener = new Skener();
        $skener->stavka_nabavke_id = $request->stavka_nabavke_id;
        $skener->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $skener->inventarski_broj = $request->inventarski_broj;
        $skener->serijski_broj = $request->serijski_broj;
        $skener->skener_model_id = $request->skener_model_id;
        $skener->save();

        Session::flash('uspeh', 'Skener je uspešno dodat!');
        return redirect()->route('nabavke.stavke.detalj', $request->stavka_nabavke_id);
    }

    public function postUpseviDodavanje(Request $request)
    {
        $this->validate($request, [
            'stavka_nabavke_id' => [
                'required',
                'integer',
            ],
            'vrsta_uredjaja_id' => [
                'required',
                'integer',
            ],
            'inventarski_broj' => [
                'max:10',
            ],
            'serijski_broj' => [
                'required',
                'max:10',
            ],
            'ups_model_id' => [
                'required',
                'integer',
            ],
        ]);

        $ups = new Ups();
        $ups->stavka_nabavke_id = $request->stavka_nabavke_id;
        $ups->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $ups->inventarski_broj = $request->inventarski_broj;
        $ups->serijski_broj = $request->serijski_broj;
        $ups->ups_model_id = $request->ups_model_id;
        $ups->save();

        Session::flash('uspeh', 'UPS je uspešno dodat!');
        return redirect()->route('nabavke.stavke.detalj', $request->stavka_nabavke_id);
    }

    public function postProjektoriDodavanje(Request $request)
    {
        $this->validate($request, [
            'stavka_nabavke_id' => [
                'required',
                'integer',
            ],
            'vrsta_uredjaja_id' => [
                'required',
                'integer',
            ],
            'naziv' => [
                'required',
                'max:100',
            ],
            'proizvodjac_id' => [
                'required',
                'integer',
            ],
            'inventarski_broj' => [
                'max:10',
            ],
            'serijski_broj' => [
                'required',
                'max:10',
            ],
            'tip_lampe' => [
                'max:50',
            ],
            'rezolucija' => [
                'max:255',
            ],
            'kontrast' => [
                'max:255',
            ],
        ]);

        $projektor = new Projektor();
        $projektor->stavka_nabavke_id = $request->stavka_nabavke_id;
        $projektor->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $projektor->naziv = $request->naziv;
        $projektor->proizvodjac_id = $request->proizvodjac_id;
        $projektor->inventarski_broj = $request->inventarski_broj;
        $projektor->serijski_broj = $request->serijski_broj;
        $projektor->tip_lampe = $request->tip_lampe;
        $projektor->rezolucija = $request->rezolucija;
        $projektor->kontrast = $request->kontrast;
        $projektor->link = $request->link;
        $projektor->save();

        Session::flash('uspeh', 'Projektor je uspešno dodat!');
        return redirect()->route('nabavke.stavke.detalj', $request->stavka_nabavke_id);
    }

    public function postMrezniDodavanje(Request $request)
    {
        $this->validate($request, [
            'stavka_nabavke_id' => [
                'required',
                'integer',
            ],
            'vrsta_uredjaja_id' => [
                'required',
                'integer',
            ],
            'naziv' => [
                'required',
                'max:100',
            ],
            'proizvodjac_id' => [
                'required',
                'integer',
            ],
            'inventarski_broj' => [
                'max:10',
            ],
            'serijski_broj' => [
                'required',
                'max:10',
            ],
            'broj_portova' => [
                'required',
                'integer',
            ],
        ]);

        $upravljiv = ($request->upravljiv) ? 1 : 0;

        $mrezni = new MrezniUredjaj();
        $mrezni->stavka_nabavke_id = $request->stavka_nabavke_id;
        $mrezni->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $mrezni->naziv = $request->naziv;
        $mrezni->proizvodjac_id = $request->proizvodjac_id;
        $mrezni->inventarski_broj = $request->inventarski_broj;
        $mrezni->serijski_broj = $request->serijski_broj;
        $mrezni->broj_portova = $request->broj_portova;
        $mrezni->upravljiv = $upravljiv;
        $mrezni->link = $request->link;
        $mrezni->save();

        Session::flash('uspeh', 'Mrežni uređaj je uspešno dodat!');
        return redirect()->route('nabavke.stavke.detalj', $request->stavka_nabavke_id);
    }

    public function postRacunariDodavanje(Request $request)
    {
        $this->validate($request, [
            'serijski_broj' => [
                'max:50'
            ],
            'stavka_nabavke_id' => [
                'required',
                'integer'
            ],
            'erc_broj' => [
                'required',
                'max:100'
            ],
            'ime' => [
                'required',
                'max:100'
            ],
        ]);

        if ($request->laptop) {
            $laptopc = 1;
        } else {
            $laptopc = 0;
        }
        if ($request->serverf) {
            $serverc = 1;
        } else {
            $serverc = 0;
        }
        if ($request->brend) {
            $brendc = 1;
        } else {
            $brendc = 0;
        }

        $uredjaj = new Racunar();
        $uredjaj->vrsta_uredjaja_id = 1; //Računari imaju šifru 1
        $uredjaj->laptop = $laptopc;
        $uredjaj->brend = $brendc;
        $uredjaj->server = $serverc;
        $uredjaj->proizvodjac_id = $request->proizvodjac_id;
        $uredjaj->inventarski_broj = $request->inventarski_broj;
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->erc_broj = $request->erc_broj;
        $uredjaj->ime = $request->ime;
        $uredjaj->stavka_nabavke_id = $request->stavka_nabavke_id;
        // $uredjaj->link = $request->link;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh', 'Računar je uspešno dodat!');
        return redirect()->route('nabavke.stavke.detalj', $request->stavka_nabavke_id);
    }

    public function postRacunarBrisanje(Request $request)
    {
        $id = $request->idBrisanje;
        $racunar = Racunar::findOrFail($id);
        $stavka_nabavke_id = $racunar->stavka_nabavke_id;
        $odgovor = $racunar->forceDelete();
        if ($odgovor) {
            Session::flash('uspeh', 'Računar je uspešno obrisan!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
    }

}
