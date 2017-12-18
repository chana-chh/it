<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Carbon\Carbon;

Use App\Modeli\Projektor;
Use App\Modeli\Racunar;
Use App\Modeli\OtpremnicaStavka;
Use App\Modeli\Otpremnica;
Use App\Modeli\Kancelarija;
Use App\Modeli\Nabavka;
Use App\Modeli\Reciklaza;



class ProjektoriKontroler extends Kontroler
{
    public function getLista()
    {
    	$uredjaj = Projektor::all();
    	return view('oprema.projektori')->with(compact ('uredjaj'));
    }

    public function getListaOtpisani()
    {
        $uredjaj = Projektor::onlyTrashed()->get();
        $reciklaze = Reciklaza::all();
        return view('oprema.projektori_otpisani')->with(compact ('uredjaj', 'reciklaze'));
    }

    public function getDetalj($id)
    {
        $uredjaj = Projektor::find($id);
        return view('oprema.projektori_detalj')->with(compact ('uredjaj'));
    }

    public function getIzmena($id)
    {
        $uredjaj = Projektor::find($id);
        $otpremnice = Otpremnica::all();
        $kancelarije = Kancelarija::all();
        $nabavke = Nabavka::all();
        return view('oprema.upsevi_izmena')->with(compact ('uredjaj', 'racunari', 'otpremnice', 'kancelarije', 'nabavke'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'ups_model_id' => ['required'],
            ]);

        $uredjaj = Ups::find($id);
        $uredjaj->inventarski_broj = $request->inventarski_broj;
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->ups_model_id = $request->ups_model_id;
        $uredjaj->racunar_id = $request->racunar_id;
        $uredjaj->kancelarija_id = $request->kancelarija_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->stavka_nabavke_id = $request->stavka_nabavke_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh','Ups je uspešno izmenjen!');
        return redirect()->route('upsevi.oprema');
    }

    public function postOtpis(Request $request)
    {

        $data = Ups::find($request->idOtpis);

        if ($data->racunar) {
            $uredjaj = $data->racunar;
            $ime = $uredjaj->ime;
            $kanc = $uredjaj->kancelarija->naziv;
            $data->racunar_id=null;
        }
        elseif($data->kancelarija){
            $ime = " nije bio vezan za računar";
            $kanc = $data->kancelarija->sviPodaci();
            
        }else{
            $ime = " nije bio vezan za računar";
            $kanc = " nema podataka";
        }
        

        $data->napomena .= 'q#q# PODACI O OTPISU:  ' . Auth::user()->name .' je dana:'. Carbon::now().' otpisao Ups koji je bio povezan za računar: '. $ime . ', kancelarija: ' . $kanc;
        $data->save();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Ups je uspešno otpisano!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom otpisa Ups-a. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('upsevi.oprema');
    }

    public function postOtpisVracanje(Request $request)
    {

        $data = Ups::withTrashed()->find($request->idVracanje);
        $data->restore();
        $odgovor = $data->save();

        if ($odgovor) {
            Session::flash('uspeh', 'Ups je uspešno vraćen u ponovnu upotrebu iz otpisa!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom vraćanja Ups-a iz otpisa. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('upsevi.oprema.otpisani');
    }

    public function postReciklirajLista(Request $request){

        $uredjaj = Ups::onlyTrashed()->whereNull('reciklirano_id')->get();
        $reciklaza = Reciklaza::find($request->reciklirano_id);

        return view('oprema.upsevi_recikliranje_lista')->with(compact ('uredjaj', 'reciklaza'));
    }

    public function postRecikliraj(Request $request, $id_reciklaze){

        if (!$request->id_uredjaji) {
            Session::flash('greska', 'Niste odabrali nijedan Ups!');
            return redirect()->route('upsevi.oprema.otpisani');
        }else{
        DB::beginTransaction();
        foreach ($request->id_uredjaji as $id) {
            try{
            $data = Ups::withTrashed()->find($id);
            $data->reciklirano_id = $id_reciklaze;
            $data->save();
        }catch (\Exception $e){
                DB::rollback();
                Session::flash('greska', 'Došlo je do greške prilikom stavljanja na listu reciklaže. Pokušajte ponovo, kasnije!');
                return redirect()->route('upsevi.oprema.otpisani');
        }
        }
        DB::commit();
        Session::flash('uspeh', 'Ups je uspešno stavljeno na listu reciklaže!');}
       return redirect()->route('upsevi.oprema.otpisani');
    }

}
