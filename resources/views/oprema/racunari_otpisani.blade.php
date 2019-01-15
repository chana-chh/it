@extends('sabloni.app')

@section('naziv', 'Oprema | Otpisani računari')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Otpisani računari" src="{{url('/images/kompjuterici.png')}}" style="height:64px;">
            </span>&emsp;Otpisani Računari</h1>
    </div>
</div>
<hr>
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
            <a class="btn btn-primary" href="{{route('racunari.oprema')}}"
               title="Povratak na listu aktivnih računara">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <th style="width: 10%;">#</th>
        <th style="width: 15%;">Datum otpisa</th>
        <th style="width: 15%;">Ime računara (AD)</th>
        <th style="width: 10%;">Inventarski broj</th>
        <th style="width: 10%;">IKT broj</th>
        <th style="width: 30%;">Napomena</th>
        <th style="width: 10%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tbody>
        @foreach ($uredjaj as $o)
        <tr>
            <td>{{$o->id}}</td>
            <td>{{$o->deleted_at}}</td>
            <td>
                <strong>{{$o->ime}}</strong>
            </td>
            <td>{{$o->inventarski_broj}}</td>
            <td>{{$o->erc_broj}}</td>
            <td>{{$o->napomena}}</td>
            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                <a class="btn btn-success btn-sm" id="dugmeDetalj" href="{{route('racunari.oprema.detalj', $o->id)}}">
                    <i class="fa fa-eye"></i>
                </a>
                <a class="btn btn-info btn-sm" id="dugmeIzmena" href="{{route('racunari.oprema.izmena.get', $o->id)}}">
                    <i class="fa fa-pencil"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>

@endsection

@section('skripte')
<script>
$( document ).ready(function() {


        var tabela = $('#tabela').DataTable({
            dom: 'Bflrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    customize: function (doc) {
                        doc.content[1].table.widths = [
                            "33%",
                            "33%",
                            "34%"
                        ];
                    },
                    exportOptions: {
                        columns: [
                            1,
                            2,
                            3
                        ]
                    }
                }

            ],
        columnDefs: [
                {
                    orderable: false,
                    searchable: false,
                    "targets": -1
                }
            ],
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

        if ($('#tabela').length) {
            new $.fn.dataTable.FixedHeader( tabela );
        }

});
</script>
@endsection