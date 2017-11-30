<?php

namespace App\Helpers;

use App\Modeli\VrstaUredjaja;
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

        $monitori = Monitor::all();
        foreach ($monitori as $mon) {
            $ur = new Uredjaj();

            $ur->vrsta_uredjaja = $mon->vrstaUredjaja->naziv;
            $ur->naziv = $mon->monitorModel->naziv;
            $ur->brojevi = $mon->inventarski_broj . ', ' . $mon->serijski_broj;
            $ur->tehnicki_detalji = $mon->monitorModel->dijagonala->naziv;
            if ($mon->kancelarija && $mon->racunar) {
                $ur->lokacija = $mon->kancelarija->sviPodaci() . ', ' . $mon->racunar->ime;
            } else if ($mon->kancelarija && !$mon->racunar) {
                $ur->lokacija = $mon->kancelarija->sviPodaci();
            } else if (!$mon->kancelarija && $mon->racunar) {
                $ur->lokacija = $mon->racunar->ime;
            }
            if ($mon->stavkaOtpremnice) {
                $ur->poreklo = $mon->stavkaOtpremnice->otpremnica->broj;
            } else {
                $ur->poreklo = $mon->stavkaNabavke->nabavka->datum;
            }
            $ur->napomena = $mon->napomena;
            $ur->otpis = $mon->deletad_at;
            if ($mon->reciklirano) {
                $ur->reciklaza = $mon->reciklirano->datum;
            }

            $kolekcija->add($ur);
        }

        $stampaci = Stampac::all();
        foreach ($stampaci as $sta) {
            $ur = new Uredjaj();

            $ur->vrsta_uredjaja = $sta->vrstaUredjaja->naziv;
            $ur->naziv = $sta->stampacModel->naziv;
            $ur->brojevi = $sta->inventarski_broj . ', ' . $sta->serijski_broj;
            $ur->tehnicki_detalji = $sta->stampacModel->tip->naziv;
            if ($sta->kancelarija && $sta->racunar) {
                $ur->lokacija = $sta->kancelarija->sviPodaci() . ', ' . $sta->racunar->ime;
            } else if ($sta->kancelarija && !$sta->racunar) {
                $ur->lokacija = $sta->kancelarija->sviPodaci();
            } else if (!$sta->kancelarija && $sta->racunar) {
                $ur->lokacija = $sta->racunar->ime;
            }
            if ($sta->stavkaOtpremnice) {
                $ur->poreklo = $sta->stavkaOtpremnice->otpremnica->broj;
            } else {
                $ur->poreklo = $sta->stavkaNabavke->nabavka->datum;
            }
            $ur->napomena = $sta->napomena;
            $ur->otpis = $sta->deletad_at;
            if ($sta->reciklirano) {
                $ur->reciklaza = $sta->reciklirano->datum;
            }

            $kolekcija->add($ur);
        }
        return $kolekcija;
    }

}
