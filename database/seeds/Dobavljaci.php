<?php

use Illuminate\Database\Seeder;

class Dobavljaci extends Seeder
{

    public function run()
    {
        DB::table('s_dobavljaci')->insert([
            'naziv' => 'Stara oprema',
        ]);
        DB::table('s_dobavljaci')->insert([
            'naziv' => 'Džin solutions doo',
        ]);
        DB::table('s_dobavljaci')->insert([
            'naziv' => 'STZR Start',
        ]);
        DB::table('s_dobavljaci')->insert([
            'naziv' => 'Mine',
        ]);
        DB::table('s_dobavljaci')->insert([
            'naziv' => 'LaptopCentar doo',
        ]);
        DB::table('s_dobavljaci')->insert([
            'naziv' => 'Uspon doo',
        ]);
        DB::table('s_dobavljaci')->insert([
            'naziv' => 'Royal commerce doo',
        ]);
        DB::table('s_dobavljaci')->insert([
            'naziv' => 'NET',
        ]);
        DB::table('s_dobavljaci')->insert([
            'naziv' => 'Jakov sistem doo',
        ]);
        DB::table('s_dobavljaci')->insert([
            'naziv' => 'King ICT',
        ]);
        DB::table('s_dobavljaci')->insert([
            'naziv' => 'Direct link doo',
        ]);
    }

}
