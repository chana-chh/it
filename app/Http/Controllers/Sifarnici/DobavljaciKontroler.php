<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Dobavljac;
use App\Modeli\Nabavka;
use DB;
use URL;

class DobavljaciKontroler extends Kontroler
{

    public function getLista()
    {
        $data = Dobavljac::all();
        return view('sifarnici.dobavljaci')->with(compact('data'));
    }

    public function getDodavanje(Request $request)
    {
        $request->session()->put('povratna_veza', URL::previous());
        return view('sifarnici.dobavljaci_dodavanje'); // ->with(compact('povratna_veza'));
    }

    public function postDodavanje(Request $request)
    {
        $this->validate($request, [
            'naziv' => [
                'required',
                'max:190',
                'unique:s_dobavljaci,naziv',
            ],
        ]);

        $data = new Dobavljac();
        $data->naziv = $request->naziv;
        $data->adresa_mesto = $request->adresa_mesto;
        $data->adresa_ulica = $request->adresa_ulica;
        $data->adresa_broj = $request->adresa_broj;
        $data->telefon = $request->telefon;
        $data->email = $request->email;
        $data->link = $request->link;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Dovaljač je uspešno dodat!');
        return redirect($request->session()->pull('povratna_veza', 'dobavljaci'));
    }

    public function getDetalj($id)
    {
        $model = Dobavljac::find($id);
        $nabavke = DB::table('nabavke')->where('dobavljac_id', '=', $id)->get();
        return view('sifarnici.dobavljaci_detalj')->with(compact('model', 'nabavke'));
    }

    public function getIzmena($id)
    {
        $model = Dobavljac::find($id);

        return view('sifarnici.dobavljaci_izmena')->with(compact('model'));
    }

    public function postIzmena(Request $request)
    {
        $id = $request->id;
        $this->validate($request, [
            'naziv' => [
                'required',
                'max:190',
                'unique:s_dobavljaci,naziv,' . $id,]
        ]);

        $data = Dobavljac::find($id);
        $data->naziv = $request->naziv;
        $data->adresa_mesto = $request->adresa_mesto;
        $data->adresa_ulica = $request->adresa_ulica;
        $data->adresa_broj = $request->adresa_broj;
        $data->telefon = $request->telefon;
        $data->email = $request->email;
        $data->link = $request->link;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return redirect()->route('dobavljaci');
    }

    public function postBrisanje(Request $request)
    {
        $data = Dobavljac::find($request->idBrisanje);
        $odgovor = $data->delete();

        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('dobavljaci');
    }

}
