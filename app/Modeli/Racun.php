<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

use Podesavanja;

class Racun extends Model
{
    protected $table = 'racuni';
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
}
