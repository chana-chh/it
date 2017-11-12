<?php

use Illuminate\Database\Seeder;

class GrafickiAdapteriPovezivanje extends Seeder
{

    public function run()
    {
        DB::table('graficki_adapteri_povezivanje')->insert([
            'graficki_adapter_model_id' => 1,
            'povezivanje_id' => 1,
        ]);
    }

}
