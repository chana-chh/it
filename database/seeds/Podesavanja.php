<?php

use Illuminate\Database\Seeder;

class Podesavanja extends Seeder
{

    public function run()
    {
        DB::table('podesavanja')->insert([
            'naziv' => 'Podesavanje 1',
            'vrednost' => 'Vrednost 1',
        ]);
    }

}
