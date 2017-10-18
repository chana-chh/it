<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;

Use App\Modeli\ProcesorModel;
Use App\Modeli\Proizvodjac;
Use App\Modeli\Soket;
Use App\Modeli\Procesor;


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
        $racunari = DB::table('procesori')->where([
            ['procesor_model_id', '=', $id],
            ['racunar_id', '<>', null],
        ])->count();
        return view('modeli.procesori_detalj')->with(compact ('procesor', 'racunari'));
    }

    public function postBrisanje(Request $request) {
        $data = ProcesorModel::find($request->id);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
    }

    public function getRacunari($id)
    {
        $procesori = ProcesorModel::all();
        return view('modeli.procesori')->with(compact ('procesori'));
    }

    public function getUredjaji($id)
    {
        $procesori = Procesor::where('procesor_model_id', '=', $id)->get();
        return view('modeli.procesori_uredjaji')->with(compact ('procesori'));
    }

}
