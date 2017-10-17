<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;

Use App\Modeli\ProcesorModel;
Use App\Modeli\Proizvodjac;
Use App\Modeli\Soket;


class ProcesoriKontroler extends Kontroler
{
    public function getLista()
    {
    	$procesori = ProcesorModel::all();
    	return view('modeli.procesori')->with(compact ('procesori'));
    }

    public function getDodavanje()
    {
        $procesori = ProcesorModel::all();
        $proizvodjaci = Proizvodjac::all();
        $soketi = Soket::all();
        return view('modeli.procesori_dodavanje')->with(compact ('procesori', 'proizvodjaci', 'soketi'));
    }

    public function postDodavanje(Request $req)
    {

        $this->validate($req, [
                'naziv' => ['required', 'max:50'],
            ]);

        $procesor = new ProcesorModel();
        $procesor->naziv = $req->naziv;
        $procesor->proizvodjac_id = $req->proizvodjac_id;
        $procesor->soket_id = $req->soket_id;
        $procesor->takt = $req->takt;
        $procesor->kes = $req->kes;
        $procesor->broj_jezgara = $req->broj_jezgara;
        $procesor->broj_niti = $req->broj_niti;
        $procesor->ocena = $req->ocena;
        $procesor->link = $req->link;
        $procesor->napomena = $req->napomena;

        $procesor->save();

        Session::flash('uspeh','Model procesora je uspešno dodata!');
        return redirect()->route('procesori.modeli');
    }

    public function getIzmena($id)
    {
        $procesor = ProcesorModel::find($id);
        $proizvodjaci = Proizvodjac::all();
        $soketi = Soket::all();
        return view('modeli.procesori_izmena')->with(compact ('procesor', 'proizvodjaci', 'soketi'));
    }

    public function postIzmena(Request $req, $id)
    {

            $this->validate($req, [
                'naziv' => ['required', 'max:50'],
            ]);
        
        $procesor = ProcesorModel::find($id);
        $procesor->naziv = $req->naziv;
        $procesor->proizvodjac_id = $req->proizvodjac_id;
        $procesor->soket_id = $req->soket_id;
        $procesor->takt = $req->takt;
        $procesor->kes = $req->kes;
        $procesor->broj_jezgara = $req->broj_jezgara;
        $procesor->broj_niti = $req->broj_niti;
        $procesor->ocena = $req->ocena;
        $procesor->link = $req->link;
        $procesor->napomena = $req->napomena;

        $procesor->save();

        Session::flash('uspeh','Podaci o modelu procesora su uspešno izmenjeni!');
        return redirect()->route('procesori.modeli');
    }

    public function getDetalj($id)
    {
        $procesor = ProcesorModel::find($id);
        return view('modeli.procesori_detalj')->with(compact ('procesor'));
    }

}
