<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;
use App\Modeli\Kancelarija;
use App\Modeli\Zaposleni;
use App\Modeli\Sprat;
use App\Modeli\Lokacija;
use App\Modeli\Telefon;
use App\Helpers\UredjajiHelper;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class KancelarijeKontroler extends Kontroler
{

    public function __construct()
    {
        $this->middleware('can:admin')->except('getLista');
    }

    public function getLista()
    {
        $kancelarije = Kancelarija::with('lokacija', 'sprat', 'telefoni', 'zaposleni', 'zaposleni.uprava')->get();
        $lokacije = Lokacija::all();
        $spratovi = Sprat::orderBy('id')->get();
        return view('sifarnici.kancelarije')->with(compact('kancelarije', 'lokacije', 'spratovi'));
    }

    public function postDetalj(Request $request)
    {
        if ($request->ajax()) {
            $kancelarije = Kancelarija::find($request->id);
            $lokacije = Lokacija::all();
            $spratovi = Sprat::orderBy('id')->get();
            return response()->json(array(
                        'kancelarije' => $kancelarije,
                        'lokacije' => $lokacije,
                        'spratovi' => $spratovi));
        }
    }

    public function getDetalj($id)
    {
        $kancelarija = Kancelarija::find($id);
        $uredjaji_svi = UredjajiHelper::kancelarijaUredjaji($id);
        $uredjaji_kanc = $uredjaji_svi->where('otpis', null);
        $uredjaji = $this->paginate($uredjaji_kanc, 10);
        $zaposleni = Zaposleni::with('uprava')->orderBy('ime', 'asc')->orderBy('prezime', 'asc')->get();
        return view('sifarnici.kancelarije_detalj')->with(compact('kancelarija', 'uredjaji', 'zaposleni'));
    }

    public function postDodavanje(Request $request)
    {

        $this->validate($request, [
            'naziv' => [
                'required',
                'max:50'
            ],
        ]);

        $kancelarija = new Kancelarija();
        $kancelarija->naziv = $request->naziv;
        $kancelarija->sprat_id = $request->sprat_id;
        $kancelarija->lokacija_id = $request->lokacija_id;
        $kancelarija->povrsina = $request->povrsina;
        $kancelarija->napomena = $request->napomena;
        $kancelarija->save();

        Session::flash('uspeh', 'Stavka je uspešno dodata!');
        return redirect()->route('kancelarije');
    }

    public function postIzmena(Request $request)
    {
        $this->validate($request, [
            'nazivModal' => [
                'required',
                'max:50'
            ]
        ]);

        $kancelarija = Kancelarija::find($request->idModal);
        $kancelarija->naziv = $request->nazivModal;
        $kancelarija->sprat_id = $request->sprat_idModal;
        $kancelarija->napomena = $request->napomenaModal;
        $kancelarija->povrsina = $request->povrsinaModal;
        $kancelarija->lokacija_id = $request->lokacija_idModal;
        $kancelarija->save();

        Session::flash('uspeh', 'Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $request)
    {

        $kancelarija = Kancelarija::find($request->idBrisanje);
        $odgovor = $kancelarija->delete();
        if ($odgovor) {
            Session::flash('uspeh', 'Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
        return redirect()->route('kancelarije');
    }

    public function postUklanjanje(Request $request)
    {
        $zaposleni = Zaposleni::findOrFail($request->idUklanjanjeZaposleni);
        $zaposleni->kancelarija_id = null;
        $odgovor = $zaposleni->save();
        if ($odgovor) {
            Session::flash('uspeh', 'Zaposleni je uspešno uklonjen iz kancelarije!');
        } else {
            Session::flash('greska', 'Došlo je do greške prilikom uklanjanja zaposlenog iz kancelarije. Pokušajte ponovo, kasnije!');
        }
        return Redirect::back();
    }

    public function postDodavanjeZaposleni(Request $request)
    { 
         $this->validate($request, [
            'zaposleni_id' => [
                'required',
            ],
            'kancelarija_id' => [
                'required',
            ],
        ]);

         $zaposleni = Zaposleni::findOrFail($request->zaposleni_id);
         $zaposleni->kancelarija_id = $request->kancelarija_id;
         $zaposleni->save();

         Session::flash('uspeh', 'Zaposleni je uspešno raspoređen u kancelariju!');
        return Redirect::back();
    }

    public function postDodavanjeTelefon(Request $request)
    {

        $this->validate($request, [
            'broj_telefona' => [
                'required',
            ],
            'kancelarija_id' => [
                'required',
            ],
        ]);

        $data = new Telefon();
        $data->broj = $request->broj_telefona;
        $data->vrsta = $request->vrstaModal;
        $data->kancelarija_id = $request->kancelarija_id;

        $data->save();


        Session::flash('uspeh', 'Broj telefona je uspešno dodat!');
        return Redirect::back();
    }

    public function getTlocrt($id)
    {
        $kancelarija = Kancelarija::find($id);
        
        $slika = null;

        switch ($kancelarija->lokacija_id) {
            case 1:
                if ($kancelarija->sprat_id == 8) {
                    $slika = "../../images/opstina5.jpg";
                }elseif ($kancelarija->sprat_id == 7) {
                    $slika = "../../images/opstina4.jpg";
                }elseif ($kancelarija->sprat_id == 6) {
                    $slika = "../../images/opstina3.jpg";
                }elseif ($kancelarija->sprat_id == 5) {
                    $slika = "../../images/opstina2.jpg";
                }elseif ($kancelarija->sprat_id == 4) {
                    $slika = "../../images/opstina1.jpg";
                }elseif ($kancelarija->sprat_id == 3) {
                    $slika = "../../images/opstinaprizemlje.jpg";
                }elseif ($kancelarija->sprat_id == 1) {
                    $slika = "../../images/opstinapodrum.jpg";
                }elseif ($kancelarija->sprat_id == 9) {
                    $slika = "../../images/opstina6.jpg";
                }
                break;
                 case 3: 
                    $slika = "../../images/VARTEX.jpg";
                    break;
                case 37: 
                    $slika = "../../images/I maj.jpg";
                    break;
                case 62:
                    $slika = "../../images/I maj.jpg";
                    break;
            default:
                $slika = null;
                break;
        }

        return view('sifarnici.kancelarije_slika')->with(compact('kancelarija', 'slika'));
    }

    public function postKoordinate(Request $request)
    {

        $kancelarija = Kancelarija::find($request->id_kancelarije);
        $kancelarija->x = $request->x_inputPolje;
        $kancelarija->y = $request->y_inputPolje;
        $kancelarija->save();

        return Redirect::back();
    }

    function paginate($kolekcija, $poStrani)
    {
        if (is_array($kolekcija)) {
            $kolekcija = collect($kolekcija);
        }

        return new LengthAwarePaginator(
                $kolekcija->forPage(Paginator::resolveCurrentPage(), $poStrani), $kolekcija->count(), $poStrani, Paginator::resolveCurrentPage(), [
            'path' => Paginator::resolveCurrentPath()]
        );
    }

}
