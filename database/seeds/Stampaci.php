<?php

use Illuminate\Database\Seeder;

class Stampaci extends Seeder
{

    public function run()
    {
        DB::table('stampaci')->insert([
            'vrsta_uredjaja_id' => 3,
            'inventarski_broj' => 'nn',
            'serijski_broj' => 'nn',
            'stampac_model_id' => 1,
            'kancelarija_id' => 1,
            'stavka_nabavke_id' => 1,
        ]);
    }

}
