<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Kontroler;
use App\Modeli\NabavkaStavka;
use App\Modeli\Proizvodjac;
use App\Modeli\VrstaUredjaja;
use App\Modeli\MonitorModel;
use App\Modeli\StampacModel;
use App\Modeli\SkenerModel;
use App\Modeli\UpsModel;

class NabavkeStavkeKontroler extends Kontroler
{

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'nabavka_id' => [
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

        $stavka = new NabavkaStavka();
        $stavka->nabavka_id = $request->nabavka_id;
        $stavka->vrsta_uredjaja_id = $request->vrsta_uredjaja_id;
        $stavka->naziv = $request->naziv;
        $stavka->kolicina = $request->kolicina;
        $stavka->jedinica_mere = $request->jedinica_mere;
        $stavka->napomena = $request->napomena;
        $stavka->save();

        Session::flash('uspeh', 'Stavka nabavke je uspešno dodata!');
        return redirect()->route('nabavke.detalj', $request->nabavka_id);
    }

    public function getDetalj($id)
    {
        $stavka = NabavkaStavka::find($id);
        $proizvodjaci = Proizvodjac::all();
        $modeli_monitora = MonitorModel::all();
        $modeli_stampaca = StampacModel::all();
        $modeli_skenera = SkenerModel::all();
        $modeli_upseva = UpsModel::all();
        return view('servis.nabavke_stavke_detalj')->with(compact('stavka', 'proizvodjaci', 'modeli_monitora', 'modeli_stampaca', 'modeli_skenera', 'modeli_upseva'));
    }

    public function getIzmena($id)
    {
        $stavka = NabavkaStavka::find($id);
        $vrste = VrstaUredjaja::whereIn('id', config('ikt.vrste_nabavka_id'))->get();
        return view('servis.nabavke_stavke_izmena')->with(compact('stavka', 'vrste'));
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

        $stavka = NabavkaStavka::find($id);
        $stavka->naziv = $request->naziv;
        $stavka->kolicina = $request->kolicina;
        $stavka->jedinica_mere = $request->jedinica_mere;
        $stavka->napomena = $request->napomena;
        $stavka->save();

        Session::flash('uspeh', 'Stavka nabavke je uspešno izmenjena!');
        return redirect()->route('nabavke.stavke.detalj', $id);
    }

    public function postBrisanje(Request $request)
    {
        $stavka = NabavkaStavka::findOrFail($request->idBrisanje);
        $id = $stavka->id;
        $id_nabavke = $stavka->nabavka_id;
        $uredjaji = $stavka->uredjaji();
        if (count($uredjaji) > 0) {
            Session::flash('greska', 'Nije moguće obrisati stavku nabavke jer postoje uređaji koji su vezani za nju!');
        } else {
            $odgovor = $stavka->delete();
            if ($odgovor) {
                Session::flash('uspeh', 'Satvka je uspešno obrisana!');
                return redirect()->route('nabavke.detalj', $id_nabavke);
            } else {
                Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
            }
        }
        return redirect()->route('nabavke.stavke.detalj', $id);
    }

}
