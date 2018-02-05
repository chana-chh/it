<?php

use Illuminate\Database\Seeder;

class Hdd extends Seeder
{

    public function run()
    {
        DB::table('hdd')->insert([
            'vrsta_uredjaja_id' => 10,
            'serijski_broj' => 'nn',
            'hdd_model_id' => 1,
            'racunar_id' => 1,
        ]);
    }

}
