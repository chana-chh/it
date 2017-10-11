<?php

use Illuminate\Database\Seeder;

class Ups extends Seeder
{

    public function run()
    {
        DB::table('ups')->insert([
            'serijski_broj' => '333522',
            'inventarski_broj' => '14340',
            'ups_model_id' => 1,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 8,
            'kancelarija_id' => 12,
            'deleted_at' => null,
            'reciklirano' => 0,
            'nabavka_id' => null,
        ]);
    }
}
