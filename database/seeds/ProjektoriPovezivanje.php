<?php

use Illuminate\Database\Seeder;

class ProjektoriPovezivanje extends Seeder
{

    public function run()
    {
        DB::table('projektori_povezivanje')->insert([
            'projektor_id' => 1,
            'povezivanje_id' => 1,
        ]);
        DB::table('projektori_povezivanje')->insert([
            'projektor_id' => 1,
            'povezivanje_id' => 2,
        ]);
    }

}
