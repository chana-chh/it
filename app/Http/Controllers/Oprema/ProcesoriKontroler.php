<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;

Use App\Modeli\Procesor;
Use App\Modeli\ProcesorModel;
Use App\Modeli\Racunar;
Use App\Modeli\OtpremnicaStavka;



class ProcesoriKontroler extends Kontroler
{
    public function getLista()
    {
    	$uredjaj = Procesor::all();
    	return view('oprema.procesori')->with(compact ('uredjaj'));
    }

    public function getDetalj($id)
    {
        $uredjaj = Procesor::find($id);
        $brojno_stanje = Procesor::where('procesor_model_id', '=', $uredjaj->procesor_model_id)->count();
        return view('oprema.procesori_detalj')->with(compact ('uredjaj', 'brojno_stanje'));
    }

    public function getDodavanje()
    {
        $modeli = ProcesorModel::all();
        $racunari = Racunar::all();
        $otpremnice = OtpremnicaStavka::all();
        return view('oprema.procesori_dodavanje')->with(compact ('modeli', 'racunari', 'otpremnice'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
                'naziv' => ['required'],
                'procesor_model_id' => ['required'],
            ]);

        $uredjaj = new Procesor();
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->procesor_model_id = $request->procesor_model_id;
        $uredjaj->racunar_id = $request->racunar_id;
        $uredjaj->stavka_otpremnica_id = $request->stavka_otpremnica_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh','Procesora je uspešno dodat!');
        return redirect()->route('procesori.oprema');
    }

}
