@extends('sabloni.app')

@section('naziv', 'Modeli | Model UPS uređaja detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Model UPS uređaja detaljno" src="{{url('/images/ups1.jpg')}}" style="height:64px;">&emsp;
        Detaljni pregled modela 
         <em>{{ $model->naziv }}</em>
         UPS uređaja
    </h1>
@endsection

@section('sadrzaj')
<div class="row">
    <div class="col-md-12">
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 2rem;">
            <tr>
                <th style="width: 20%;">Proizvođač:</th>
                <td style="width: 80%;">{{$model->proizvodjac->naziv}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Snaga:</th>
                <td style="width: 80%;">{{$model->snaga}} W
                </td>
            </tr>

                        <tr>
                <th style="width: 20%;">Kapacitet:</th>
                <td style="width: 80%;">{{$model->kapacitet}} VA
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
    
<div class="row ceo_dva">
<div class="col-md-12 boxic">
<h5>Napomena: 
    <br>
    <hr>
    <em>{{$model->napomena}}</em>
</h5>
</div>
</div>

    <div class="row dugmici">
        <div class="col-md-12" style="margin-top: 20px">
    <div class="col-md-4 text-left">
        <a class="btn btn-info" href="{{route('upsevi.modeli')}}"
           title="Povratak na listu modela UPS uređaja">
            <i class="fa fa-list" style="color:#2C3E50"></i>
        </a>
    </div>
    <div class="col-md-4 text-center">
        <a class="btn btn-info" href="{{route('upsevi.modeli.izmena.get', $model->id) }}"
           title="Izmena podataka o modelu UPS uređaja">
            <i class="fa fa-pencil" style="color:#2C3E50"></i>
        </a>
    </div>
    <div class="col-md-4 text-right">
        <a class="btn btn-info" href="{{route('pocetna')}}"
           title="Povratak na početnu stranu">
            <i class="fa fa-home" style="color:#2C3E50"></i>
        </a>
    </div>
</div>
</div>
@endsection

@section('traka')
<div class="row well">
    <div class="col-md-12">
        <h4><i class="fa fa-battery-half" style="color:#2C3E50"></i>&emsp;Podaci o pripadajućim baterijima</h4>
    <table class="table">
        <tbody>

            <tr>
                <th style="width: 40%;">Baterija (naziv):</th>
                <td style="width: 60%;"><a href="{{route('upsevi.modeli.baterije', $model->id)}}"
           title="Brojno stanje ovog modela baterije">{{$model->baterija}}&emsp;
            <i class="fa fa-search" style="color:#2C3E50"></i>
        </a></td>
            </tr>
            <tr>
                <th style="width: 40%;">Broj baterija:</th>
                <td style="width: 60%;">{{$model->broj_baterija}}</td>
            </tr>

            <tr>
                <th style="width: 40%;">Kapacitet baterije:</th>
                <td style="width: 60%;">{{$model->baterija_kapacitet}} Ah
                </td>
            </tr>

                        <tr>
                <th style="width: 40%;">Napon baterije:</th>
                <td style="width: 60%;">{{$model->baterija_napon}} V
                </td>
            </tr>

             <tr>
                <th style="width: 40%;">Dimenzije baterije:</th>
                <td style="width: 60%;">{{$model->baterija_dimenzije}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>

<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <h3>Broj UPS uređaja ovog modela: <a href="{{route('upsevi.modeli.uredjaji', $model->id) }}" title="Pregled svih uređaja ovog UPS modela"> {{$model->upsevi->count()}} </a></h3>
    <a href="{{$model->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
</div>
</div>

@endsection