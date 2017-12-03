<?php

namespace App\Helpers;

use App\Modeli\Zaposleni;
use App\Helpers\ImenikStavka;
use Illuminate\Database\Eloquent\Collection;

    //POLJA U KLASI

    // zaposleni_id
    // zaposleni_ime
    // kancelarija_id
    // lokacija
    // fiksni_telefoni
    // mobilni_telefoni
    // email_adrese

class ImenikHelper
{

    

    public static function zaImenik()
    {
        $kolekcija = new Collection();

        $zaposleni = Zaposleni::all();
        foreach ($zaposleni as $zap) {
            $imenik_stavka = new ImenikStavka();

            $imenik_stavka->zaposleni_id = $zap->id;
            $imenik_stavka->zaposleni_ime = $zap->imePrezime();
            if ($zap->kancelarija) {
                $imenik_stavka->kancelarija_id = $zap->kancelarija_id;
                $imenik_stavka->lokacija = $zap->kancelarija->sviPodaci();
                foreach ($zap->kancelarija->telefoni as $telefon) {
                    $imenik_stavka->fiksni_telefoni .= $telefon->broj.", ";
                }
            }
            if($zap->mobilni)
                foreach ($zap->mobilni as $mob) {
                    $imenik_stavka->mobilni_telefoni .= $mob->broj.", ";
                }
            if($zap->emailovi)
                foreach ($zap->emailovi as $email) {
                    $imenik_stavka->email_adrese .= $email->adresa.", ";
                }

                $kolekcija->add($imenik_stavka);

        }

        


        return $kolekcija;
    }

}
