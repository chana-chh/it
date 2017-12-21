<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Gate;
use DB;


class StatistikaKontroler extends Kontroler
{

    public function getLista()
    {

                $os_labele = DB::table('racunari')
                ->join('operativni_sistemi','racunari.os_id', '=', 'operativni_sistemi.id')
                 ->select(DB::raw('count(*) as broj, operativni_sistemi.naziv as naziv, racunari.os_id'))
                 ->groupBy('racunari.os_id')
                 ->pluck('naziv');

                 $os_broj = DB::table('racunari')
                ->join('operativni_sistemi','racunari.os_id', '=', 'operativni_sistemi.id')
                 ->select(DB::raw('count(*) as broj, operativni_sistemi.naziv as naziv, racunari.os_id'))
                 ->groupBy('racunari.os_id')
                 ->pluck('broj');

                 $os_tabela = DB::table('racunari')
                ->join('operativni_sistemi','racunari.os_id', '=', 'operativni_sistemi.id')
                 ->select(DB::raw('count(*) as broj, operativni_sistemi.naziv as naziv, racunari.os_id'))
                 ->groupBy('racunari.os_id')
                 ->get();

        return view('statistika')->with(compact('os_labele', 'os_broj', 'os_tabela'));
    }

}
