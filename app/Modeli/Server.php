<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
}
