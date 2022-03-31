<?php

namespace App\Modeli;

use Illuminate\Database\Eloquent\Model;

class StatickaIP extends Model
{
    protected $table = 'staticke_ip';
    public $timestamps = false;

    public function scopeSlobodne($query)
    {
        return $query->whereNull('kancelarija_id')
        ->whereNull('uredjaj')
        ->whereNull('uticnica')
        ->whereNull('prvi_nod')
        ->whereNull('opis')
        ->whereNull('napomena');
    }

    public function scopeZauzete($query)
    {
        return $query->whereNotNull('kancelarija_id')
        ->orWhereNotNull('uredjaj')
        ->orWhereNotNull('uticnica')
        ->orWhereNotNull('prvi_nod')
        ->orWhereNotNull('opis')
        ->orWhereNotNull('napomena');
    }

    public function kancelarija()
    {
        return $this->belongsTo('App\Modeli\Kancelarija', 'kancelarija_id', 'id');
    }

    public function prvaDostupna()
    {
    	$adrese = $this->whereNull('kancelarija_id')
    	->whereNull('uredjaj')
    	->whereIn('vlan', [0, 1])
        ->whereNull('uticnica')
        ->whereNull('prvi_nod')
    	->whereNull('opis')
    	->whereNull('napomena')->pluck('ip_adresa')->toArray();
		natsort($adrese);
		$adresa = array_shift($adrese);
     	return $adresa;
    }

    public function ipRange($pocetak, $kraj){
  		$pocetak = ip2long($pocetak);
  		$kraj = ip2long($kraj);
  		return array_map('long2ip', range($pocetak, $kraj));
    }

}
