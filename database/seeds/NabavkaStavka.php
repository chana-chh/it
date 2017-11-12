<?php

use Illuminate\Database\Seeder;

class NabavkaStavka extends Seeder
{

    public function run()
    {
        DB::table('nabavke_stavke')->insert([
            'nabavka_id' => 1,
            'vrsta_uredjaja_id' => 1,
            'naziv' => 'Računar',
            'jedinica_mere' => 1,
        ]);
        DB::table('nabavke_stavke')->insert([
            'nabavka_id' => 1,
            'vrsta_uredjaja_id' => 2,
            'naziv' => 'Monitor',
            'jedinica_mere' => 1,
        ]);
        DB::table('nabavke_stavke')->insert([
            'nabavka_id' => 1,
            'vrsta_uredjaja_id' => 3,
            'naziv' => 'Štampač',
            'jedinica_mere' => 1,
        ]);
        DB::table('nabavke_stavke')->insert([
            'nabavka_id' => 1,
            'vrsta_uredjaja_id' => 4,
            'naziv' => 'Skener',
            'jedinica_mere' => 1,
        ]);
        DB::table('nabavke_stavke')->insert([
            'nabavka_id' => 1,
            'vrsta_uredjaja_id' => 5,
            'naziv' => 'UPS',
            'jedinica_mere' => 1,
        ]);
        DB::table('nabavke_stavke')->insert([
            'nabavka_id' => 1,
            'vrsta_uredjaja_id' => 12,
            'naziv' => 'Projektor',
            'jedinica_mere' => 1,
        ]);
        DB::table('nabavke_stavke')->insert([
            'nabavka_id' => 1,
            'vrsta_uredjaja_id' => 13,
            'naziv' => 'Mrežni uređaj',
            'jedinica_mere' => 1,
        ]);
    }

}
