<?php

use Illuminate\Database\Seeder;

class RacuniSlike extends Seeder
{

    public function run()
    {
        DB::table('racuni_slike')->insert([
            'racun_id' => 1,
            'src' => '',
        ]);
    }

}
