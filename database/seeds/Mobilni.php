<?php

use Illuminate\Database\Seeder;

class Mobilni extends Seeder
{

    public function run()
    {
        DB::table('mobilni')->insert([
            'broj' => '065 205 1230',
            'sluzbeni' => 0,
            'zaposleni_id' => 1,
        ]);
        DB::table('mobilni')->insert([
            'broj' => '060 234 0111',
            // 'sluzbeni' => 1,
            'zaposleni_id' => 1,
        ]);
    }

}
