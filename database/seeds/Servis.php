<?php

use Illuminate\Database\Seeder;

class Servis extends Seeder
{

    public function run()
    {
        DB::table('servis')->insert([
            'broj_prijave' => 'Prijava kvara broj 1',
            'zaposleni_id' => 1,
            'kancelarija_id' => 1,
            'datum_prijave' => '2017-11-01',
            'ip_prijave' => '192.168.14.123',
            'ime_racunara_prijave' => 'GU370',
            'opis_kvara_zaposleni' => 'Crko comp',
            'datum_prijema' => '2017-11-01',
            'datum_popravke' => '2017-11-02',
            'datum_isporuke' => '2017-11-03',
            'opis_kvara_servis' => 'Crko samo po ivicama',
            'vrsta_uredjaja_id' => 1,
            'uredjaj_id' => 1,
            'status_id' => 6,
            'napomena' => 'Ko se radi ne boji se gladi',
        ]);
    }

}
