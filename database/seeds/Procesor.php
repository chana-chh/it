<?php

use Illuminate\Database\Seeder;

class Procesor extends Seeder
{

    public function run()
    {
        DB::table('procesori')->insert([
            'vrsta_uredjaja_id' => 7,
            'serijski_broj' => 'nn',
            'procesor_model_id' => 1,
            'racunar_id' => 1,
        ]);
    }

}
