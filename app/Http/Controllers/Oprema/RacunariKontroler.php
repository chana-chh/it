<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Kontroler;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
Use App\Modeli\Racunar;
use App\Modeli\Zaposleni;
use App\Modeli\Uprava;
use App\Modeli\Kancelarija;
use App\Modeli\Proizvodjac;
use App\Modeli\Nabavka;
use App\Modeli\OperativniSistem;
use App\Modeli\OsnovnaPlocaModel;
use App\Modeli\OsnovnaPloca;
use App\Modeli\ProcesorModel;
use App\Modeli\Procesor;
use App\Modeli\MemorijaModel;
use App\Modeli\Memorija;
use App\Modeli\HddModel;
use App\Modeli\Hdd;
use App\Modeli\GrafickiAdapter;
use App\Modeli\GrafickiAdapterModel;
use App\Modeli\Napajanje;
use App\Modeli\NapajanjeModel;
use App\Modeli\Monitor;
use App\Modeli\MonitorModel;
use App\Modeli\Greska;

class RacunariKontroler extends Kontroler
{

    public function getLista()
    {

        return view('oprema.racunari')->with(compact('uredjaj'));
    }

    public function getAjax()
    {
        $racunari = Racunar::with('kancelarija', 'zaposleni')->get();

        return Datatables::of($racunari)
                        ->editColumn('zaposleni.naziv', function ($model) {
                            if ($model->zaposleni) {
                                return '<a href="' . route('zaposleni.detalj', $model->zaposleni->id) . '">' . $model->zaposleni->imePrezime() . '</a>';
                            }
                            return " ";
                        })
                        ->editColumn('kancelarija.naziv', function ($model) {

                            if ($model->kancelarija) {
                                return '<a href="' . route('kancelarije.detalj.get', $model->kancelarija->id) . '">' . $model->kancelarija->sviPodaci() . '</a>';
                            }
                            return " ";
                        })
                        ->addColumn('akcije', 'sifarnici.inc.dugmici_racunari')
                        ->rawColumns([
                            'akcije',
                            'zaposleni.naziv',
                            'kancelarija.naziv'])
                        ->make(true);
    }

    public function getDetalj($id)
    {
        $uredjaj = Racunar::find($id);
        return view('oprema.racunari_detalj')->with(compact('uredjaj'));
    }

    public function getDodavanje()
    {
        $proizvodjaci = Proizvodjac::all();
        $zaposleni = Zaposleni::all();
        $kancelarije = Kancelarija::all();
        $nabavke = Nabavka::all();
        $os = OperativniSistem::all();
        return view('oprema.racunari_dodavanje')->with(compact ('proizvodjaci', 'zaposleni', 'kancelarije', 'nabavke', 'os'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'stavka_nabavke_id' => ['required'],
                'erc_broj' => ['required', 'max:100'],
                'ime' => ['required', 'max:100'],
            ]);

            if ($request->laptop) {
                $laptopc = 1;
            } else {
                $laptopc = 0;
            }
            if ($request->server) {
                $serverc = 1;
            } else {
                $serverc = 0;
            }
             if ($request->brend) {
                $brendc = 1;
            } else {
                $brendc = 0;
            }


        $uredjaj = new Racunar();
        $uredjaj->vrsta_uredjaja_id = 1; //Računari imaju šifru 1
        $uredjaj->laptop = $laptopc;
        $uredjaj->brend = $brendc;
        $uredjaj->server = $serverc;
        $uredjaj->proizvodjac_id = $request->proizvodjac_id;
        $uredjaj->inventarski_broj = $request->inventarski_broj;
        $uredjaj->serijski_broj = $request->serijski_broj;
        $uredjaj->erc_broj = $request->erc_broj;
        $uredjaj->ime = $request->ime;
        $uredjaj->zaposleni_id = $request->zaposleni_id;
        $uredjaj->kancelarija_id = $request->kancelarija_id;
        $uredjaj->stavka_nabavke_id = $request->stavka_nabavke_id;
        $uredjaj->os_id = $request->os_id;
        $uredjaj->ocena = 0;
        $uredjaj->link = $request->link;
        $uredjaj->napomena = $request->napomena;
        $uredjaj->reciklirano = 0;

        $uredjaj->save();

        Session::flash('uspeh','Računar je uspešno dodat!');
        return redirect()->route('racunari.oprema');
    }

