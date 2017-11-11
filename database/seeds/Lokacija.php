<?php

use Illuminate\Database\Seeder;

class Lokacija extends Seeder
{

    public function run()
    {
        DB::table('s_lokacije')->insert([
            'naziv' => 'Skupština grada',
            'adresa_ulica' => 'Trg slobode',
            'adresa_broj' => '3',
        ]);
        DB::table('s_lokacije')->insert([
            'naziv' => 'Duvan promet',
            'adresa_ulica' => 'Branka Radičevića',
        ]);
        DB::table('s_lokacije')->insert([
            'naziv' => 'Varteks',
            'adresa_ulica' => 'Nikole Pašića',
        ]);
    }

}
