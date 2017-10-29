<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class MonitorModel extends Model
{
    protected $table = 'monitori_modeli';
    public $timestamps = false;

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function dijagonala()
    {
        return $this->belongsTo('App\Modeli\MonitorDijagonala', 'dijagonala_id', 'id');
    }

    public function povezivanja()
    {
        return $this->belongsToMany('App\Modeli\MonitorPovezivanje', 'monitori_povezivanje', 'monitor_model_id', 'povezivanje_id');
    }

    public function monitori()
    {
    	return $this->hasMany('App\Modeli\Monitor', 'monitor_model_id', 'id');
    }
}
