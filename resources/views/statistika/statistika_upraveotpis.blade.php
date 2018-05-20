@extends('sabloni.appmin')

@section('naziv', 'Statistika')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
        <h1 class="page-header">
        <img class="slicica_animirana" alt="Statistički podaci" src="{{url('/images/statistika.png')}}" style="height:64px;">&emsp;
        Grafički pregled računara predviđenih za zamenu po upravama
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
<div class="col-md-12" style="text-align:center; margin: auto; min-height:150px;">
<canvas id="grafikUpraveOtpis" width="600" height="150"></canvas>
</div>
</div>
<div class="row">
<div class="col-md-12" style="padding: 30px">
    <h4>Trenutno u bazu pohranjeno {{$broj_elemenata}} računara</h4>
    <hr>
<table class="table table-striped tabelaUpravaOtpis" name="tabelaUpravaOtpis" id="tabelaUpravaOtpis">
                <thead>
                            <th style="width: 10%;">#</th>
                            <th style="width: 30%;">Uprava</th>
                            <th style="width: 30%;">Ukupno za zamenu</th>
                            <th style="width: 30%;"> % </th>
                </thead>
                <tbody >
                @foreach ($uprave_tabela as $ot)
                        <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$ot->uprava}}</td>
                                    <td>{{$ot->broj}}</td>
                                    <td>{{round($ot->broj*100/$broj_elemenata, 2)}}</td>
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
var ctx = document.getElementById("grafikUpraveOtpis").getContext('2d');
var grafikUpraveOtpis = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: {!! json_encode($uprave_labele) !!},
        datasets: [{
            label: 'Uprave',
            data: {!! json_encode($uprave_broj) !!},
            backgroundColor:boje,
            borderColor: boje,
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    beginAtZero:true,
                    stepSize: 1
                }
            }]
        }
    }
});

function formatLabel(str, maxwidth){
    var sections = [];
    var words = str.split(" ");
    var temp = "";

    words.forEach(function(item, index){
        if(temp.length > 0)
        {
            var concat = temp + ' ' + item;

            if(concat.length > maxwidth){
                sections.push(temp);
                temp = "";
            }
            else{
                if(index == (words.length-1))
                {
                    sections.push(concat);
                    return;
                }
                else{
                    temp = concat;
                    return;
                }
            }
        }

        if(index == (words.length-1))
        {
            sections.push(item);
            return;
        }

        if(item.length < maxwidth) {
            temp = item;
        }
        else {
            sections.push(item);
        }

    });

    return sections;
}

  });
</script>
@endsection