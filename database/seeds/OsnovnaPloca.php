<?php

use Illuminate\Database\Seeder;

class OsnovnaPloca extends Seeder
{

    public function run()
    {
        DB::table('osnovne_ploce')->insert([
            'vrsta_uredjaja_id' => 6,
            'serijski_broj' => 'nn',
            'osnovna_ploca_model_id' => 1,
        ]);
    }

}
