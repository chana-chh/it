<?php

use Illuminate\Database\Seeder;

class Hdd extends Seeder
{
    public function run()
    {
        DB::table('hdd')->insert([
            'serijski_broj' => '11111',
            'hdd_model_id' => 1,
            'racunar_id' => 1,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 1,
            'reciklirano' => 0,
        ]);
        DB::table('hdd')->insert([
            'serijski_broj' => '22222',
            'hdd_model_id' => 1,
            'racunar_id' => 1,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 1,
            'reciklirano' => 0,
        ]);
        DB::table('hdd')->insert([
            'serijski_broj' => '33333',
            'hdd_model_id' => 1,
            'racunar_id' => 2,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 1,
            'reciklirano' => 0,
        ]);
    }
}
