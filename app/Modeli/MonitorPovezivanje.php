<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class MonitorPovezivanje extends Model {

    protected $table = 's_monitori_povezivanje';
    public $timestamps = false;

    public function monitoriModeli() {
        return $this->belongsToMany('App\Modeli\MonitorModel', 'monitori_povezivanje', 'povezivanje_id', 'monitor_model_id');
    }

    public function projektori() {
        return $this->belongsToMany('App\Modeli\Projektor', 'projektor_povezivanje', 'povezivanje_id', 'projektor_id');
    }

}

