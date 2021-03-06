<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Email;
use App\Modeli\Zaposleni;

class EmailKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin')->except('getLista');
        $this->middleware('can:korisnik')->only('getLista');
    }

    public function getLista()
    {
        $data = Email::with('zaposleni')->get();
        $radnici = Zaposleni::with('uprava')->orderBy('ime', 'asc')->orderBy('prezime', 'asc')->get();
        return view('sifarnici.email')->with(compact('data', 'radnici'));
    }

    public function getListaLozinke()
    {
        $data = Email::with('zaposleni')->get();
        return view('sifarnici.email_loz')->with(compact('data'));
    }

    public function getListaBezLozinke()
    {
        $data = Email::with('zaposleni')->where('lozinka', null)->get();
        return view('sifarnici.email_loz_bez')->with(compact('data'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'adresa' => [
                'email',
                'required',
            ],
        ]);

        //Check-box
        if ($request->sluzbena) {
            $sluzbenic = 1;
        } else {
            $sluzbenic = 0;
        }

        $data = new Email();
        $data->adresa = $request->adresa;
        $data->sluzbena = $sluzbenic;
        $data->lozinka = $request->lozinka;
        $data->zaposleni_id = $request->zaposleni_id;
        $data->napomena = $request->napomena;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('email');
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->id;
            $email = Email::find($id);
            $zaposleni = Zaposleni::all();
            return response()->json(array('zaposleni' => $zaposleni, 'email' => $email));
        }
    }

    public function postIzmena(Request $request)
    {

        $id = $request->idModal;
        $this->validate($request, [
            'adresaModal' => [
                'email',
                'required',
            ],
        ]);

        //Check-box
        if ($request->sluzbenaModal) {
            $sluzbenic = 1;
        } else {
            $sluzbenic = 0;
        }

        $data = Email::find($id);
        $data->adresa = $request->adresaModal;
        $data->sluzbena = $sluzbenic;
        $data->lozinka = $request->lozinkaModal;
        $data->zaposleni_id = $request->zaposleniIdModal;
        $data->napomena = $request->napomenaModal;
        $data->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {
        $data = Email::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

    public function getStampa($id)
    {
        $mail = Email::find($id);
        return view('sifarnici.email_stampa')->with(compact('mail'));
    }

}
