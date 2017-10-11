<?php

use Illuminate\Database\Seeder;

class Procesor extends Seeder
{

    public function run()
    {
        DB::table('procesori')->insert([
            'serijski_broj' => 'cpu11111',
            'procesor_model_id' => 1,
            'racunar_id' => 1,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 10,
            'deleted_at' => null,
            'reciklirano' => 0,
        ]);
        DB::table('procesori')->insert([
            'serijski_broj' => 'cpu222222',
            'procesor_model_id' => 1,
            'racunar_id' => 2,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 10,
            'deleted_at' => null,
            'reciklirano' => 0,
        ]);
        DB::table('procesori')->insert([
            'serijski_broj' => 'cpu3333333',
            'procesor_model_id' => 2,
            'racunar_id' => 3,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 10,
            'deleted_at' => null,
            'reciklirano' => 0,
        ]);
    }
}
