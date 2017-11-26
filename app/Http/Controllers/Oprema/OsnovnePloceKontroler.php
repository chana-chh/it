<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;

Use App\Modeli\OsnovnaPloca;
Use App\Modeli\OsnovnaPlocaModel;
Use App\Modeli\Racunar;
Use App\Modeli\OtpremnicaStavka;
Use App\Modeli\Otpremnica;



class OsnovnePloceKontroler extends Kontroler
{
    public function getLista()
    {
    	$uredjaj = OsnovnaPloca::all();
    	return view('oprema.osnovne_ploce')->with(compact ('uredjaj'));
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

}
