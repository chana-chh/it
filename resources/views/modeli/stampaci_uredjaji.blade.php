@extends('sabloni.app')

@section('naziv', 'Modeli | Štampači')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Štampači ..." src="{{url('/images/stampac.png')}}" style="height:64px;">
            &emsp;Štampači čiji je naziv modela
            <span style="color: #18bc9c">{{$model->proizvodjac->naziv}} {{$model->naziv}}</span>
        </h1>

</div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" href="{{route('stampaci.modeli.detalj', $model->id)}}"
               title="Povratak na detaljni pregled modela štampača {{$model->proizvodjac->naziv}} {{$model->naziv}}">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{route('stampaci.modeli')}}" 
                title="Povratak na listu modela štampača">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 24px">
<div class="col-md-12">
@if($stampaci->isEmpty())
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
                @foreach ($stampaci as $n)
                        <tr>
                            <td>{{$n['id']}}</td>
                            <td><strong>{{$n['serijski_broj']}}</strong></td>
                            <td>{{$n['racunar']['ime']}}</td>
                            <td>{{$n['stavkaOtpremnice']['otpremnica']['broj']}}</td>
                            <td>{{$n['napomena']}}</td>
                            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                    <a class="btn btn-success btn-sm" id="dugmeDetalj"  href=" "><i class="fa fa-eye"></i></a>
                    <a class="btn btn-info btn-sm" id="dugmeIzmena"  href=" "><i class="fa fa-pencil"></i></a>
                    <button id="dugmeBrisanje" class="btn btn-danger btn-sm otvori_modal"  value="{{$n['id']}}"><i class="fa fa-trash"></i></button>

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