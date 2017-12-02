<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Carbon\Carbon;

Use App\Modeli\OsnovnaPloca;
Use App\Modeli\OsnovnaPlocaModel;
Use App\Modeli\Racunar;
Use App\Modeli\OtpremnicaStavka;
Use App\Modeli\Otpremnica;
Use App\Modeli\Reciklaza;



class OsnovnePloceKontroler extends Kontroler
{
    public function getLista()
    {
    	$uredjaj = OsnovnaPloca::all();
    	return view('oprema.osnovne_ploce')->with(compact ('uredjaj'));
    }

    public function getListaOtpisani()
    {
        $uredjaj = OsnovnaPloca::onlyTrashed()->get();
        $reciklaze = Reciklaza::all();
        return view('oprema.osnovne_ploce_otpisani')->with(compact ('uredjaj', 'reciklaze'));
    }

    public function getDetalj($id)
    {
        $uredjaj = OsnovnaPloca::find($id);
        $brojno_stanje = OsnovnaPloca::where('osnovna_ploca_model_id', '=', $uredjaj->osnovna_ploca_model_id)->count();
        return view('oprema.osnovne_ploce_detalj')->with(compact ('uredjaj', 'brojno_stanje'));
    }

    public function getIzmena($id)
    {
        $uredjaj = OsnovnaPloca::find($id);
        $modeli = OsnovnaPlocaModel::all();
        $racunari = Racunar::all();
        $otpremnice = Otpremnica::all();
        return view('oprema.osnovne_ploce_izmena')->with(compact ('uredjaj', 'modeli', 'racunari', 'otpremnice'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'osnovne_ploce_model_id' => ['required'],
            ]);

        $uredjaj = OsnovnaPloca::find($id);
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->osnovne_ploce_model_id = $request->osnovne_ploce_model_id;
        $uredjaj->racunar_id = $request->racunar_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh','Osnovna ploča je uspešno izmenjena!');
        return redirect()->route('osnovne_ploce.oprema');
    }

    public function postOtpis(Request $request)
    {

        $data = OsnovnaPloca::find($request->idOtpis);

        if ($data->racunar) {
            $uredjaj = $data->racunar;
            $ime = $uredjaj->ime;
            $kanc = $uredjaj->kancelarija->naziv;
            $uredjaj->ploca_id=null;
        }
        else{
            $ime = " nije bio u računaru";
            $kanc = " nema podataka";
        }

        $data->napomena .= 'q#q# PODACI O OTPISU:  ' . Auth::user()->name .'je dana:'. Carbon::now().' otpisao  osnovnu ploču koja je bila u računaru: '. $ime . ', kancelarija: ' . $kanc;
        $data->save();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Osnovna ploča je uspešno otpisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom otpisa osnovne ploče. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('osnovne_ploce.oprema');
    }

}
