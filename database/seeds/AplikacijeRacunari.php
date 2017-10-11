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
        DB::table('aplikacije_racunari')->insert([
            'aplikacija_id' => 1,
            'racunar_id' => 2,
        ]);
        DB::table('aplikacije_racunari')->insert([
            'aplikacija_id' => 2,
            'racunar_id' => 1,
        ]);
        DB::table('aplikacije_racunari')->insert([
            'aplikacija_id' => 2,
            'racunar_id' => 2,
        ]);
        DB::table('aplikacije_racunari')->insert([
            'aplikacija_id' => 3,
            'racunar_id' => 1,
        ]);
        DB::table('aplikacije_racunari')->insert([
            'aplikacija_id' => 3,
            'racunar_id' => 2,
        ]);
    }
}
