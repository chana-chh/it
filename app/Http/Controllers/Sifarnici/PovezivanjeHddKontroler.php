<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\HddPovezivanje;

class PovezivanjeHddKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $data = HddPovezivanje::all();
        return view('sifarnici.povezivanje_hdd')->with(compact('data'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'naziv' => [
                'required',
                'unique:s_hdd_povezivanja,naziv',
            ],
        ]);

        $data = new HddPovezivanje();
        $data->naziv = $request->naziv;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('povezivanje_hdd');
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $data = HddPovezivanje::find($request->id);
            return response()->json($data);
        }
    }

    public function postIzmena(Request $request)
    {
        $id = $request->idModal;
        $this->validate($request, [
            'nazivModal' => [
                'required',
                'unique:s_hdd_povezivanja,naziv,' . $id,
            ],
        ]);

        $data = HddPovezivanje::find($id);
        $data->naziv = $request->nazivModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {
        $data = HddPovezivanje::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}
