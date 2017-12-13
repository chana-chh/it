<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Carbon\Carbon;

Use App\Modeli\OsnovnaPloca;
Use App\Modeli\OsnovnaPlocaModel;
Use App\Modeli\Racunar;
Use App\Modeli\OtpremnicaStavka;
Use App\Modeli\Otpremnica;
Use App\Modeli\Reciklaza;
Use App\Modeli\Greska;



class OsnovnePloceKontroler extends Kontroler
{
    public function getLista()
    {
    	$uredjaj = OsnovnaPloca::all();
    	return view('oprema.osnovne_ploce')->with(compact ('uredjaj'));
    }

    public function getListaOtpisani()
    {
        $uredjaj = OsnovnaPloca::onlyTrashed()->get();
        $reciklaze = Reciklaza::all();
        return view('oprema.osnovne_ploce_otpisani')->with(compact ('uredjaj', 'reciklaze'));
    }

    public function getDetalj($id)
    {
        $uredjaj = OsnovnaPloca::find($id);
        $brojno_stanje = OsnovnaPloca::where('osnovna_ploca_model_id', '=', $uredjaj->osnovna_ploca_model_id)->count();
        return view('oprema.osnovne_ploce_detalj')->with(compact ('uredjaj', 'brojno_stanje'));
    }

    public function getIzmena($id)
    {
        $uredjaj = OsnovnaPloca::find($id);
        $modeli = OsnovnaPlocaModel::all();
        $racunari = Racunar::all();
        $otpremnice = Otpremnica::all();
        return view('oprema.osnovne_ploce_izmena')->with(compact ('uredjaj', 'modeli', 'racunari', 'otpremnice'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'osnovna_ploca_model_id' => ['required'],
            ]);

        $uredjaj = OsnovnaPloca::find($id);

        $stari_racunar = $uredjaj->racunar ? $uredjaj->racunar : false;
        $novi_racunar = $request->racunar_id ? Racunar::find($request->racunar_id) : false;

        if ($uredjaj->racunar && $request->racunar_id == null) {
            $stari_racunar->ploca_id = null;
            $stari_racunar->save();
            $greska = new Greska();
            $greska->greska = "Prilikom izmene osnovne ploče sa id-jem ".$uredjaj->id.", ista je uklonjena iz računara ".$stari_racunar->ime;
            $greska->save();
        }elseif ($uredjaj->racunar && $request->racunar_id) {
            $stari_racunar->ploca_id = null;
            $stari_racunar->save();
            $novi_racunar->ploca_id = $id;
            $novi_racunar->save();
            $greska = new Greska();
            $greska->greska = "Prilikom izmene osnovne ploče sa id-jem ".$uredjaj->id.", ista je iz računara ".$stari_racunar->ime."  premeštena u računar ".$novi_racunar->ime;
            $greska->save();
        }elseif (!$uredjaj->racunar && $request->racunar_id) {
            $novi_racunar->ploca_id = $id;
            $novi_racunar->save();
        }
       
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->osnovna_ploca_model_id = $request->osnovna_ploca_model_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh','Osnovna ploča je uspešno izmenjena!');
        return redirect()->route('osnovne_ploce.oprema');
    }

    public function postOtpis(Request $request)
    {

        $data = OsnovnaPloca::find($request->idOtpis);

        if ($data->racunar) {
            $uredjaj = $data->racunar;
            $ime = $uredjaj->ime;
            $kanc = $uredjaj->kancelarija->naziv;
            $uredjaj->ploca_id=null;
        }
        else{
            $ime = " nije bio u računaru";
            $kanc = " nema podataka";
        }

        $data->napomena .= 'q#q# PODACI O OTPISU:  ' . Auth::user()->name .'je dana:'. Carbon::now().' otpisao  osnovnu ploču koja je bila u računaru: '. $ime . ', kancelarija: ' . $kanc;
        $data->save();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Osnovna ploča je uspešno otpisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom otpisa osnovne ploče. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('osnovne_ploce.oprema');
    }

    public function postOtpisVracanje(Request $request)
    {

        $data = OsnovnaPloca::withTrashed()->find($request->idVracanje);
        $data->restore();
        if (!$data->stavkaOtpremnice) {
              $data->stavka_otpremnice_id = 1; //Stavka otpremnice rezervisana za stare ploce
          }
        $odgovor = $data->save();

        if ($odgovor) {
            Session::flash('uspeh', 'Osnovna ploča je uspešno vraćena u ponovnu upotrebu iz otpisa!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom vraćanja iz otpisa osnovne ploče. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('osnovne_ploce.oprema.otpisani');
    }

    public function postReciklirajLista(Request $request){

        $uredjaj = OsnovnaPloca::onlyTrashed()->whereNull('reciklirano_id')->get();
        $reciklaza = Reciklaza::find($request->reciklirano_id);

        return view('oprema.osnovne_ploce_recikliranje_lista')->with(compact ('uredjaj', 'reciklaza'));
    }

    public function postRecikliraj(Request $request, $id_reciklaze){

        if (!$request->id_uredjaji) {
            Session::flash('greska', 'Niste odabrali nijedanu osnovnu ploču!');
            return redirect()->route('osnovne_ploce.oprema.otpisani');
        }else{
        DB::beginTransaction();
        foreach ($request->id_uredjaji as $id) {
            try{
            $data = OsnovnaPloca::withTrashed()->find($id);
            $data->reciklirano_id = $id_reciklaze;
            $data->save();
        }catch (\Exception $e){
                DB::rollback();
                Session::flash('greska', 'Došlo je do greške prilikom stavljanja na listu reciklaže. Pokušajte ponovo, kasnije!');
                return redirect()->route('osnovne_ploce.oprema.otpisani');
        }
        }
        DB::commit();
        Session::flash('uspeh', 'Osnovna ploča je uspešno stavljen na listu reciklaže!');}
       return redirect()->route('osnovne_ploce.oprema.otpisani');
    }

}
