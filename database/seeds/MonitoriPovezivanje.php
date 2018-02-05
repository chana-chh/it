<?php

use Illuminate\Database\Seeder;

class MonitoriPovezivanje extends Seeder
{

    public function run()
    {
        DB::table('monitori_povezivanje')->insert([
            'monitor_model_id' => 1,
            'povezivanje_id' => 1,
        ]);
    }

}
