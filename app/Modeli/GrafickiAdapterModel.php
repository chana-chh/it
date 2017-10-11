<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class GrafickiAdapterModel extends Model
{
    protected $table = 'graficki_adapteri_modeli';
    public $timestamps = false;

    public function proizvodjac()
    {
        return $this->belongsTo('App\Modeli\Proizvodjac', 'proizvodjac_id', 'id');
    }

    public function tipMemorije()
    {
        return $this->belongsTo('App\Modeli\TipMemorije', 'tip_memorije_id', 'id');
    }

    public function vgaSlot()
    {
        return $this->belongsTo('App\Modeli\VgaSlot', 'vga_slot_id', 'id');
    }

    public function grafickiAdapteri()
    {
        return $this->hasMany('App\Modeli\GrafickiAdapter', 'graficki_adapter_model_id', 'id');
    }
}
