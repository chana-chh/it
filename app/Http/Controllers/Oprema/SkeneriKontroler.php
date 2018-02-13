<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Carbon\Carbon;
use App\Modeli\Skener;
use App\Modeli\SkenerModel;
use App\Modeli\Racunar;
use App\Modeli\Otpremnica;
use App\Modeli\Kancelarija;
use App\Modeli\Nabavka;
use App\Modeli\Reciklaza;

class SkeneriKontroler extends Kontroler
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
        $uredjaj = Skener::all();
        return view('oprema.skeneri')->with(compact('uredjaj'));
    }

    public function getListaOtpisani()
    {
        $uredjaj = Skener::onlyTrashed()->get();
        $reciklaze = Reciklaza::all();
        return view('oprema.skeneri_otpisani')->with(compact('uredjaj', 'reciklaze'));
    }

    public function getDetalj($id)
    {
        $uredjaj = Skener::find($id);
        $brojno_stanje = Skener::where('skener_model_id', '=', $uredjaj->skener_model_id)->count();
        return view('oprema.skeneri_detalj')->with(compact('uredjaj', 'brojno_stanje'));
    }

    public function getIzmena($id)
    {
        $uredjaj = Skener::find($id);
        $modeli = SkenerModel::all();
        $racunari = Racunar::all();
        $otpremnice = Otpremnica::all();
        $kancelarije = Kancelarija::all();
        $nabavke = Nabavka::all();
        return view('oprema.skeneri_izmena')->with(compact('uredjaj', 'modeli', 'racunari', 'otpremnice', 'kancelarije', 'nabavke'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'serijski_broj' => [
                'max:50'],
            'skener_model_id' => [
                'required'],
        ]);

        $uredjaj = Skener::find($id);
        $uredjaj->inventarski_broj = $request->inventarski_broj;
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->skener_model_id = $request->skener_model_id;
        $uredjaj->racunar_id = $request->racunar_id;
        $uredjaj->kancelarija_id = $request->kancelarija_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->stavka_nabavke_id = $request->stavka_nabavke_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh', 'Skener je uspešno izmenjen!');
        return redirect()->route('skeneri.oprema');
    }

    public function postOtpis(Request $request)
    {

        $data = Skener::find($request->idOtpis);

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


        $data->napomena .= 'q#q# PODACI O OTPISU:  ' . Auth::user()->name . ' je dana:' . Carbon::now() . ' otpisao skener koji je bio povezan za računar: ' . $ime . ', kancelarija: ' . $kanc;
        $data->save();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Skener je uspešno otpisano!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom otpisa skenera. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('skeneri.oprema');
    }

    public function postOtpisVracanje(Request $request)
    {

        $data = Skener::withTrashed()->find($request->idVracanje);
        $data->restore();
        $odgovor = $data->save();

        if ($odgovor) {
            Session::flash('uspeh', 'Skener je uspešno vraćen u ponovnu upotrebu iz otpisa!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom vraćanja skenera iz otpisa. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('skeneri.oprema.otpisani');
    }

    public function postReciklirajLista(Request $request)
    {

        $uredjaj = Skener::onlyTrashed()->whereNull('reciklirano_id')->get();
        $reciklaza = Reciklaza::find($request->reciklirano_id);

        return view('oprema.skeneri_recikliranje_lista')->with(compact('uredjaj', 'reciklaza'));
    }

    public function postRecikliraj(Request $request, $id_reciklaze)
    {

        if (!$request->id_uredjaji) {
            Session::flash('greska', 'Niste odabrali nijedan skener!');
            return redirect()->route('skeneri.oprema.otpisani');
        } else {
            DB::beginTransaction();
            foreach ($request->id_uredjaji as $id) {
                try {
                    $data = Skener::withTrashed()->find($id);
                    $data->reciklirano_id = $id_reciklaze;
                    $data->save();
                } catch (\Exception $e) {
                    DB::rollback();
                    Session::flash('greska', 'Došlo je do greške prilikom stavljanja na listu reciklaže. Pokušajte ponovo, kasnije!');
                    return redirect()->route('skeneri.oprema.otpisani');
                }
            }
            DB::commit();
            Session::flash('uspeh', 'Skener je uspešno stavljeno na listu reciklaže!');
        }
        return redirect()->route('skeneri.oprema.otpisani');
    }

}
