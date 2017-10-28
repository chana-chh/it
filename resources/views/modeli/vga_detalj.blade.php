@extends('sabloni.app')

@section('naziv', 'Modeli | Model grafičkog adaptera detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Model grafičkog adaptera detaljno" src="{{url('/images/vga.png')}}" style="height:64px;">
        Detaljni pregled modela grafičkog adaptera &emsp;<span style="color: #18bc9c">{{$vga->naziv}}</span>
    </h1>
@endsection

@section('sadrzaj')
<div class="row">
    <div class="col-md-12">
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 2rem;">
            <tr>
                <th style="width: 20%;">Proizvođač:</th>
                <td style="width: 80%;">{{$vga->proizvodjac->naziv}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Čip:</th>
                <td style="width: 80%;">{{$vga->cip}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Tip memorije:</th>
                <td style="width: 80%;">{{$vga->tipMemorije->naziv}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Kapacitet memorije:</th>
                <td style="width: 80%;">{{$vga->kapacitet_memorije}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">VGA slotovi:</th>
                <td style="width: 80%;">{{$vga->vgaSlot->naziv}}
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
    <em>{{$vga->napomena}}</em>
</h5>
</div>
</div>

<div class="row dugmici">
        <div class="col-md-12" style="margin-top: 20px">

            <div class="col-md-4 text-left">
                <a class="btn btn-info" href="{{route('vga.modeli')}}" title="Povratak na listu modela grafičkih adaptera"><i class="fa fa-list" style="color:#2C3E50"></i></a>
            </div>

            <div class="col-md-4 text-center">
                <a class="btn btn-info" href="{{route('vga.modeli.izmena.get', $vga->id) }}" title="Izmena osnovnih podataka o modelu grafičkog adaptera"><i class="fa fa-pencil" style="color:#2C3E50"></i></a>
            </div>

            <div class="col-md-4 text-right">
                <a class="btn btn-info" href="{{route('pocetna')}}" title="Povratak na početnu stranu"><i class="fa fa-home" style="color:#2C3E50"></i></a>
            </div>

        </div>
    </div>
@endsection

@section('traka')
<div class="row well" style="overflow: auto;">
    <div class="col-md-12">
<h3>Broj grafičkog adaptera ovog modela: <a href="{{route('vga.modeli.uredjaji', $vga->id) }}" title="Pregled svih uređaja ovog modela grafičkog adaptera"> {{$vga->grafickiAdapteri->count()}} </a></h3>

<h3>Broj računara sa ovim modelom grafičkog adaptera: <a href="{{route('vga.modeli.racunari', $vga->id) }}" title="Pregled svih računara sa ovim modelom grafičkog adaptera"> {{$racunari}} </a></h3>
</div>
</div>

<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <a href="{{$vga->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
</div>
</div>

@endsection