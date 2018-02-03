@extends('sabloni.app')

@section('naziv', 'Greška')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">Greška 404: Ova stranica nije pronađena</h1>
@endsection

@section('sadrzaj')
<a href="{{Request::referrer()}}">Nazad na prethodnu stranu</a>
<a href="{{route('pocetna')}}">Nazad na početnu stranu</a>
@endsection
