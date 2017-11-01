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

}
