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
<div class="col-md-8" style="text-align:center; margin: auto; min-height:300px;">
<canvas id="grafikOS" width="600" height="300"></canvas>
</div>
<div class="col-md-4" style="padding: 30px">
<table class="table table-striped tabelaOS" name="tabelaOS" id="tabelaOS">
                <thead>
                            <th style="width: 10%;">#</th>
                            <th style="width: 60%;">Operativni sistem</th>
                            <th style="width: 30%;">Broj instaliranih OS</th>
                            
                </thead>
                <tbody >
                @foreach ($os_tabela as $ot)
                        <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$ot->naziv}}</td>
                                    <td>{{$ot->broj}}</td>
                        </tr>
                @endforeach
                </tbody>
            </table>
</div>
</div>

@endsection

@section('skripte')
<script src="{{ asset('/js/Chart.min.js') }}"></script>
<script>
	$(document).ready(function () {
var boje = [
                'rgba(44, 62, 80, 0.5)',
                'rgba(24, 188, 156, 0.5)',
                'rgba(149, 165, 166, 0.5)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ];
var ctx = document.getElementById("grafikOS").getContext('2d');
var grafikOS = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($os_labele) !!},
        datasets: [{
            label: 'Operativni sistemi',
            data: {!! json_encode($os_broj) !!},
            backgroundColor:boje,
            borderColor: boje,
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
  });
</script>
@endsection