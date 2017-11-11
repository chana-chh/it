<?php

use Illuminate\Database\Seeder;

class Racunari extends Seeder
{

    public function run()
    {
        DB::table('racunari')->insert([
            // 'laptop' => 0, // nije
            'server' => 1, // jeste
            'brend' => 1, // jeste
            'proizvodjac_id' => 1,
            'inventarski_broj' => 'nn',
            'erc_broj' => '370',
            'ime' => 'GU370',
            'nabavka_id' => 1,
            'os_id' => 4,
            'ocena' => 0,
            'vrsta_uredjaja_id' => 1,
        ]);
    }

}
