<?php

use Illuminate\Database\Seeder;

class TipoviMemorije extends Seeder
{

    public function run()
    {

        DB::table('s_tipovi_memorije')->insert([
            'naziv' => 'DDR',
        ]);

        DB::table('s_tipovi_memorije')->insert([
            'naziv' => 'DDR 2',
        ]);

        DB::table('s_tipovi_memorije')->insert([
            'naziv' => 'DDR 3',
        ]);

        DB::table('s_tipovi_memorije')->insert([
            'naziv' => 'DDR 4',
        ]);

        DB::table('s_tipovi_memorije')->insert([
            'naziv' => 'DDR 5',
        ]);
    }

}
