<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Carbon\Carbon;
use App\Modeli\Stampac;
use App\Modeli\StampacModel;
use App\Modeli\Racunar;
use App\Modeli\Otpremnica;
use App\Modeli\Kancelarija;
use App\Modeli\Nabavka;
use App\Modeli\Reciklaza;

class StampaciKontroler extends Kontroler
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
        $uredjaj = Stampac::all();
        return view('oprema.stampaci')->with(compact('uredjaj'));
    }

    public function getListaOtpisani()
    {
        $uredjaj = Stampac::onlyTrashed()->get();
        $reciklaze = Reciklaza::all();
        return view('oprema.stampaci_otpisani')->with(compact('uredjaj', 'reciklaze'));
    }

    public function getDetalj($id)
    {
        $uredjaj = Stampac::find($id);
        $brojno_stanje = Stampac::where('stampac_model_id', '=', $uredjaj->stampac_model_id)->count();
        return view('oprema.stampaci_detalj')->with(compact('uredjaj', 'brojno_stanje'));
    }

    public function getIzmena($id)
    {
        $uredjaj = Stampac::find($id);
        $modeli = StampacModel::all();
        $racunari = Racunar::all();
        $otpremnice = Otpremnica::all();
        $kancelarije = Kancelarija::all();
        $nabavke = Nabavka::all();
        return view('oprema.stampaci_izmena')->with(compact('uredjaj', 'modeli', 'racunari', 'otpremnice', 'kancelarije', 'nabavke'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'serijski_broj' => [
                'max:50'],
            'stampac_model_id' => [
                'required'],
        ]);

        $uredjaj = Stampac::find($id);
        $uredjaj->inventarski_broj = $request->inventarski_broj;
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->stampac_model_id = $request->stampac_model_id;
        $uredjaj->racunar_id = $request->racunar_id;
        $uredjaj->kancelarija_id = $request->kancelarija_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->stavka_nabavke_id = $request->stavka_nabavke_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh', 'Štampač je uspešno izmenjen!');
        return redirect()->route('stampaci.oprema');
    }

    public function postOtpis(Request $request)
    {

        $data = Stampac::find($request->idOtpis);

        if ($data->racunar) {
            $uredjaj = $data->racunar;
            $ime = $uredjaj->ime;
            $kanc = $uredjaj->kancelarija->naziv;
            $data->racunar_id = null;
        } elseif ($data->kancelarija) {
            $ime = " nije bio vezan za računar";
            $kanc = $data->kancelarija->sviPodaci();
        } else {
            $ime = " nije bio vezan za računar";
            $kanc = " nema podataka";
        }


        $data->napomena .= 'q#q# PODACI O OTPISU:  ' . Auth::user()->name . ' je dana:' . Carbon::now() . ' otpisao štampač koji je bio povezan za računar: ' . $ime . ', kancelarija: ' . $kanc;
        $data->save();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Štampač je uspešno otpisan!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom otpisa štampača. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('stampaci.oprema');
    }

    public function postOtpisVracanje(Request $request)
    {

        $data = Stampac::withTrashed()->find($request->idVracanje);
        $data->restore();
        $odgovor = $data->save();

        if ($odgovor) {
            Session::flash('uspeh', 'Štampač je uspešno vraćen u ponovnu upotrebu iz otpisa!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom vraćanja štampača iz otpisa. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('stampaci.oprema.otpisani');
    }

    public function postReciklirajLista(Request $request)
    {

        $uredjaj = Stampac::onlyTrashed()->whereNull('reciklirano_id')->get();
        $reciklaza = Reciklaza::find($request->reciklirano_id);

        return view('oprema.stampaci_recikliranje_lista')->with(compact('uredjaj', 'reciklaza'));
    }

    public function postRecikliraj(Request $request, $id_reciklaze)
    {

        if (!$request->id_uredjaji) {
            Session::flash('greska', 'Niste odabrali nijedan štampač!');
            return redirect()->route('stampaci.oprema.otpisani');
        } else {
            DB::beginTransaction();
            foreach ($request->id_uredjaji as $id) {
                try {
                    $data = Stampac::withTrashed()->find($id);
                    $data->reciklirano_id = $id_reciklaze;
                    $data->save();
                } catch (\Exception $e) {
                    DB::rollback();
                    Session::flash('greska', 'Došlo je do greške prilikom stavljanja na listu reciklaže. Pokušajte ponovo, kasnije!');
                    return redirect()->route('stampaci.oprema.otpisani');
                }
            }
            DB::commit();
            Session::flash('uspeh', 'Štampač je uspešno stavljeno na listu reciklaže!');
        }
        return redirect()->route('stampaci.oprema.otpisani');
    }

}
