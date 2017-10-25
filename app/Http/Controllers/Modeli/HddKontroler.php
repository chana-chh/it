<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;

Use App\Modeli\HddModel;
Use App\Modeli\Proizvodjac;
Use App\Modeli\HddPovezivanje;
Use App\Modeli\Racunar;



class HddKontroler extends Kontroler
{
    public function getLista()
    {
    	$hddovi = HddModel::all();
    	return view('modeli.hddovi')->with(compact ('hddovi'));
    }

    public function getDodavanje()
    {
        $procesori = HddModel::all();
        $proizvodjaci = Proizvodjac::all();
        $soketi = Soket::all();
        return view('modeli.procesori_dodavanje')->with(compact ('procesori', 'proizvodjaci', 'soketi'));
    }

    public function postDodavanje(Request $req)
    {

        $this->validate($req, [
                'naziv' => ['required', 'max:50'],
            ]);

        $procesor = new HddModel();
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
        $procesor = HddModel::find($id);
        $proizvodjaci = Proizvodjac::all();
        $soketi = Soket::all();
        return view('modeli.procesori_izmena')->with(compact ('procesor', 'proizvodjaci', 'soketi'));
    }

    public function postIzmena(Request $req, $id)
    {

            $this->validate($req, [
                'naziv' => ['required', 'max:50'],
            ]);
        
        $procesor = HddModel::find($id);
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
        $procesor = HddModel::find($id);
        $racunari = DB::table('procesori')->where([
            ['procesor_model_id', '=', $id],
            ['racunar_id', '<>', null],
        ])->count();
        return view('modeli.procesori_detalj')->with(compact ('procesor', 'racunari'));
    }

    public function postBrisanje(Request $request) {
        
        $data = HddModel::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

    public function getRacunari($id)
    {   
        // Dobra fora za uvlachenje id u funkciju, kao i eliminisanje sa WhereHas
        $model = HddModel::find($id);
        $racunari = Racunar::whereHas('procesori', function($query) use ($id){
            $query->where('procesori.procesor_model_id', '=', $id);
        })->get();
        return view('modeli.procesori_racunari')->with(compact ('racunari', 'model'));
    }

    public function getUredjaji($id)
    {   
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $procesori = Procesor::with(['racunar', 'stavkaOtpremnice.otpremnica'])->where('procesor_model_id', '=', $id)->get();
        $model = HddModel::find($id);
        return view('modeli.procesori_uredjaji')->with(compact ('procesori', 'model'));
    }

}