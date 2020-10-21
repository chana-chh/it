@extends('sabloni.app')

@section('naziv', 'Servis | Detaljni pregled uređaja na IP adresi')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        Detaljni pregled uređaja vezanog za <span class="text-success">{{$ip->ip_adresa}}</span>
    </h1>
@endsection

@section('sadrzaj')
<div class="row" style="margin-bottom: 16px;">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" onclick="window.history.back();"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{route('staticke.zauzete')}}"
               title="Povratak na listu zauzetih IP adresa">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('staticke.izmena.get', $ip->id)}}"
               title="Izmena podataka uređaja vezanog za IP adresu">
                <i class="fa fa-pencil"></i>
            </a>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 1rem;">
    <div class="col-md-12">
        
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 2rem;">
            <tr>
                <th style="width: 40%;">Uređaj:</th>
                <td style="width: 60%;">{{$ip->uredjaj}}</td>
            </tr>
            <tr>
                <th style="width: 40%;">Ime uređaja:</th>
                <td style="width: 60%;">{{$ip->ime}}</td>
            </tr>
            <tr>
                <th style="width: 40%;">Utičnica:</th>
                <td style="width: 60%;">{{$ip->uticnica}}</td>
            </tr>            
            <tr>
                <th style="width: 40%;">VLAN:</th>
                <td style="width: 60%;">{{$ip->vlan}}</td>
            </tr>
            <tr>
                <th style="width: 40%;">Serijski broj:</th>
                <td style="width: 60%;">{{$ip->sn}}</td>
            </tr>
            <tr>
                <th style="width: 40%;">Inventarski broj:</th>
                <td style="width: 60%;">{{$ip->inv_br}}</td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<div class="row" style="margin-top: 1rem;">
    <div class="col-md-12">
        <div class="panel panel-default">
  <div class="panel-heading">Opis:</div>
  <div class="panel-body">
    {{$ip->opis}}
  </div>
</div>
</div>
</div>
<div class="row" style="margin-top: 1rem;">
    <div class="col-md-12">
        <div class="panel panel-info">
  <div class="panel-heading">Napomena:</div>
  <div class="panel-body">
    {{$ip->napomena}}
  </div>
</div>
</div>
</div>
@endsection

@section('traka')
<div class="panel panel-default">
  <div class="panel-heading"><h3>Kancelarija:</h3></div>
  <div class="panel-body">
    <h4>{{$ip->kancelarija->sviPodaci()}}</h4>
  </div>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {s

});
</script>
@endsection