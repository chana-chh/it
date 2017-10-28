@extends('sabloni.app')

@section('naziv', 'Modeli | Model napajanja detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Model napajanja detaljno" src="{{url('/images/napajanje.png')}}" style="height:64px;">&emsp;
        Detaljni pregled modela 
         <i>{{ $model->naziv }}</i>
         napajanja
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
                <td style="width: 80%;">{{$model->snaga}}
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
        <a class="btn btn-info" href="{{route('napajanja.modeli')}}"
           title="Povratak na listu modela napajanja">
            <i class="fa fa-list" style="color:#2C3E50"></i>
        </a>
    </div>
    <div class="col-md-4 text-center">
        <a class="btn btn-info" href="{{route('napajanja.modeli.izmena.get', $model->id) }}"
           title="Izmena osnovnih podataka o modelu napajanja">
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
<h3>Broj napajanja ovog modela: <a href="{{route('napajanja.modeli.uredjaji', $model->id) }}" title="Pregled svih uređaja ovog modela napajanja"> {{$model->napajanja->count()}} </a></h3>

<h3>Broj računara sa ovim modelom napajanja: <a href="{{route('napajanja.modeli.racunari', $model->id) }}" title="Pregled svih računara sa ovim modelom napajanja"> {{$racunari}} </a></h3>
</div>
</div>

<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <a href="{{$model->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
</div>
</div>

@endsection