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
        $uredjaj = Procesor::onlyTrashed()->get();
        return view('oprema.procesori_otpisani')->with(compact ('uredjaj'));
    }

    public function getDetalj($id)
    {
        $uredjaji = Procesor::withTrashed()->get();

        $uredjaj = $uredjaji->find($id);
        $brojno_stanje = Procesor::where('procesor_model_id', '=', $uredjaj->procesor_model_id)->count();
        return view('oprema.procesori_detalj')->with(compact ('uredjaj', 'brojno_stanje'));
    }

    public function getDodavanje()
    {
        $modeli = ProcesorModel::all();
        $racunari = Racunar::all();
        $otpremnice = Otpremnica::all();
        return view('oprema.procesori_dodavanje')->with(compact ('modeli', 'racunari', 'otpremnice'));
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

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'procesor_model_id' => ['required'],
            ]);
        // $procesori_racunari_id = Procesor::all()->pluck('racunar_id');

        // if ($procesori_racunari_id->contains($request->racunar_id)) {
        //     Session::flash('greska','Ovaj računar već ima procesor!');
        //     $racunar_greska = Racunar::find($request->racunar_id);
        //     DB::table('podesavanja')->insert([
        //     ['naziv' => 'racunar_procesor', 'vrednost' => $racunar_greska->ime]
        // ]);
        // }

        $uredjaj = new Procesor();
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->procesor_model_id = $request->procesor_model_id;
        $uredjaj->racunar_id = $request->racunar_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh','Procesor je uspešno dodat!');
        return redirect()->route('procesori.oprema');
    }

}
