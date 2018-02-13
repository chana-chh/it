<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Kontroler;
use App\Modeli\MonitorModel;
use App\Modeli\Proizvodjac;
use App\Modeli\MonitorDijagonala;
use App\Modeli\Monitor;
use App\Modeli\MonitorPovezivanje;
use App\Modeli\Racunar;

class MonitoriKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $model = MonitorModel::all();
        return view('modeli.monitori')->with(compact('model'));
    }

    public function getDodavanje()
    {
        $proizvodjaci = Proizvodjac::all();
        $dijagonale = MonitorDijagonala::all();
        $povezivanje = MonitorPovezivanje::all();
        return view('modeli.monitori_dodavanje')->with(compact('proizvodjaci', 'dijagonale', 'povezivanje'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'naziv' => [
                'required',
                'unique:monitori_modeli,naziv'],
            'proizvodjac_id' => [
                'required'],
            'dijagonala_id' => [
                'required']
        ]);

        $data = new MonitorModel();
        $data->naziv = $request->naziv;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->dijagonala_id = $request->dijagonala_id;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        $data->povezivanja()->attach($request->povezivanja);

        Session::flash('uspeh', 'Model monitora je uspešno dodat!');
        return redirect()->route('monitori.modeli');
    }

    public function getIzmena($id)
    {
        $model = MonitorModel::find($id);
        $proizvodjaci = Proizvodjac::all();
        $dijagonale = MonitorDijagonala::all();
        $povezivanje = MonitorPovezivanje::all();
        return view('modeli.monitori_izmena')->with(compact('model', 'proizvodjaci', 'dijagonale', 'povezivanje'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'naziv' => [
                'required',
                'unique:monitori_modeli,naziv,' . $id],
            'proizvodjac_id' => [
                'required'],
            'dijagonala_id' => [
                'required']
        ]);

        $data = MonitorModel::find($id);

        $data->povezivanja()->detach();

        $data->naziv = $request->naziv;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->dijagonala_id = $request->dijagonala_id;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        $data->povezivanja()->attach($request->povezivanja);

        Session::flash('uspeh', 'Podaci o modelu monitora su uspešno izmenjeni!');
        return redirect()->route('monitori.modeli');
    }

    public function getDetalj($id)
    {
        $model = MonitorModel::find($id);
        $racunari = Racunar::whereHas('monitori', function($query) use ($id) {
                    $query->where('monitori.monitor_model_id', '=', $id);
                })->count();
        return view('modeli.monitori_detalj')->with(compact('model', 'racunari'));
    }

    public function postBrisanje(Request $request)
    {

        $data = MonitorModel::find($request->idBrisanje);
        $data->povezivanja()->detach();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('monitori.modeli');
    }

    public function getRacunari($id)
    {
        // Dobra fora za uvlachenje id u funkciju, kao i eliminisanje sa WhereHas
        $model = MonitorModel::find($id);
        $racunari = Racunar::whereHas('monitori', function($query) use ($id) {
                    $query->where('monitori.monitor_model_id', '=', $id);
                })->get();
        return view('modeli.monitori_racunari')->with(compact('racunari', 'model'));
    }

    public function getUredjaji($id)
    {
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $monitori = Monitor::with([
                    'racunar',
                    'stavkaOtpremnice.otpremnica'])->where('monitor_model_id', '=', $id)->get();
        $model = MonitorModel::find($id);
        return view('modeli.monitori_uredjaji')->with(compact('monitori', 'model'));
    }

}
