<?php

use Illuminate\Database\Seeder;

class Racunari extends Seeder
{

    public function run()
    {
        DB::table('racunari')->insert([
            // 'laptop' => 0, // nije
            'server' => true, // jeste
            'brend' => true, // jeste
            'proizvodjac_id' => 1,
            'inventarski_broj' => 'nn',
            'serijski_broj' => 'nn',
            'erc_broj' => '001',
            'ime' => 'GU001',
            'zaposleni_id' => 1,
            'kancelarija_id' => 1,
            'stavka_nabavke_id' => 1,
            'os_id' => 4,
            'ploca_id' => 1,
            'vrsta_uredjaja_id' => 1,
        ]);
    }

}
