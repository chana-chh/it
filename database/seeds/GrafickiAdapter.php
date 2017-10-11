<?php

use Illuminate\Database\Seeder;

class GrafickiAdapter extends Seeder
{
    public function run()
    {
        DB::table('graficki_adapteri')->insert([
                'serijski_broj' => '01234567890123456789',
                'graficki_adapter_model_id' => 1,
                'racunar_id' => 1,
                'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'stavka_otpremnice_id' => 4,
                'reciklirano' => 0,
            ]);
        DB::table('graficki_adapteri')->insert([
                'serijski_broj' => '11111111111',
                'graficki_adapter_model_id' => 1,
                'racunar_id' => 2,
                'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'stavka_otpremnice_id' => 4,
                'reciklirano' => 0,
            ]);
        DB::table('graficki_adapteri')->insert([
                'serijski_broj' => '22222222222222222',
                'graficki_adapter_model_id' => 2,
                'racunar_id' => 3,
                'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'stavka_otpremnice_id' => 4,
                'reciklirano' => 0,
            ]);
        DB::table('graficki_adapteri')->insert([
                'serijski_broj' => '333333333333333333333',
                'graficki_adapter_model_id' => 2,
                'racunar_id' => 3,
                'napomena' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'stavka_otpremnice_id' => 4,
                'reciklirano' => 0,
            ]);
    }
}
