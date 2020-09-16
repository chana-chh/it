<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ServerUp extends Model
{
    protected $table = 'serveri_up';
    protected $appends = ['formatiran_datum'];
    public $timestamps = false;

    public function setDatumAttribute($value)
    {
        $this->attributes['datum'] = Carbon::parse($value)->format('Y-m-d');
    }

    public function getFormatiranDatumAttribute() 
    {
        return Carbon::parse($this->datum)->format('d.m.Y');
    }

    public function server()
    {
        return $this->belongsTo('App\Modeli\Server', 'server_id', 'id');
    }
}
