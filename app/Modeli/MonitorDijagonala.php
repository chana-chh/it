<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class MonitorDijagonala extends Model
{
    protected $table = 's_dijagonale';
    public $timestamps = false;

    public function monitoriModeli()
    {
        return $this->hasMany('App\Modeli\MonitorModel', 'dijagonala_id', 'id');
    }

    public function inc()
    {
        return (string)$this->naziv . ' "';
    }
}
