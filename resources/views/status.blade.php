@extends('sabloni.app')

@section('naziv', 'Status prijave kvara')

@section('stilovi')
<style>
    body {
        padding-top: 1rem;
    }
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
                Prijava kvara broj: <span class="text-success">{{ $servis->broj_prijave }}</span>
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
<div class="col-md-8 col-md-offset-2">
    <table class="table table-striped table-responsive" style="table-layout: fixed;">
        <tbody>
            <tr class="text-info"  style="font-size: 2rem;">
                <th style="width: 25%;">Status prijave:</th>
                <td style="width: 75%;">{{ $servis->status->naziv }}</td>
            </tr>
            <tr>
                <th>Zaposleni koji je prijavio kvar:</th>
                <td>{{ $servis->zaposleni->imePrezime() }}</td>
            </tr>
            <tr>
                <th>Kancelarija u kojoj je prijavljen kvar:</th>
                <td>{{ $servis->kancelarija->sviPodaci() }}</td>
            </tr>
            <tr>
                <th>Datum prijave kvara:</th>
                <td>{{ \Carbon\Carbon::parse($servis->datum_prjave)->format('d.m.Y') }}</td>
            </tr>
            <tr>
                <th>Opis kvara od strane zaposlenog:</th>
                <td>{{ $servis->opis_kvara_zaposleni }}</td>
            </tr>
            <tr>
                <th>Datum prijema u IKT:</th>
                <td>{{ $servis->datum_prijema ? \Carbon\Carbon::parse($servis->datum_prijema)->format('d.m.Y') : '-' }}</td>
            </tr>
            <tr>
                <th>Datum popravke:</th>
                <td>{{ $servis->datum_popravke ? \Carbon\Carbon::parse($servis->datum_popravke)->format('d.m.Y') : '-' }}</td>
            </tr>
            <tr>
                <th>Datum isporuke:</th>
                <td>{{ $servis->datum_isporuke ? \Carbon\Carbon::parse($servis->datum_isporuke)->format('d.m.Y') : '-' }}</td>
            </tr>
            <tr>
                <th>Opis kvara od strane IKT:</th>
                <td>{{ $servis->opis_kvara_servis }}</td>
            </tr>
            <tr>
                <th>Vrsta uređaja:</th>
                <td>{{ $servis->vrstaUredjaja ? $servis->vrstaUredjaja->naziv : '-' }}</td>
            </tr>
            <tr>
                <th>Napomena:</th>
                <td>{{ $servis->napomena }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

@section('skripte')
<script>
    $(document).ready(function () {

    });
</script>
@endsection
