<?php

namespace App\Http\Controllers\Sifarnici;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\Http\Controllers\Kontroler;

use App\Modeli\MonitorDijagonala;

class DijagonaleKontroler extends Kontroler
{
    public function getLista()
    {
        $dijagonale = MonitorDijagonala::all();
        return view('sifarnici.dijagonale')->with(compact ('dijagonale'));
    }

    public function postDodavanje(Request $req)
    {
        $this->validate($req, [
            'naziv' => [
                'required',
                'unique:s_dijagonale,naziv',
            	],
        	]);

        $dijagonala = new MonitorDijagonala();
        $dijagonala->naziv = $req->naziv;
        $dijagonala->save();

        Session::flash('uspeh','Stavka je uspešno dodata!');
        return redirect()->route('dijagonale');
    }

    public function postDetalj(Request $req)
    {
        if($req->ajax())
        {
            $id = $req->id;
            $dijagonala = MonitorDijagonala::find($id);
            return response()->json($dijagonala);
        }
    }

    public function postIzmena(Request $req)
    {
        $id = $req -> edit_id;
        $this->validate($req, [
        'nazivModal' => [
            'required',
            'unique:s_dijagonale,naziv,' . $id,
            ],
        ]);

        $dijagonala = MonitorDijagonala::find($id);
        $dijagonala->naziv = $req->nazivModal;
        $dijagonala->save();

        Session::flash('uspeh','Stavka je uspešno izmenjena!');
        return Redirect::back();
    }

    public function postBrisanje(Request $req)
    {
        $id = $req->id;
        $dijagonala = MonitorDijagonala::find($id);
        $odgovor = $dijagonala->delete();
        if ($odgovor) {
            Session::flash('uspeh','Stavka je uspešno obrisana!');
        } else {
            Session::flash('greska','Došlo je do greške prilikom brisanja stavke. Pokušajte ponovo, kasnije!');
        }
    }
}
