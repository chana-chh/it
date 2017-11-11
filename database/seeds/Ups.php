<?php

use Illuminate\Database\Seeder;

class Ups extends Seeder
{

    public function run()
    {
        DB::table('ups')->insert([
            'vrsta_uredjaja_id' => 5,
            'inventarski_broj' => 'nn',
            'serijski_broj' => 'nn',
            'ups_model_id' => 1,
            'kancelarija_id' => 1,
        ]);
    }

}
