<?php

use Illuminate\Database\Seeder;

class Status extends Seeder
{

    public function run()
    {
        DB::table('s_statusi')->insert([
            'naziv' => 'Kvar na opremi je prijavljen.',
        ]);

        DB::table('s_statusi')->insert([
            'naziv' => 'Oprema je preuzeta u rad.',
        ]);

        DB::table('s_statusi')->insert([
            'naziv' => 'Kvar na opremi je otklonjen.',
        ]);

        DB::table('s_statusi')->insert([
            'naziv' => 'Otprema je otpisana.',
        ]);

        DB::table('s_statusi')->insert([
            'naziv' => 'Oprema čeka preuzimanje.',
        ]);

        DB::table('s_statusi')->insert([
            'naziv' => 'Oprema je vraćena korisniku.',
        ]);
    }

}
