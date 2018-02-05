<?php

use Illuminate\Database\Seeder;

class StampaciModeli extends Seeder
{

    public function run()
    {
        DB::table('stampaci_modeli')->insert([
            'naziv' => 'nn',
            'tip_tonera_id' => 1,
            'proizvodjac_id' => 1,
            'tip_stampaca_id' => 1,
        ]);
    }

}
