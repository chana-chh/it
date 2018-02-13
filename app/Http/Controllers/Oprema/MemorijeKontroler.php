<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Carbon\Carbon;
use App\Modeli\Memorija;
use App\Modeli\MemorijaModel;
use App\Modeli\Racunar;
use App\Modeli\Otpremnica;
use App\Modeli\Reciklaza;

class MemorijeKontroler extends Kontroler
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
        $uredjaj = Memorija::all();
        return view('oprema.memorije')->with(compact('uredjaj'));
    }

    public function getListaOtpisani()
    {
        $uredjaj = Memorija::onlyTrashed()->get();
        $reciklaze = Reciklaza::all();
        return view('oprema.memorije_otpisani')->with(compact('uredjaj', 'reciklaze'));
    }

    public function getDetalj($id)
    {
        $uredjaj = Memorija::find($id);
        $brojno_stanje = Memorija::where('memorija_model_id', '=', $uredjaj->memorija_model_id)->count();
        return view('oprema.memorije_detalj')->with(compact('uredjaj', 'brojno_stanje'));
    }

    public function getIzmena($id)
    {
        $uredjaj = Memorija::find($id);
        $modeli = MemorijaModel::all();
        $racunari = Racunar::all();
        $otpremnice = Otpremnica::all();
        return view('oprema.memorije_izmena')->with(compact('uredjaj', 'modeli', 'racunari', 'otpremnice'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'serijski_broj' => [
                'max:50'],
            'memorija_model_id' => [
                'required'],
        ]);

        $uredjaj = Memorija::find($id);
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->memorija_model_id = $request->memorija_model_id;
        $uredjaj->racunar_id = $request->racunar_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh', 'Memorijski modul je uspešno izmenjena!');
        return redirect()->route('memorije.oprema');
    }

    public function postOtpis(Request $request)
    {

        $data = Memorija::find($request->idOtpis);

        if ($data->racunar) {
            $uredjaj = $data->racunar;
            $ime = $uredjaj->ime;
            $kanc = $uredjaj->kancelarija->naziv;
            $data->racunar_id = null;
        } else {
            $ime = " nije bio u računaru";
            $kanc = " nema podataka";
        }

        $data->napomena .= 'q#q# PODACI O OTPISU:  ' . Auth::user()->name . ' je dana:' . Carbon::now() . ' otpisao memorijski modul koji je bio u računaru: ' . $ime . ', kancelarija: ' . $kanc;
        $data->save();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Memorijski modul je uspešno otpisan!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom otpisa memorijskog modula. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('memorije.oprema');
    }

    public function postOtpisVracanje(Request $request)
    {

        $data = Memorija::withTrashed()->find($request->idVracanje);
        $data->restore();
        if (!$data->stavkaOtpremnice) {
            $data->stavka_otpremnice_id = 4; //Stavka otpremnice rezervisana za stare memorije
        }
        $odgovor = $data->save();

        if ($odgovor) {
            Session::flash('uspeh', 'Memorijski modul je uspešno vraćen u ponovnu upotrebu iz otpisa!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom vraćanja iz otpisa memorijskog modula. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('memorije.oprema.otpisani');
    }

    public function postReciklirajLista(Request $request)
    {

        $uredjaj = Memorija::onlyTrashed()->whereNull('reciklirano_id')->get();
        $reciklaza = Reciklaza::find($request->reciklirano_id);

        return view('oprema.memorije_recikliranje_lista')->with(compact('uredjaj', 'reciklaza'));
    }

    public function postRecikliraj(Request $request, $id_reciklaze)
    {

        if (!$request->id_uredjaji) {
            Session::flash('greska', 'Niste odabrali nijedan memorijski modul!');
            return redirect()->route('memorije.oprema.otpisani');
        } else {
            DB::beginTransaction();
            foreach ($request->id_uredjaji as $id) {
                try {
                    $data = Memorija::withTrashed()->find($id);
                    $data->reciklirano_id = $id_reciklaze;
                    $data->save();
                } catch (\Exception $e) {
                    DB::rollback();
                    Session::flash('greska', 'Došlo je do greške prilikom stavljanja na listu reciklaže. Pokušajte ponovo, kasnije!');
                    return redirect()->route('memorije.oprema.otpisani');
                }
            }
            DB::commit();
            Session::flash('uspeh', 'Memorijski modul je uspešno stavljen na listu reciklaže!');
        }
        return redirect()->route('memorije.oprema.otpisani');
    }

}
