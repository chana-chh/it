<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;
Use App\Modeli\Stampac;
Use App\Modeli\StampacModel;

class Toner extends Model
{
    protected $table = 's_toneri';
    public $timestamps = false;

    public function stampaciModeli()
    {
        return $this->hasMany('App\Modeli\StampacModel', 'tip_tonera_id', 'id');
    }

     public function broj()
    {

    	        $brojno_stanje = Stampac::whereHas('stampacModel', function($query){
            $query->where('stampaci_modeli.tip_tonera_id', '=', $this->id);
        })->count();
        
        return $brojno_stanje;
    }

}
