<?php

use Illuminate\Database\Seeder;

class Skeneri extends Seeder
{
    public function run()
    {
        DB::table('skeneri')->insert([
            'skener_model_id' => 1,
            'inventarski_broj' => '140',
            'serijski_broj' => '333555222',
            'kancelarija_id' => 2,
            'racunar_id' => 3,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 11,
            'deleted_at' => null,
            'reciklirano' => 0,
            'nabavka_id' => null,
        ]);
    }
}
