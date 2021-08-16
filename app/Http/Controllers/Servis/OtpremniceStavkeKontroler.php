<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Kontroler;
use App\Modeli\OtpremnicaStavka;
use App\Modeli\Otpremnica;
use App\Modeli\MonitorModel;
use App\Modeli\StampacModel;
use App\Modeli\SkenerModel;
use App\Modeli\UpsModel;
use App\Modeli\Proizvodjac;
use App\Modeli\OsnovnaPlocaModel;
use App\Modeli\ProcesorModel;
use App\Modeli\GrafickiAdapterModel;
use App\Modeli\MemorijaModel;
use App\Modeli\HddModel;
use App\Modeli\NapajanjeModel;

class OtpremniceStavkeKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin')->except([
            'getLista',
            'getDetalj'
        ]);
        $this->middleware('can:korisnik')->only([
            'getLista',
            'getDetalj'
        ]);
    }

    public function getLista($id)
    {
        $otpremnica = Otpremnica::find($id);
        return view('servis.otpremnice_stavke')->with(compact('otpremnica'));
    }

    public function getDodavanje($id_otpremnice)
    {
        $otpremnica = Otpremnica::find($id_otpremnice);
        return view('servis.otpremnice_stavke_dodavanje')->with(compact('otpremnica'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'otpremnica_id' => [
                'required',
            ],
            'vrsta_uredjaja_id' => [
                'required',
            ],
            'naziv' => [
                'required',
                'max:255',
            ],
            'kolicina' => [
                'required',
            ],
        ]);

        $stavka = new OtpremnicaStavka();
        $stavka->otpremnica_id = $request->otpremnica_id;
        $stavka->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $stavka->naziv = $request->naziv;
        $stavka->kolicina = $request->kolicina;
        $stavka->jedinica_mere = $request->jedinica_mere;
        $stavka->napomena = $request->napomena;
        $stavka->save();

        Session::flash('uspeh', 'Stavka otpremnice je uspešno dodata!');
        return redirect()->route('otpremnice.detalj', $request->otpremnica_id);
    }

    public function getIzmena($id)
    {
        $data = OtpremnicaStavka::find($id);
        return view('servis.otpremnice_stavke_izmena')->with(compact('data'));
    }

    public function getDetalj($id)
    {
        $stavka = OtpremnicaStavka::find($id);
        $proizvodjaci = Proizvodjac::all();
        $modeli_monitora = MonitorModel::all();
        $modeli_stampaca = StampacModel::all();
        $modeli_skenera = SkenerModel::all();
        $modeli_upseva = UpsModel::all();
        $modeli_mbd = OsnovnaPlocaModel::all();
        $modeli_cpu = ProcesorModel::all();
        $modeli_vga = GrafickiAdapterModel::all();
        $modeli_ram = MemorijaModel::all();
        $modeli_hdd = HddModel::all();
        $modeli_psu = NapajanjeModel::all();
        return view('servis.otpremnice_stavke_detalj')->with(compact('stavka', 'proizvodjaci', 'modeli_monitora', 'modeli_stampaca', 'modeli_skenera', 'modeli_upseva', 'modeli_cpu', 'modeli_mbd', 'modeli_vga', 'modeli_ram', 'modeli_hdd', 'modeli_psu'));
    }

    public function postIzmena(Request $request, $id)
    {
        $this->validate($request, [
            'naziv' => [
                'required',
                'max:255',
            ],
            'kolicina' => [
                'required',
            ],
        ]);

        $stavka = OtpremnicaStavka::find($id);
        $stavka->naziv = $request->naziv;
        $stavka->kolicina = $request->kolicina;
        $stavka->jedinica_mere = $request->jedinica_mere;
        $stavka->napomena = $request->napomena;
        $stavka->save();

        Session::flash('uspeh', 'Stavka otpremnice je uspešno izmenjena!');
        return redirect()->route('otpremnice.stavke.detalj', $stavka->otpremnica_id);
    }

    public function postBrisanje(Request $request)
    {
        $stavka = OtpremnicaStavka::find($request->idBrisanje);
        if (count($stavka->uredjaji()) > 0) {
            Session::flash('upozorenje', 'Nije moguće obrisati stavku jer postoje uređaji koji su vezani za nju.');
            return redirect()->route('otpremnice.stavke.detalj', $stavka->id);
        }
        $id = $stavka->otpremnica_id;
        $odgovor = $stavka->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Satvka otpremince je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }

        return redirect()->route('otpremnice.detalj', $id);
    }

}
