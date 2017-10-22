@extends('sabloni.app')

@section('naziv', 'Modeli | Model memorije detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Model memorije detaljno" src="{{url('/images/memorija.png')}}" style="height:64px;">
        Detaljni pregled modela memorije
    </h1>
@endsection

@section('sadrzaj')
<div class="row">
    <div class="col-md-12">
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 2rem;">
            <tr>
                <th style="width: 20%;">Proizvođač:</th>
                <td style="width: 80%;">{{$memorija->proizvodjac->naziv}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Tip memorije:</th>
                <td style="width: 80%;">{{$memorija->tipMemorije->naziv}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Brzina:</th>
                <td style="width: 80%;">{{$memorija->brzina}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Kapacitet:</th>
                <td style="width: 80%;">{{$memorija->kapacitet}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
    
    {{--  POCETAK Wellil  --}}
<div class="row well" style="overflow: auto; margin-top: 40px">
<h4>Napomena:</h4>
<em>{{$memorija->napomena}}</em>

</div> {{-- Kraj reda sa well-om --}}
<hr style="border-top: 1px solid #18BC9C">

<div class="row dugmici">
        <div class="col-md-10 col-md-offset-1" style="margin-top: 20px">

            <div class="col-md-4 text-left">
                <a class="btn btn-info" href="{{route('memorije.modeli')}}" title="Povratak na listu modela memorije"><i class="fa fa-list" style="color:#2C3E50"></i></a>
            </div>

            <div class="col-md-4 text-center">
                <a class="btn btn-info" href="{{route('memorije.modeli.izmena.get', $memorija->id) }}" title="Izmena osnovnih podataka o modelu memorije"><i class="fa fa-pencil" style="color:#2C3E50"></i></a>
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
<p class="tankoza krug_mali">{{$memorija->ocena}}</p>
</div>
</div>

<div class="row">
<div class="col-md-10 col-md-offset-3">
    <h4>Ocena modela memorije</h4>
</div>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
<h3>Broj memorije ovog modela: <a href="{{route('memorije.modeli.uredjaji', $memorija->id) }}" title="Pregled svih uređaja ovog modela memorije"> {{$memorija->memorije->count()}} </a></h3>

<h3>Broj računara sa ovim modelom memorije: <a href="{{route('memorije.modeli.racunari', $memorija->id) }}" title="Pregled svih računara sa ovim modelom memorije"> {{$racunari}} </a></h3>
</div>
</div>

<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <a href="{{$memorija->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
</div>
</div>

@endsection