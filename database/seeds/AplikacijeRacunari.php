<?php

use Illuminate\Database\Seeder;

class AplikacijeRacunari extends Seeder
{

    public function run()
    {
        DB::table('aplikacije_racunari')->insert([
            'aplikacija_id' => 1,
            'racunar_id' => 1,
        ]);
    }

}
