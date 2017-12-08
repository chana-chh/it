@extends('sabloni.app')

@section('naziv', 'Status prijave kvara')

@section('stilovi')
<style>

</style>
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-2 text-center">
        <a href="{{ route('imenik') }}">
            <img alt="Imenik" src="{{url('/images/imenik.png')}}" style="height: 128px;">
        </a>
        <h4>Pretraživanje imenika</h4>
    </div>
    <div class="col-md-8 text-center">
        <h1>Provera statusa prijave kvara</h1>
        <div class="row">
            <h2>
                Prijava broj:
                <span class="text-success">
                    {{ $servis->zaposleni_id }}_{{ $servis->kancelarija_id }}_{{ time() }}
                </span>

            </h2>
        </div>
    </div>
    <div class="col-md-2 text-center">
        <a href="{{ route('kvar') }}">
            <img alt="Kvar" src="{{url('/images/kvar.png')}}" style="height: 128px;">
        </a>
        <h4>Prijava/status kvara</h4>
    </div>
</div>
<hr>
@endsection

@section('skripte')
<script>
    $(document).ready(function () {

    });

</script>
@endsection
