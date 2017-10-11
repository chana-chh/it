<?php

use Illuminate\Database\Seeder;

class Memorija extends Seeder
{

    public function run()
    {
        DB::table('memorije')->insert([
            'serijski_broj' => 'mem11111',
            'memorija_model_id' => 1,
            'racunar_id' => 1,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 2,
            'deleted_at' => null,
            'reciklirano' => 0,
        ]);
        DB::table('memorije')->insert([
            'serijski_broj' => 'mem222222',
            'memorija_model_id' => 2,
            'racunar_id' => 1,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 2,
            'deleted_at' => null,
            'reciklirano' => 0,
        ]);
        DB::table('memorije')->insert([
            'serijski_broj' => 'mem333333',
            'memorija_model_id' => 3,
            'racunar_id' => 2,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 2,
            'deleted_at' => null,
            'reciklirano' => 0,
        ]);
    }
}
