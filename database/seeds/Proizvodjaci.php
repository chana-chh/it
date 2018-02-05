<?php

use Illuminate\Database\Seeder;

class Proizvodjaci extends Seeder
{

    public function run()
    {

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'Nepoznat',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'Odeljenje za IKT',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'ASUS',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'Intel',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'AMD',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'NVIDIA',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'Samsung',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'ATI',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'Toshiba',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'Hitachi',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'LG',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'HP',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'Kingstone',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'SanDisk',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'Maxtor',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'WD',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'Microsoft',
        ]);

        DB::table('s_proizvodjaci')->insert([
            'naziv' => 'Adobe',
        ]);
    }

}
