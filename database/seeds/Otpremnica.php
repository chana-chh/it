<?php

use Illuminate\Database\Seeder;

class Otpremnica extends Seeder
{

    public function run()
    {
        DB::table('otpremnice')->insert([
            'broj' => 'Stara oprema',
            'racun_id' => 1,
            'datum' => '1970-01-01',
            'dobavljac_id' => 1,
        ]);
    }

}
