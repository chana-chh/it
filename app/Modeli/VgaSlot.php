<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class VgaSlot extends Model
{
    protected $table = 'vga_slotovi';
    public $timestamps = false;

    public function grafickiAdapteriModeli(){
    	return $this->hasMany('App\Modeli\GrafickiAdapterModel', 'slot_id', 'id');
    }
}
