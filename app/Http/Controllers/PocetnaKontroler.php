<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Carbon\Carbon;
use App\Modeli\Racunar;
use App\Modeli\Monitor;
use App\Modeli\Stampac;
use App\Modeli\Skener;
use App\Modeli\Ups;
use App\Modeli\MrezniUredjaj;
use App\Modeli\Projektor;
use App\Modeli\Aplikacija;
use App\Modeli\Greska;
use App\Modeli\Servis;
use App\Modeli\Licenca;

class PocetnaKontroler extends Kontroler
{

    public function pocetna()
    {
        $racunara = Racunar::count();
        $monitora = Monitor::count();
        $stampaca = Stampac::count();
        $skenera = Skener::count();
        $upseva = Ups::count();
        $mreznih_uredjaja = MrezniUredjaj::count();
        $projektora = Projektor::count();
        $aplikacija = Aplikacija::count();
        $greske = Greska::all();
        $servis = Servis::all(); //Limit od npr. 10

        $isticu = Licenca::whereBetween('datum_prestanka_vazenja', [
                    Carbon::now(),
                    Carbon::now()->addMonths(2)
                ])->get();


        return view('pocetna')->with(compact(
                                'racunara', 'monitora', 'stampaca', 'skenera', 'upseva', 'mreznih_uredjaja', 'projektora', 'aplikacija', 'greske', 'isticu'
        ));
    }

    public function postBrisanje(Request $request)
    {
        $data = Greska::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Greška je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja greške. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}
