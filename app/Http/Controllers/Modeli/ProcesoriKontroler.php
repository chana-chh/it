<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;

Use App\Modeli\ProcesorModel;


class ProcesoriKontroler extends Kontroler
{
    public function getLista()
    {
    	$procesori = ProcesorModel::all();
    	return view('modeli.procesori')->with(compact ('procesori'));
    }

}
