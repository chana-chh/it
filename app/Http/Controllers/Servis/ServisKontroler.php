<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use DB;
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
use App\Modeli\ServisKvar;
use Illuminate\Database\Eloquent\Collection;

class ServisKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $data = Servis::all();
        return view('servis.servis')->with(compact('data'));
    }

    public function getDetalj($id)
    {
        $data = Servis::find($id);
        $vrste_uredjaja = VrstaUredjaja::all();
        $vrste_uredjaja->pop();
        $kolekcija = new Collection();
        $uredjaji = null;

        if ($data->kvar) {
            foreach ($data->kvar as $uredjaj_kvar) {
                $vrsta_uredjaja = $uredjaj_kvar->vrsta_uredjaja_id;
                $id_uredjaja = $uredjaj_kvar->uredjaj_id;

                switch ($vrsta_uredjaja) {
                    case 1: $uredjaj = Racunar::find($id_uredjaja);
                        break;
                    case 2: $uredjaj = Monitor::find($id_uredjaja);
                        break;
                    case 3: $uredjaj = Stampac::find($id_uredjaja);
                        break;
                    case 4: $uredjaj = Skener::find($id_uredjaja);
                        break;
                    case 5: $uredjaj = Ups::find($id_uredjaja);
                        break;
                    case 6: $uredjaj = OsnovnaPloca::find($id_uredjaja);
                        break;
                    case 7: $uredjaj = Procesor::find($id_uredjaja);
                        break;
                    case 8: $uredjaj = GrafickiAdapter::find($id_uredjaja);
                        break;
                    case 9: $uredjaj = Memorija::find($id_uredjaja);
                        break;
                    case 10: $uredjaj = Hdd::find($id_uredjaja);
                        break;
                    case 11: $uredjaj = Napajanje::find($id_uredjaja);
                        break;
                    case 12: $uredjaj = Projektor::find($id_uredjaja);
                        break;
                    case 13: $uredjaj = MrezniUredjaj::find($id_uredjaja);
                        break;
                    default : null;
                }
                $kolekcija->add($uredjaj);
            }
        }


        return view('servis.servis_detalj')->with(compact('data', 'kolekcija', 'vrste_uredjaja', 'uredjaji'));
    }

    public function redirectDetalj($id, $vrsta)
    {
        switch ($vrsta) {
            case 1: return redirect()->route('racunari.oprema.detalj', $id);
                break;
            case 2: return redirect()->route('monitori.oprema.detalj', $id);
                break;
            case 3: return redirect()->route('stampaci.oprema.detalj', $id);
                break;
            case 4: return redirect()->route('skeneri.oprema.detalj', $id);
                break;
            case 5: return redirect()->route('upsevi.oprema.detalj', $id);
                break;
            case 6: return redirect()->route('osnovne_ploce.oprema.detalj', $id);
                break;
            case 7: return redirect()->route('procesori.oprema.detalj', $id);
                break;
            case 8: return redirect()->route('vga.oprema.detalj', $id);
                break;
            case 9: return redirect()->route('memorije.oprema.detalj', $id);
                break;
            case 10: return redirect()->route('hddovi.oprema.detalj', $id);
                break;
            case 11: return redirect()->route('napajanja.oprema.detalj', $id);
                break;
            case 12: return redirect()->route('projektori.oprema.detalj', $id);
                break;
            case 13: return redirect()->route('mrezni.oprema.detalj', $id);
                break;
            default : null;
        }
    }

    public function getIzmena($id)
    {
        $servis = Servis::find($id);
        $statusi = Status::all();
        return view('servis.servis_izmena')->with(compact('servis', 'statusi'));
    }

    public function postDodajPokvaren(Request $request, $id)
    {
        $this->validate($request, [
            'vrsta_uredjaja_id' => [
                'required',
            ],
            'uredjaj_id' => [
                'required',
            ]
        ]);

        $data = new ServisKvar();
        $data->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $data->uredjaj_id = $request->uredjaj_id;
        $data->servis_id = $id;
        $data->save();

        Session::flash('uspeh', 'Uređaj na kome je detektovan kvar je uspešno dodat!');
        return redirect()->route('servis.detalj', $id);
    }

    public function postIzmena(Request $request, $id)
    {
        $this->validate($request, [
            'status_id' => [
                'required',
            ]
        ]);

        $data = Servis::find($id);
        $data->status_id = $request->status_id;
        $data->datum_prijema = $request->datum_prijema;
        $data->datum_popravke = $request->datum_popravke;
        $data->datum_isporuke = $request->datum_isporuke;
        $data->opis_kvara_servis = $request->opis_kvara_servis;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Podaci o servisu su uspešno izmenjeni!');
        return redirect()->route('servis.detalj', $id);
    }

    public function postAjax(Request $request)
    {
        if ($request->ajax()) {
            $id_uredjaja = $request->id;
            $data = null;
            switch ($id_uredjaja) {
                case 1: $data = Racunar::all();
                    $tip = 1;
                    break;
                case 2: $data = Monitor::with('monitorModel', 'racunar')->get();
                    $tip = 1;
                    break;
                case 3: $data = Stampac::with('stampacModel', 'racunar')->get();
                    $tip = 1;
                    break;
                case 4: $data = Skener::with('skenerModel', 'racunar')->get();
                    $tip = 1;
                    break;
                case 5: $data = Ups::with('upsModel', 'racunar')->get();
                    $tip = 1;
                    break;
                case 6: $data = OsnovnaPloca::with('osnovnaPlocaModel', 'racunar')->get();
                    $tip = 2;
                    break;
                case 7: $data = Procesor::with('procesorModel', 'racunar')->get();
                    $tip = 2;
                    break;
                case 8: $data = GrafickiAdapter::with('grafickiAdapterModel', 'racunar')->get();
                    $tip = 2;
                    break;
                case 9: $data = Memorija::with('memorijaModel', 'racunar')->get();
                    $tip = 2;
                    break;
                case 10: $data = Hdd::with('hddModel', 'racunar')->get();
                    $tip = 2;
                    break;
                case 11: $data = Napajanje::with('napajanjeModel', 'racunar')->get();
                    $tip = 2;
                    break;
                case 12: $data = Projektor::all();
                    $tip = 1;
                    break;
                case 13: $data = MrezniUredjaj::all();
                    $tip = 1;
                    break;
                default : null;
            }
        }
        return response()->json([
                    'uredj' => $data,
                    'tip' => $tip]);
    }

    public function postBrisanjeKvara(Request $request, $id)
    {

        $vrsta = $request->idVrstaUredjaja;
        $id_uredjaja = $request->idBrisanje;

        $kvar = DB::table('servis_kvarovi')->where('servis_id', '=', $id)
                ->where('vrsta_uredjaja_id', '=', $vrsta)
                ->where('uredjaj_id', '=', $id_uredjaja)
                ->first();

        $data = ServisKvar::findOrFail($kvar->id);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('servis.detalj', $id);
    }

}
