<?php

use Illuminate\Database\Seeder;

class MonitorDijagonala extends Seeder
{

    public function run()
    {
        DB::table('s_dijagonale')->insert([
            'naziv' => 14,
        ]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 15,
        ]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 17,
        ]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 19,
        ]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 21,
        ]);
    }

}
