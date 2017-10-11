<?php

use Illuminate\Database\Seeder;

class Mobilni extends Seeder
{

    public function run()
    {
        DB::table('mobilni')->insert([
            'broj' => '0602340111',
            'sluzbeni' => 0,
            'zaposleni_id' => 4,
            'napomena' => 'Bla bla bla'
            ]);
        DB::table('mobilni')->insert([
            'broj' => '0602340112',
            'sluzbeni' => 0,
            'zaposleni_id' => 11,
            'napomena' => 'Bla bla bla'
            ]);
        DB::table('mobilni')->insert([
            'broj' => '0602340113',
            'sluzbeni' => 0,
            'zaposleni_id' => 35,
            'napomena' => 'Bla bla bla'
            ]);
    }
}
