<?php

use Illuminate\Database\Seeder;

class Toneri extends Seeder
{

    public function run()
    {
        DB::table('s_toneri')->insert(['naziv' => '12A',]);
        DB::table('s_toneri')->insert(['naziv' => '85A',]);
        DB::table('s_toneri')->insert(['naziv' => '78A',]);
        DB::table('s_toneri')->insert(['naziv' => '35A',]);
    }
}
