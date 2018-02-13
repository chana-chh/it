<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Kontroler;
use App\Modeli\HddModel;
use App\Modeli\Proizvodjac;
use App\Modeli\HddPovezivanje;
use App\Modeli\Racunar;
use App\Modeli\Hdd;

class HddKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $hddovi = HddModel::all();
        return view('modeli.hddovi')->with(compact('hddovi'));
    }

    public function getDodavanje()
    {
        $proizvodjaci = Proizvodjac::all();
        $povezivanja = HddPovezivanje::all();
        return view('modeli.hddovi_dodavanje')->with(compact('proizvodjaci', 'povezivanja'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'proizvodjac_id' => [
                'required'],
            'povezivanje_id' => [
                'required'],
            'kapacitet' => [
                'required'],
            'ocena' => [
                'required'],
        ]);

        if ($request->ssd) {
            $ssdc = 1;
        } else {
            $ssdc = 0;
        }

        $data = new HddModel();
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->povezivanje_id = $request->povezivanje_id;
        $data->kapacitet = $request->kapacitet;
        $data->ssd = $ssdc;
        $data->ocena = $request->ocena;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh', 'Model čvrstog diska je uspešno dodata!');
        return redirect()->route('hddovi.modeli');
    }

    public function getIzmena($id)
    {
        $hddovi = HddModel::find($id);
        $proizvodjaci = Proizvodjac::all();
        $povezivanja = HddPovezivanje::all();
        return view('modeli.hddovi_izmena')->with(compact('hddovi', 'proizvodjaci', 'povezivanja'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'proizvodjac_id' => [
                'required'],
            'povezivanje_id' => [
                'required'],
            'kapacitet' => [
                'required'],
            'ocena' => [
                'required'],
        ]);

        if ($request->ssd) {
            $ssdc = 1;
        } else {
            $ssdc = 0;
        }

        $data = HddModel::find($id);
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->povezivanje_id = $request->povezivanje_id;
        $data->kapacitet = $request->kapacitet;
        $data->ssd = $ssdc;
        $data->ocena = $request->ocena;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh', 'Podaci o modelu čvrstih diskova su uspešno izmenjeni!');
        return redirect()->route('hddovi.modeli');
    }

    public function getDetalj($id)
    {
        $hdd = HddModel::find($id);
        $racunari = Racunar::whereHas('hddovi', function($query) use ($id) {
                    $query->where('hdd.hdd_model_id', '=', $id);
                })->count();
        return view('modeli.hddovi_detalj')->with(compact('hdd', 'racunari'));
    }

    public function postBrisanje(Request $request)
    {

        $data = HddModel::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('hddovi.modeli');
    }

    public function getRacunari($id)
    {
        // Dobra fora za uvlachenje id u funkciju, kao i eliminisanje sa WhereHas
        $model = HddModel::find($id);
        $racunari = Racunar::whereHas('hddovi', function($query) use ($id) {
                    $query->where('hdd.hdd_model_id', '=', $id);
                })->get();
        return view('modeli.hddovi_racunari')->with(compact('racunari', 'model'));
    }

    public function getUredjaji($id)
    {
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $hddovi = Hdd::with([
                    'racunar',
                    'stavkaOtpremnice.otpremnica'])->where('hdd_model_id', '=', $id)->get();
        $model = HddModel::find($id);
        return view('modeli.hddovi_uredjaji')->with(compact('hddovi', 'model'));
    }

}
