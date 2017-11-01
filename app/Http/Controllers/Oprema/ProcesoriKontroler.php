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
Use App\Modeli\Otpremnica;



class ProcesoriKontroler extends Kontroler
{
    public function getLista()
    {
    	$oprema = Procesor::all();
    	return view('oprema.procesori')->with(compact ('oprema'));
    }

    public function getDetalj($id)
    {
        $oprema = Procesor::find($id);
        $brojno_stanje = Procesor::where('procesor_model_id', '=', $oprema->procesor_model_id)->count();
        return view('oprema.procesori_detalj')->with(compact ('oprema', 'brojno_stanje'));
    }

    public function getDodavanje()
    {
        $modeli = ProcesorModel::all();
        $racunari = Racunar::all();
        $otpremnice = Otpremnica::all();
        return view('oprema.procesori_dodavanje')->with(compact ('modeli', 'racunari', 'otpremnice'));
    }

}
