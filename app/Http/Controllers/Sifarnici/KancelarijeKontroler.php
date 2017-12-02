<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Kancelarija;
use App\Modeli\Sprat;
use App\Modeli\Lokacija;
use App\Helpers\UredjajiHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class KancelarijeKontroler extends Kontroler
{

    public function getLista()
    {
        $kancelarije = Kancelarija::all();
        $lokacije = Lokacija::all();
        $spratovi = Sprat::orderBy('id')->get();
        return view('sifarnici.kancelarije')->with(compact('kancelarije', 'lokacije', 'spratovi'));
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $kancelarije = Kancelarija::find($request->id);
            $lokacije = Lokacija::all();
            $spratovi = Sprat::orderBy('id')->get();
            return response()->json(array(
                        'kancelarije' => $kancelarije,
                        'lokacije' => $lokacije,
                        'spratovi' => $spratovi));
        }
    }

    public function getDetalj($id)
    {
        $kancelarija = Kancelarija::find($id);
        $uredjaji_svi = UredjajiHelper::sviUredjaji();
        $uredjaji_kanc = $uredjaji_svi->where('kancelarija_id', $id);
        $uredjaji = $this->paginate($uredjaji_kanc, 2);
        return view('sifarnici.kancelarije_detalj')->with(compact('kancelarija', 'uredjaji'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'naziv' => [
                'required',
                'max:50'
            ],
        ]);

        $kancelarija = new Kancelarija();
        $kancelarija->naziv = $request->naziv;
        $kancelarija->sprat_id = $request->sprat_id;
        $kancelarija->lokacija_id = $request->lokacija_id;
        $kancelarija->napomena = $request->napomena;
        $kancelarija->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('kancelarije');
    }

    public function postIzmena(Request $request)
    {
        $this->validate($request, [
            'nazivModal' => [
                'required',
                'max:50'
            ]
        ]);

        $kancelarija = Kancelarija::find($request->idModal);
        $kancelarija->naziv = $request->nazivModal;
        $kancelarija->sprat_id = $request->sprat_idModal;
        $kancelarija->napomena = $request->napomenaModal;
        $kancelarija->lokacija_id = $request->lokacija_idModal;
        $kancelarija->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {

        $kancelarija = Kancelarija::find($request->idBrisanje);
        $odgovor = $kancelarija->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('kancelarije');
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
