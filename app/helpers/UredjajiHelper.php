<?php

namespace App\Helpers;

use App\Modeli\Racunar;
use App\Modeli\OsnovnaPloca;
use App\Modeli\Hdd;
use App\Modeli\Procesor;
use App\Modeli\Memorija;
use App\Modeli\GrafickiAdapter;
use App\Modeli\Napajanje;
use App\Modeli\Monitor;
use App\Modeli\Stampac;
use App\Modeli\Skener;
use App\Modeli\Ups;
use App\Modeli\Projektor;
use App\Modeli\MrezniUredjaj;
use App\Helpers\Uredjaj;
use Illuminate\Database\Eloquent\Collection;

class UredjajiHelper
{

    public static function sviUredjaji()
    {
        $kolekcija = new Collection();

        $racunari = Racunar::withTrashed()->get();
        foreach ($racunari as $racunar) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $racunar->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $racunar->vrstaUredjaja->naziv;
            $uredjaj->naziv = $racunar->ime;
            $uredjaj->inventarski_broj = $racunar->inventarski_broj;
            $uredjaj->serijski_broj = $racunar->serijski_broj;
            $uredjaj->tehnicki_detalji = $racunar->tehnickiDetalji();
            if ($racunar->kancelarija && $racunar->zaposleni) {
                $uredjaj->lokacija = $racunar->kancelarija->sviPodaci() . ', ' . $racunar->zaposleni->imePrezime();
                $uredjaj->kancelarija_id = $racunar->kancelarija_id;
            } else if ($racunar->kancelarija && !$racunar->zaposleni) {
                $uredjaj->lokacija = $racunar->kancelarija->sviPodaci();
                $uredjaj->kancelarija_id = $racunar->kancelarija_id;
            } else if (!$racunar->kancelarija && $racunar->zaposleni) {
                $uredjaj->lokacija = $racunar->zaposleni->imePrezime();
                $uredjaj->racunar_id = $racunar->zaposleni_id;
            }
            $uredjaj->poreklo = $racunar->nabavkaStavka->nabavka->datum;
            $uredjaj->nabavka_stavka_id = $racunar->nabavkaStavka->id;
            $uredjaj->napomena = $racunar->napomena;
            $uredjaj->otpis = $racunar->deletad_at;
            if ($racunar->reciklirano) {
                $uredjaj->reciklaza = $racunar->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        $monitori = Monitor::withTrashed()->get();
        foreach ($monitori as $monitor) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $monitor->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $monitor->vrstaUredjaja->naziv;
            $uredjaj->naziv = $monitor->monitorModel->naziv;
            $uredjaj->inventarski_broj = $monitor->inventarski_broj;
            $uredjaj->serijski_broj = $monitor->serijski_broj;
            $uredjaj->tehnicki_detalji = 'Dijagonala: ' . $monitor->monitorModel->dijagonala->naziv . '"';
            if ($monitor->kancelarija && $monitor->racunar) {
                $uredjaj->lokacija = $monitor->kancelarija->sviPodaci() . ', ' . $monitor->racunar->ime;
                $uredjaj->kancelarija_id = $monitor->kancelarija->id;
            } else if ($monitor->kancelarija && !$monitor->racunar) {
                $uredjaj->lokacija = $monitor->kancelarija->sviPodaci();
                $uredjaj->kancelarija_id = $monitor->kancelarija->id;
            } else if (!$monitor->kancelarija && $monitor->racunar) {
                $uredjaj->lokacija = $monitor->racunar->ime;
                $uredjaj->racunar_id = $monitor->racunar->id;
            }
            if ($monitor->stavkaOtpremnice) {
                $uredjaj->poreklo = $monitor->stavkaOtpremnice->otpremnica->broj;
                $uredjaj->otpremnica_stavka_id = $monitor->stavkaOtpremnice->id;
            } else {
                $uredjaj->poreklo = $monitor->nabavkaStavka->nabavka->datum;
                $uredjaj->nabavka_stavka_id = $monitor->nabavkaStavka->id;
            }
            $uredjaj->napomena = $monitor->napomena;
            $uredjaj->otpis = $monitor->deletad_at;
            if ($monitor->reciklirano) {
                $uredjaj->reciklaza = $monitor->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        $stampaci = Stampac::withTrashed()->get();
        foreach ($stampaci as $stampac) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $stampac->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $stampac->vrstaUredjaja->naziv;
            $uredjaj->naziv = $stampac->stampacModel->naziv;
            $uredjaj->inventarski_broj = $stampac->inventarski_broj;
            $uredjaj->serijski_broj = $stampac->serijski_broj;
            $uredjaj->tehnicki_detalji = 'Tip štampača: ' . $stampac->stampacModel->tip->naziv . '.';
            if ($stampac->kancelarija && $stampac->racunar) {
                $uredjaj->lokacija = $stampac->kancelarija->sviPodaci() . ', ' . $stampac->racunar->ime;
                $uredjaj->kancelarija_id = $stampac->kancelarija->id;
            } else if ($stampac->kancelarija && !$stampac->racunar) {
                $uredjaj->lokacija = $stampac->kancelarija->sviPodaci();
                $uredjaj->kancelarija_id = $stampac->kancelarija->id;
            } else if (!$stampac->kancelarija && $stampac->racunar) {
                $uredjaj->lokacija = $stampac->racunar->ime;
                $uredjaj->racunar_id = $stampac->racunar->id;
            }
            if ($stampac->stavkaOtpremnice) {
                $uredjaj->poreklo = $stampac->stavkaOtpremnice->otpremnica->broj;
                $uredjaj->otpremnica_stavka_id = $stampac->stavkaOtpremnice->id;
            } else {
                $uredjaj->poreklo = $stampac->nabavkaStavka->nabavka->datum;
                $uredjaj->nabavka_stavka_id = $stampac->nabavkaStavka->id;
            }
            $uredjaj->napomena = $stampac->napomena;
            $uredjaj->otpis = $stampac->deletad_at;
            if ($stampac->reciklirano) {
                $uredjaj->reciklaza = $stampac->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        $skeneri = Skener::withTrashed()->get();
        foreach ($skeneri as $skener) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $skener->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $skener->vrstaUredjaja->naziv;
            $uredjaj->naziv = $skener->skenerModel->naziv;
            $uredjaj->inventarski_broj = $skener->inventarski_broj;
            $uredjaj->serijski_broj = $skener->serijski_broj;
            $uredjaj->tehnicki_detalji = 'Format: ' . $skener->skenerModel->format . '. ';
            $uredjaj->tehnicki_detalji .= 'Rezolucija: ' . $skener->skenerModel->rezolucija;
            if ($skener->kancelarija && $skener->racunar) {
                $uredjaj->lokacija = $skener->kancelarija->sviPodaci() . ', ' . $skener->racunar->ime;
            } else if ($skener->kancelarija && !$skener->racunar) {
                $uredjaj->lokacija = $skener->kancelarija->sviPodaci();
                $uredjaj->kancelarija_id = $skener->kancelarija->id;
            } else if (!$skener->kancelarija && $skener->racunar) {
                $uredjaj->lokacija = $skener->racunar->ime;
                $uredjaj->racunar_id = $skener->racunar->id;
            }
            if ($skener->stavkaOtpremnice) {
                $uredjaj->poreklo = $skener->stavkaOtpremnice->otpremnica->broj;
                $uredjaj->otpremnica_stavka_id = $skener->stavkaOtpremnice->id;
            } else {
                $uredjaj->poreklo = $skener->nabavkaStavka->nabavka->datum;
                $uredjaj->nabavka_stavka_id = $skener->nabavkaStavka->id;
            }
            $uredjaj->napomena = $skener->napomena;
            $uredjaj->otpis = $skener->deletad_at;
            if ($skener->reciklirano) {
                $uredjaj->reciklaza = $skener->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        $upsevi = Ups::withTrashed()->get();
        foreach ($upsevi as $ups) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $ups->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $ups->vrstaUredjaja->naziv;
            $uredjaj->naziv = $ups->upsModel->naziv;
            $uredjaj->inventarski_broj = $ups->inventarski_broj;
            $uredjaj->serijski_broj = $ups->serijski_broj;
            $uredjaj->tehnicki_detalji = 'Kapacitet: ' . $ups->upsModel->kapacitet . '. ';
            $uredjaj->tehnicki_detalji .= 'Snaga: ' . $ups->upsModel->snaga . '. ';
            $uredjaj->tehnicki_detalji .= 'Baterija: ' . $ups->upsModel->tipBaterije->naziv . '. ';
            $uredjaj->tehnicki_detalji .= 'Broj baterija: ' . $ups->upsModel->broj_baterija . '.';
            if ($ups->kancelarija && $ups->racunar) {
                $uredjaj->lokacija = $ups->kancelarija->sviPodaci() . ', ' . $ups->racunar->ime;
            } else if ($ups->kancelarija && !$ups->racunar) {
                $uredjaj->lokacija = $ups->kancelarija->sviPodaci();
                $uredjaj->kancelarija_id = $ups->kancelarija->id;
            } else if (!$ups->kancelarija && $ups->racunar) {
                $uredjaj->lokacija = $ups->racunar->ime;
                $uredjaj->racunar_id = $ups->racunar->id;
            }
            if ($ups->stavkaOtpremnice) {
                $uredjaj->poreklo = $ups->stavkaOtpremnice->otpremnica->broj;
                $uredjaj->otpremnica_stavka_id = $ups->stavkaOtpremnice->id;
            } else {
                $uredjaj->poreklo = $ups->nabavkaStavka->nabavka->datum;
                $uredjaj->nabavka_stavka_id = $ups->nabavkaStavka->id;
            }
            $uredjaj->napomena = $ups->napomena;
            $uredjaj->otpis = $ups->deletad_at;
            if ($ups->reciklirano) {
                $uredjaj->reciklaza = $ups->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        $projektori = Projektor::withTrashed()->get();
        foreach ($projektori as $projektor) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $projektor->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $projektor->vrstaUredjaja->naziv;
            $uredjaj->naziv = $projektor->naziv;
            $uredjaj->inventarski_broj = $projektor->inventarski_broj;
            $uredjaj->serijski_broj = $projektor->serijski_broj;
            $uredjaj->tehnicki_detalji = 'Tip lampe: ' . $projektor->tip_lampe . '. ';
            $uredjaj->tehnicki_detalji .= 'Rezolucija: ' . $projektor->rezolucija . '. ';
            $uredjaj->tehnicki_detalji .= 'Kontrast: ' . $projektor->kontrast . '.';
            if ($projektor->kancelarija && $projektor->racunar) {
                $uredjaj->lokacija = $projektor->kancelarija->sviPodaci() . ', ' . $projektor->racunar->ime;
            } else if ($projektor->kancelarija && !$projektor->racunar) {
                $uredjaj->lokacija = $projektor->kancelarija->sviPodaci();
                $uredjaj->kancelarija_id = $projektor->kancelarija->id;
            } else if (!$projektor->kancelarija && $projektor->racunar) {
                $uredjaj->lokacija = $projektor->racunar->ime;
                $uredjaj->racunar_id = $projektor->racunar->id;
            }
            if ($projektor->stavkaOtpremnice) {
                $uredjaj->poreklo = $projektor->stavkaOtpremnice->otpremnica->broj;
                $uredjaj->otpremnica_stavka_id = $projektor->stavkaOtpremnice->id;
            } else {
                $uredjaj->poreklo = $projektor->nabavkaStavka->nabavka->datum;
                $uredjaj->nabavka_stavka_id = $projektor->nabavkaStavka->id;
            }
            $uredjaj->napomena = $projektor->napomena;
            $uredjaj->otpis = $projektor->deletad_at;
            if ($projektor->reciklirano) {
                $uredjaj->reciklaza = $projektor->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        $mrezni_uredjaji = MrezniUredjaj::withTrashed()->get();
        foreach ($mrezni_uredjaji as $mu) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $mu->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $mu->vrstaUredjaja->naziv;
            $uredjaj->naziv = $mu->naziv;
            $uredjaj->inventarski_broj = $mu->inventarski_broj;
            $uredjaj->serijski_broj = $mu->serijski_broj;
            $uredjaj->tehnicki_detalji = 'Broj portova: ' . $mu->broj_portova . '. ';
            $upravljiv = ($mu->upravljiv) ? 'DA' : 'NE';
            $uredjaj->tehnicki_detalji .= 'Upravljiv: ' . $upravljiv . '.';
            if ($mu->kancelarija && $mu->racunar) {
                $uredjaj->lokacija = $mu->kancelarija->sviPodaci() . ', ' . $mu->racunar->ime;
            } else if ($mu->kancelarija && !$mu->racunar) {
                $uredjaj->lokacija = $mu->kancelarija->sviPodaci();
                $uredjaj->kancelarija_id = $mu->kancelarija->id;
            } else if (!$mu->kancelarija && $mu->racunar) {
                $uredjaj->lokacija = $mu->racunar->ime;
                $uredjaj->racunar_id = $mu->racunar->id;
            }
            if ($mu->stavkaOtpremnice) {
                $uredjaj->poreklo = $mu->stavkaOtpremnice->otpremnica->broj;
                $uredjaj->otpremnica_stavka_id = $mu->stavkaOtpremnice->id;
            } else {
                $uredjaj->poreklo = $mu->nabavkaStavka->nabavka->datum;
                $uredjaj->nabavka_stavka_id = $mu->nabavkaStavka->id;
            }
            $uredjaj->napomena = $mu->napomena;
            $uredjaj->otpis = $mu->deletad_at;
            if ($mu->reciklirano) {
                $uredjaj->reciklaza = $mu->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        $osnovne_ploce = OsnovnaPloca::withTrashed()->get();
        foreach ($osnovne_ploce as $mbd) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $mbd->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $mbd->vrstaUredjaja->naziv;
            $uredjaj->naziv = $mbd->osnovnaPlocaModel->naziv;
            $uredjaj->serijski_broj = $mbd->serijski_broj;
            $uredjaj->tehnicki_detalji = 'Chipset: ' . $mbd->osnovnaPlocaModel->cipset . '.';
            if ($mbd->racunar) {
                $uredjaj->lokacija = $mbd->racunar->ime;
                $uredjaj->racunar_id = $mbd->racunar->id;
            }
            if ($mbd->stavkaOtpremnice) {
                $uredjaj->poreklo = $mbd->stavkaOtpremnice->otpremnica->broj;
                $uredjaj->otpremnica_stavka_id = $mbd->stavkaOtpremnice->id;
            }
            $uredjaj->napomena = $mbd->napomena;
            $uredjaj->otpis = $mbd->deletad_at;
            if ($mbd->reciklirano) {
                $uredjaj->reciklaza = $mbd->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        $hddovi = Hdd::withTrashed()->get();
        foreach ($hddovi as $hdd) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $hdd->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $hdd->vrstaUredjaja->naziv;
            $uredjaj->naziv = $hdd->hddModel->proizvodjac->naziv;
            $uredjaj->serijski_broj = $hdd->serijski_broj;
            $uredjaj->tehnicki_detalji = 'Kapacitet: ' . $hdd->hddModel->kapacitet . ' GB.';
            if ($hdd->racunar) {
                $uredjaj->lokacija = $hdd->racunar->ime;
                $uredjaj->racunar_id = $hdd->racunar->id;
            }
            if ($hdd->stavkaOtpremnice) {
                $uredjaj->poreklo = $hdd->stavkaOtpremnice->otpremnica->broj;
                $uredjaj->otpremnica_stavka_id = $hdd->stavkaOtpremnice->id;
            }
            $uredjaj->napomena = $hdd->napomena;
            $uredjaj->otpis = $hdd->deletad_at;
            if ($hdd->reciklirano) {
                $uredjaj->reciklaza = $hdd->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        $procesori = Procesor::withTrashed()->get();
        foreach ($procesori as $cpu) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $cpu->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $cpu->vrstaUredjaja->naziv;
            $uredjaj->naziv = $cpu->procesorModel->proizvodjac->naziv;
            $uredjaj->serijski_broj = $cpu->serijski_broj;
            $uredjaj->tehnicki_detalji = 'Takt: ' . $cpu->procesorModel->takt . ' MHz.';
            if ($cpu->racunar) {
                $uredjaj->lokacija = $cpu->racunar->ime;
                $uredjaj->racunar_id = $cpu->racunar->id;
            }
            if ($cpu->stavkaOtpremnice) {
                $uredjaj->poreklo = $cpu->stavkaOtpremnice->otpremnica->broj;
                $uredjaj->otpremnica_stavka_id = $cpu->stavkaOtpremnice->id;
            }
            $uredjaj->napomena = $cpu->napomena;
            $uredjaj->otpis = $cpu->deletad_at;
            if ($cpu->reciklirano) {
                $uredjaj->reciklaza = $cpu->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        $memorije = Memorija::withTrashed()->get();
        foreach ($memorije as $ram) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $ram->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $ram->vrstaUredjaja->naziv;
            $uredjaj->naziv = $ram->memorijaModel->proizvodjac->naziv;
            $uredjaj->serijski_broj = $ram->serijski_broj;
            $uredjaj->tehnicki_detalji = 'Kapacitet: ' . $ram->memorijaModel->kapacitet . ' MB.';
            if ($ram->racunar) {
                $uredjaj->lokacija = $ram->racunar->ime;
                $uredjaj->racunar_id = $ram->racunar->id;
            }
            if ($ram->stavkaOtpremnice) {
                $uredjaj->poreklo = $ram->stavkaOtpremnice->otpremnica->broj;
                $uredjaj->otpremnica_stavka_id = $ram->stavkaOtpremnice->id;
            }
            $uredjaj->napomena = $ram->napomena;
            $uredjaj->otpis = $ram->deletad_at;
            if ($ram->reciklirano) {
                $uredjaj->reciklaza = $ram->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        $graficke = GrafickiAdapter::withTrashed()->get();
        foreach ($graficke as $vga) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $vga->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $vga->vrstaUredjaja->naziv;
            $uredjaj->naziv = $vga->grafickiAdapterModel->naziv;
            $uredjaj->serijski_broj = $vga->serijski_broj;
            $uredjaj->tehnicki_detalji = 'Čip: ' . $vga->grafickiAdapterModel->cip . '.';
            if ($vga->racunar) {
                $uredjaj->lokacija = $vga->racunar->ime;
                $uredjaj->racunar_id = $vga->racunar->id;
            }
            if ($vga->stavkaOtpremnice) {
                $uredjaj->poreklo = $vga->stavkaOtpremnice->otpremnica->broj;
                $uredjaj->otpremnica_stavka_id = $vga->stavkaOtpremnice->id;
            }
            $uredjaj->napomena = $vga->napomena;
            $uredjaj->otpis = $vga->deletad_at;
            if ($vga->reciklirano) {
                $uredjaj->reciklaza = $vga->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        $napajanja = Napajanje::withTrashed()->get();
        foreach ($napajanja as $napajanje) {
            $uredjaj = new Uredjaj();
            $uredjaj->vrsta_uredjaja_id = $napajanje->vrstaUredjaja->id;
            $uredjaj->vrsta_uredjaja = $napajanje->vrstaUredjaja->naziv;
            $uredjaj->naziv = $napajanje->napajanjeModel->naziv;
            $uredjaj->serijski_broj = $napajanje->serijski_broj;
            $uredjaj->tehnicki_detalji = 'Snaga: ' . $napajanje->napajanjeModel->snaga . ' W.';
            if ($napajanje->racunar) {
                $uredjaj->lokacija = $napajanje->racunar->ime;
                $uredjaj->racunar_id = $napajanje->racunar->id;
            }
            if ($napajanje->stavkaOtpremnice) {
                $uredjaj->poreklo = $napajanje->stavkaOtpremnice->otpremnica->broj;
                $uredjaj->otpremnica_stavka_id = $napajanje->stavkaOtpremnice->id;
            }
            $uredjaj->napomena = $napajanje->napomena;
            $uredjaj->otpis = $napajanje->deletad_at;
            if ($napajanje->reciklirano) {
                $uredjaj->reciklaza = $napajanje->reciklirano->datum;
            }
            $kolekcija->add($uredjaj);
        }

        return $kolekcija;
    }

}
