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
use App\Modeli\Status;
use Illuminate\Database\Eloquent\Collection;

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
        $kolekcija = new Collection();

        if ($data->kvar) {
            foreach ($data->kvar as $uredjaj_kvar) {
            $vrsta_uredjaja = $uredjaj_kvar->vrsta_uredjaja_id;
            $id_uredjaja = $uredjaj_kvar->uredjaj_id;
            
        switch ($vrsta_uredjaja) {
            case 1: $uredjaj = Racunar::find($id_uredjaja); break;
            case 2: $uredjaj = Monitor::find($id_uredjaja); break;
            case 3: $uredjaj = Stampac::find($id_uredjaja); break;
            case 4: $uredjaj = Skener::find($id_uredjaja); break;
            case 5: $uredjaj = Ups::find($id_uredjaja); break;
            case 6: $uredjaj = OsnovnaPloca::find($id_uredjaja); break;
            case 7: $uredjaj = Procesor::find($id_uredjaja); break;
            case 8: $uredjaj = GrafickiAdapter::find($id_uredjaja); break;
            case 9: $uredjaj = Memorija::find($id_uredjaja); break;
            case 10: $uredjaj = Hdd::find($id_uredjaja); break;
            case 11: $uredjaj = Napajanje::find($id_uredjaja); break;
            case 12: $uredjaj = Projektor::find($id_uredjaja); break;
            case 13: $uredjaj = MrezniUredjaj::find($id_uredjaja); break;
            default : null;
        }
            $kolekcija->add($uredjaj);
            }
        }
        

        return view('servis.servis_detalj')->with(compact('data', 'kolekcija'));
    }

    public function redirectDetalj($id, $vrsta)
    {
         switch ($vrsta) {
            case 1: return redirect()->route('racunari.oprema.detalj', $id); break;
            case 2: return redirect()->route('monitori.oprema.detalj', $id); break;
            case 3: return redirect()->route('stampaci.oprema.detalj', $id); break;
            case 4: return redirect()->route('skeneri.oprema.detalj', $id);  break;
            case 5: return redirect()->route('upsevi.oprema.detalj', $id);   break;
            case 6: return redirect()->route('osnovne_ploce.oprema.detalj', $id); break;
            case 7: return redirect()->route('procesori.oprema.detalj', $id); break;
            case 8: return redirect()->route('vga.oprema.detalj', $id); break;
            case 9: return redirect()->route('memorije.oprema.detalj', $id); break;
            case 10: return redirect()->route('hddovi.oprema.detalj', $id);  break;
            case 11: return redirect()->route('napajanja.oprema.detalj', $id); break;
            case 12: return redirect()->route('projektori.oprema.detalj', $id); break;
            case 13: return redirect()->route('mrezni.oprema.detalj', $id); break;
            default : null;
        }
    }

    public function getIzmena($id)
    {
        $servis = Servis::find($id);
        $statusi = Status::all();
        return view('servis.servis_izmena')->with(compact('servis', 'statusi'));
    }

    public function postIzmena(Request $request, $id)
    {   
        $this->validate($request, [
            'status_id' => [
                'required',
            ]
        ]);

        $data = Servis::find($id);
        return redirect()->route('servis.detalj', $id);
    }

    public function postAjax(Request $request)
    {
        if($request->ajax()){
            $id_uredjaja = $request->id;
            $data = null;
        switch ($id_uredjaja) {
            case 1: $data = Racunar::all(); $tip = 1; break;
            case 2: $data = Monitor::with('monitorModel', 'racunar')->get(); $tip = 1; break;
            case 3: $data = Stampac::with('stampacModel', 'racunar')->get(); $tip = 1; break;
            case 4: $data = Skener::with('skenerModel', 'racunar')->get(); $tip = 1; break;
            case 5: $data = Ups::with('upsModel', 'racunar')->get(); $tip = 1; break;
            case 6: $data = OsnovnaPloca::with('osnovnaPlocaModel', 'racunar')->get(); $tip = 2; break;
            case 7: $data = Procesor::with('procesorModel', 'racunar')->get(); $tip = 2; break;
            case 8: $data = GrafickiAdapter::with('grafickiAdapterModel', 'racunar')->get(); $tip = 2; break;
            case 9: $data = Memorija::with('memorijaModel', 'racunar')->get(); $tip = 2; break;
            case 10: $data = Hdd::with('hddModel', 'racunar')->get(); $tip = 2; break;
            case 11: $data = Napajanje::with('napajanjeModel', 'racunar')->get(); $tip = 2; break;
            case 12: $data = Projektor::all(); $tip = 1; break;
            case 13: $data = MrezniUredjaj::all(); $tip = 1; break;
            default : null;
        }
    }
        return response()->json(['uredj' => $data, 'tip' => $tip]);
    }

}
