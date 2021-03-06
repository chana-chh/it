@extends('sabloni.app')

@section('naziv', 'Server | Ažuriranja')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <i class="fa fa-bomb fa-fw text-primary"></i>&emsp;Ažuriranja svih servera
        </h1>
    </div>
    <div class="col-md-1" style="padding-top: 50px;">
        <a class="btn btn-primary ono" href="{{route('serveri.dodavanje.up.get')}}"><i class="fa fa-plus-circle fa-fw"></i> Dodaj</a>
    </div>
    <div class="col-md-1 text-right" style="padding-top: 50px;">
        <a class="btn btn-success ono" href="{{route('serveri.up.vreme')}}"><i class="fa fa-clock-o fa-fw"></i> Hronološki</a>
    </div>
</div>
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
            <a class="btn btn-primary" href="{{route('serveri.oprema')}}"
                title="Povratak na listu servera">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
        <hr>
<div class="row">
    <div class="col-md-12">
@if($up->isEmpty())
            <h3 class="text-danger">Trenutno nema stavki u bazi podataka</h3>
        @else
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <th style="width: 5%;">#</th>
        <th style="width: 10%;">Datum</th>
        <th style="width: 15%;">Server</th>
        <th style="width: 60%;">Opis</th>
        <th style="width: 10%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tbody>
        @foreach ($up as $m)
        <tr>
            <td>{{$m->id}}</td>
            <td>
                <strong>{{$m->formatiran_datum}}</strong>
            </td>
            <td><strong class="text-success">{{$m->server->ime}}</strong></td>
            <td>{{$m->opis}}</td>
            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                <a class="btn btn-info btn-sm" id="dugmeIzmena"  href="{{route('serveri.izmena.up.get', $m->id)}}"><i class="fa fa-pencil"></i></a>
                <button class="btn btn-danger btn-sm otvori-brisanje" data-toggle="modal" data-target="#brisanjeModal" value="{{$m->id}}">
                    <i class="fa fa-trash"></i>
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
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->


@endsection

@section('skripte')
<script src="{{ asset('/js/moment.min.js') }}"></script>
<script src="{{ asset('/js/datetime-moment.js') }}"></script>
<script>
$( document ).ready(function() {
$.fn.dataTable.moment('DD.MM.YYYY');
    $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('serveri.brisanje.up.post') }}";
            $('#brisanje-forma').attr('action', ruta); });

        var tabela = $('#tabela').DataTable({

        columnDefs: [
                {
                    orderable: false,
                    searchable: false,
                    "targets": -1
                }
            ],
        order: [[ 1, "desc" ]],
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