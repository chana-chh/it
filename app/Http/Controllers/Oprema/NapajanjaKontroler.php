<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Carbon\Carbon;

Use App\Modeli\Napajanje;
Use App\Modeli\NapajanjeModel;
Use App\Modeli\Racunar;
Use App\Modeli\OtpremnicaStavka;
Use App\Modeli\Otpremnica;
Use App\Modeli\Reciklaza;



class NapajanjaKontroler extends Kontroler
{
    public function getLista()
    {
    	$uredjaj = Napajanje::all();
    	return view('oprema.napajanja')->with(compact ('uredjaj'));
    }

    public function getListaOtpisani()
    {
        $uredjaj = Napajanje::onlyTrashed()->get();
        $reciklaze = Reciklaza::all();
        return view('oprema.napajanja_otpisani')->with(compact ('uredjaj', 'reciklaze'));
    }

    public function getDetalj($id)
    {
        $uredjaj = Napajanje::find($id);
        $brojno_stanje = Napajanje::where('napajanje_model_id', '=', $uredjaj->napajanje_model_id)->count();
        return view('oprema.napajanja_detalj')->with(compact ('uredjaj', 'brojno_stanje'));
    }

    public function getIzmena($id)
    {
        $uredjaj = Napajanje::find($id);
        $modeli = NapajanjeModel::all();
        $racunari = Racunar::all();
        $otpremnice = Otpremnica::all();
        return view('oprema.napajanja_izmena')->with(compact ('uredjaj', 'modeli', 'racunari', 'otpremnice'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'napajanje_model_id' => ['required'],
            ]);

        $uredjaj = Napajanje::find($id);
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->napajanje_model_id = $request->napajanje_model_id;
        $uredjaj->racunar_id = $request->racunar_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh','Napajanje je uspešno izmenjeno!');
        return redirect()->route('napajanja.oprema');
    }

    public function postOtpis(Request $request)
    {

        $data = Napajanje::find($request->idOtpis);

        if ($data->racunar) {
            $uredjaj = $data->racunar;
            $ime = $uredjaj->ime;
            $kanc = $uredjaj->kancelarija->naziv;
            $data->racunar_id=null;
        }
        else{
            $ime = " nije bilo u računaru";
            $kanc = " nema podataka";
        }

        $data->napomena .= 'q#q# PODACI O OTPISU:  ' . Auth::user()->name .' je dana:'. Carbon::now().' otpisao napajanje koje je bilo u računaru: '. $ime . ', kancelarija: ' . $kanc;
        $data->save();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Napajanje je uspešno otpisano!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom otpisa napajanja. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('napajanja.oprema');
    }

    public function postOtpisVracanje(Request $request)
    {

        $data = Napajanje::withTrashed()->find($request->idVracanje);
        $data->restore();
        if (!$data->stavkaOtpremnice) {
              $data->stavka_otpremnice_id = 6; //Stavka otpremnice rezervisana za stare napajanja
          }
        $odgovor = $data->save();

        if ($odgovor) {
            Session::flash('uspeh', 'Napajanje je uspešno vraćen u ponovnu upotrebu iz otpisa!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom vraćanja napajanja iz otpisa. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('napajanja.oprema.otpisani');
    }

    public function postReciklirajLista(Request $request){

        $uredjaj = Napajanje::onlyTrashed()->whereNull('reciklirano_id')->get();
        $reciklaza = Reciklaza::find($request->reciklirano_id);

        return view('oprema.napajanja_recikliranje_lista')->with(compact ('uredjaj', 'reciklaza'));
    }

    public function postRecikliraj(Request $request, $id_reciklaze){

        if (!$request->id_uredjaji) {
            Session::flash('greska', 'Niste odabrali nijedano napajanje!');
            return redirect()->route('napajanja.oprema.otpisani');
        }else{
        DB::beginTransaction();
        foreach ($request->id_uredjaji as $id) {
            try{
            $data = Napajanje::withTrashed()->find($id);
            $data->reciklirano_id = $id_reciklaze;
            $data->save();
        }catch (\Exception $e){
                DB::rollback();
                Session::flash('greska', 'Došlo je do greške prilikom stavljanja na listu reciklaže. Pokušajte ponovo, kasnije!');
                return redirect()->route('napajanja.oprema.otpisani');
        }
        }
        DB::commit();
        Session::flash('uspeh', 'Napajanje je uspešno stavljeno na listu reciklaže!');}
       return redirect()->route('napajanja.oprema.otpisani');
    }

}
