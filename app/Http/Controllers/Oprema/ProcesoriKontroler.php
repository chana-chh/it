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

}
