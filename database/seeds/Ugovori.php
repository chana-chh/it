<?php

use Illuminate\Database\Seeder;

class Ugovori extends Seeder
{

    public function run()
    {
        DB::table('ugovori_odrzavanja')->insert([
            'broj' => 'Stara oprema',
            'datum_zakljucivanja' => '1970-01-01',
            'datum_raskida' => '1970-01-04',
        ]);
    }

}
