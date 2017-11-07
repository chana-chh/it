<?php

namespace App\Http\Controllers\Modeli;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;

Use App\Modeli\StampacModel;
Use App\Modeli\Proizvodjac;
Use App\Modeli\TipStampaca;
Use App\Modeli\Toner;
Use App\Modeli\Stampac;
Use App\Modeli\Racunar;



class StampaciKontroler extends Kontroler
{
    public function getLista()
    {
    	$model = StampacModel::all();
    	return view('modeli.stampaci')->with(compact ('model'));
    }

    public function getDodavanje()
    {
        $proizvodjaci = Proizvodjac::all();
        $tipovi = TipStampaca::all();
        $toneri = Toner::all();
        return view('modeli.stampaci_dodavanje')->with(compact ('proizvodjaci', 'tipovi', 'toneri'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
               'naziv' => ['required','max:255','unique:stampaci_modeli,naziv'],
               'proizvodjac_id' => ['required'],
               'toner_id' => ['required'],
               'tip_stampaca_id' => ['required']
            ]);

        $data = new StampacModel();
        $data->naziv = $request->naziv;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->toner_id = $request->toner_id;
        $data->tip_stampaca_id = $request->tip_stampaca_id;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh','Model štampaca je uspešno dodat!');
        return redirect()->route('stampaci.modeli');
    }

    public function getIzmena($id)
    {
        $model = StampacModel::find($id);
        $proizvodjaci = Proizvodjac::all();
        $tipovi = TipStampaca::all();
        $toneri = Toner::all();
        return view('modeli.stampaci_izmena')->with(compact ('model', 'proizvodjaci', 'tipovi', 'toneri'));
    }

    public function postIzmena(Request $request, $id)
    {

            $this->validate($request, [
                'naziv' => ['required','max:255','unique:stampaci_modeli,naziv,' .$id],
                'proizvodjac_id' => ['required'],
                'toner_id' => ['required'],
                'tip_stampaca_id' => ['required']
            ]);
        
        $data = StampacModel::find($id);
        $data->naziv = $request->naziv;
        $data->proizvodjac_id = $request->proizvodjac_id;
        $data->toner_id = $request->toner_id;
        $data->tip_stampaca_id = $request->tip_stampaca_id;
        $data->link = $request->link;
        $data->napomena = $request->napomena;

        $data->save();

        Session::flash('uspeh','Podaci o modelu štampača su uspešno izmenjeni!');
        return redirect()->route('stampaci.modeli');
    }

    public function getDetalj($id)
    {
        $model = StampacModel::find($id);
        $racunari = DB::table('stampaci')->where([
            ['stampac_model_id', '=', $id],
            ['racunar_id', '<>', null],
        ])->count();
        return view('modeli.stampaci_detalj')->with(compact ('model', 'racunari'));
    }

    public function postBrisanje(Request $request) {
        
        $data = StampacModel::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('stampaci.modeli');
    }

    public function getRacunari($id)
    {   
        // Dobra fora za uvlachenje id u funkciju, kao i eliminisanje sa WhereHas
        $model = StampacModel::find($id);
        $racunari = Racunar::whereHas('stampaci', function($query) use ($id){
            $query->where('stampaci.stampac_model_id', '=', $id);
        })->get();
        return view('modeli.stampaci_racunari')->with(compact ('racunari', 'model'));
    }

    public function getUredjaji($id)
    {   
        //Dobra fora za pozivanje dodatnih relacija sa Tockicom.SledecaRElacija
        $stampaci = Stampac::with(['racunar', 'stavkaOtpremnice.otpremnica'])->where('stampac_model_id', '=', $id)->get();
        $model = StampacModel::find($id);
        return view('modeli.stampaci_uredjaji')->with(compact ('stampaci', 'model'));
    }

}
