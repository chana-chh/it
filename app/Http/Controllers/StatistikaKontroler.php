<?php

namespace App\Http\Controllers;

use DB;
Use App\Modeli\Racunar;

class StatistikaKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin')->except('getLista');
        $this->middleware('can:korisnik')->only('getLista');
    }

    public function getLista()
    {
        return view('statistika.statistika');
    }

    public function getOs()
    {

        $os_labele = DB::table('racunari')
                ->join('operativni_sistemi', 'racunari.os_id', '=', 'operativni_sistemi.id')
                ->select(DB::raw('count(*) as broj, operativni_sistemi.naziv as naziv, racunari.os_id'))
                ->groupBy('racunari.os_id')
                ->pluck('naziv');

        $os_broj = DB::table('racunari')
                ->join('operativni_sistemi', 'racunari.os_id', '=', 'operativni_sistemi.id')
                ->select(DB::raw('count(*) as broj, operativni_sistemi.naziv as naziv, racunari.os_id'))
                ->groupBy('racunari.os_id')
                ->pluck('broj');

        $os_tabela = DB::table('racunari')
                ->join('operativni_sistemi', 'racunari.os_id', '=', 'operativni_sistemi.id')
                ->select(DB::raw('count(*) as broj, operativni_sistemi.naziv as naziv, racunari.os_id'))
                ->groupBy('racunari.os_id')
                ->get();

        return view('statistika.statistika_os')->with(compact('os_labele', 'os_broj', 'os_tabela'));
    }

    public function getOcene()
    {
        $ocene_tabela = Racunar::get()->sortBy('ocena')->groupBy('ocena');

        foreach ($ocene_tabela as $o => $grupa) {
            $labele[] = $o;
            $broj[] = $grupa->count();
        }
        return view('statistika.statistika_ocene')->with(compact('ocene_tabela', 'broj', 'labele'));
    }

}
