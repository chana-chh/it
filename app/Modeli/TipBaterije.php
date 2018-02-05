<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class TipBaterije extends Model
{
    protected $table = 's_baterije';
    public $timestamps = false;

    public function upseviModeli()
    {
        return $this->hasMany('App\Modeli\UpsModel', 'tip_baterije_id', 'id');
    }

    public function broj()
    {

    	        $upsevi = Ups::whereHas('upsModel', function($query){
            $query->where('ups_modeli.tip_baterije_id', '=', $this->id);
        })->get();

    	        $broj_bat = 0;
    	        foreach ($upsevi as $ups) {
    	        	$broj_bat += $ups->upsModel->broj_baterija;
    	        }
        
        return $broj_bat;
    }

}
