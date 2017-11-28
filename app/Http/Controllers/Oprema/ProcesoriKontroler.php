<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Carbon\Carbon;

Use App\Modeli\Procesor;
Use App\Modeli\ProcesorModel;
Use App\Modeli\Racunar;
Use App\Modeli\OtpremnicaStavka;
Use App\Modeli\Otpremnica;



class ProcesoriKontroler extends Kontroler
{
    public function getLista()
    {
    	$uredjaj = Procesor::all();
    	return view('oprema.procesori')->with(compact ('uredjaj'));
    }

    public function getListaOtpisani()
    {
        $uredjaj = Procesor::onlyTrashed()->whereNull('reciklirano_id')->get();
        return view('oprema.procesori_otpisani')->with(compact ('uredjaj'));
    }

    public function getDetalj($id)
    {
        $uredjaji = Procesor::withTrashed()->get();

        $uredjaj = $uredjaji->find($id);
        $brojno_stanje = Procesor::where('procesor_model_id', '=', $uredjaj->procesor_model_id)->count();
        return view('oprema.procesori_detalj')->with(compact ('uredjaj', 'brojno_stanje'));
    }

    public function getIzmena($id)
    {
        $uredjaj = Procesor::find($id);
        $modeli = ProcesorModel::all();
        $racunari = Racunar::all();
        $otpremnice = Otpremnica::all();
        return view('oprema.procesori_izmena')->with(compact ('uredjaj', 'modeli', 'racunari', 'otpremnice'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'procesor_model_id' => ['required'],
            ]);

        $uredjaj = Procesor::find($id);
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->procesor_model_id = $request->procesor_model_id;
        $uredjaj->racunar_id = $request->racunar_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh','Procesor je uspešno izmenjen!');
        return redirect()->route('procesori.oprema');
    }

    public function postOtpis(Request $request)
    {

        $data = Procesor::find($request->idOtpis);

        if ($data->racunar) {
            $uredjaj = $data->racunar;
            $ime = $uredjaj->ime;
            $kanc = $uredjaj->kancelarija->naziv;
        }
        else{
            $ime = " nije bio u računaru";
            $kanc = " nema podataka";
        }

        $data->napomena .= 'q#q# PODACI O OTPISU:  ' . Auth::user()->name .'je dana:'. Carbon::now().' otpisao  procesor koji je bio u računaru: '. $ime . ', kancelarija: ' . $kanc;
        $data->racunar_id = null;
        $data->save();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Procesor je uspešno otpisan!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom otpisa procesora. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('procesori.oprema');
    }

    public function postOtpisVracanje(Request $request)
    {

        $data = Procesor::withTrashed()->find($request->idVracanje);
        $data->restore();
        if (!$data->stavkaOtpremnice) {
              $data->stavka_otpremnice_id = 2; //Stavka otpremnice rezervisana za stare procesore
          }
        $odgovor = $data->save();

        if ($odgovor) {
            Session::flash('uspeh', 'Procesor je uspešno vraćen u ponovnu upotrebu iz otpisa!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom vraćanja iz otpisa procesora. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('procesori.oprema.otpisani');
    }

    public function postRecikliraj(Request $request){

        $data = Procesor::withTrashed()->find($request->idReciklaza);

    }

}
