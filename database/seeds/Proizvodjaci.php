<?php

use Illuminate\Database\Seeder;

class Proizvodjaci extends Seeder
{

    public function run()
    {
        DB::table('s_proizvodjaci')->insert(['naziv' => 'ASUS', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'Intel', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'AMD', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'NVIDIA', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'Samsung', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'ATI', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'Toshiba', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'Hitachi', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'LG', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'HP', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'Kingstone', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'SanDisk', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'Maxtor', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'WD', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'Microsoft', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'Adobe', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'Odeljenje za IKT', 'link' => 'http://www.google.com/']);
        DB::table('s_proizvodjaci')->insert(['naziv' => 'Nepoznat', 'link' => 'http://www.google.com/']);
    }
}
