<?php

use Illuminate\Database\Seeder;

class VrsteUredjaja extends Seeder
{

    public function run()
    {
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'Računar', // 1
            'mnozina' => 'Računari',
            'ruta' => 'racunari.oprema.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'Monitor', // 2
            'mnozina' => 'Monitori',
            'ruta' => 'monitori.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'Štampač', // 3
            'mnozina' => 'Štampači',
            'ruta' => 'stampaci.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'Skener', // 4
            'mnozina' => 'Skeneri',
            'ruta' => 'skeneri.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'UPS', // 5
            'mnozina' => 'UPS-evi',
            'ruta' => 'upsevi.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'Osnovna ploča', // 6
            'mnozina' => 'Osnovne ploče',
            'ruta' => 'osnovne_ploce.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'Procesor', // 7
            'mnozina' => 'Procesori',
            'ruta' => 'procesori.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'Grafički adapter', // 8
            'mnozina' => 'Grafički adapteri',
            'ruta' => 'graficki_adapteri.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'Memorija', // 9
            'mnozina' => 'Memorije',
            'ruta' => 'memorije.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'HDD', // 10
            'mnozina' => 'HDD-ovi',
            'ruta' => 'hddeovi.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'Napajanje', // 11
            'mnozina' => 'Napajanja',
            'ruta' => 'napajanja.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'Projektor', // 12
            'mnozina' => 'Projektori',
            'ruta' => 'projektori.oprema.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'Mrežni uređaj', // 13
            'mnozina' => 'Mrežni uređaji',
            'ruta' => 'mrezni_uredjaji.oprema.detalj',
        ]);
        DB::table('s_vrste_uredjaja')->insert([
            'naziv' => 'Ostalo', // 14
            'mnozina' => 'Ostalo',
            'ruta' => ' ',
        ]);
    }

}
