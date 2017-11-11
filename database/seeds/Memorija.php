<?php

use Illuminate\Database\Seeder;

class Memorija extends Seeder
{

    public function run()
    {
        DB::table('memorije')->insert([
            'vrsta_uredjaja_id' => 9,
            'serijski_broj' => 'nn',
            'memorija_model_id' => 1,
            'racunar_id' => 1,
        ]);
    }

}
