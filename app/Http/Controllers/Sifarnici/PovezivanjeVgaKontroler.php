<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\MonitorPovezivanje;

class PovezivanjeVgaKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $data = MonitorPovezivanje::all();
        return view('sifarnici.povezivanje_vga')->with(compact('data'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'naziv' => [
                'required',
                'unique:s_monitori_povezivanje,naziv',
            ],
        ]);

        $data = new MonitorPovezivanje();
        $data->naziv = $request->naziv;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('povezivanje_vga');
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $data = MonitorPovezivanje::find($request->id);
            return response()->json($data);
        }
    }

    public function postIzmena(Request $request)
    {
        $id = $request->idModal;
        $this->validate($request, [
            'nazivModal' => [
                'required',
                'unique:s_monitori_povezivanje,naziv,' . $id,
            ],
        ]);

        $data = MonitorPovezivanje::find($id);
        $data->naziv = $request->nazivModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {
        $data = MonitorPovezivanje::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

}
