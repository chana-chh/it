<?php

use Illuminate\Database\Seeder;

class MonitorModel extends Seeder
{

    public function run()
    {
        DB::table('monitori_modeli')->insert([
            'naziv' => 'nn',
            'proizvodjac_id' => 1,
            'dijagonala_id' => 1,
        ]);
    }

}
