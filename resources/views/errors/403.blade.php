@extends('sabloni.app')

@section('naziv', 'Greška')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">Greška 403: Korisnik nema prava da pristupi ovoj strani</h1>
@endsection

@section('sadrzaj')
<a href="" onclick="window.history.back();return false;">Nazad na prethodnu stranu</a>&emsp;|&emsp;
<a href="{{route('pocetna')}}">Nazad na početnu stranu</a>
@endsection
