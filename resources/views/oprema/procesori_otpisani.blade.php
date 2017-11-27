@extends('sabloni.app')

@section('naziv', 'Oprema | Otpisani procesori')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Otpisani procesori" src="{{url('/images/cpu.png')}}" style="height:64px;">
            </span>&emsp;Otpisani procesori</h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <button id="pretragaDugme" class="btn btn-success btn-block ono">
            <i class="fa fa-search fa-fw"></i> Napredna pretraga
        </button>
    </div>
</div>

<div class="row well" id="pretraga" style="display: none;">
    <div class="col-md-2">
    Nesto
    </div>
    <div class="col-md-10">
        Ostalo
    </div>
    
</div>

<hr>
<div class="row">
    <div class="col-md-12">
@if($uredjaj->isEmpty())
            <h3 class="text-danger">Trenutno nema stavki u bazi podataka</h3>
        @else
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <th style="width: 5%;">#</th>
        <th style="width: 15%;">Serijski broj</th>
        <th style="width: 20%;">Model</th>
        <th style="width: 20%;">Datum otpisa</th>
        <th style="width: 25%;">Napomena</th>
        <th style="width: 15%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tbody>
        @foreach ($uredjaj as $o)
        <tr>
            <td>{{$o->id}}</td>
            <td>
                <strong>{{$o->serijski_broj}}</strong>
            </td>
            <td><a href="{{route('procesori.modeli.detalj', $o->procesorModel->id)}}">{{$o->procesorModel->proizvodjac->naziv}} {{$o->procesorModel->naziv}}, {{$o->procesorModel->takt}} MHz</a></td>
            <td> 
                {{$o->deleted_at}}
            </td>
            <td>
                {{$o->napomena}}
            </td>

            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                <button title="Vrati iz otpisa za ponovnu uppotrebu" class="btn btn-warning btn-sm vracanje" data-toggle="modal" data-target="#vracanjeModal" value="{{$o->id}}">
                    <i class="fa fa-retweet"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
        @endif
    </div>
</div>

<!--  POCETAK brisanjeModal  -->
@include('sifarnici.inc.modal_vracanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

    $(document).on('click', '.vracanje', function () {
            var id = $(this).val();
            alert(id);
            $('#idVracanje').val(id);
            var ruta = " {{route('procesori.oprema.vracanje_otpis') }}";
            $('#vracanje-forma').attr('action', ruta); });

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

        $('#pretragaDugme').click(function () {
            $('#pretraga').toggle();
        });

});
</script>
@endsection