<?php

use Illuminate\Database\Seeder;

class Toneri extends Seeder
{

    public function run()
    {
        DB::table('s_toneri')->insert([
            'naziv' => 'Tip tonera 1',
            'modeli_tonera' => 'toner1, toner2, toner3',
        ]);
    }

}
