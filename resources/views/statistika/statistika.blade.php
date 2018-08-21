@extends('sabloni.app')

@section('naziv', 'Statistika')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
        <h1 class="page-header">
        <img class="slicica_animirana" alt="Statistički podaci" src="{{url('/images/statistika.png')}}" style="height:64px;">&emsp;
        Statistički podaci
    </h1>
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
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
<h2>Računari</h2>
</div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">

            <a class="btn btn-success" href="{{ route('statistika.os') }}"
               title="Grafički pregled raspoređenosti operativnih sistema">
                Pregled raspoređenosti OS
            </a>
        </div>
            <div class="col-md-3">

            <a class="btn btn-success" href="{{ route('statistika.ocene') }}"
               title="Grafički pregled računara po ocenama">
                Pregled računara po ocenama
            </a>
        </div>
        <div class="col-md-3">

            <a class="btn btn-success" href="{{ route('statistika.upraveotpis') }}"
               title="Grafički pregled računara predviđenih za zamenu po upravama">
                Pregled računara za otpis po upravama
            </a>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
<h2>Komponente</h2>
</div>
</div>
<hr>
<div class="row">
    <div class="col-md-3">

            <a class="btn btn-success" href="{{ route('statistika.cpu') }}"
               title="Grafički pregled raspoređenosti procesora">
                Pregled raspoređenosti procesora
            </a>
        </div>
    </div>
@endsection