<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class UgovorOdrzavanje extends Model
{
    protected $table = 'ugovori_odrzavanja';
    public $timestamps = false;

    public function racuni()
    {
        return $this->hasMany('App\Modeli\Racun', 'ugovor_id', 'id');
    }

    public function utroseno()
    {
        return $this->racuni()->sum('ukupno');
    }

    public function preostalo()
    {
        return $this->iznos_sredstava - $this->utroseno();
    }

    public function dobavljac()
    {
        return $this->belongsTo('App\Modeli\Dobavljac', 'dobavljac_id', 'id');
    }

}
