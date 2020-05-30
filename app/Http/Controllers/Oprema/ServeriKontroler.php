<?php

namespace App\Http\Controllers\Oprema;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\ServerUp;
use App\Modeli\ServerBu;
use App\Modeli\Server;
use App\Modeli\OperativniSistem;
use App\Modeli\Kancelarija;

class ServeriKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin');
    }

    public function getLista()
    {
        $serveri = Server::all();
        return view('oprema.serveri')->with(compact('serveri'));
    }

    public function getDodavanje()
    {
        $os = OperativniSistem::all();
        $kancelarije = Kancelarija::with('lokacija', 'sprat')->orderBy('naziv', 'asc')->get();
        return view('oprema.serveri_dodavanje')->with(compact('os', 'kancelarije'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'ime' => ['required', 'unique:serveri,ime', 'max:20'],
            'rola' => ['required', 'max:255'],
            'ip_adresa' => ['required', 'unique:serveri,ip_adresa', 'max:15', 'ipv4'],
            'default_gw' => ['max:15', 'nullable', 'ipv4'],
            'domen' => ['max:50'],
            'licenca' => ['max:50'],
            'model' => ['max:50'],
            'cpu' => ['max:50'],
            'ram' => ['max:50'],
            'nalog' => ['max:50'],
            'lozinka' => ['max:50'],
            'hypervisor' => ['max:50'],
        ]);

        if ($request->firewall) {
            $firewallc = 1;
        } else {
            $firewallc = 0;
        }

        if ($request->virtuelni) {
            $virtuelnic = 1;
        } else {
            $virtuelnic = 0;
        }

        $server = new Server();
        $server->firewall = $firewallc;
        $server->virtuelni = $virtuelnic;
        $server->ime = $request->ime;
        $server->host = $request->host;
        $server->ip_adresa = $request->ip_adresa;
        $server->default_gw = $request->default_gw;
        $server->domen = $request->domen;
        $server->rola = $request->rola;
        $server->rola_opis = $request->rola_opis;
        $server->rack = $request->rack;
        $server->ups = $request->ups;
        $server->nalog = $request->nalog;
        $server->lozinka = $request->lozinka;
        $server->hypervisor = $request->hypervisor;
        $server->licenca = $request->licenca;
        $server->model = $request->model;
        $server->kancelarija_id = $request->kancelarija_id;
        $server->prioritet = $request->prioritet;
        $server->cpu = $request->cpu;
        $server->os_id = $request->os_id;
        $server->ram = $request->ram;
        $server->napomena = $request->napomena;

        $saved = $server->save();

        if ($saved) {
            Session::flash('uspeh', 'Server je uspešno dodat!');
            return redirect()->route('serveri.oprema');
        }
        else{
            Session::flash('greska', 'Došlo je do problema prilikom dodavanja servera. Pokušajte ponovo kasnije ili proverite formu za unos!');
        }
    }

    public function getDetalj($id)
    {
        $server = Server::find($id);
        return view('oprema.server_detalj')->with(compact('server'));
    }

    public function getIzmena($id)
    {
        $server = Server::find($id);
        $os = OperativniSistem::all();
        $kancelarije = Kancelarija::with('lokacija', 'sprat')->orderBy('naziv', 'asc')->get();
        return view('oprema.serveri_izmene')->with(compact('server', 'os', 'kancelarije'));
    }

    public function postIzmena(Request $request, $id)
    {

        $this->validate($request, [
            'ime' => ['required', 'unique:serveri,ime,' . $id, 'max:20'],
            'rola' => ['required', 'max:255'],
            'ip_adresa' => ['required', 'unique:serveri,ip_adresa,' . $id, 'max:15', 'ipv4'],
            'default_gw' => ['max:15', 'nullable', 'ipv4'],
            'domen' => ['max:50'],
            'licenca' => ['max:50'],
            'model' => ['max:50'],
            'cpu' => ['max:50'],
            'ram' => ['max:50'],
            'nalog' => ['max:50'],
            'lozinka' => ['max:50'],
            'hypervisor' => ['max:50'],
        ]);

        if ($request->firewall) {
            $firewallc = 1;
        } else {
            $firewallc = 0;
        }

        if ($request->virtuelni) {
            $virtuelnic = 1;
        } else {
            $virtuelnic = 0;
        }

        $server = Server::find($id);
        $server->firewall = $firewallc;
        $server->virtuelni = $virtuelnic;
        $server->ime = $request->ime;
        $server->host = $request->host;
        $server->ip_adresa = $request->ip_adresa;
        $server->default_gw = $request->default_gw;
        $server->domen = $request->domen;
        $server->rola = $request->rola;
        $server->rola_opis = $request->rola_opis;
        $server->rack = $request->rack;
        $server->ups = $request->ups;
        $server->nalog = $request->nalog;
        $server->lozinka = $request->lozinka;
        $server->hypervisor = $request->hypervisor;
        $server->licenca = $request->licenca;
        $server->model = $request->model;
        $server->kancelarija_id = $request->kancelarija_id;
        $server->prioritet = $request->prioritet;
        $server->cpu = $request->cpu;
        $server->os_id = $request->os_id;
        $server->ram = $request->ram;
        $server->napomena = $request->napomena;

        $saved = $server->save();

        if ($saved) {
            Session::flash('uspeh', 'Server je uspešno izmenjen!');
            return Redirect::back();
        }
        else{
            Session::flash('greska', 'Došlo je do problema prilikom izmene podataka servera. Pokušajte ponovo kasnije ili proverite formu za izmenu!');
            return redirect()->route('serveri.oprema');
        }
    }

    public function postBrisanje(Request $request)
    {

        $data = Server::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Server je uspešno obrisan!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja servera. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('serveri.oprema');
    }

    public function getUpdateovi($id)
    {
        $server = Server::find($id);
        $updateovi = $server->up;
        return view('oprema.server_updateovi')->with(compact('updateovi', 'server'));
    }

    public function getUp()
    {
        $up = ServerUp::all();
        return view('oprema.server_up')->with(compact('up'));
    }

        public function getBackupovi($id)
    {
        $server = Server::find($id);
        $backupovi = $server->bu;
        return view('oprema.server_backupovi')->with(compact('backupovi', 'server'));
    }

    public function getBu()
    {
        $bu = ServerBu::all();
        return view('oprema.server_bu')->with(compact('bu'));
    }

    public function getUpDodavanje($id = null)
    {
        if (!$id) {
            $server = null;
        }else{
            $server = Server::find($id);
        }
        $serveri = Server::all();
        return view('oprema.serveri_up_dodavanje')->with(compact('serveri', 'server'));
    }

    public function getBuDodavanje($id = null)
    {
        if (!$id) {
            $server = null;
        }else{
            $server = Server::find($id);
        }
        $serveri = Server::all();
        return view('oprema.serveri_bu_dodavanje')->with(compact('serveri', 'server'));
    }

    public function postUpDodavanje(Request $request)
    {
        $this->validate($request, [
            'server_id' => ['required', 'integer'],
            'datum' => ['required', 'date']
        ]);

        $up = new ServerUp();
        $up->server_id = $request->server_id;
        $up->datum = $request->datum;
        $up->opis = $request->opis;
        $saved = $up->save();

        if ($saved) {
            Session::flash('uspeh', 'Ažuriranje za server je uspešno dodato!');
            return redirect()->route('serveri.up.get');
        }
        else{
            Session::flash('greska', 'Došlo je do problema prilikom dodavanja ažuriranja za server. Pokušajte ponovo kasnije ili proverite formu!');
            return redirect()->route('serveri.up.get');
        }
    }

    public function postBuDodavanje(Request $request)
    {
        $this->validate($request, [
            'server_id' => ['required', 'integer'],
            'datum' => ['required', 'date']
        ]);

        $bu = new ServerBu();
        $bu->server_id = $request->server_id;
        $bu->datum = $request->datum;
        $bu->opis = $request->opis;
        $bu->tip = $request->tip;
        $bu->periodika = $request->periodika;
        $bu->bu_path = $request->bu_path;
        $saved = $bu->save();

        if ($saved) {
            Session::flash('uspeh', 'Rezervna kopija za server je uspešno dodato!');
            return redirect()->route('serveri.bu.get');
        }
        else{
            Session::flash('greska', 'Došlo je do problema prilikom dodavanja rezervne kopije za server. Pokušajte ponovo kasnije ili proverite formu!');
            return redirect()->route('serveri.bu.get');
        }

    }

    public function postUpBrisanje(Request $request)
    {

        $data = ServerUp::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Ažuriranje servera je uspešno obrisano!');
            return Redirect::back();
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja ažuriranja servera. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('serveri.oprema');
    }

    public function postBuBrisanje(Request $request)
    {

        $data = ServerBu::find($request->idBrisanje);
        $odgovor = $data->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Rezervna kopija servera je uspešno obrisana!');
            return Redirect::back();
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja rezervne kopije servera. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('serveri.oprema');
    }

    public function getUpIzmena($id)
    {
        $up = ServerUp::find($id);
        $serveri = Server::all();
        return view('oprema.serveri_izmene_up')->with(compact('up', 'serveri'));
    }

    public function getBuIzmena($id)
    {
        $bu = ServerBu::find($id);
        $serveri = Server::all();
        return view('oprema.serveri_izmene_bu')->with(compact('bu', 'serveri'));
    }

    public function postBuIzmena(Request $request, $id)
    {
        $this->validate($request, [
            'server_id' => ['required', 'integer'],
            'datum' => ['required', 'date']
        ]);

        $bu = ServerBu::find($id);
        $bu->server_id = $request->server_id;
        $bu->datum = $request->datum;
        $bu->opis = $request->opis;
        $bu->tip = $request->tip;
        $bu->periodika = $request->periodika;
        $bu->bu_path = $request->bu_path;
        $saved = $bu->save();

        if ($saved) {
            Session::flash('uspeh', 'Rezervna kopija za server je uspešno dodato!');
            return redirect()->route('serveri.up.get');
        }
        else{
            Session::flash('greska', 'Došlo je do problema prilikom dodavanja rezervne kopije za server. Pokušajte ponovo kasnije ili proverite formu za izmenu!');
            return redirect()->route('serveri.up.get');
        }

    }

    public function postUpIzmena(Request $request, $id)
    {
        $this->validate($request, [
            'server_id' => ['required', 'integer'],
            'datum' => ['required', 'date']
        ]);

        $up = ServerUp::find($id);
        $up->server_id = $request->server_id;
        $up->datum = $request->datum;
        $up->opis = $request->opis;
        $saved = $up->save();

        if ($saved) {
            Session::flash('uspeh', 'Ažuriranje za server je uspešno dodato!');
            return redirect()->route('serveri.bu.get');
        }
        else{
            Session::flash('greska', 'Došlo je do problema prilikom dodavanja ažuriranja za server. Pokušajte ponovo kasnije ili proverite formu za izmenu!');
            return redirect()->route('serveri.bu.get');
        }
    }
    
}
