<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Kontroler;
use App\Modeli\MemorijaModel;
use App\Modeli\Proizvodjac;
use App\Modeli\TipMemorije;
use App\Modeli\Memorija;
use App\Modeli\Racunar;

class MemorijeKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $memorije = MemorijaModel::all();
        return view('modeli.memorije')->with(compact('memorije'));
    }

    public function getDodavanje()
    {
        $proizvodjaci = Proizvodjac::all();
        $tip = TipMemorije::all();
        return view('modeli.memorije_dodavanje')->with(compact('proizvodjaci', 'tip'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'naziv' => [
                'required',
                'unique:memorije_modeli,naziv'],
            'proizvodjac_id' => [
                'required'],
            'tip_memorije_id' => [
                'required'],
            'brzina' => [
                'required',
                'integer'],
            'kapacitet' => [
                'required',
                'integer'],
            'ocena' => [
                'required',
                'integer'],
        ]);

        $data = new MemorijaModel();
        $data->naziv = $request->naziv;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->tip_memorije_id = $request->tip_memorije_id;
        $data->brzina = $request->brzina;
        $data->kapacitet = $request->kapacitet;
        $data->ocena = $request->ocena;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh', 'Model memorije je uspešno dodata!');
        return redirect()->route('memorije.modeli');
    }

    public function getIzmena($id)
    {
        $memorija = MemorijaModel::find($id);
        $proizvodjaci = Proizvodjac::all();
        $tip = TipMemorije::all();
        return view('modeli.memorije_izmena')->with(compact('memorija', 'proizvodjaci', 'tip'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'naziv' => [
                'required',
                'unique:memorije_modeli,naziv,' . $id],
            'proizvodjac_id' => [
                'required'],
            'tip_memorije_id' => [
                'required'],
            'brzina' => [
                'required',
                'integer'],
            'kapacitet' => [
                'required',
                'integer'],
            'ocena' => [
                'required',
                'integer'],
        ]);

        $data = MemorijaModel::find($id);
        $stara_ocena = $data->ocena;

        $data->naziv = $request->naziv;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->tip_memorije_id = $request->tip_memorije_id;
        $data->brzina = $request->brzina;
        $data->kapacitet = $request->kapacitet;
        $data->ocena = $request->ocena;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        if ($stara_ocena != $data->ocena) {

            $racunari = Racunar::WhereHas('memorije', function ($query) use ($data){
            $query->where('memorija_model_id', '=', $data->id);
            })->get();

            foreach ($racunari as $rac) {
                $rac->ocena = $rac->oceniMe();
                $rac->save();
            }
        }

        Session::flash('uspeh', 'Podaci o modelu memorije su uspešno izmenjeni!');
        return redirect()->route('memorije.modeli');
    }

    public function getDetalj($id)
    {
        $memorija = MemorijaModel::find($id);
        $racunari = Racunar::whereHas('memorije', function($query) use ($id) {
                    $query->where('memorije.memorija_model_id', '=', $id);
                })->count();
        return view('modeli.memorije_detalj')->with(compact('memorija', 'racunari'));
    }

    public function postBrisanje(Request $request)
    {

        $data = MemorijaModel::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('memorije.modeli');
    }

    public function getRacunari($id)
    {
        // Dobra fora za uvlachenje id u funkciju, kao i eliminisanje sa WhereHas
        $model = MemorijaModel::find($id);
        $racunari = Racunar::whereHas('memorije', function($query) use ($id) {
                    $query->where('memorije.memorija_model_id', '=', $id);
                })->get();
        return view('modeli.memorije_racunari')->with(compact('racunari', 'model'));
    }

    public function getUredjaji($id)
    {
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $memorije = Memorija::with([
                    'racunar',
                    'stavkaOtpremnice.otpremnica'])->where('memorija_model_id', '=', $id)->get();
        $model = MemorijaModel::find($id);
        return view('modeli.memorije_uredjaji')->with(compact('memorije', 'model'));
    }

}
