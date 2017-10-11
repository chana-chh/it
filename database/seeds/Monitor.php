<?php

use Illuminate\Database\Seeder;

class Monitor extends Seeder
{

    public function run()
    {
        DB::table('monitori')->insert([
            'inventarski_broj' => 'kg2314',
            'serijski_broj' => 'mon11111',
            'monitor_model_id' => 1,
            'racunar_id' => 1,
            'kancelarija_id' => 1,
            'deleted_at' => null,
            'reciklirano' => 0,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 5,
            'nabavka_id' => 2,
        ]);
        DB::table('monitori')->insert([
            'inventarski_broj' => 'kg4444',
            'serijski_broj' => 'mon22222',
            'monitor_model_id' => 2,
            'racunar_id' => 3,
            'kancelarija_id' => 2,
            'deleted_at' => null,
            'reciklirano' => 0,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 5,
            'nabavka_id' => 1,
        ]);
        DB::table('monitori')->insert([
            'inventarski_broj' => 'kg26674',
            'serijski_broj' => 'mon33333',
            'monitor_model_id' => 3,
            'racunar_id' => 2,
            'kancelarija_id' => 3,
            'deleted_at' => null,
            'reciklirano' => 0,
            'stavka_otpremnice_id' => 5,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'nabavka_id' => 3,
        ]);
    }
}
