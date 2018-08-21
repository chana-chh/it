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

        $broj_elemenata = Racunar::count();

        return view('statistika.statistika_os')->with(compact('os_labele', 'os_broj', 'os_tabela', 'broj_elemenata'));
    }

    public function getCpu()
    {
        $cpu_labele = DB::table('procesori')
        ->join('procesori_modeli', 'procesori.procesor_model_id', '=', 'procesori_modeli.id')
        ->select(DB::raw('count(*) as broj, procesori_modeli.naziv as naziv, procesori.procesor_model_id'))
        ->where('procesori.racunar_id', '<>',NULL)
        ->where('procesori.deleted_at', NULL)
        ->groupBy('procesori.procesor_model_id')
        ->orderBy('broj', 'desc')
        ->pluck('naziv');

        $cpu_broj = DB::table('procesori')
        ->join('procesori_modeli', 'procesori.procesor_model_id', '=', 'procesori_modeli.id')
        ->select(DB::raw('count(*) as broj, procesori_modeli.naziv as naziv, procesori.procesor_model_id'))
        ->where('procesori.racunar_id', '<>',NULL)
        ->where('procesori.deleted_at', NULL)
        ->groupBy('procesori.procesor_model_id')
        ->orderBy('broj', 'desc')
        ->pluck('broj');

        $cpu_tabela = DB::table('procesori')
        ->join('procesori_modeli', 'procesori.procesor_model_id', '=', 'procesori_modeli.id')
        ->select(DB::raw('count(*) as broj, procesori_modeli.naziv as naziv, procesori.procesor_model_id'))
        ->where('procesori.racunar_id', '<>',NULL)
        ->where('procesori.deleted_at', NULL)
        ->groupBy('procesori.procesor_model_id')
        ->orderBy('broj', 'desc')
        ->get();

        return view('statistika.statistika_cpu')->with(compact('cpu_labele', 'cpu_broj', 'cpu_tabela'));
    }

    public function getOcene()
    {
        $ocene_tabela = Racunar::get()->sortBy('ocena')->groupBy('ocena');
        $za_otpis = Racunar::get()->where('ocena', '<', 8)->count();

        foreach ($ocene_tabela as $o => $grupa) {
            $labele[] = $o;
            $broj[] = $grupa->count();
        }

        $broj_elemenata = Racunar::count();
        
        return view('statistika.statistika_ocene')->with(compact('ocene_tabela', 'broj', 'labele', 'za_otpis', 'broj_elemenata'));
    }

    public function getUpraveOtpis(){

        $uprave_labele = DB::table('zaposleni')
                ->leftJoin('s_uprave', 'zaposleni.uprava_id', '=', 's_uprave.id')
                ->leftJoin('racunari', 'zaposleni.id', '=', 'racunari.zaposleni_id')
                ->select(DB::raw(
                                'count(*) as broj,
                                zaposleni.id as zaposleni_id,
                                zaposleni.uprava_id,
                                s_uprave.naziv as uprava'
                ))
                ->where('racunari.ocena', '<', 8)
                ->groupBy("zaposleni.uprava_id")
                ->pluck('uprava');

        $uprave_broj = DB::table('zaposleni')
                ->leftJoin('s_uprave', 'zaposleni.uprava_id', '=', 's_uprave.id')
                ->leftJoin('racunari', 'zaposleni.id', '=', 'racunari.zaposleni_id')
                ->select(DB::raw(
                                'count(*) as broj,
                                zaposleni.id as zaposleni_id,
                                zaposleni.uprava_id,
                                s_uprave.naziv as uprava'
                ))
                ->where('racunari.ocena', '<', 8)
                ->groupBy("zaposleni.uprava_id")
                ->pluck('broj');

        $uprave_tabela = DB::table('zaposleni')
                ->leftJoin('s_uprave', 'zaposleni.uprava_id', '=', 's_uprave.id')
                ->leftJoin('racunari', 'zaposleni.id', '=', 'racunari.zaposleni_id')
                ->select(DB::raw(
                                'count(*) as broj,
                                zaposleni.id as zaposleni_id,
                                zaposleni.uprava_id,
                                s_uprave.naziv as uprava'
                ))
                ->where('racunari.ocena', '<', 8)
                ->groupBy("zaposleni.uprava_id")
                ->get();

                $broj_elemenata = DB::table('zaposleni')
                ->leftJoin('s_uprave', 'zaposleni.uprava_id', '=', 's_uprave.id')
                ->leftJoin('racunari', 'zaposleni.id', '=', 'racunari.zaposleni_id')
                ->select(DB::raw(
                                'count(*) as broj,
                                zaposleni.id as zaposleni_id,
                                zaposleni.uprava_id,
                                s_uprave.naziv as uprava'
                ))
                ->where('racunari.ocena', '<', 8)
                ->count();


        return view('statistika.statistika_upraveotpis')->with(compact('uprave_labele', 'uprave_broj', 'uprave_tabela', 'broj_elemenata'));
    }

}
