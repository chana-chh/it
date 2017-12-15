<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Carbon\Carbon;

Use App\Modeli\GrafickiAdapter;
Use App\Modeli\GrafickiAdapterModel;
Use App\Modeli\Racunar;
Use App\Modeli\OtpremnicaStavka;
Use App\Modeli\Otpremnica;
Use App\Modeli\Reciklaza;



class GrafickiAdapteriKontroler extends Kontroler
{
    public function getLista()
    {
    	$uredjaj = GrafickiAdapter::all();
    	return view('oprema.vga')->with(compact ('uredjaj'));
    }

    public function getListaOtpisani()
    {
        $uredjaj = GrafickiAdapter::onlyTrashed()->get();
        $reciklaze = Reciklaza::all();
        return view('oprema.vga_otpisani')->with(compact ('uredjaj', 'reciklaze'));
    }

    public function getDetalj($id)
    {
        $uredjaj = GrafickiAdapter::find($id);
        $brojno_stanje = GrafickiAdapter::where('graficki_adapter_model_id', '=', $uredjaj->graficki_adapter_model_id)->count();
        return view('oprema.vga_detalj')->with(compact ('uredjaj', 'brojno_stanje'));
    }

    public function getIzmena($id)
    {
        $uredjaj = GrafickiAdapter::find($id);
        $modeli = GrafickiAdapterModel::all();
        $racunari = Racunar::all();
        $otpremnice = Otpremnica::all();
        return view('oprema.vga_izmena')->with(compact ('uredjaj', 'modeli', 'racunari', 'otpremnice'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'graficki_adapter_model_id' => ['required'],
            ]);

        $uredjaj = GrafickiAdapter::find($id);
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->graficki_adapter_model_id = $request->graficki_adapter_model_id;
        $uredjaj->racunar_id = $request->racunar_id;
        $uredjaj->stavka_otpremnice_id = $request->stavka_otpremnice_id;
        $uredjaj->napomena = $request->napomena;

        $uredjaj->save();

        Session::flash('uspeh','Grafički adapter je uspešno izmenjen!');
        return redirect()->route('vga.oprema');
    }

    public function postOtpis(Request $request)
    {

        $data = GrafickiAdapter::find($request->idOtpis);

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

        $data->napomena .= 'q#q# PODACI O OTPISU:  ' . Auth::user()->name .' je dana:'. Carbon::now().' otpisao grafički adapter koji je bio u računaru: '. $ime . ', kancelarija: ' . $kanc;
        $data->save();
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Grafički adapter je uspešno otpisan!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom otpisa grafičkog adaptera. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('vga.oprema');
    }

    public function postOtpisVracanje(Request $request)
    {

        $data = GrafickiAdapter::withTrashed()->find($request->idVracanje);
        $data->restore();
        if (!$data->stavkaOtpremnice) {
              $data->stavka_otpremnice_id = 3; //Stavka otpremnice rezervisana za stare graficke adaptere
          }
        $odgovor = $data->save();

        if ($odgovor) {
            Session::flash('uspeh', 'Grafički adapter je uspešno vraćen u ponovnu upotrebu iz otpisa!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom vraćanja grafičkog adaptera iz otpisa. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('vga.oprema.otpisani');
    }

    public function postReciklirajLista(Request $request){

        $uredjaj = GrafickiAdapter::onlyTrashed()->whereNull('reciklirano_id')->get();
        $reciklaza = Reciklaza::find($request->reciklirano_id);

        return view('oprema.vga_recikliranje_lista')->with(compact ('uredjaj', 'reciklaza'));
    }

    public function postRecikliraj(Request $request, $id_reciklaze){

        if (!$request->id_uredjaji) {
            Session::flash('greska', 'Niste odabrali nijedan grafički adapter!');
            return redirect()->route('vga.oprema.otpisani');
        }else{
        DB::beginTransaction();
        foreach ($request->id_uredjaji as $id) {
            try{
            $data = GrafickiAdapter::withTrashed()->find($id);
            $data->reciklirano_id = $id_reciklaze;
            $data->save();
        }catch (\Exception $e){
                DB::rollback();
                Session::flash('greska', 'Došlo je do greške prilikom stavljanja na listu reciklaže. Pokušajte ponovo, kasnije!');
                return redirect()->route('vga.oprema.otpisani');
        }
        }
        DB::commit();
        Session::flash('uspeh', 'Grafički adapter je uspešno stavljen na listu reciklaže!');}
       return redirect()->route('vga.oprema.otpisani');
    }

}
