<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;

use App\Modeli\Email;



class ZaposleniEmailoviKontroler extends Kontroler
{

    public function postDodavanje(Request $req)
    {

        $this->validate($req, [
                'email_dodavanje_adresa' => ['required', 'email'],
            ]);

        //Check-box
            if ($req->email_dodavanje_sluzbeni) {
                $sluzbenac = 1;
            } else {
                $sluzbenac = 0;
            }

        $zaposleni_id = $req->zaposleni_id;

        $email = new Email();
        $email->adresa = $req->email_dodavanje_adresa;
        $email->sluzbena = $sluzbenac;
        $email->lozinka = $req->lozinka;
        $email->zaposleni_id = $zaposleni_id;
        $email->napomena = $req->email_dodavanje_napomena;

        $email->save();

        Session::flash('uspeh','Adresa elektronske pošte korisnika je uspešno dodata!');
        return redirect()->route('zaposleni.detalj', $zaposleni_id);
    }

    public function postBrisanje(Request $req)
    {
        $email = Email::find($req->id);
        $odgovor = $email->delete();

        if ($odgovor) 
        {
                Session::flash('uspeh','Stavka je uspešno obrisana!');
        }
        else
        {
                Session::flash('greska','Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
    }

    public function postDetalj(Request $req)
    {
        if($req->ajax()){
                $id = $req->id;
                $email = Email::find($id);
                return response()->json($email);
            }
    }

    public function postIzmena(Request $req)
    {
        $this->validate($req, [
             'email_izmena_adresa' => ['required', 'email'],
        ]);

        if ($req->email_izmena_sluzbeni) {
                $sluzbenic = 1;
            } else {
                $sluzbenic = 0;
            }

        $email = Email::find($req->email_id);
        $email->adresa = $req->email_izmena_adresa;
        $email->sluzbena = $sluzbenic;
        $email->lozinka = $req->lozinka;
        $email->zaposleni_id = $req->zaposleni_id;
        $email->napomena = $req->email_izmena_napomena;

        $email->save();

        Session::flash('uspeh','Adresa elektronske pošte je uspešno izmenjena!');
        return redirect()->route('zaposleni.detalj', $req->zaposleni_id);
    }
}
