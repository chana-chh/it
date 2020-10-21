<?php

namespace App\Http\Controllers\Servis;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use App\Http\Controllers\Kontroler;
use App\Modeli\StatickaIP;
use App\Modeli\Kancelarija;

class StatickeKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getZauzete()
    {
        $adrese = StatickaIP::zauzete()->get();
        return view('servis.staticke_zauzete')->with(compact('adrese'));
    }

    public function getSlobodne()
    {
        $nesortirane = StatickaIP::slobodne()->get();
        $adrese = $nesortirane->sortBy('ip_adresa', SORT_NATURAL);
        return view('servis.staticke_slobodne')->with(compact('adrese'));
    }

    public function getDodavanjeOpsega()
    {
        return view('servis.staticke_dodavanje_opsega');
    }

    public function postDodavanjeOpsega(Request $request)
    {
        $this->validate($request, [
            'ip_pocetak' => [
                'required',
                'ip',
            ],
            'ip_kraj' => [
                'required',
                'ip',
            ]
        ]);

        $postojece = DB::table('staticke_ip')->pluck('ip_adresa')->toArray();
        $model = new StatickaIP();

        $adrese = $model->ipRange($request->ip_pocetak, $request->ip_kraj);
        $razlika=array_diff($adrese, $postojece);

        if (!empty($razlika)) {
            foreach ($razlika as $value) {
            $data = new StatickaIP();
            $data->ip_adresa = $value;
            $data->save();
        }

        Session::flash('uspeh', 'Opseg je uspešno dodat!');
        return redirect()->route('staticke.slobodne');
        }else{
        Session::flash('upozorenje', 'Nema novih adresa u opsegu za dodavanje!');
        return redirect()->route('staticke.slobodne');
        }

    }

    public function postBrisanje()
    {
        $odgovor = StatickaIP::getQuery()->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Statičke adrese su uspešno obrisane!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja statičkih adresa. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('staticke.slobodne');
    }

    public function getBrisanjeOpsega()
    {
        return view('servis.staticke_brisanje_opsega');
    }

    public function postBrisanjeOpsega(Request $request)
    {
        $this->validate($request, [
            'ip_pocetak' => [
                'required',
                'ip',
            ],
            'ip_kraj' => [
                'required',
                'ip',
            ]
        ]);

        $model = new StatickaIP();
        $adrese = $model->ipRange($request->ip_pocetak, $request->ip_kraj);

        foreach ($adrese as $value) {
            StatickaIP::where('ip_adresa', 'LIKE', '%'.$value.'%')->delete();
        }


        Session::flash('uspeh', 'Statičke adrese su uspešno obrisane!');
        return redirect()->route('staticke.slobodne');
    }

    public function getDodavanje($id)
    {
        $ip = StatickaIP::find($id);
        $kancelarije = Kancelarija::all();
        return view('servis.staticke_dodavanje')->with(compact('kancelarije', 'ip'));
    }

    public function postDodavanje(Request $request, $id)
    {

        $ip = StatickaIP::find($id);
        $ip->kancelarija_id = $request->kancelarija_id;
        $ip->uredjaj = $request->uredjaj;
        $ip->vlan = $request->vlan;
        $ip->ime = $request->ime;
        $ip->model = $request->model;
        $ip->sn = $request->sn;
        $ip->inv_br = $request->inv_br;
        $ip->uticnica = $request->uticnica;
        $ip->prvi_nod = $request->prvi_nod;
        $ip->opis = $request->opis;
        $ip->napomena = $request->napomena;

        $ip->save();

        Session::flash('uspeh', 'Vezivanje uređaja za IP adresu je uspešno!');
        return redirect()->route('staticke.zauzete');
    }

    public function getIzmena($id)
    {
        $ip = StatickaIP::find($id);
        $kancelarije = Kancelarija::all();
        return view('servis.staticke_izmena')->with(compact('kancelarije', 'ip'));
    }

    public function getDetalj($id)
    {
        $ip = StatickaIP::find($id);
        return view('servis.staticke_detalj')->with(compact('ip'));
    }

    public function postIzmena(Request $request, $id)
    {

        $ip = StatickaIP::find($id);
        $ip->kancelarija_id = $request->kancelarija_id;
        $ip->uredjaj = $request->uredjaj;
        $ip->vlan = $request->vlan;
        $ip->ime = $request->ime;
        $ip->model = $request->model;
        $ip->sn = $request->sn;
        $ip->inv_br = $request->inv_br;
        $ip->uticnica = $request->uticnica;
        $ip->prvi_nod = $request->prvi_nod;
        $ip->opis = $request->opis;
        $ip->napomena = $request->napomena;

        $ip->save();

        Session::flash('uspeh', 'Podaci o uređaju koji je vezan za IP adresu su uspešno izmenjeni!');
        return redirect()->route('staticke.zauzete');
    }

    public function postCiscenje(Request $request)
    {
        $ip = StatickaIP::find($request->idBrisanje);
        $ip->kancelarija_id = null;
        $ip->uredjaj = null;
        $ip->vlan = null;
        $ip->ime = null;
        $ip->model = null;
        $ip->sn = null;
        $ip->inv_br = null;
        $ip->src = null;
        $ip->uticnica = null;
        $ip->prvi_nod = null;
        $ip->opis = null;
        $ip->napomena = null;

        $ip->save();

        Session::flash('uspeh', 'Podaci o uređaju koji je vezan za IP adresu su uspešno uklonjeni!');
        return redirect()->route('staticke.zauzete');
    }

    public function getDodavanjePrva($adresa)
    {
        $ip = StatickaIP::where('ip_adresa', 'LIKE', '%'.$adresa.'%')->first();
        $kancelarije = Kancelarija::all();
        return view('servis.staticke_dodavanje')->with(compact('kancelarije', 'ip'));
    }
    
}
