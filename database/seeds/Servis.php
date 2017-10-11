<?php

use Illuminate\Database\Seeder;

class Servis extends Seeder
{
    public function run()
    {
        DB::table('servis')->insert([
            'opis_kvara' => 'ne da radi',
            'datum_prijema' => '2017-03-04',
            'datum_isporuke' => '2017-03-05',
            'racunar_id' => 1,
            'napomena' => 'Umro server',
        ]);
    }
}
