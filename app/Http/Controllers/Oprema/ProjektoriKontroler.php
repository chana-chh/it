<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Carbon\Carbon;
use App\Modeli\Projektor;
use App\Modeli\Otpremnica;
use App\Modeli\Kancelarija;
use App\Modeli\Nabavka;
use App\Modeli\Reciklaza;
use App\Modeli\Proizvodjac;
use App\Modeli\MonitorPovezivanje;

class ProjektoriKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin')->except([
            'getLista',
            'getDetalj',
            'getListaOtpisani']);
        $this->middleware('can:korisnik')->only([
            'getLista',
            'getDetalj',
            'getListaOtpisani']);
    }

    public function getLista()
    {
        $uredjaj = Projektor::all();
        return view('oprema.projektori')->with(compact('uredjaj'));
    }

    public function getListaOtpisani()
    {
        $uredjaj = Projektor::onlyTrashed()->get();
        $reciklaze = Reciklaza::all();
        return view('oprema.projektori_otpisani')->with(compact('uredjaj', 'reciklaze'));
    }

    public function getDetalj($id)
    {
        $uredjaj = Projektor::find($id);
        return view('oprema.projektori_detalj')->with(compact('uredjaj'));
    }

    public function getIzmena($id)
    {
        $uredjaj = Projektor::find($id);
        $otpremnice = Otpremnica::all();
        $kancelarije = Kancelarija::all();
        $nabavke = Nabavka::all();
        $proizvodjaci = Proizvodjac::all();
        $povezivanje = MonitorPovezivanje::all();
        return view('oprema.projektori_izmena')->with(compact('uredjaj', 'otpremnice', 'kancelarije', 'nabavke', 'proizvodjaci', 'povezivanje'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'serijski_broj' => [
                'max:50'],
            'naziv' => [
                'required'],
        ]);

        $uredjaj = Projektor::find($id);

        $uredjaj->povezivanja()->detach();

        $uredjaj->naziv = $request->naziv;
        $uredjaj->inventarski_broj = $request->inventarski_broj;
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->tip_lampe = $request->tip_lampe;
        $uredjaj->rezolucija = $request->rezolucija;
        $uredjaj->kontrast = $request->kontrast;
        $uredjaj->link = $request->link;
        $uredjaj->kancelarija_id = $request->kancelarija_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->stavka_nabavke_id = $request->stavka_nabavke_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        $uredjaj->povezivanja()->attach($request->povezivanja);

        Session::flash('uspeh', 'Projektor je uspešno izmenjen!');
        return redirect()->route('projektori.oprema');
    }

    public function postOtpis(Request $request)
    {

        $data = Projektor::find($request->idOtpis);

        if ($data->kancelarija) {
            $kanc = $data->kancelarija->sviPodaci();
        } else {
            $kanc = " nema podataka";
        }


        $data->napomena .= 'q#q# PODACI O OTPISU:  ' . Auth::user()->name . ' je dana:' . Carbon::now() . ' otpisao projektor koji je bio u kancelariji ' . $kanc;
        $data->save();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Projektor je uspešno otpisano!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom otpisa Projektor-a. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('projektori.oprema');
    }

    public function postOtpisVracanje(Request $request)
    {

        $data = Projektor::withTrashed()->find($request->idVracanje);
        $data->restore();
        $odgovor = $data->save();

        if ($odgovor) {
            Session::flash('uspeh', 'Projektor je uspešno vraćen u ponovnu upotrebu iz otpisa!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom vraćanja Projektor-a iz otpisa. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('projektori.oprema.otpisani');
    }

    public function postReciklirajLista(Request $request)
    {

        $uredjaj = Projektor::onlyTrashed()->whereNull('reciklirano_id')->get();
        $reciklaza = Reciklaza::find($request->reciklirano_id);

        return view('oprema.projektori_recikliranje_lista')->with(compact('uredjaj', 'reciklaza'));
    }

    public function postRecikliraj(Request $request, $id_reciklaze)
    {

        if (!$request->id_uredjaji) {
            Session::flash('greska', 'Niste odabrali nijedan Projektor!');
            return redirect()->route('projektori.oprema.otpisani');
        } else {
            DB::beginTransaction();
            foreach ($request->id_uredjaji as $id) {
                try {
                    $data = Projektor::withTrashed()->find($id);
                    $data->reciklirano_id = $id_reciklaze;
                    $data->save();
                } catch (\Exception $e) {
                    DB::rollback();
                    Session::flash('greska', 'Došlo je do greške prilikom stavljanja na listu reciklaže. Pokušajte ponovo, kasnije!');
                    return redirect()->route('projektori.oprema.otpisani');
                }
            }
            DB::commit();
            Session::flash('uspeh', 'Projektor je uspešno stavljeno na listu reciklaže!');
        }
        return redirect()->route('projektori.oprema.otpisani');
    }

}
