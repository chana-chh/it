<?php

use Illuminate\Database\Seeder;

class SkeneriModeli extends Seeder
{

    public function run()
    {
        DB::table('skeneri_modeli')->insert([
            'naziv' => 'nn',
            'proizvodjac_id' => 1,
        ]);
    }

}
