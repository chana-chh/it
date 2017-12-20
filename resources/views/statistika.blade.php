@extends('sabloni.app')

@section('naziv', 'Statistika')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="text-center page-header">{{config('app.name')}}</h1>
@endsection

@section('sadrzaj')
<canvas id="myChart"></canvas>
@endsection

@section('traka')
Traka
@endsection

@section('skripte')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
@endsection