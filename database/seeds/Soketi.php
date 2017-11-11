<?php

use Illuminate\Database\Seeder;

class Soketi extends Seeder
{

    public function run()
    {
        DB::table('s_soketi')->insert([
            'naziv' => 'Socket 1150',
        ]);
        DB::table('s_soketi')->insert([
            'naziv' => 'Socket 1151',
        ]);
        DB::table('s_soketi')->insert([
            'naziv' => 'Socket FM2+',
        ]);
        DB::table('s_soketi')->insert([
            'naziv' => 'Socket AM3+',
        ]);
        DB::table('s_soketi')->insert([
            'naziv' => 'Socket FM2',
        ]);
        DB::table('s_soketi')->insert([
            'naziv' => 'Socket 2011',
        ]);
        DB::table('s_soketi')->insert([
            'naziv' => 'Socket 775',
        ]);
        DB::table('s_soketi')->insert([
            'naziv' => 'Socket 1168',
        ]);
    }

}
