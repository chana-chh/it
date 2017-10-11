<?php

use Illuminate\Database\Seeder;

class Napajanje extends Seeder
{

    public function run()
    {
        DB::table('napajanja')->insert([
            'serijski_broj' => 'nap11111',
            'napajanje_model_id' => 1,
            'racunar_id' => 1,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 6,
            'deleted_at' => null,
            'reciklirano' => 0,
        ]);
        DB::table('napajanja')->insert([
            'serijski_broj' => 'nap22222',
            'napajanje_model_id' => 1,
            'racunar_id' => 2,
            'napomena' => 'Otpisano i reciklirano',
            'stavka_otpremnice_id' => 6,
            'deleted_at' => '2016-02-14',
            'reciklirano' => 1,
        ]);
        DB::table('napajanja')->insert([
            'serijski_broj' => 'nap333333',
            'napajanje_model_id' => 2,
            'racunar_id' => 3,
            'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'stavka_otpremnice_id' => 6,
            'deleted_at' => null,
            'reciklirano' => 0,
        ]);
    }
}
