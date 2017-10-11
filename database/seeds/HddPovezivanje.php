<?php

use Illuminate\Database\Seeder;

class HddPovezivanje extends Seeder
{

    public function run()
    {
        DB::table('s_hdd_povezivanja')->insert(['naziv' => 'SATA/600',]);
        DB::table('s_hdd_povezivanja')->insert(['naziv' => 'SATA/300',]);
        DB::table('s_hdd_povezivanja')->insert(['naziv' => 'USB 3.0',]);
        DB::table('s_hdd_povezivanja')->insert(['naziv' => 'USB 3.1',]);
        DB::table('s_hdd_povezivanja')->insert(['naziv' => 'USB',]);
        DB::table('s_hdd_povezivanja')->insert(['naziv' => 'SCSI',]);
        DB::table('s_hdd_povezivanja')->insert(['naziv' => 'M.2',]);
        DB::table('s_hdd_povezivanja')->insert(['naziv' => 'LAN',]);
        DB::table('s_hdd_povezivanja')->insert(['naziv' => 'ATA',]);
        DB::table('s_hdd_povezivanja')->insert(['naziv' => 'Thunderbolt',]);
        DB::table('s_hdd_povezivanja')->insert(['naziv' => 'Nepoznat',]);
    }
}
