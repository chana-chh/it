<?php

use Illuminate\Database\Seeder;

class OperativniSistemi extends Seeder
{

    public function run()
    {
        DB::table('operativni_sistemi')->insert([
            'naziv' => 'Windows XP',
        ]);
        DB::table('operativni_sistemi')->insert([
            'naziv' => 'Windows Server 2003',
        ]);
        DB::table('operativni_sistemi')->insert([
            'naziv' => 'Windows Vista',
        ]);
        DB::table('operativni_sistemi')->insert([
            'naziv' => 'Windows Server 2008',
        ]);
        DB::table('operativni_sistemi')->insert([
            'naziv' => 'Windows 7',
        ]);
        DB::table('operativni_sistemi')->insert([
            'naziv' => 'Windows Server 2008 R2',
        ]);
        DB::table('operativni_sistemi')->insert([
            'naziv' => 'Windows Server 2012 R2',
        ]);
        DB::table('operativni_sistemi')->insert([
            'naziv' => 'Windows 8',
        ]);
        DB::table('operativni_sistemi')->insert([
            'naziv' => 'Windows 8.1',
        ]);
        DB::table('operativni_sistemi')->insert([
            'naziv' => 'Windows 10',
        ]);
        DB::table('operativni_sistemi')->insert([
            'naziv' => 'Nepoznato',
        ]);
    }

}
