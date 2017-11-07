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
Use App\Modeli\Racunar;



class ProcesoriKontroler extends Kontroler
{
    public function getLista()
    {
    	$procesori = ProcesorModel::all();
    	return view('modeli.procesori')->with(compact ('procesori'));
    }

    public function getDodavanje()
    {
        $proizvodjaci = Proizvodjac::all();
        $soketi = Soket::all();
        return view('modeli.procesori_dodavanje')->with(compact ('proizvodjaci', 'soketi'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
                'naziv' => ['required', 'max:50'],
            ]);

        $procesor = new ProcesorModel();
        $procesor->naziv = $request->naziv;
        $procesor->proizvodjac_id = $request->proizvodjac_id;
        $procesor->soket_id = $request->soket_id;
        $procesor->takt = $request->takt;
        $procesor->kes = $request->kes;
        $procesor->broj_jezgara = $request->broj_jezgara;
        $procesor->broj_niti = $request->broj_niti;
        $procesor->ocena = $request->ocena;
        $procesor->link = $request->link;
        $procesor->napomena = $request->napomena;

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

    public function postIzmena(Request $request, $id)
    {

            $this->validate($request, [
                'naziv' => ['required', 'max:50'],
            ]);
        
        $procesor = ProcesorModel::find($id);
        $procesor->naziv = $request->naziv;
        $procesor->proizvodjac_id = $request->proizvodjac_id;
        $procesor->soket_id = $request->soket_id;
        $procesor->takt = $request->takt;
        $procesor->kes = $request->kes;
        $procesor->broj_jezgara = $request->broj_jezgara;
        $procesor->broj_niti = $request->broj_niti;
        $procesor->ocena = $request->ocena;
        $procesor->link = $request->link;
        $procesor->napomena = $request->napomena;

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
        
        $data = ProcesorModel::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('procesori.modeli');
    }

    public function getRacunari($id)
    {   
        // Dobra fora za uvlachenje id u funkciju, kao i eliminisanje sa WhereHas
        $model = ProcesorModel::find($id);
        $racunari = Racunar::whereHas('procesori', function($query) use ($id){
            $query->where('procesori.procesor_model_id', '=', $id);
        })->get();
        return view('modeli.procesori_racunari')->with(compact ('racunari', 'model'));
    }

    public function getUredjaji($id)
    {   
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $procesori = Procesor::with(['racunar', 'stavkaOtpremnice.otpremnica'])->where('procesor_model_id', '=', $id)->get();
        $model = ProcesorModel::find($id);
        return view('modeli.procesori_uredjaji')->with(compact ('procesori', 'model'));
    }

}
