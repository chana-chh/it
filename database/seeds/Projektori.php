<?php

use Illuminate\Database\Seeder;

class Projektori extends Seeder
{

    public function run()
    {
        DB::table('projektori')->insert([
            'vrsta_uredjaja_id' => 12,
            'naziv' => 'nn',
            'inventarski_broj' => 'nn',
            'serijski_broj' => 'nn',
            'proizvodjac_id' => 1,
            'kancelarija_id' => 1,
            'nabavka_id' => 1,
        ]);
    }

}
