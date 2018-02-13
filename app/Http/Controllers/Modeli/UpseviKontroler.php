<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Kontroler;
use App\Modeli\UpsModel;
use App\Modeli\Proizvodjac;
use App\Modeli\TipBaterije;
use App\Modeli\Ups;

class UpseviKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $model = UpsModel::all();
        return view('modeli.upsevi')->with(compact('model'));
    }

    public function getDodavanje()
    {
        $proizvodjaci = Proizvodjac::all();
        $baterije = TipBaterije::all();
        return view('modeli.upsevi_dodavanje')->with(compact('proizvodjaci', 'baterije'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'naziv' => [
                'required',
                'unique:ups_modeli,naziv'],
            'proizvodjac_id' => [
                'required'],
            'tip_baterije_id' => [
                'required'],
            'broj_baterija' => [
                'required']
        ]);

        $data = new UpsModel();
        $data->naziv = $request->naziv;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->snaga = $request->snaga;
        $data->kapacitet = $request->kapacitet;
        $data->tip_baterije_id = $request->tip_baterije_id;
        $data->broj_baterija = $request->broj_baterija;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh', 'Model UPS je uspešno dodat!');
        return redirect()->route('upsevi.modeli');
    }

    public function getIzmena($id)
    {
        $model = UpsModel::find($id);
        $proizvodjaci = Proizvodjac::all();
        $baterije = TipBaterije::all();
        return view('modeli.upsevi_izmena')->with(compact('model', 'proizvodjaci', 'baterije'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'naziv' => [
                'required',
                'max:50',
                'unique:ups_modeli,naziv,' . $id],
            'proizvodjac_id' => [
                'required'],
            'tip_baterije_id' => [
                'required'],
            'broj_baterija' => [
                'required']
        ]);

        $data = UpsModel::find($id);
        $data->naziv = $request->naziv;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->snaga = $request->snaga;
        $data->kapacitet = $request->kapacitet;
        $data->tip_baterije_id = $request->tip_baterije_id;
        $data->broj_baterija = $request->broj_baterija;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh', 'Podaci o modelu UPS-a su uspešno izmenjeni!');
        return redirect()->route('upsevi.modeli');
    }

    public function getDetalj($id)
    {
        $model = UpsModel::find($id);
        return view('modeli.upsevi_detalj')->with(compact('model'));
    }

    public function postBrisanje(Request $request)
    {

        $data = UpsModel::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('upsevi.modeli');
    }

    public function getUredjaji($id)
    {
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $upsevi = Ups::with([
                    'racunar',
                    'stavkaOtpremnice.otpremnica'])->where('ups_model_id', '=', $id)->get();
        $model = UpsModel::find($id);
        return view('modeli.upsevi_uredjaji')->with(compact('upsevi', 'model'));
    }

}
