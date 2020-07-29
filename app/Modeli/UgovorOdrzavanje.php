<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class UgovorOdrzavanje extends Model
{
    protected $table = 'ugovori_odrzavanja';
    protected $appends = ['preostalo'];
    public $timestamps = false;

    public function getPreostaloAttribute()
    {
    return $this->preostalo();
    }

    public function racuni()
    {
        return $this->hasMany('App\Modeli\Racun', 'ugovor_id', 'id');
    }

    public function utroseno()
    {
        return $this->racuni()->sum('iznos');
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
