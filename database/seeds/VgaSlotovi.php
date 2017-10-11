<?php

use Illuminate\Database\Seeder;

class VgaSlotovi extends Seeder
{

    public function run()
    {
        DB::table('vga_slotovi')->insert(['naziv' => 'AGP',]);
        DB::table('vga_slotovi')->insert(['naziv' => 'PCI express',]);
    }
}
