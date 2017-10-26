@extends('sabloni.app')

@section('naziv', 'Šifarnici | Račun')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Racun" src="{{ url('/images/ugovor.png') }}" style="height:64px;">
    Detaljni pregled računa broj:
    <em>{{ $racun->broj }}</em>
</h1>
@endsection

@section('sadrzaj')
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped" style="table-layout: fixed;">
            <tbody>
                <tr>
                    <th style="width: 20%;">Broj:</th>
                    <td style="width: 80%;">{{ $racun->broj }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Datum:</th>
                    <td style="width: 80%;">{{ \Carbon\Carbon::parse($racun->datum)->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Iznos:</th>
                    <td style="width: 80%;">{{ number_format($racun->iznos, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">PDV:</th>
                    <td style="width: 80%;">{{ number_format($racun->pdv, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Ukupno:</th>
                    <td style="width: 80%;">{{ number_format($racun->ukupno, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Ugovor:</th>
                    <td style="width: 80%;">
                        <a href="{{ route('ugovori.detalj', $racun->ugovor->id) }}">
                            <strong>{{ $racun->ugovor->broj }}</strong>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%;">Napomena:</th>
                    <td style="width: 80%;">{{ $racun->napomena }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<hr>
<div class="row well" style="overflow: auto;">
    trt
</div>
<hr>
<div class="row dugmici">
    <div class="col-md-3 text-left">
        <a class="btn btn-info" href="{{ route('racuni') }}"
           title="Povratak na listu računa">
            <i class="fa fa-list" style="color:#2C3E50"></i>
        </a>
    </div>
    <div class="col-md-3 text-center">
        <a class="btn btn-info"
           onclick="window.history.back();">
            <i class="fa fa-arrow-left" style="color:#2C3E50"></i>
        </a>
    </div>
    <div class="col-md-3 text-center">
        <a class="btn btn-info" href="{{ route('racuni.izmena.get', $racun->id) }}"
           title="Izmena podataka o računu">
            <i class="fa fa-pencil" style="color:#2C3E50"></i>
        </a>
    </div>
    <div class="col-md-3 text-right">
        <a class="btn btn-info" href="{{ route('racuni') }}"
           title="Povratak na početnu stranu">
            <i class="fa fa-home" style="color:#2C3E50"></i>
        </a>
    </div>
</div>
@endsection

@section('traka')
<div class="well">
    <h3>Slike</h3>
    @if($racun->slike->isEmpty())
    <h5 class="text-danger">Trenutno nema slika za ovaj račun</h5>
    @else
    @foreach($racun->slike as $slika)
    <a href=""><img src="{{ $slika->src }}" class="responsive" style="width: 100%;"></a><br><br>
    @endforeach
    @endif
</div>
@endsection