    public function getAplikacije($id){

        $uredjaj = Racunar::find($id);
        $aplikacije = $uredjaj->aplikacije;

        return view('oprema.racunari_aplikacije')->with(compact('aplikacije', 'uredjaj'));
    }
    
    //OSNOVNE PLOCE
        public function getPloce($id)
    {
        $uredjaj = Racunar::find($id);
        $modeli = OsnovnaPlocaModel::all();
        $ploce = OsnovnaPloca::neraspordjeni()->get();
        return view('oprema.racunari_ploce')->with(compact ('modeli', 'uredjaj', 'ploce'));
    }

    public function getIzvadiPlocu($id)
    {
        $uredjaj = Racunar::find($id);
        $ploca = OsnovnaPloca::find($uredjaj->osnovnaPloca->id);
        $uredjaj->ploca_id = null;
        $odgovor = $uredjaj->save();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Osnovna ploča je uspešno uklonjena!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja ploče. Pokušajte ponovo, kasnije!');
        }
        
        return Redirect::back();
    }

     public function getIzvadiObrisiPlocu($id)
    {
        $uredjaj = Racunar::find($id);
        $ploca = OsnovnaPloca::find($uredjaj->osnovnaPloca->id);
        $uredjaj->ploca_id = null;
        $uredjaj->save();
        $ploca->napomena .= 'q#q# PODACI O OTPISU: naziv računara '.$uredjaj->ime .', kancelarija '. $uredjaj->kancelarija->naziv;
        $ploca->save();
        $odgovor = $ploca->delete();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Osnovna ploča je uspešno uklonjena i pripremljena za reciklažu!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja ploče. Pokušajte ponovo, kasnije!');
        }
        
        return Redirect::back();
    }

    public function postDodajPlocuNovu(Request $request, $id)
    {
        $racunar = Racunar::find($id);

        if ($racunar->osnovnaPloca) {
            Session::flash('greska', 'Prvo izvadite staru plocu da biste dodali novu!');
        }
        else{
            $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'osnovna_ploca_model_id' => ['required']
            ]);
        $ploca = new OsnovnaPloca();
        $ploca->serijski_broj = $request->serijski_broj;
        $ploca->vrsta_uredjaja_id = 6;
        $ploca->osnovna_ploca_model_id = $request->osnovna_ploca_model_id;
        $ploca->napomena = $request->napomena;
        $ploca->save();

        $racunar->ploca_id = $ploca->id;
        $racunar->save();
        Session::flash('uspeh', 'Osnovna ploča je uspešno dodata!');
        }
        return Redirect::back();
    }

    public function postDodajPlocuPostojecu(Request $request, $id)
    {
        $racunar = Racunar::find($id);
        if ($racunar->osnovnaPloca) {
            Session::flash('greska', 'Prvo izvadite staru plocu da biste dodali novu!');
        }
        else{
        $ploca = OsnovnaPloca::find($request->ploca_id);
        $racunar->ploca_id = $ploca->id;
        $racunar->save();
        Session::flash('uspeh', 'Osnovna ploča je uspešno dodata!');
        }
        return Redirect::back();
    }

    //PROCESORI
    public function getProcesore($id)
    {
        $uredjaj = Racunar::find($id);
        $modeli = ProcesorModel::all();
        $procesori = Procesor::neraspordjeni()->get();
        return view('oprema.racunari_procesori')->with(compact ('modeli', 'uredjaj', 'procesori'));
    }

    public function getIzvadiProcesor($id)
    {
        $procesor = Procesor::find($id);
        $procesor->racunar_id = null;
        $odgovor = $procesor->save();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Procesor je uspešno uklonjen!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja procesora. Pokušajte ponovo, kasnije!');
        }
        
        return Redirect::back();
    }

     public function getIzvadiObrisiProcesor($id)
    {
        $procesor = Procesor::find($id);
        $uredjaj = $procesor->racunar;
        $procesor->napomena .= 'q#q# PODACI O OTPISU: naziv računara '.$uredjaj->ime .', kancelarija '. $uredjaj->kancelarija->naziv." Dana: ".Carbon::now();
        $procesor->racunar_id = null;
        $procesor->save();

        $odgovor = $procesor->delete();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Procesor je uspešno uklonjen i pripremljen za reciklažu!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja procesora. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

    public function postDodajProcesorNovi(Request $request, $id)
    {

        $racunar = Racunar::find($id);

            $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'procesor_model_id' => ['required']
            ]);
        $procesor = new Procesor();
        $procesor->serijski_broj = $request->serijski_broj;
        $procesor->vrsta_uredjaja_id = 7;
        $procesor->procesor_model_id = $request->procesor_model_id;
        $procesor->napomena = $request->napomena;
        $procesor->racunar_id = $id;
        $procesor->save();

        if ($racunar->procesori->count() > 1 && $racunar->server == 0) {
            $greska = new Greska();
            $greska->greska = "U računar ".$racunar->ime." je ".Auth::user()->name ." dodao više od jednog procesora! Dana: ".Carbon::now();
            $greska->save();
            Session::flash('upozorenje', 'Procesor je uspešno dodat, ali to nije jedini procesor u ovom računaru!');
            return Redirect::back();
        } else{
            Session::flash('uspeh', 'Procesor je uspešno dodat!');
            return Redirect::back();
        }
        
    }

    public function postDodajProcesorPostojeci(Request $request, $id)
    {
        
        $racunar = Racunar::find($id);
        
        $procesor = Procesor::find($request->procesor_id);
        $procesor->racunar_id = $id;;
        $procesor->save();

        if ($racunar->procesori->count() > 1 && $racunar->server == 0) {
            $greska = new Greska();
            $greska->greska = "U računar ".$racunar->ime." je ".Auth::user()->name ." dodao više od jednog procesora! Dana: ".Carbon::now();
            $greska->save();
            Session::flash('upozorenje', 'Procesor je uspešno dodat, ali to nije jedini procesor u ovom računaru!');
            return Redirect::back();
        } else{
            Session::flash('uspeh', 'Procesor je uspešno dodat!');
            return Redirect::back();
        }
    }

     //Memorija
    public function getMemorije($id)
    {
        $uredjaj = Racunar::find($id);
        $modeli = MemorijaModel::all();
        $memorije = Memorija::neraspordjeni()->get();
        return view('oprema.racunari_memorije')->with(compact ('modeli', 'uredjaj', 'memorije'));
    }

    public function getIzvadiMemoriju($id)
    {
        $memorija = Memorija::find($id);
        $memorija->racunar_id = null;
        $odgovor = $memorija->save();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Memorija je uspešno uklonjena!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja memorije. Pokušajte ponovo, kasnije!');
        }
        
        return Redirect::back();
    }

     public function getIzvadiObrisiMemoriju($id)
    {
        $memorija = Memorija::find($id);
        $uredjaj = $memorija->racunar;
        $memorija->napomena .= 'q#q# PODACI O OTPISU: naziv računara '.$uredjaj->ime .', kancelarija '. $uredjaj->kancelarija->naziv." Dana: ".Carbon::now();
        $memorija->racunar_id = null;
        $memorija->save();

        $odgovor = $memorija->delete();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Memorija je uspešno izvađen i pripremljen za reciklažu!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja memorije. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

    public function postDodajMemorijuNovu(Request $request, $id)
    {

        $racunar = Racunar::find($id);

            $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'memorija_model_id' => ['required']
            ]);
        $memorija = new Memorija();
        $memorija->serijski_broj = $request->serijski_broj;
        $memorija->vrsta_uredjaja_id = 9;
        $memorija->memorija_model_id = $request->memorija_model_id;
        $memorija->napomena = $request->napomena;
        $memorija->racunar_id = $id;
        $memorija->save();

        if ($racunar->memorije->count() > 1 && $racunar->server == 0) {
            $greska = new Greska();
            $greska->greska = "U računar ".$racunar->ime." je ".Auth::user()->name ." dodao više od jednog memorijskog modula! Dana: ".Carbon::now();
            $greska->save();
            Session::flash('upozorenje', 'Memorija je uspešno dodata, ali to nije jedini modul u ovom računaru!');
            return Redirect::back();
        } else{
            Session::flash('uspeh', 'Memorija je uspešno dodata!');
            return Redirect::back();
        }
        
    }

    public function postDodajMemorijuPostojecu(Request $request, $id)
    {
        
        $racunar = Racunar::find($id);
        
        $memorija = Memorija::find($request->memorija_id);
        $memorija->racunar_id = $id;;
        $memorija->save();

        if ($racunar->memorije->count() > 1 && $racunar->server == 0) {
            $greska = new Greska();
            $greska->greska = "U računar ".$racunar->ime." je ".Auth::user()->name ." dodao više od jednog memorijskog modula! Dana: ".Carbon::now();
            $greska->save();
            Session::flash('upozorenje', 'Memorija je uspešno dodata, ali to nije jedini modul u ovom računaru!');
            return Redirect::back();
        } else{
            Session::flash('uspeh', 'Memorija je uspešno dodata!');
            return Redirect::back();
        }
    }

    //Hard diskovi
    public function getHddove($id)
    {
        $uredjaj = Racunar::find($id);
        $modeli = HddModel::all();
        $hddovi = Hdd::neraspordjeni()->get();
        return view('oprema.racunari_hddovi')->with(compact ('modeli', 'uredjaj', 'hddovi'));
    }

    public function getIzvadiHdd($id)
    {
        $hdd = Hdd::find($id);
        $hdd->racunar_id = null;
        $odgovor = $hdd->save();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Čvrsti disk je uspešno uklonjen!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja čvrstog diska. Pokušajte ponovo, kasnije!');
        }
        
        return Redirect::back();
    }

     public function getIzvadiObrisiHdd($id)
    {
        $hdd = Hdd::find($id);
        $uredjaj = $hdd->racunar;
        $hdd->napomena .= 'q#q# PODACI O OTPISU: naziv računara '.$uredjaj->ime .', kancelarija '. $uredjaj->kancelarija->naziv." Dana: ".Carbon::now();
        $hdd->racunar_id = null;
        $hdd->save();

        $odgovor = $hdd->delete();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Čvrsti disk je uspešno uklonjen i pripremljen za reciklažu!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja čvrstog diska. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

    public function postDodajHddNovi(Request $request, $id)
    {

        $racunar = Racunar::find($id);

            $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'hdd_model_id' => ['required']
            ]);
        $hdd = new Hdd();
        $hdd->serijski_broj = $request->serijski_broj;
        $hdd->vrsta_uredjaja_id = 10;
        $hdd->hdd_model_id = $request->hdd_model_id;
        $hdd->napomena = $request->napomena;
        $hdd->racunar_id = $id;
        $hdd->save();

        if ($racunar->hddovi->count() > 1 && $racunar->server == 0) {
            $greska = new Greska();
            $greska->greska = "U računar ".$racunar->ime." je ".Auth::user()->name ." dodao više od jednog čvrstog diska! Dana: ".Carbon::now();
            $greska->save();
            Session::flash('upozorenje', 'Čvrsti disk je uspešno dodat, ali nije jedini u ovom računaru!');
            return Redirect::back();
        } else{
            Session::flash('uspeh', 'Čvrsti disk je uspešno dodat!');
            return Redirect::back();
        }
        
    }

    public function postDodajHddPostojeci(Request $request, $id)
    {
        
        $racunar = Racunar::find($id);
        
        $hdd = Hdd::find($request->hdd_id);
        $hdd->racunar_id = $id;;
        $hdd->save();

        if ($racunar->hddovi->count() > 1 && $racunar->server == 0) {
            $greska = new Greska();
            $greska->greska = "U računar ".$racunar->ime." je ".Auth::user()->name ." dodao više od jednog čvrstog diska! Dana: ".Carbon::now();
            $greska->save();
            Session::flash('upozorenje', 'Čvrsti disk je uspešno dodat, ali nije jedini u ovom računaru!');
            return Redirect::back();
        } else{
            Session::flash('uspeh', 'Čvrsti disk je uspešno dodata!');
            return Redirect::back();
        }
    }

    //VGA
    public function getVga($id)
    {
        $uredjaj = Racunar::find($id);
        $modeli = GrafickiAdapterModel::all();
        $vga_uredjaji = GrafickiAdapter::neraspordjeni()->get();
        return view('oprema.racunari_vga')->with(compact ('modeli', 'uredjaj', 'vga_uredjaji'));
    }

    public function getIzvadiVga($id)
    {
        $vga = GrafickiAdapter::find($id);
        $vga->racunar_id = null;
        $odgovor = $vga->save();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Grafički adapter je uspešno uklonjen!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja grafičkog adaptera. Pokušajte ponovo, kasnije!');
        }
        
        return Redirect::back();
    }

     public function getIzvadiObrisiVga($id)
    {
        $vga = GrafickiAdapter::find($id);
        $uredjaj = $vga->racunar;
        $vga->napomena .= 'q#q# PODACI O OTPISU: naziv računara '.$uredjaj->ime .', kancelarija '. $uredjaj->kancelarija->naziv." Dana: ".Carbon::now();
        $vga->racunar_id = null;
        $vga->save();

        $odgovor = $vga->delete();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Grafički adapter je uspešno uklonjen i pripremljen za reciklažu!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja grafičkog adaptera. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

    public function postDodajVgaNovi(Request $request, $id)
    {

        $racunar = Racunar::find($id);

            $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'graficki_adapter_model_id' => ['required']
            ]);
        $vga = new GrafickiAdapter();
        $vga->serijski_broj = $request->serijski_broj;
        $vga->vrsta_uredjaja_id = 8;
        $vga->graficki_adapter_model_id = $request->graficki_adapter_model_id;
        $vga->napomena = $request->napomena;
        $vga->racunar_id = $id;
        $vga->save();

        if ($racunar->grafickiAdapteri->count() > 1) {
            $greska = new Greska();
            $greska->greska = "U računar ".$racunar->ime." je ".Auth::user()->name ." dodao više od jednog grafičkog adaptera! Dana: ".Carbon::now();
            $greska->save();
            Session::flash('upozorenje', 'Grafički adapter je uspešno dodat, ali nije jedini u ovom računaru!');
            return Redirect::back();
        } else{
            Session::flash('uspeh', 'Grafički adapter je uspešno dodat!');
            return Redirect::back();
        }
        
    }

    public function postDodajVgaPostojeci(Request $request, $id)
    {
        
        $racunar = Racunar::find($id);
        
        $vga = GrafickiAdapter::find($request->vga_id);
        $vga->racunar_id = $id;;
        $vga->save();

        if ($racunar->grafickiAdapteri->count() > 1) {
            $greska = new Greska();
            $greska->greska = "U računar ".$racunar->ime." je ".Auth::user()->name ." dodao više od jednog grafičkog adaptera! Dana: ".Carbon::now();
            $greska->save();
            Session::flash('upozorenje', 'Grafički adapter je uspešno dodat, ali nije jedini u ovom računaru!');
            return Redirect::back();
        } else{
            Session::flash('uspeh', 'Grafički adapter je uspešno dodata!');
            return Redirect::back();
        }
    }

     //Napajanja
    public function getNapajanja($id)
    {
        $uredjaj = Racunar::find($id);
        $modeli = NapajanjeModel::all();
        $napajanja_uredjaji = Napajanje::neraspordjeni()->get();
        return view('oprema.racunari_napajanja')->with(compact ('modeli', 'uredjaj', 'napajanja_uredjaji'));
    }

    public function getIzvadiNapajanje($id)
    {
        $napajanje = Napajanje::find($id);
        $napajanje->racunar_id = null;
        $odgovor = $napajanje->save();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Napajanje je uspešno uklonjeno!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja napajanja. Pokušajte ponovo, kasnije!');
        }
        
        return Redirect::back();
    }

     public function getIzvadiObrisiNapajanje($id)
    {
        $napajanje = Napajanje::find($id);
        $uredjaj = $napajanje->racunar;
        $napajanje->napomena .= 'q#q# PODACI O OTPISU: naziv računara '.$uredjaj->ime .', kancelarija '. $uredjaj->kancelarija->naziv." Dana: ".Carbon::now();
        $napajanje->racunar_id = null;
        $napajanje->save();

        $odgovor = $napajanje->delete();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Napajanje je uspešno uklonjeno i pripremljeno za reciklažu!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja napajanja. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

    public function postDodajNapajanjeNovo(Request $request, $id)
    {

        $racunar = Racunar::find($id);

            $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'napajanje_model_id' => ['required']
            ]);
        $napajanje = new Napajanje();
        $napajanje->serijski_broj = $request->serijski_broj;
        $napajanje->vrsta_uredjaja_id = 11;
        $napajanje->napajanje_model_id = $request->napajanje_model_id;
        $napajanje->napomena = $request->napomena;
        $napajanje->racunar_id = $id;
        $napajanje->save();

        if ($racunar->napajanja->count() > 1) {
            $greska = new Greska();
            $greska->greska = "U računar ".$racunar->ime." je ".Auth::user()->name ." dodao više od jednog grafičkog adaptera! Dana: ".Carbon::now();
            $greska->save();
            Session::flash('upozorenje', 'Napajanje je uspešno dodato, ali nije jedino u ovom računaru!');
            return Redirect::back();
        } else{
            Session::flash('uspeh', 'Napajanje je uspešno dodato!');
            return Redirect::back();
        }
        
    }

    public function postDodajNapajanjePostojece(Request $request, $id)
    {
        
        $racunar = Racunar::find($id);
        
        $napajanje = Napajanje::find($request->napajanje_id);
        $napajanje->racunar_id = $id;;
        $napajanje->save();

        if ($racunar->napajanja->count() > 1) {
            $greska = new Greska();
            $greska->greska = "U računar ".$racunar->ime." je ".Auth::user()->name ." dodao više od jednog grafičkog adaptera! Dana: ".Carbon::now();
            $greska->save();
            Session::flash('upozorenje', 'Napajanje je uspešno dodato, ali nije jedino u ovom računaru!');
            return Redirect::back();
        } else{
            Session::flash('uspeh', 'Napajanje je uspešno dodato!');
            return Redirect::back();
        }
    }

    // Monitori
    public function getMonitor($id)
    {
        $uredjaj = Racunar::find($id);
        $modeli = MonitorModel::all();
        $monitori_uredjaji = Monitor::neraspordjeni()->get();
        return view('oprema.racunari_monitori')->with(compact ('modeli', 'uredjaj', 'monitori_uredjaji'));
    }

    public function getIzvadiMonitor($id)
    {
        $monitor = Monitor::find($id);
        $monitor->racunar_id = null;
        $odgovor = $monitor->save();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Monitor je uspešno uklonjeno!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja monitora. Pokušajte ponovo, kasnije!');
        }
        
        return Redirect::back();
    }

     public function getIzvadiObrisiMonitor($id)
    {
        $monitor = Monitor::find($id);
        $uredjaj = $monitor->racunar;
        $monitor->napomena .= 'q#q# PODACI O OTPISU: naziv računara '.$uredjaj->ime .', kancelarija '. $uredjaj->kancelarija->naziv." Dana: ".Carbon::now();
        $monitor->racunar_id = null;
        $monitor->save();

        $odgovor = $monitor->delete();
        
        if ($odgovor) {
            Session::flash('uspeh', 'Monitor je uspešno uklonjeno i pripremljeno za reciklažu!');
        }else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja monitora. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

    public function postDodajMonitorNovi(Request $request, $id)
    {

        $racunar = Racunar::find($id);

            $this->validate($request, [
                'serijski_broj' => ['max:50'],
                'monitor_model_id' => ['required']
            ]);
        $monitor = new Monitor();
        $monitor->serijski_broj = $request->serijski_broj;
        $monitor->vrsta_uredjaja_id = 2;
        $monitor->monitor_model_id = $request->monitor_model_id;
        $monitor->napomena = $request->napomena;
        $monitor->racunar_id = $id;
        $monitor->save();

        if ($racunar->monitori->count() > 1) {
            $greska = new Greska();
            $greska->greska = "U računar ".$racunar->ime." je ".Auth::user()->name ." dodao više od jednog monitora! Dana: ".Carbon::now();
            $greska->save();
            Session::flash('upozorenje', 'Monitor je uspešno dodato, ali nije jedino u ovom računaru!');
            return Redirect::back();
        } else{
            Session::flash('uspeh', 'Monitor je uspešno dodato!');
            return Redirect::back();
        }
        
    }

    public function postDodajMonitorPostojeci(Request $request, $id)
    {
        
        $racunar = Racunar::find($id);
        
        $monitor = Monitor::find($request->monitor_id);
        $monitor->racunar_id = $id;;
        $monitor->save();

        if ($racunar->monitori->count() > 1) {
            $greska = new Greska();
            $greska->greska = "U računar ".$racunar->ime." je ".Auth::user()->name ." dodao više od jednog monitora! Dana: ".Carbon::now();
            $greska->save();
            Session::flash('upozorenje', 'Monitor je uspešno dodato, ali nije jedino u ovom računaru!');
            return Redirect::back();
        } else{
            Session::flash('uspeh', 'Monitor je uspešno dodato!');
            return Redirect::back();
        }
    }

}
