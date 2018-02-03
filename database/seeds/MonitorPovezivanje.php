<?php

use Illuminate\Database\Seeder;

class MonitorPovezivanje extends Seeder
{

    public function run()
    {
        DB::table('s_monitori_povezivanje')->insert([
            'naziv' => 'VGA',
        ]);

        DB::table('s_monitori_povezivanje')->insert([
            'naziv' => 'DVI',
        ]);

        DB::table('s_monitori_povezivanje')->insert([
            'naziv' => 'HDMI',
        ]);

        DB::table('s_monitori_povezivanje')->insert([
            'naziv' => 'DisplayPort',
        ]);
    }

}
