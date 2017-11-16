<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Image;
use App\Http\Controllers\Kontroler;
use App\Modeli\NabavkaStavka;
use App\Modeli\Nabavka;

class NabavkeStavkeKontroler extends Kontroler
{

//    public function getLista($id_otpremnice)
//    {
//        $otpremnica = Otpremnica::find($id_otpremnice);
//        return view('servis.otpremnice_stavke')->with(compact('otpremnica'));
//    }
//    public function getDodavanje($id_otpremnice)
//    {
//        $otpremnica = Otpremnica::find($id_otpremnice);
//        return view('servis.otpremnice_stavke_dodavanje')->with(compact('otpremnica'));
//    }

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

        Session::flash('uspeh', 'Stavka otpremnice je uspešno dodata!');
        return redirect()->route('nabavke.detalj', $request->nabavka_id);
    }

    public function getDetalj($id)
    {
        $stavka = NabavkaStavka::find($id);
//        if (NabavkaStavka::find($id)->uredjaji()) {
//            $uredjaji = NabavkaStavka::find($id)->uredjaji()->paginate(5);
//        }
        return view('servis.nabavke_stavke_detalj')->with(compact('stavka'));
    }

    public function getIzmena($id)
    {
        $data = OtpremnicaStavka::find($id);
        return view('servis.otpremnice_stavke_izmena')->with(compact('data'));
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
        return redirect()->route('otpremnice.stavke', $stavka->otpremnica_id);
    }

    public function postBrisanje(Request $request)
    {
        $data = OtpremnicaStavka::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Satvka otpremince je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->back();
    }

}
