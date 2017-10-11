<?php

use Illuminate\Database\Seeder;

class Ugovori extends Seeder
{

    public function run()
    {
        DB::table('ugovori_odrzavanja')->insert([
            'broj' => '12345',
            'datum_zakljucivanja' => '2017-01-04',
            'datum_raskida' => '2018-01-04',
            'iznos_sredstava' => 2500000,
            'napomena' => 'Umro server',
        ]);
    }
}
