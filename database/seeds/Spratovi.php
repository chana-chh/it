<?php

use Illuminate\Database\Seeder;

class Spratovi extends Seeder
{

    public function run()
    {
        DB::table('s_spratovi')->insert(['naziv' => 'Podrum',]);
        DB::table('s_spratovi')->insert(['naziv' => 'Suteren',]);
        DB::table('s_spratovi')->insert(['naziv' => 'Prizemlje',]);
        DB::table('s_spratovi')->insert(['naziv' => 'Prvi sprat',]);
        DB::table('s_spratovi')->insert(['naziv' => 'Drugi sprat',]);
        DB::table('s_spratovi')->insert(['naziv' => 'Treći sprat',]);
        DB::table('s_spratovi')->insert(['naziv' => 'Četvrti sprat',]);
        DB::table('s_spratovi')->insert(['naziv' => 'Peti sprat',]);
        DB::table('s_spratovi')->insert(['naziv' => 'Šesti sprat',]);
        DB::table('s_spratovi')->insert(['naziv' => 'Galerija',]);
        DB::table('s_spratovi')->insert(['naziv' => 'Potkrovlje',]);
    }
}
