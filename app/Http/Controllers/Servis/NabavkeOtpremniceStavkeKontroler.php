<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Kontroler;
use App\Modeli\Monitor;
use App\Modeli\Stampac;
use App\Modeli\Skener;
use App\Modeli\Ups;
use App\Modeli\Projektor;
use App\Modeli\MrezniUredjaj;
use App\Modeli\Racunar;
use App\Modeli\OsnovnaPloca;
use App\Modeli\Procesor;
use App\Modeli\GrafickiAdapter;
use App\Modeli\Memorija;
use App\Modeli\Hdd;
use App\Modeli\Napajanje;

class NabavkeOtpremniceStavkeKontroler extends Kontroler
{
    /*
     * Dodavanje uredjaja kroz nabavku-otpremnicu
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
        $stavka_nabavke_id = $monitor->stavka_nabavke_id;
        $stavka_otpremnice_id = $monitor->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
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
        $stavka_nabavke_id = $stampac->stavka_nabavke_id;
        $stavka_otpremnice_id = $stampac->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
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
        $stavka_nabavke_id = $skener->stavka_nabavke_id;
        $stavka_otpremnice_id = $skener->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
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
        $stavka_nabavke_id = $ups->stavka_nabavke_id;
        $stavka_otpremnice_id = $ups->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
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
        $stavka_nabavke_id = $projektor->stavka_nabavke_id;
        $stavka_otpremnice_id = $projektor->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
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
        $stavka_nabavke_id = $mrezni->stavka_nabavke_id;
        $stavka_otpremnice_id = $mrezni->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
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

    public function postCpuDodavanje(Request $request)
    {
        $this->validate($request, [
            'stavka_otpremnice_id' => [
                'required',
                'integer',
            ],
            'vrsta_uredjaja_id' => [
                'required',
                'integer',
            ],
            'serijski_broj' => [
                'required',
                'max:10',
            ],
            'procesor_model_id' => [
                'required',
                'integer',
            ],
        ]);

        $cpu = new Procesor();
        $cpu->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $cpu->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $cpu->serijski_broj = $request->serijski_broj;
        $cpu->procesor_model_id = $request->procesor_model_id;
        $cpu->save();

        Session::flash('uspeh', 'Procesor je uspešno dodat!');
        $stavka_nabavke_id = $cpu->stavka_nabavke_id;
        $stavka_otpremnice_id = $cpu->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
    }

    public function postHddDodavanje(Request $request)
    {
        $this->validate($request, [
            'stavka_otpremnice_id' => [
                'required',
                'integer',
            ],
            'vrsta_uredjaja_id' => [
                'required',
                'integer',
            ],
            'serijski_broj' => [
                'required',
                'max:10',
            ],
            'hdd_model_id' => [
                'required',
                'integer',
            ],
        ]);

        $hdd = new Hdd();
        $hdd->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $hdd->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $hdd->serijski_broj = $request->serijski_broj;
        $hdd->hdd_model_id = $request->hdd_model_id;
        $hdd->save();

        Session::flash('uspeh', 'HDD je uspešno dodat!');
        $stavka_nabavke_id = $hdd->stavka_nabavke_id;
        $stavka_otpremnice_id = $hdd->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
    }

    public function postMbdDodavanje(Request $request)
    {
        $this->validate($request, [
            'stavka_otpremnice_id' => [
                'required',
                'integer',
            ],
            'vrsta_uredjaja_id' => [
                'required',
                'integer',
            ],
            'serijski_broj' => [
                'required',
                'max:10',
            ],
            'osnovna_ploca_model_id' => [
                'required',
                'integer',
            ],
        ]);

        $mbd = new OsnovnaPloca();
        $mbd->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $mbd->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $mbd->serijski_broj = $request->serijski_broj;
        $mbd->osnovna_ploca_model_id = $request->osnovna_ploca_model_id;
        $mbd->save();

        Session::flash('uspeh', 'Osnovna ploča je uspešno dodata!');
        $stavka_nabavke_id = $mbd->stavka_nabavke_id;
        $stavka_otpremnice_id = $mbd->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
    }

    public function postPsuDodavanje(Request $request)
    {
        $this->validate($request, [
            'stavka_otpremnice_id' => [
                'required',
                'integer',
            ],
            'vrsta_uredjaja_id' => [
                'required',
                'integer',
            ],
            'serijski_broj' => [
                'required',
                'max:10',
            ],
            'napajanje_model_id' => [
                'required',
                'integer',
            ],
        ]);

        $psu = new Napajanje();
        $psu->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $psu->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $psu->serijski_broj = $request->serijski_broj;
        $psu->napajanje_model_id = $request->napajanje_model_id;
        $psu->save();

        Session::flash('uspeh', 'Napajanje je uspešno dodato!');
        $stavka_nabavke_id = $psu->stavka_nabavke_id;
        $stavka_otpremnice_id = $psu->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
    }

    public function postRamDodavanje(Request $request)
    {
        $this->validate($request, [
            'stavka_otpremnice_id' => [
                'required',
                'integer',
            ],
            'vrsta_uredjaja_id' => [
                'required',
                'integer',
            ],
            'serijski_broj' => [
                'required',
                'max:10',
            ],
            'memorija_model_id' => [
                'required',
                'integer',
            ],
        ]);

        $ram = new Memorija();
        $ram->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $ram->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $ram->serijski_broj = $request->serijski_broj;
        $ram->memorija_model_id = $request->memorija_model_id;
        $ram->save();

        Session::flash('uspeh', 'Memorija je uspešno dodata!');
        $stavka_nabavke_id = $ram->stavka_nabavke_id;
        $stavka_otpremnice_id = $ram->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
    }

    public function postVgaDodavanje(Request $request)
    {
        $this->validate($request, [
            'stavka_otpremnice_id' => [
                'required',
                'integer',
            ],
            'vrsta_uredjaja_id' => [
                'required',
                'integer',
            ],
            'serijski_broj' => [
                'required',
                'max:10',
            ],
            'graficki_adapter_model_id' => [
                'required',
                'integer',
            ],
        ]);

        $vga = new GrafickiAdapter();
        $vga->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $vga->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $vga->serijski_broj = $request->serijski_broj;
        $vga->graficki_adapter_model_id = $request->graficki_adapter_model_id;
        $vga->save();

        Session::flash('uspeh', 'Grafički adapter je uspešno dodat!');
        $stavka_nabavke_id = $vga->stavka_nabavke_id;
        $stavka_otpremnice_id = $vga->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
    }

    /*
     * Brisanje uredjaja kroz nabavku-otpremnicu
     */

