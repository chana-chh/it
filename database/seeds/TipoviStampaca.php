<?php

use Illuminate\Database\Seeder;

class TipoviStampaca extends Seeder
{

    public function run()
    {
        DB::table('s_tipovi_stampaca')->insert(['naziv' => 'Laserski',]);
        DB::table('s_tipovi_stampaca')->insert(['naziv' => 'Ink-jet',]);
        DB::table('s_tipovi_stampaca')->insert(['naziv' => 'Termalni',]);
        DB::table('s_tipovi_stampaca')->insert(['naziv' => 'Matrični',]);
    }
}
