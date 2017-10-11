<?php

use Illuminate\Database\Seeder;

class Uprave extends Seeder
{

    public function run()
    {
        DB::table('s_uprave')->insert(['naziv' => 'Gradska uprava za finansije',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradska poreska uprava',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradska uprava za investicije',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradska uprava za imovinu',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradska uprava za prostorno planiranje, urbanizam, izgradnju i zaštitu životne sredine',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradska uprava za upravljanje projektima, održivi i ravnomerni razvoj',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradska uprava za opšte i zajedničke poslove',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradska uprava za privredu',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradska uprava za vanprivredne delatnost',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradska uprava za zdravstvenu i socijalnu zaštitu',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradska uprava za komunalne i inspekcijske poslove',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradska uprava za poslove gradonačelnika i Grdaskog veća',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradska uprava za javne nabavke',]);
        DB::table('s_uprave')->insert(['naziv' => 'Sekretarijat za poslove Skupštine grada',]);
        DB::table('s_uprave')->insert(['naziv' => 'Gradsko pravobranilaštvo grada Kragujevca',]);
        DB::table('s_uprave')->insert(['naziv' => 'Služba zaštitnika građana',]);
        DB::table('s_uprave')->insert(['naziv' => 'Služba za internu reviziju grada Kragujevca',]);
        DB::table('s_uprave')->insert(['naziv' => 'Služba budžetske inspekcije grada Kragujevca',]);
    }
}
