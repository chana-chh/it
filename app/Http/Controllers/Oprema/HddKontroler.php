<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Carbon\Carbon;
use App\Modeli\Hdd;
use App\Modeli\HddModel;
use App\Modeli\Racunar;
use App\Modeli\Otpremnica;
use App\Modeli\Reciklaza;

class HddKontroler extends Kontroler
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
        $uredjaj = Hdd::all();
        return view('oprema.hddovi')->with(compact('uredjaj'));
    }

    public function getListaOtpisani()
    {
        $uredjaj = Hdd::onlyTrashed()->get();
        $reciklaze = Reciklaza::all();
        return view('oprema.hddovi_otpisani')->with(compact('uredjaj', 'reciklaze'));
    }

    public function getDetalj($id)
    {
        $uredjaj = Hdd::find($id);
        $brojno_stanje = Hdd::where('hdd_model_id', '=', $uredjaj->hdd_model_id)->count();
        return view('oprema.hddovi_detalj')->with(compact('uredjaj', 'brojno_stanje'));
    }

    public function getIzmena($id)
    {
        $uredjaj = Hdd::find($id);
        $modeli = HddModel::all();
        $racunari = Racunar::all();
        $otpremnice = Otpremnica::all();
        return view('oprema.hddovi_izmena')->with(compact('uredjaj', 'modeli', 'racunari', 'otpremnice'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'serijski_broj' => [
                'max:50'],
            'hdd_model_id' => [
                'required'],
        ]);

        $uredjaj = Hdd::find($id);
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->hdd_model_id = $request->hdd_model_id;
        $uredjaj->racunar_id = $request->racunar_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh', 'Čvrsti disk je uspešno izmenjen!');
        return redirect()->route('hddovi.oprema');
    }

    public function postOtpis(Request $request)
    {

        $data = Hdd::find($request->idOtpis);

        if ($data->racunar) {
            $uredjaj = $data->racunar;
            $ime = $uredjaj->ime;
            $kanc = $uredjaj->kancelarija->naziv;
            $data->racunar_id = null;
        } else {
            $ime = " nije bio u računaru";
            $kanc = " nema podataka";
        }

        $data->napomena .= 'q#q# PODACI O OTPISU:  ' . Auth::user()->name . ' je dana:' . Carbon::now() . ' otpisao čvrsti disk koji je bio u računaru: ' . $ime . ', kancelarija: ' . $kanc;
        $data->save();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Čvrsti disk je uspešno otpisan!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom otpisa čvrstog diska. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('hddovi.oprema');
    }

    public function postOtpisVracanje(Request $request)
    {

        $data = Hdd::withTrashed()->find($request->idVracanje);
        $data->restore();
        if (!$data->stavkaOtpremnice) {
            $data->stavka_otpremnice_id = 5; //Stavka otpremnice rezervisana za stare hddove
        }
        $odgovor = $data->save();

        if ($odgovor) {
            Session::flash('uspeh', 'Čvrsti disk je uspešno vraćen u ponovnu upotrebu iz otpisa!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom vraćanja čvrstog diska iz otpisa. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('hddovi.oprema.otpisani');
    }

    public function postReciklirajLista(Request $request)
    {

        $uredjaj = Hdd::onlyTrashed()->whereNull('reciklirano_id')->get();
        $reciklaza = Reciklaza::find($request->reciklirano_id);

        return view('oprema.hddovi_recikliranje_lista')->with(compact('uredjaj', 'reciklaza'));
    }

    public function postRecikliraj(Request $request, $id_reciklaze)
    {

        if (!$request->id_uredjaji) {
            Session::flash('greska', 'Niste odabrali nijedan čvrsti disk!');
            return redirect()->route('hddovi.oprema.otpisani');
        } else {
            DB::beginTransaction();
            foreach ($request->id_uredjaji as $id) {
                try {
                    $data = Hdd::withTrashed()->find($id);
                    $data->reciklirano_id = $id_reciklaze;
                    $data->save();
                } catch (\Exception $e) {
                    DB::rollback();
                    Session::flash('greska', 'Došlo je do greške prilikom stavljanja na listu reciklaže. Pokušajte ponovo, kasnije!');
                    return redirect()->route('hddovi.oprema.otpisani');
                }
            }
            DB::commit();
            Session::flash('uspeh', 'Čvrsti disk je uspešno stavljen na listu reciklaže!');
        }
        return redirect()->route('hddovi.oprema.otpisani');
    }

}
