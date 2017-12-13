@extends('sabloni.app')

@section('naziv', 'Modeli | Računari - model napajanja')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <div class="row">
        <div class="col-md-12">
            <h1><img class="slicica_animirana" alt="Računari ..." src="{{url('/images/napajanje.png')}}" style="height:64px;">
                &emsp;Računari u kojima je napajanje model <span style="color: #18bc9c">{{$model->proizvodjac->naziv}} {{$model->naziv}}, {{$model->snaga}} W</span>
            </h1>
        </div>
        </div>
        <hr>
<div class="row">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" href="{{route('napajanja.modeli.detalj', $model->id)}}"
               title="Povratak na detaljni pregled modela napajanja">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{route('napajanja.modeli')}}" 
                title="Povratak na listu modela čvrstih diskova">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 24px">
    <div class="col-md-12">
@if($racunari->isEmpty())
            <h3 class="text-danger">Trenutno nema računara sa ovim modelom napajanja</h3>
        @else
            <table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
                <thead>
                        <th style="width: 5%;">#</th>
                        <th style="width: 15%;">Inventarski broj</th>
                        <th style="width: 15%;">Ime odeljenja za IKT</th>
                        <th style="width: 25%;">Ime - Domen</th>
                        <th style="width: 25%;">Napomena</th>
                        <th style="width: 15%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
                </thead>
                <tbody>
                @foreach ($racunari as $racunar)
                        <tr>
                            <td>{{$racunar['id']}}</td>
                            <td><strong>{{$racunar['inventarski_broj']}}</strong></td>
                            <td>{{$racunar['erc_broj']}}</td>
                            <td>{{$racunar['ime']}}</td>
                            <td>{{$racunar['napomena']}}</td>
                            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                    <a class="btn btn-success btn-sm" id="dugmeDetalj"  href=" "><i class="fa fa-eye"></i></a>
                    <a class="btn btn-info btn-sm" id="dugmeIzmena"  href=" "><i class="fa fa-pencil"></i></a>
                    <button id="dugmeBrisanje" class="btn btn-danger btn-sm otvori_modal"  value="{{$racunar['id']}}"><i class="fa fa-trash"></i></button>

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