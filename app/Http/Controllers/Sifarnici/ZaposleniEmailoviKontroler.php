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
                'adresa' => ['required'],
            ]);

        //Check-box
            if ($req->sluzbena) {
                $sluzbenac = 1;
            } else {
                $sluzbenac = 0;
            }

        $zaposleni_id = $req->zaposleni_id;

        $email = new Email();
        $email->adresa = $req->adresa;
        $email->sluzbena = $sluzbenac;
        $email->zaposleni_id = $zaposleni_id;
        $email->napomena = $req->napomena;

        $email->save();

        Session::flash('uspeh','Adresa elektronske poste korisnika je uspešno dodata!');
        return redirect()->route('zaposleni.detalj', $zaposleni_id);
    }
}
