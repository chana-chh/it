@extends('sabloni.app')

@section('naziv', 'Prijava kvara')

@section('stilovi')
<style>
    body {
        padding-top: 3rem;
    }
    #sviZaposleni {
        display: none;
    }
    #sveKancelarije {
        display: none;
    }
</style>
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-2">
        <a href="{{ route('imenik') }}">
            <img alt="Imenik" src="{{url('/images/imenik.png')}}" style="height: 128px;">
        </a>
    </div>
    <div class="col-md-8">
        <h1 class="text-center" style="font-size: 6rem;">Prijava kvara</h1>
    </div>
    <div class="col-md-2 text-right">
        <a href="{{ route('kvar') }}">
            <img alt="Kvar" src="{{url('/images/kvar.png')}}" style="height: 128px;">
        </a>
    </div>
</div>
<hr>
<div class="row ceo_dva">
    <div class="col-md-8 col-md-offset-2 boxic">
        nesto
    </div>
</div>
@endsection

@section('skripte')
<script>
    $(document).ready(function () {

    });
</script>
@endsection
