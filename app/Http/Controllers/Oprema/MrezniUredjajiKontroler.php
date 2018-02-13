<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Carbon\Carbon;
use App\Modeli\MrezniUredjaj;
use App\Modeli\Otpremnica;
use App\Modeli\Reciklaza;
use App\Modeli\Proizvodjac;
use App\Modeli\Kancelarija;
use App\Modeli\Nabavka;

class MrezniUredjajiKontroler extends Kontroler
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
        $uredjaj = MrezniUredjaj::all();
        return view('oprema.mrezni')->with(compact('uredjaj'));
    }

    public function getListaOtpisani()
    {
        $uredjaj = MrezniUredjaj::onlyTrashed()->get();
        $reciklaze = Reciklaza::all();
        return view('oprema.mrezni_otpisani')->with(compact('uredjaj', 'reciklaze'));
    }

    public function getDetalj($id)
    {
        $uredjaj = MrezniUredjaj::find($id);
        return view('oprema.mrezni_detalj')->with(compact('uredjaj'));
    }

    public function getIzmena($id)
    {
        $uredjaj = MrezniUredjaj::find($id);
        $otpremnice = Otpremnica::all();
        $kancelarije = Kancelarija::all();
        $nabavke = Nabavka::all();
        $proizvodjaci = Proizvodjac::all();
        return view('oprema.mrezni_izmena')->with(compact('uredjaj', 'kancelarije', 'nabavke', 'otpremnice', 'proizvodjaci'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'serijski_broj' => [
                'max:50'],
            'naziv' => [
                'required'],
        ]);

        if ($request->upravljiv) {
            $upravljivc = 1;
        } else {
            $upravljivc = 0;
        }

        $uredjaj = MrezniUredjaj::find($id);
        $uredjaj->naziv = $request->naziv;
        $uredjaj->inventarski_broj = $request->inventarski_broj;
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->broj_portova = $request->broj_portova;
        $uredjaj->upravljiv = $upravljivc;
        $uredjaj->link = $request->link;
        $uredjaj->kancelarija_id = $request->kancelarija_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->stavka_nabavke_id = $request->stavka_nabavke_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh', 'Mrežni uređaj je uspešno izmenjeno!');
        return redirect()->route('mrezni.oprema');
    }

    public function postOtpis(Request $request)
    {

        $data = MrezniUredjaj::find($request->idOtpis);

        if ($data->kancelarija) {
            $kanc = $data->kancelarija->sviPodaci();
        } else {
            $kanc = " nema podataka";
        }

        $data->napomena .= 'q#q# PODACI O OTPISU:  ' . Auth::user()->name . ' je dana:' . Carbon::now() . ' otpisao mrežni uređaj koji je bio u kancelariji ' . $kanc;
        $data->save();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Mrežni uređaj je uspešno otpisano!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom otpisa mrežnog uređaja. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('mrezni.oprema');
    }

    public function postOtpisVracanje(Request $request)
    {

        $data = MrezniUredjaj::withTrashed()->find($request->idVracanje);
        $data->restore();
        $odgovor = $data->save();

        if ($odgovor) {
            Session::flash('uspeh', 'Mrežni uređaj je uspešno vraćen u ponovnu upotrebu iz otpisa!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom vraćanja mrežnog uređaja iz otpisa. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('mrezni.oprema.otpisani');
    }

    public function postReciklirajLista(Request $request)
    {

        $uredjaj = MrezniUredjaj::onlyTrashed()->whereNull('reciklirano_id')->get();
        $reciklaza = Reciklaza::find($request->reciklirano_id);

        return view('oprema.mrezni_recikliranje_lista')->with(compact('uredjaj', 'reciklaza'));
    }

    public function postRecikliraj(Request $request, $id_reciklaze)
    {

        if (!$request->id_uredjaji) {
            Session::flash('greska', 'Niste odabrali nijedan mrežni uređaj!');
            return redirect()->route('mrezni.oprema.otpisani');
        } else {
            DB::beginTransaction();
            foreach ($request->id_uredjaji as $id) {
                try {
                    $data = MrezniUredjaj::withTrashed()->find($id);
                    $data->reciklirano_id = $id_reciklaze;
                    $data->save();
                } catch (\Exception $e) {
                    DB::rollback();
                    Session::flash('greska', 'Došlo je do greške prilikom stavljanja na listu reciklaže. Pokušajte ponovo, kasnije!');
                    return redirect()->route('mrezni.oprema.otpisani');
                }
            }
            DB::commit();
            Session::flash('uspeh', 'Mrežni uređaj je uspešno stavljeno na listu reciklaže!');
        }
        return redirect()->route('mrezni.oprema.otpisani');
    }

}
