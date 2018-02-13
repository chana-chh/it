<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\TipMemorije;

class TipoviMemorijeKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $data = TipMemorije::all();
        return view('sifarnici.tipovi_memorije')->with(compact('data'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'naziv' => [
                'required',
                'unique:s_tipovi_memorije,naziv',
            ],
        ]);

        $data = new TipMemorije();
        $data->naziv = $request->naziv;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('tipovi_memorije');
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $data = TipMemorije::find($request->id);
            return response()->json($data);
        }
    }

    public function postIzmena(Request $request)
    {
        $id = $request->idModal;
        $this->validate($request, [
            'nazivModal' => [
                'required',
                'unique:s_tipovi_memorije,naziv,' . $id,
            ],
        ]);

        $data = TipMemorije::find($id);
        $data->naziv = $request->nazivModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {
        $data = TipMemorije::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}
