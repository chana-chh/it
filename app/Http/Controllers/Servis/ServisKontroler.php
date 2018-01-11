<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Servis;
use App\Modeli\Racunar;
use App\Modeli\Monitor;
use App\Modeli\Stampac;
use App\Modeli\Skener;
use App\Modeli\Ups;
use App\Modeli\Projektor;
use App\Modeli\MrezniUredjaj;
use App\Modeli\OsnovnaPloca;
use App\Modeli\Procesor;
use App\Modeli\GrafickiAdapter;
use App\Modeli\Memorija;
use App\Modeli\Hdd;
use App\Modeli\Napajanje;
use App\Modeli\VrstaUredjaja;

class ServisKontroler extends Kontroler
{

    public function getLista()
    {
        $data = Servis::all();
        return view('servis.servis')->with(compact('data'));
    }

    public function getDetalj($id)
    {
        $data = Servis::find($id);
        $uredjaj = null;
        $id_uredjaja = null;
        $broj = null;

        if ($data->vrsta_uredjaja_id) {
            $vrsta_uredjaja = $data->vrsta_uredjaja_id;
            $id_uredjaja = $data->uredjaj_id;
            $broj = Servis::where('vrsta_uredjaja_id', '=', $vrsta_uredjaja)->where('uredjaj_id', '=', $id_uredjaja)->count();
        switch ($vrsta_uredjaja) {
            case 1: 
            $uredjaj = Racunar::find($id_uredjaja);
            $tip = 1;
            break;
            case 2: 
            $uredjaj = Monitor::find($id_uredjaja); 
            $tip = 1;
            break;
            case 3: 
            $uredjaj = Stampac::find($id_uredjaja); 
            $tip = 1;
            break;
            case 4: 
            $uredjaj = Skener::find($id_uredjaja); 
            $tip = 1;
            break;
            case 5: 
            $uredjaj = Ups::find($id_uredjaja); 
            $tip = 1;
            break;
            case 6: 
            $uredjaj = OsnovnaPloca::find($id_uredjaja); 
            $tip = 2;
            break;
            case 7: 
            $uredjaj = Procesor::find($id_uredjaja); 
            $tip = 2;
            break;
            case 8: 
            $uredjaj = GrafickiAdapter::find($id_uredjaja); 
            $tip = 2;
            break;
            case 9: 
            $uredjaj = Memorija::find($id_uredjaja); 
            $tip = 2;
            break;
            case 10: 
            $uredjaj = Hdd::find($id_uredjaja); 
            $tip = 2;
            break;
            case 11: 
            $uredjaj = Napajanje::find($id_uredjaja); 
            $tip = 2;
            break;
            case 12: 
            $uredjaj = Projektor::find($id_uredjaja); 
            $tip = 1;
            break;
            case 13: 
            $uredjaj = MrezniUredjaj::find($id_uredjaja); 
            $tip = 1;
            break;
            default : null;
        }
        }

        return view('servis.servis_detalj')->with(compact('data', 'uredjaj', 'tip', 'broj'));
    }

    public function redirectDetalj($id, $vrsta)
    {
         switch ($vrsta) {
            case 1: 
            return redirect()->route('racunari.oprema.detalj', $id);
            break;
            case 2: 
            return redirect()->route('monitori.oprema.detalj', $id);
            break;
            case 3: 
            return redirect()->route('stampaci.oprema.detalj', $id);
            break;
            case 4: 
            return redirect()->route('skeneri.oprema.detalj', $id);
            break;
            case 5: 
            return redirect()->route('upsevi.oprema.detalj', $id);
            break;
            case 6: 
            return redirect()->route('osnovne_ploce.oprema.detalj', $id);
            break;
            case 7: 
            return redirect()->route('procesori.oprema.detalj', $id);
            break;
            case 8: 
            return redirect()->route('vga.oprema.detalj', $id);
            break;
            case 9: 
            return redirect()->route('memorije.oprema.detalj', $id);
            break;
            case 10: 
            return redirect()->route('hddovi.oprema.detalj', $id);
            break;
            case 11: 
            return redirect()->route('napajanja.oprema.detalj', $id);
            break;
            case 12: 
            return redirect()->route('projektori.oprema.detalj', $id);
            break;
            case 13: 
            return redirect()->route('mrezni.oprema.detalj', $id);
            break;
            default : null;
        }
    }

    public function getIzmena($id)
    {
        $data = Servis::find($id);
        $vrste_uredjaja = VrstaUredjaja::all();
        $uredjaji = null;

        if ($data->vrsta_uredjaja_id) {
            $vrsta_uredjaja = $data->vrsta_uredjaja_id;
        switch ($vrsta_uredjaja) {
            case 1: $uredjaji = Racunar::all(); break;
            case 2: $uredjaji = Monitor::all(); break;
            case 3: $uredjaji = Stampac::all(); break;
            case 4: $uredjaji = Skener::all(); break;
            case 5: $uredjaji = Ups::all(); break;
            case 6: $uredjaji = OsnovnaPloca::all(); break;
            case 7: $uredjaji = Procesor::all(); break;
            case 8: $uredjaji = GrafickiAdapter::all(); break;
            case 9: $uredjaji = Memorija::all(); break;
            case 10:$uredjaji = Hdd::all(); break;
            case 11:$uredjaji = Napajanje::all(); break;
            case 12:$uredjaji = Projektor::all(); break;
            case 13:$uredjaji = MrezniUredjaj::all(); break;
            default : null;
        }
        }
        return view('servis.servis_izmena')->with(compact('data', 'vrste_uredjaja', 'uredjaji'));
    }

    public function postIzmena($id)
    {
        $data = Servis::find($id);
        
        return view('servis.servis_izmena')->with(compact('data'));
    }

}
