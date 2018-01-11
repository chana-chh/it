@extends('sabloni.app')

@section('naziv', 'Servis | Detaljni pregled servisiranja uređaja')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="servis detaljno" src="{{url('/images/kvar.png')}}" style="height:64px;">&emsp;
        Detaljni pregled servisiranja uređaja
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
            <a class="btn btn-primary" href="{{route('servis')}}"
               title="Povratak na listu servisa">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('servis.izmena.get', $data->id)}}"
               title="Izmena podataka servisiranja">
                <i class="fa fa-pencil"></i>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 2rem;">
            <tr>
                <th style="width: 40%;">Broj prijave:</th>
                <td style="width: 60%;">{{$data->broj_prijave}}</td>
            </tr>

            <tr>
                <th style="width: 40%;">Datum prijave:</th>
                <td style="width: 60%;">{{$data->datum_prijave}}</td>
            </tr>

            <tr>
                <th style="width: 40%;">Naziv računara sa koga je izvršena prijava:</th>
                <td style="width: 60%;">@if($data->ime_racunara_prijave){{$data->ime_racunara_prijave}}@endif
                </td>
            </tr>

            <tr>
                <th style="width: 40%;">IP adresa sa koga je izvršena prijava:</th>
                <td style="width: 60%;">@if($data->ip_prijave){{$data->ip_prijave}}@endif
                </td>
            </tr>

            <tr>
                <th style="width: 40%;">Korisnik koji je prijavio problem:</th>
                <td style="width: 60%;"><a href="{{ route('zaposleni.detalj', $data->zaposleni->id) }}">{{$data->zaposleni->imePrezime()}}</a></td>
            </tr>

            <tr>
                <th style="width: 40%;">Lokacija:</th>
                <td style="width: 60%;"><a href="{{route('kancelarije.detalj.get', $data->kancelarija->id)}}">{{$data->kancelarija->sviPodaci()}}</a>
                </td>
            </tr>

            <tr>
                <th style="width: 40%;">Opis kvara korisnika:</th>
                <td style="width: 60%;">{{$data->opis_kvara_zaposleni}}</td>
            </tr>

            <tr>
                <th style="width: 40%;">Napomena:</th>
                <td style="width: 60%;"><em>{{$data->napomena}}</em></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
    
<div class="row ceo_dva">
<div class="col-md-12 boxic">
    <h3>Podaci o problemu servisera:</h3>
    <hr>
<table class="table" style="table-layout: fixed;">
        <tbody>
            @if($data->datum_prijema)
            <tr>
                <th style="width: 40%;">Datum prijema:</th>
                <td style="width: 60%;">{{$data->datum_prijema}}</td>
            </tr>
            @endif
            @if($data->datum_popravke)
            <tr>
                <th style="width: 40%;">Datum popravke:</th>
                <td style="width: 60%;">{{$data->datum_popravke}}</td>
            </tr>
            @endif
            @if($data->datum_isporuke)
            <tr>
                <th style="width: 40%;">Datum isporuke:</th>
                <td style="width: 60%;">{{$data->datum_isporuke}}
                </td>
            </tr>
            @endif
            @if($data->opis_kvara_servis)
            <tr>
                <th style="width: 40%;">Opis kvara servisera:</th>
                <td style="width: 60%;">{{$data->opis_kvara_servis}}</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
</div>

<!--  POCETAK brisanjeModal  -->
@include('sifarnici.inc.modal_otpis')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
<div class="row" style="margin-top: 5rem;">
    <div class="col-md-12">
        <h4>Status:</h4>
        @if($data->status_id)
        <h3 class="text-success">{{$data->status->naziv}}</h3>
        <hr>
        @endif
@if($uredjaj && $tip == 1)
<div class="panel panel-info noborder">
  <div class="panel-heading">
    <h4 class="panel-title" style="color: #2c3e50">Podaci o uređaju:</h4>
  </div>
  <div class="panel-body">
    <table class="table">
        <tbody>
            <tr>
                <th style="width: 30%;">Vrsta uređaja:</th>
                <td style="width: 70%;">{{$uredjaj->vrstaUredjaja->naziv}}</td>
            </tr>
             <tr>
                <th style="width: 30%;">Uređaj:</th>
                <td style="width: 70%;">{{$uredjaj->id}}</td>
            </tr>
        </tbody>
    </table>
    <div class="row">
    <div class="col-md-12 text-right">
                <a class="btn btn-primary btn-sm" id="dugmeDetalj" href="{{route('servis.redirekt', [$uredjaj->id, $uredjaj->vrsta_uredjaja_id])}}">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </div>
  </div>
</div>
@elseif($uredjaj && $tip == 2)
<div class="panel panel-info noborder">
  <div class="panel-heading">
    <h4 class="panel-title" style="color: #2c3e50">Podaci o uređaju:</h4>
  </div>
  <div class="panel-body">
    <table class="table">
        <tbody>
            <tr>
                <th style="width: 30%;">Vrsta uređaja:</th>
                <td style="width: 70%;">{{$uredjaj->vrstaUredjaja->naziv}}</td>
            </tr>
             <tr>
                <th style="width: 30%;">Uređaj:</th>
                <td style="width: 70%;">{{$uredjaj->id}}</td>
            </tr>
        </tbody>
    </table>
    <div class="row">
    <div class="col-md-12 text-right">
                <a class="btn btn-primary btn-sm" id="dugmeDetalj" href="{{route('servis.redirekt', [$uredjaj->id, $uredjaj->vrsta_uredjaja_id])}}">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </div>
  </div>
</div>
@else
<div class="row">
    <div class="col-md-12">
<h3 class="text-warning">Nije utvrđeno koji je uređaj neispravan</h3>
</div>
</div>

@endif
</div>
</div>
@if($broj)
<div class="row well" style="margin-right: 1px; margin-left: 1px">
    <div class="col-md-12">
<h3>Broj kvarova: {{$broj}}</h3>
</div>
</div>
@endif
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

});
</script>
@endsection