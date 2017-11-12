<?php

use Illuminate\Database\Seeder;

class MrezniUredjaj extends Seeder
{

    public function run()
    {
        DB::table('aktivna_mrezna_oprema')->insert([
            'vrsta_uredjaja_id' => 13,
            'naziv' => 'nn',
            'inventarski_broj' => 'nn',
            'serijski_broj' => 'nn',
            'broj_portova' => 24,
            'upravljiv' => true, // jeste upravljiv
            'proizvodjac_id' => 1,
            'kancelarija_id' => 1,
            'stavka_nabavke_id' => 1,
        ]);
    }

}
