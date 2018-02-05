<?php

use Illuminate\Database\Seeder;

class Kancelarija extends Seeder
{

    public function run()
    {

        // DB::beginTransaction();

        DB::table('s_kancelarije')->insert([
            'naziv' => 'IKT',
            'lokacija_id' => 1,
            'sprat_id' => 3,
        ]);

        // DB::commit();
    }

}
