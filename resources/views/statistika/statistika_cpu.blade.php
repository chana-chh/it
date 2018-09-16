@extends('sabloni.appmin')

@section('naziv', 'Statistika')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
        <h1 class="page-header">
        <img class="slicica_animirana" alt="Statistički podaci" src="{{url('/images/statistika.png')}}" style="height:64px;">&emsp;
        Grafički pregled raspoređenosti procesora
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
<div class="col-md-8" style="text-align:center; margin: auto; min-height:400px;">
<canvas id="grafikCPU" width="500" height="400"></canvas>
</div>
<div class="col-md-4">
    <table class="table table-striped table-condensed  tabelaCPU" name="tabelaCPU" id="tabelaCPU">
                <thead>
                            <th style="width: 10%;">#</th>
                            <th style="width: 35%;">Naziv modela procesora</th>
                            <th style="width: 30%;">Godina proizvodnje</th>
                            <th style="width: 25%;">Broj procesora</th>
                </thead>
                <tbody >
                @foreach ($cpu_tabela as $ot)
                        <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$ot->naziv}}</td>
                                    <td>{{$ot->godiste}}</td>
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
   $( document ).ready(function() {

    var labelej =  {!!json_encode($cpu_labele)!!};
    var brojj =  {!!json_encode($cpu_broj)!!};
    var boje = [
                'rgba(44, 62, 80, 0.5)',
                'rgba(24, 188, 156, 0.5)',
                'rgba(149, 165, 166, 0.5)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(22, 62, 80, 0.5)',
                'rgba(22, 188, 156, 0.5)',
                'rgba(129, 165, 166, 0.5)',
                'rgba(130, 99, 132, 0.2)',
                'rgba(52, 162, 235, 0.2)',
                'rgba(74, 206, 86, 0.2)',
                'rgba(73, 192, 192, 0.2)',
                'rgba(133, 102, 233, 0.2)',
                'rgba(235, 159, 64, 0.2)',
                'rgba(40, 62, 80, 0.5)',
                'rgba(24, 177, 156, 0.5)',
                'rgba(149, 165, 66, 0.5)',
                'rgba(235, 99, 132, 0.2)',
                'rgba(54, 102, 235, 0.2)',
                'rgba(255, 206, 56, 0.2)',
                'rgba(55, 192, 192, 0.2)',
                'rgba(153, 122, 255, 0.2)',
                'rgba(255, 159, 104, 0.2)',
                'rgba(32, 62, 80, 0.5)',
                'rgba(22, 138, 156, 0.5)',
                'rgba(129, 165, 126, 0.5)',
                'rgba(14, 99, 132, 0.2)',
                'rgba(52, 122, 235, 0.2)',
                'rgba(74, 206, 26, 0.2)',
                'rgba(103, 192, 192, 0.2)',
                'rgba(133, 82, 233, 0.2)',
                'rgba(235, 159, 110, 0.2)'
            ];

    new Chart(document.getElementById("grafikCPU"), {
    type: 'horizontalBar',
    data: {
      labels: labelej,
      datasets: [{
        backgroundColor: boje,
        data: brojj
      }]
    },
    options: {
      legend: {
            display: false
        }
    }
});

});
</script>
@endsection