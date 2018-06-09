<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

use Podesavanja;
use Carbon\Carbon;

class Racun extends Model
{
    protected $table = 'racuni';
    protected $appends = ['formatiran_datum'];
    public $timestamps = false;

    public function ugovor()
    {
        return $this->belongsTo('App\Modeli\UgovorOdrzavanje', 'ugovor_id', 'id');
    }

    public function slike()
    {
        return $this->hasMany('App\Modeli\RacunSlika', 'racun_id', 'id');
    }

    public function otpremnice()
    {
        return $this->hasMany('App\Modeli\Otpremnica', 'racun_id', 'id');
    }

    public function setDatumAttribute($value)
    {
        $this->attributes['datum'] = Carbon::parse($value)->format('Y-m-d');
    }

    function getFormatiranDatumAttribute() 
    {
        return Carbon::parse($this->datum)->format('d.m.Y');
    }
}
