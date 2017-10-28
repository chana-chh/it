@extends('sabloni.app')

@section('naziv', 'Modeli | Model čvrstog diska detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Model čvrstog diska detaljno" src="{{url('/images/hdd.png')}}" style="height:64px;">
        Detaljni pregled modela hard diska
    </h1>
@endsection

@section('sadrzaj')
<div class="row">
    <div class="col-md-12">
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 2rem;">
            <tr>
                <th style="width: 20%;">Proizvođač:</th>
                <td style="width: 80%;">{{$hdd->proizvodjac->naziv}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Povezivanje:</th>
                <td style="width: 80%;">{{$hdd->povezivanje->naziv}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Kapacitet:</th>
                <td style="width: 80%;">{{$hdd->kapacitet}} (GB)
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row">
            <div class="col-md-6">
                <div class="form-group checkboxoviforme">
                <label>
                <input type="checkbox" name="ssd" id="ssd" {!!$hdd->ssd == 0 ? "" :'checked="checked"'!!} onclick="return false;">
                &emsp;Da li se radi o Solid State Disk-u?
            </label>
        </div>
    </div>
    </div>
</div>
</div>
    
<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <h5>Napomena:
            <br>
            <hr>
            <em>{{$hdd->napomena}}</em>
        </h5>
    </div>
</div>

<div class="row dugmici">
    <div class="col-md-12" style="margin-top: 20px">

        <div class="col-md-4 text-left">
            <a class="btn btn-info" href="{{route('hddovi.modeli')}}" title="Povratak na listu modela čvrstih diskova">
                <i class="fa fa-list" style="color:#2C3E50"></i>
            </a>
        </div>

        <div class="col-md-4 text-center">
            <a class="btn btn-info" href="{{route('hddovi.modeli.izmena.get', $hdd->id) }}" title="Izmena osnovnih podataka o modelu čvrstog diska">
                <i class="fa fa-pencil" style="color:#2C3E50"></i>
            </a>
        </div>

        <div class="col-md-4 text-right">
            <a class="btn btn-info" href="{{route('pocetna')}}" title="Povratak na početnu stranu">
                <i class="fa fa-home" style="color:#2C3E50"></i>
            </a>
        </div>

    </div>
</div>
@endsection

@section('traka')
<div class="row">
    <div class="col-md-6 col-md-offset-4">
        <p class="tankoza krug_mali">{{$hdd->ocena}}</p>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-3">
        <h4>Ocena modela čvrstog diska</h4>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
        <h3>Broj čvrstih diskova ovog modela:
            <a href="{{route('hddovi.modeli.uredjaji', $hdd->id) }}" title="Pregled svih uređaja ovog modela čvrstog diska">
            {{$hdd->hddovi->count()}} </a>
        </h3>

        <h3>Broj računara sa ovim modelom čvrstog diska:
            <a href="{{route('hddovi.modeli.racunari', $hdd->id) }}" title="Pregled svih računara sa ovim modelom čvrstog diska">
            {{$racunari}} </a>
        </h3>
    </div>
</div>

<div class="row" style="margin-top: 50px">
    <div class="col-md-12 text-center">
        <a href="{{$hdd->link}}" target="_blank">
            <img alt="link" src="{{url('/images/link.png')}}" style="height:32px;">
        </a>
    </div>
</div>

@endsection