<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Gate;
use Carbon\Carbon;
use App\Helpers\ImenikHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;


class PretragaKontroler extends Kontroler
{

    public function getPretraga()
    {


        return view('pretraga');
    }

    public function postRezultati(Request $request){

        $upit = $request->upit;
        $rezultat = null;
        $zaposleni_svi = ImenikHelper::zaImenik();
        
        $zaposleni_upit = $zaposleni_svi->where('zaposleni_ime', 'like', '%'.$upit.'%');
        $rezultat = $this->paginate($zaposleni_svi, 10);
        dd($rezultat);

        return view('rezultati')->with(compact('rezultat'));
    }

    function paginate($kolekcija, $poStrani)
{
    if(is_array($kolekcija)){
        $kolekcija = collect($kolekcija);
    }

    return new LengthAwarePaginator(
        $kolekcija->forPage(Paginator::resolveCurrentPage() , $poStrani),
        $kolekcija->count(), $poStrani,
        Paginator::resolveCurrentPage(),
        ['path' => Paginator::resolveCurrentPath()]
    );
}

}
