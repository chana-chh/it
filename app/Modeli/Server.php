<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class Server extends Model
{
    protected $table = 'serveri';
    public $timestamps = false;

    public function kancelarija()
    {
        return $this->belongsTo('App\Modeli\Kancelarija', 'kancelarija_id', 'id');
    }

    public function operativniSistem()
    {
        return $this->belongsTo('App\Modeli\OperativniSistem', 'os_id', 'id');
    }

    public function bu()
    {
        return $this->hasMany('App\Modeli\ServerBu', 'server_id', 'id');
    }

    public function up()
    {
        return $this->hasMany('App\Modeli\ServerUp', 'server_id', 'id');
    }

    public function poslednji_bu()
    {
        $bu = $this->bu()->orderBy('datum', 'desc')->first();  
        return $bu;
    }

    public function poslednji_up()
    {
        $up = $this->up()->orderBy('datum', 'desc')->first();
        return $up;
    }

    public function setLozinkaAttribute($value)
    {
        if ($value === null) {
            $this->attributes['lozinka'] = null;
        }else{
            $this->attributes['lozinka'] = Crypt::encryptString($value);
        }  
    }

    public function getLozinkaAttribute($value)
    {
        if ($value) {
           return Crypt::decryptString($value);
        }
        return "";
    }
}
