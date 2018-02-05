<?php

use Illuminate\Database\Seeder;

class GrafickiAdapter extends Seeder
{

    public function run()
    {
        DB::table('graficki_adapteri')->insert([
            'vrsta_uredjaja_id' => 8,
            'serijski_broj' => 'nn',
            'graficki_adapter_model_id' => 1,
            'racunar_id' => 1,
        ]);
    }

}
