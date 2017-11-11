<?php

use Illuminate\Database\Seeder;

class ProcesoriModeli extends Seeder
{

    public function run()
    {
        DB::table('procesori_modeli')->insert([
            'naziv' => 'nn',
            'proizvodjac_id' => 1,
            'soket_id' => 1,
            'takt' => 1000,
            'kes' => '3 MB',
            'broj_jezgara' => 1,
            'broj_niti' => 1,
            'ocena' => 1,
        ]);
    }

}
