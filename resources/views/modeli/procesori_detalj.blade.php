@extends('sabloni.app')

@section('naziv', 'Modeli | Model procesora detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="korisnik" src="{{url('/images/cpu.png')}}" style="height:50px;">
        Detaljni pregled modela 
         <i>{{ $procesor->naziv }}</i>
         procesora
    </h1>
@endsection

@section('sadrzaj')
<div class="row">
    <div class="col-md-12">
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 2rem;">
            <tr>
                <th style="width: 20%;">Proizvođač:</th>
                <td style="width: 80%;">{{$procesor->proizvodjac->naziv}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Soket:</th>
                <td style="width: 80%;">{{$procesor->soket->naziv}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Takt:</th>
                <td style="width: 80%;">{{$procesor->takt}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Keš:</th>
                <td style="width: 80%;">{{$procesor->kes}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Broj jezgara:</th>
                <td style="width: 80%;">{{$procesor->broj_jezgara}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Broj niti:</th>
                <td style="width: 80%;">{{$procesor->broj_niti}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
    
    {{--  POCETAK Wellil  --}}
<div class="row well" style="overflow: auto; margin-top: 40px">
<h4>Napomena:</h4>
<p>{{$procesor->napomena}}</p>
Broj procesora u posedu GU u ovom trenutku: {{$procesor->procesori->count()}}
Broj računara u posedu GU u ovom trenutku: {{$racunari}}
</div> {{-- Kraj reda sa well-om --}}

<hr>

<div class="row dugmici">
        <div class="col-md-10 col-md-offset-1" style="margin-top: 20px">

            <div class="col-md-4 text-left">
                <a class="btn btn-info" href="{{route('procesori.modeli')}}" title="Povratak na listu modela procesora"><i class="fa fa-list" style="color:#2C3E50"></i></a>
            </div>

            <div class="col-md-4 text-center">
                <a class="btn btn-info" href="{{route('procesori.modeli.izmena.get', $procesor->id) }}" title="Izmena osnovnih podataka o modelu procesora"><i class="fa fa-pencil" style="color:#2C3E50"></i></a>
            </div>

            <div class="col-md-4 text-right">
                <a class="btn btn-info" href="{{route('pocetna')}}" title="Povratak na početnu stranu"><i class="fa fa-home" style="color:#2C3E50"></i></a>
            </div>

        </div>
    </div>
@endsection

@section('traka')
<div class="row">
<div class="col-md-6 col-md-offset-4">
<p class="tankoza krug_mali">{{$procesor->ocena}}</p>
</div>
</div>

<div class="row">
<div class="col-md-10 col-md-offset-3">
    <h4>Ocena modela procesora</h4>
</div>
</div>

<hr>

<div class="row">
<div class="col-md-12">
    <a href="{{$procesor->link}}" target="_blank">{{$procesor->link}}</a>
</div>
</div>

@endsection