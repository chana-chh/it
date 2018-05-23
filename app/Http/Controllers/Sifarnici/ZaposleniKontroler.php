<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Kontroler;
use Image;
use Yajra\Datatables\Datatables;
use App\Modeli\Zaposleni;
use App\Modeli\Uprava;
use App\Modeli\Kancelarija;
use DB;

class ZaposleniKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:kadrovi')->except(['getLista', 'getAjax', 'getDetalj']);
    }

    public function getLista()
    {
        $zaposleni = DB::table('zaposleni')
                ->leftJoin('s_uprave', 'zaposleni.uprava_id', '=', 's_uprave.id')
                ->leftJoin('s_kancelarije', 'zaposleni.kancelarija_id', '=', 's_kancelarije.id')
                ->leftJoin('s_spratovi', 's_kancelarije.sprat_id', '=', 's_spratovi.id')
                ->leftJoin('s_lokacije', 's_kancelarije.lokacija_id', '=', 's_lokacije.id')
                ->leftJoin('adrese_e_poste', function($join) {
                    $join->on('zaposleni.id', '=', 'adrese_e_poste.zaposleni_id');
                })
                ->select(DB::raw(
                                'zaposleni.id as zaposleni_id,
                                zaposleni.ime as ime_zaposlenog,
                                zaposleni.prezime as prezime_zaposlenog,
                                zaposleni.uprava_id,
                                s_uprave.naziv as uprava,
                                zaposleni.radno_mesto as radno_mesto_zaposlenog,
                                s_kancelarije.id as id_kancelarije,
                                s_kancelarije.naziv as kancelarija,
                                s_kancelarije.napomena as kancelarija_napomena,
                                s_spratovi.naziv as sprat,
                                s_lokacije.naziv as lokacija,
                                GROUP_CONCAT(DISTINCT adrese_e_poste.adresa SEPARATOR "#") as emailovi'
                ))
                ->groupBy("zaposleni.id")
                ->get();

                //dd($zaposleni);
        return view('sifarnici.zaposleni')->with(compact('zaposleni'));
    }

    public function getAjax()
    {
        $svi_zaposleni = Zaposleni::with('kancelarija', 'uprava', 'emailovi')->get(); //Ovo je sve jasno

        return Datatables::of($svi_zaposleni)
                        ->editColumn('ime', function ($model) {
                            return ($model->imePrezime());
                        }) //Ovde editujem kolonu koja već postoji, -ime- i uvlačim rezultat funkcije iz modela za konkatinaciju imena i prezimena...
                        ->editColumn('radno_mesto', function ($model) {
                            return '<small>' . $model->radno_mesto . '</small>';
                        })
                        ->editColumn('kancelarija.naziv', function ($model) {
                            if ($model->kancelarija) {
                                return ($model->kancelarija->sviPodaci());
                            }
                            return ' ';
                        }) //Isto kao u prethodnom slučaju samo funkcija iz modela kancelarija
                        ->addColumn('email', function ($model) {
                            return $model->emailovi->map(function($email) {
                                        return '<a href="mailto:' . $email->adresa . '">' . $email->adresa . '</a>';
                                    })->implode('<br>');
                        }) //Dodavanje mapiranih i složenih HasMany podataka. Svaku dodatu kolonu treba definisati i na pogledu. Potrebno je srediti header tabele i data u DataTables delu skripte
                        ->addColumn('akcije', 'sifarnici.inc.dugmici') //Ovde uvlačim čitav view sa dugmićima u kolonu
                        ->rawColumns(['akcije', 'email', 'radno_mesto']) //Ovde dopustam da nabrojane kolone budu renderovane kao HTML, inače je sve prikazano kao Tekst
                        ->make(true);
    }

    public function getDodavanje()
    {
        $uprave = Uprava::all();
        $kancelarije = Kancelarija::all();
        return view('sifarnici.zaposleni_dodavanje')->with(compact('uprave', 'kancelarije'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'ime' => [
                'required',
                'max:50'],
            'prezime' => [
                'required',
                'max:100'],
            'slika' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $zaposleni = new Zaposleni();
        $zaposleni->ime = $request->ime;
        $zaposleni->prezime = $request->prezime;
        $zaposleni->uprava_id = $request->uprava_id;
        $zaposleni->radno_mesto = $request->radno_mesto;
        $zaposleni->kancelarija_id = $request->kancelarija_id;
        $zaposleni->napomena = $request->napomena;
        if ($request->hasFile('slika'))
        {
            $img = $request->slika;
            $ime_slike = $request->ime . time() . '.' . $request->slika->getClientOriginalExtension();
            $lokacija = public_path('images/slike_zaposlenih/' . $ime_slike);
            $resize_img = Image::make($img)->heighten(300, function ($constraint) {
                $constraint->upsize();
            });
            $resize_img->save($lokacija);
            $zaposleni->src = $ime_slike;
        }
        $zaposleni->save();

        Session::flash('uspeh', 'Zaposleni je uspešno dodata!');
        return redirect()->route('zaposleni');
    }

    public function getDetalj($id)
    {
        $zaposleni = Zaposleni::find($id);
        return view('sifarnici.zaposleni_detalj')->with(compact('zaposleni'));
    }

    public function getIzmena($id)
    {
        $zaposleni = Zaposleni::find($id);
        $uprave = Uprava::all();
        $kancelarije = Kancelarija::all();
        return view('sifarnici.zaposleni_izmena')->with(compact('zaposleni', 'uprave', 'kancelarije'));
    }

    public function postIzmena(Request $request, $id)
    {

        $zaposleni = Zaposleni::find($id);

        if ($request->slika) {
            $this->validate($request, [
                'ime' => [
                    'required',
                    'max:50'],
                'prezime' => [
                    'required',
                    'max:100'],
                'slika' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $img = $request->slika;
            $ime_slike = $request->ime . time() . '.' . $request->slika->getClientOriginalExtension();
            $lokacija = public_path('images/slike_zaposlenih/' . $ime_slike);
            $resize_img = Image::make($img)->heighten(300, function ($constraint) {
                $constraint->upsize();
            });
            $resize_img->save($lokacija);

            if ($zaposleni->src) {
                unlink(public_path('images/slike_zaposlenih/') . $zaposleni->src);
            }
        } else {
            $this->validate($request, [
                'ime' => [
                    'required',
                    'max:50'],
                'prezime' => [
                    'required',
                    'max:100'],
            ]);
            $ime_slike = $zaposleni->src;
        }

        $zaposleni->ime = $request->ime;
        $zaposleni->prezime = $request->prezime;
        $zaposleni->uprava_id = $request->uprava_id;
        $zaposleni->radno_mesto = $request->radno_mesto;
        $zaposleni->kancelarija_id = $request->kancelarija_id;
        $zaposleni->napomena = $request->napomena;
        $zaposleni->src = $ime_slike;
        $zaposleni->save();

        Session::flash('uspeh', 'Podaci o zaposlenom su uspešno izmenjeni!');
        return redirect()->route('zaposleni');
    }

    public function postBrisanje(Request $request)
    {
        $zaposleni = Zaposleni::find($request->idBrisanje);
        if ($zaposleni->racunar()->exists()) {
            Session::flash('greska', 'Zaposleni poseduje računar/e i nije ga moguće obrisati!');
            return Redirect::back();
        }else{
        $odgovor = $zaposleni->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Zaposleni je uspešno obrisan!');
             return redirect()->route('zaposleni');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja zaposlenog. Pokušajte ponovo, kasnije!');
            return Redirect::back();
        }}
       
    }

}
