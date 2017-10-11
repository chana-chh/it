<?php

use Illuminate\Database\Seeder;

class Aplikacije extends Seeder
{
    public function run()
    {
        DB::table('aplikacije')->insert([
            'naziv' => 'Aplikacija 1',
            'proizvodjac_id' => 1,
            'opis' => 'Opis asd fgh jkl'
        ]);
        DB::table('aplikacije')->insert([
            'naziv' => 'Aplikacija 2',
            'proizvodjac_id' => 1,
            'opis' => 'Opis asd fgh jkl'
        ]);
        DB::table('aplikacije')->insert([
            'naziv' => 'Aplikacija 3',
            'proizvodjac_id' => 1,
            'opis' => 'Opis asd fgh jkl'
        ]);
    }
}
