@extends('sabloni.app')

@section('naziv', 'Modeli | Osnovne ploče')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Osnovne ploče ..." src="{{url('/images/mbd.png')}}" style="height:64px;">
            &emsp;Osnovne ploče čiji je naziv modela
            <span style="color: #18bc9c">{{$model->proizvodjac->naziv}} {{$model->naziv}}, {{$model->soket->naziv}}</span>
        </h1>

</div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" href="{{route('osnovne_ploce.modeli.detalj', $model->id)}}"
               title="Povratak na detaljni pregled modela osnovne ploče">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{route('osnovne_ploce.modeli')}}" 
                title="Povratak na listu modela osnovnih ploča">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 24px">
    <div class="col-md-12">
@if($osnovne_ploce->isEmpty())
            <h3 class="text-danger">Trenutno nema ovakvih uređaja</h3>
        @else
            <table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
                <thead>
                        <th style="width: 5%;">#</th>
                        <th style="width: 15%;">Serijski broj</th>
                        <th style="width: 15%;">Racunar</th>
                        <th style="width: 25%;">Broj otpremnice</th>
                        <th style="width: 25%;">Napomena</th>
                        <th style="width: 15%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
                </thead>
                <tbody>
                @foreach ($osnovne_ploce as $d)
                        <tr>
                            <td>{{$d['id']}}</td>
                            <td><strong>{{$d['serijski_broj']}}</strong></td>
                            <td>{{$d['racunar']['ime']}}</td>
                            <td>{{$d['stavkaOtpremnice']['otpremnica']['broj']}}</td>
                            <td>{{$d['napomena']}}</td>
                            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                    <a class="btn btn-success btn-sm" id="dugmeDetalj"  href="{{route('osnovne_ploce.oprema.detalj', $d['id'])}}"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

        var tabela = $('#tabela').DataTable({

        columnDefs: [
                {
                    orderable: false,
                    searchable: false,
                    "targets": -1
                }
            ],
        responsive: true,
        language: {
        search: "Pronađi u tabeli",
            paginate: {
            first:      "Prva",
            previous:   "Prethodna",
            next:       "Sledeća",
            last:       "Poslednja"
        },
        processing:   "Procesiranje u toku...",
        lengthMenu:   "Prikaži _MENU_ elemenata",
        zeroRecords:  "Nije pronađen nijedan rezultat",
        info:         "Prikaz _START_ do _END_ od ukupno _TOTAL_ elemenata",
        infoFiltered: "(filtrirano od ukupno _MAX_ elemenata)",
    },
    });

        new $.fn.dataTable.FixedHeader( tabela );

});
</script>
@endsection