<?php

use Illuminate\Database\Seeder;

class Stampaci extends Seeder
{
    public function run()
    {
        DB::table('stampaci')->insert([
            'inventarski_broj' => '25140',
            'serijski_broj' => '333555111',
            'stampac_model_id' => 1,
            'kancelarija_id' => 2,
            'racunar_id' => 3,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'deleted_at' => null,
            'reciklirano' => 0,
            'stavka_otpremnice_id' => 11,
            'nabavka_id' => null,
        ]);
    }
}
