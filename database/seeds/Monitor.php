<?php

use Illuminate\Database\Seeder;

class Monitor extends Seeder
{

    public function run()
    {
        DB::table('monitori')->insert([
            'vrsta_uredjaja_id' => 2,
            'inventarski_broj' => 'nn',
            'serijski_broj' => 'nn',
            'monitor_model_id' => 1,
            'racunar_id' => 1,
        ]);
    }

}
