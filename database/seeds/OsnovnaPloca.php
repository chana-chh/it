<?php

use Illuminate\Database\Seeder;

class OsnovnaPloca extends Seeder
{

    public function run()
    {
        DB::table('osnovne_ploce')->insert([
            'serijski_broj' => 'plo11111',
            'osnovna_ploca_model_id' => 1,
            'racunar_id' => 1,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 3,
            'deleted_at' => null,
            'reciklirano' => 0,
        ]);
        DB::table('osnovne_ploce')->insert([
            'serijski_broj' => 'plo222222',
            'osnovna_ploca_model_id' => 2,
            'racunar_id' => 2,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 3,
            'deleted_at' => null,
            'reciklirano' => 0,
        ]);
        DB::table('osnovne_ploce')->insert([
            'serijski_broj' => 'plo33333',
            'osnovna_ploca_model_id' => 1,
            'racunar_id' => 3,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 3,
            'deleted_at' => null,
            'reciklirano' => 0,
        ]);
    }
}
