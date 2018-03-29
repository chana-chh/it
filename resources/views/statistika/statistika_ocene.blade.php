@extends('sabloni.app')

@section('naziv', 'Statistika')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
        <h1 class="page-header">
        <img class="slicica_animirana" alt="Statistički podaci" src="{{url('/images/statistika.png')}}" style="height:64px;">&emsp;
        Grafički pregled računara po ocenama
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
<canvas id="grafikOcene" width="600" height="300"></canvas>
</div>
<div class="col-md-4" style="padding: 30px;">
<table class="table table-striped tabelaOcene" name="tabelaOcene" id="tabelaOcene">
                <thead>
                            <th style="width: 20%;">#</th>
                            <th style="width: 30%;">Ocena</th>
                            <th style="width: 45%;">Broj računara sa ocenom</th>
                            
                </thead>
                <tbody style="font-size: 2rem">
                @foreach ($ocene_tabela as $o => $grupa)
                        <tr>
                                    <td>{{$loop->iteration}}.</td>
                                    <td class="{{ $o < 8 ? ' text-danger' : ' text-primary' }}"><strong>{{$o}}</strong></td>
                                    <td>{{$grupa->count()}}</td>
                        </tr>
                @endforeach
                </tbody>
            </table>
            <hr>
<label class="text-warning">Napomena:</label>
        <p class="text-warning">
            * Potrebno je planirati zamenu ili unapređenje svih računara čija je ocena manja od 8.
        </p>
<h3>Ukupno: {{$za_otpis}}</h3>
</div>
</div>

@endsection

@section('skripte')
<script src="{{ asset('/js/Chart.min.js') }}"></script>
<script>
$( document ).ready(function() {

    var labelej =  {!!json_encode($labele)!!};
    var brojj =  {!!json_encode($broj)!!};
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
                'rgba(255, 99, 132, 0.2)',
                'rgba(52, 162, 235, 0.2)',
                'rgba(253, 206, 86, 0.2)',
                'rgba(73, 192, 192, 0.2)',
                'rgba(133, 102, 233, 0.2)',
                'rgba(235, 159, 64, 0.2)'
            ];

    new Chart(document.getElementById("grafikOcene"), {
    type: 'doughnut',
    data: {
      labels: labelej,
      datasets: [{
        backgroundColor: boje,
        data: brojj
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Grafički pregled računara po ocenama'
      }
    }
});



});
</script>
@endsection