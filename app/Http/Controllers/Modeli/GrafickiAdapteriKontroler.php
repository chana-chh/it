<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Kontroler;
use App\Modeli\GrafickiAdapterModel;
use App\Modeli\Proizvodjac;
use App\Modeli\TipMemorije;
use App\Modeli\VgaSlot;
use App\Modeli\GrafickiAdapter;
use App\Modeli\Racunar;
use App\Modeli\MonitorPovezivanje;

class GrafickiAdapteriKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $vga = GrafickiAdapterModel::all();
        return view('modeli.vga')->with(compact('vga'));
    }

    public function getDodavanje()
    {
        $proizvodjaci = Proizvodjac::all();
        $tip = TipMemorije::all();
        $slotovi = VgaSlot::all();
        $povezivanje = MonitorPovezivanje::all();
        return view('modeli.vga_dodavanje')->with(compact('proizvodjaci', 'tip', 'slotovi', 'povezivanje'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'naziv' => [
                'required',
                'unique:graficki_adapteri_modeli,naziv'],
            'cip' => [
                'required'],
            'proizvodjac_id' => [
                'required'],
            'tip_memorije_id' => [
                'required'],
            'vga_slot_id' => [
                'required'],
            'kapacitet_memorije' => [
                'required',
                'integer'],
        ]);

        $data = new GrafickiAdapterModel();
        $data->naziv = $request->naziv;
        $data->cip = $request->cip;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->tip_memorije_id = $request->tip_memorije_id;
        $data->vga_slot_id = $request->vga_slot_id;
        $data->kapacitet_memorije = $request->kapacitet_memorije;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        $data->povezivanja()->attach($request->povezivanja);

        Session::flash('uspeh', 'Model grafičkog adaptera je uspešno dodat!');
        return redirect()->route('vga.modeli');
    }

    public function getIzmena($id)
    {
        $vga = GrafickiAdapterModel::find($id);
        $proizvodjaci = Proizvodjac::all();
        $tip = TipMemorije::all();
        $slotovi = VgaSlot::all();
        $povezivanje = MonitorPovezivanje::all();
        return view('modeli.vga_izmena')->with(compact('vga', 'proizvodjaci', 'tip', 'slotovi', 'povezivanje'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'naziv' => [
                'required',
                'unique:graficki_adapteri_modeli,naziv,' . $id],
            'cip' => [
                'required'],
            'proizvodjac_id' => [
                'required'],
            'tip_memorije_id' => [
                'required'],
            'vga_slot_id' => [
                'required'],
            'kapacitet_memorije' => [
                'required',
                'integer'],
        ]);

        $data = GrafickiAdapterModel::find($id);

        $data->povezivanja()->detach();

        $data->naziv = $request->naziv;
        $data->cip = $request->cip;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->tip_memorije_id = $request->tip_memorije_id;
        $data->vga_slot_id = $request->vga_slot_id;
        $data->kapacitet_memorije = $request->kapacitet_memorije;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        $data->povezivanja()->attach($request->povezivanja);

        Session::flash('uspeh', 'Podaci o modelu grafičkog adaptera su uspešno izmenjeni!');
        return redirect()->route('vga.modeli');
    }

    public function getDetalj($id)
    {
        // U WhereHas metodi kao prvi parametar navodi se metoda relacije iz modela - grafickiAdapteri(), a ne naziv tabele
        $vga = GrafickiAdapterModel::find($id);
        $racunari = Racunar::whereHas('grafickiAdapteri', function($query) use ($id) {
                    $query->where('graficki_adapteri.graficki_adapter_model_id', '=', $id);
                })->count();
        return view('modeli.vga_detalj')->with(compact('vga', 'racunari'));
    }

    public function postBrisanje(Request $request)
    {

        $data = GrafickiAdapterModel::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('vga.modeli');
    }

    public function getRacunari($id)
    {
        // Dobra fora za uvlachenje id u funkciju, kao i eliminisanje sa WhereHas
        $model = GrafickiAdapterModel::find($id);
        $racunari = Racunar::whereHas('grafickiAdapteri', function($query) use ($id) {
                    $query->where('graficki_adapteri.graficki_adapter_model_id', '=', $id);
                })->get();
        return view('modeli.vga_racunari')->with(compact('racunari', 'model'));
    }

    public function getUredjaji($id)
    {
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $vga = GrafickiAdapter::with([
                    'racunar',
                    'stavkaOtpremnice.otpremnica'])->where('graficki_adapter_model_id', '=', $id)->get();
        $model = GrafickiAdapterModel::find($id);
        return view('modeli.vga_uredjaji')->with(compact('vga', 'model'));
    }

}
