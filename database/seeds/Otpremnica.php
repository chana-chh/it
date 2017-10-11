<?php

use Illuminate\Database\Seeder;

class Otpremnica extends Seeder
{

    public function run()
    {
        DB::table('otpremnice')->insert([
            'broj' => 'Stara oprema',
            'racun_id' => null,
            'datum' => '1970-01-01',
            'napomena' => 'Ovde smestamo svu staru opremu jer smo mi idiJoti',
            'dobavljac_id' => 1,
            'broj_profakture' => null,
            'deleted_at' => null,
        ]);
        DB::table('otpremnice')->insert([
            'broj' => '01/2017 otpremnica',
            'racun_id' => 1,
            'datum' => '2017-01-04',
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'dobavljac_id' => 4,
            'broj_profakture' => null,
            'deleted_at' => null,
        ]);
    }
}
