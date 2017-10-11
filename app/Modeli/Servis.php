<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    protected $table = 'servis';
    public $timestamps = false;


    public function racunar()
    {
        return $this->belongsTo('App\Modeli\Racunar', 'racunar_id', 'id');
    }
}
