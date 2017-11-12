<?php

use Illuminate\Database\Seeder;

class Skeneri extends Seeder
{

    public function run()
    {
        DB::table('skeneri')->insert([
            'vrsta_uredjaja_id' => 4,
            'skener_model_id' => 1,
            'inventarski_broj' => 'nn',
            'serijski_broj' => 'nn',
            'kancelarija_id' => 1,
            'stavka_nabavke_id' => 1,
        ]);
    }

}