    public function postBrisanjeUredjaja(Request $request)
    {
        $vrsta = $request->idVrstaUredjaja;
        $id = $request->idBrisanje;
        $uredjaj = null;
        switch ($vrsta) {
            case 1:
                $uredjaj = Racunar::findOrFail($id);
                break;
            case 2:
                $uredjaj = Monitor::findOrFail($id);
                break;
            case 3:
                $uredjaj = Stampac::findOrFail($id);
                break;
            case 4:
                $uredjaj = Skener::findOrFail($id);
                break;
            case 5:
                $uredjaj = Ups::findOrFail($id);
                break;
            case 6:
                $uredjaj = OsnovnaPloca::findOrFail($id);
                break;
            case 7:
                $uredjaj = Procesor::findOrFail($id);
                break;
            case 8:
                $uredjaj = GrafickiAdapter::findOrFail($id);
                break;
            case 9:
                $uredjaj = Memorija::findOrFail($id);
                break;
            case 10:
                $uredjaj = Hdd::findOrFail($id);
                break;
            case 11:
                $uredjaj = Napajanje::findOrFail($id);
                break;
            case 12:
                $uredjaj = Projektor::findOrFail($id);
                break;
            case 13:
                $uredjaj = MrezniUredjaj::findOrFail($id);
                break;
        }
        $odgovor = $uredjaj->forceDelete();
        if ($odgovor) {
            Session::flash('uspeh', 'Uređaj je uspešno obrisan!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja uređaja. Pokušajte ponovo, kasnije!');
        }
        $stavka_nabavke_id = $uredjaj->stavka_nabavke_id;
        $stavka_otpremnice_id = $uredjaj->stavka_otpremnice_id;
        if ($stavka_nabavke_id) {
            return redirect()->route('nabavke.stavke.detalj', $stavka_nabavke_id);
        }
        if ($stavka_otpremnice_id) {
            return redirect()->route('otpremnice.stavke.detalj', $stavka_otpremnice_id);
        }
    }

    /*
     * Pregled uredjaja kroz nabavku-otpremnicu
     */

    public function getPregledUredjaja($vrsta, $id)
    {
        switch ($vrsta) {
            case 1:
                return redirect()->route('racunari.oprema.detalj', $id);
            case 2:
                return redirect()->route('monitori.oprema.detalj', $id);
            case 3:
                return redirect()->route('stampaci.oprema.detalj', $id);
            case 4:
                return redirect()->route('skeneri.oprema.detalj', $id);
            case 5:
                return redirect()->route('upsevi.oprema.detalj', $id);
            case 6:
                return redirect()->route('osnovne_ploce.oprema.detalj', $id);
            case 7:
                return redirect()->route('procesori.oprema.detalj', $id);
            case 8:
                return redirect()->route('vga.oprema.detalj', $id);
            case 9:
                return redirect()->route('memorije.oprema.detalj', $id);
            case 10:
                return redirect()->route('hddovi.oprema.detalj', $id);
            case 11:
                return redirect()->route('napajanja.oprema.detalj', $id);
            case 12:
                return redirect()->route('projektori.oprema.detalj', $id);
            case 13:
                return redirect()->route('mrezni.oprema.detalj', $id);
            default :
                return null;
        }
    }

}
