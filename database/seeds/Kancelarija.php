<?php

use Illuminate\Database\Seeder;

class Kancelarija extends Seeder
{

    public function run()
    {

        DB::beginTransaction();

        DB::table('s_kancelarije')->insert([
            'naziv' => '101',
            'lokacija_id' => 1,
            'sprat_id' => 4,
            'napomena' => '306 101',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '103',
            'lokacija_id' => 1,
            'sprat_id' => 4,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '104',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '104a',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '105',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '106',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '107',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '108',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '109',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '110',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '111',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => '306 111',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '112',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '113',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '113a',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '114',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '115',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '116',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '117',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '118',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '119',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '120',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => '306 120',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '121',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '122',
            'sprat_id' => 4,
            'lokacija_id' => 1,
            'napomena' => 'nepoznat',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '201',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 124',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '203',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 127',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '203a',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 126',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '204',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 145',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '205',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 130',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '205a',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 129',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '206',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 132',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '207',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 136',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '208',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 139',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '209',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 112',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '212',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 114',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '213',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 117, 306 118',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '216',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 147',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '217',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 270',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '218',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 150',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '219',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 151',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '220',
            'sprat_id' => 5,
            'lokacija_id' => 1,
            'napomena' => '306 304',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '301',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 152',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '302',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 160',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '303',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 154',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '304',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 155',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '305',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 156',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '308',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 160',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '309',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 161',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '310',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 162',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '311',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 163',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '312',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 164',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '313',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 165',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '315',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 167',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '316',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 168',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '317',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 169',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '318',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 170',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '326',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 178',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '327',
            'sprat_id' => 6,
            'lokacija_id' => 1,
            'napomena' => '306 179',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '401',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 218',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '405a',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 185',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '405',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 186',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '406',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 188',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '406a',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 187',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '407',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 189',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '413',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 196',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '414',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 198',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '415',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 199',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '416',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 200',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '417',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 201',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '418',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 201',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '419',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 202',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '420',
            'sprat_id' => 7,
            'lokacija_id' => 1,
            'napomena' => '306 203',
        ]);
        DB::table('s_kancelarije')->insert([
            'naziv' => '421',
            'lokacija_id' => 1,
            'sprat_id' => 7,
            'napomena' => '306 204',
        ]);

        DB::commit();
    }

}
