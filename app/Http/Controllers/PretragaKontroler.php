<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Session;
//use Redirect;
//use Gate;
//use Carbon\Carbon;
//use App\Helpers\ImenikHelper;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Pagination\Paginator;
//use Illuminate\Pagination\LengthAwarePaginator;
//use Illuminate\Database\Eloquent\Collection;
use App\Modeli\Zaposleni;
use App\Modeli\Kancelarija;
use App\Modeli\Servis;

class PretragaKontroler extends Controller
{

    public function getPretraga()
    {
        $zap = Zaposleni::all();
        $kanc = Kancelarija::all();
        return view('pretraga')->with(compact('zap', 'kanc'));
    }

    public function getPrijavaKvara()
    {
        $zap = Zaposleni::orderBy('ime', 'asc')->orderBy('prezime', 'asc')->get();
        $kanc = Kancelarija::orderBy('naziv', 'asc')->get();
        return view('kvar')->with(compact('zap', 'kanc'));
    }

    public function postPrijavaKvara(Request $request)
    {
        return "PRIJAVLJEN JE KVAR";
    }

    public function getStatus($id)
    {
        $servis = Servis::find($id);
        return view('status')->with(compact('servis'));
    }

}
