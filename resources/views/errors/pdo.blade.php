@extends('sabloni.app')

@section('naziv', 'Početna')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="text-center">{{$poruka}}</h1>
@endsection