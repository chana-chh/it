<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class ServisKvar extends Model
{
    protected $table = 'servis_kvarovi';
    public $timestamps = false;

    public function servis()
    {
    	return $this->belongsTo('App\Modeli\Servis', 'servis_id', 'id');
    }
}
