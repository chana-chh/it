<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 's_statusi';
    public $timestamps = false;

    public function servisi()
    {
        return $this->hasMany('App\Modeli\Servis', 'status_id', 'id');
    }

}
