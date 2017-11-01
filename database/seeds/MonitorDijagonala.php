<?php

use Illuminate\Database\Seeder;

class MonitorDijagonala extends Seeder
{

    public function run()
    {
        DB::table('s_dijagonale')->insert([
            'naziv' => 15]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 15.5]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 17]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 18.5]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 19]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 19.5]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 21.5]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 22]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 23]);
        DB::table('s_dijagonale')->insert([
            'naziv' => 0]);
    }

}
