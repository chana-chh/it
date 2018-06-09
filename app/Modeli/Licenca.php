<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Licenca extends Model
{
    protected $table = 'licence';

    protected $appends = ['formatiran_pocetak', 'formatiran_prestanak'];

    public $timestamps = false;



    public function getFormatiranPocetakAttribute() {
        return Carbon::parse($this->datum_pocetka_vazenja)->format('d.m.Y');
    }

    public function getFormatiranPrestanakAttribute() {
        return Carbon::parse($this->datum_prestanka_vazenja)->format('d.m.Y');
    }

    public function setDatumPocetkaVazenjaAttribute($value)
    {
        $this->attributes['datum_pocetka_vazenja'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function setDatumPrestankaVazenjaAttribute($value)
    {
        $this->attributes['datum_prestanka_vazenja'] = Carbon::parse($value)->format('Y-m-d');
    }

}
