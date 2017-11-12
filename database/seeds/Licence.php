<?php

use Illuminate\Database\Seeder;

class Licence extends Seeder
{

    public function run()
    {
        DB::table('licence')->insert([
            'tip_licence' => 'Neki tip',
            'proizvod' => 'Neki proizvod',
            'kljuc' => 'nullable',
            'broj_aktivacija' => 50,
            'datum_pocetka_vazenja' => '1970-01-01',
            'datum_prestanka_vazenja' => '1970-01-01',
        ]);
    }

}
