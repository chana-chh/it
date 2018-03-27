@extends('sabloni.app')

@section('naziv', 'Oprema | Računari')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Računari" src="{{url('/images/kompjuterici.png')}}" style="height:64px;">
            </span>&emsp;Računari <small class="text-danger">(filtrirani)</small></h1>
    </div>

    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-success ono" href="{{route('racunari.oprema')}}">
            <i class="fa fa-minus-circle fa-fw"></i> Ukloni filter</a>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <th style="width: 5%;">#</th>
        <th style="width: 10%;">Ime računara (AD)</th>
        <th style="width: 10%;">Inventarski broj</th>
        <th style="width: 5%;">IKT broj</th>
        <th style="width: 20%;">Kancelarija</th>
        <th style="width: 5%;">Ocena</th>
        <th style="width: 23%;">Korisnik računara</th>
        <th style="width: 15%;">Uprava</th>
        <th style="width: 7%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tbody>
        @foreach ($racunari_filtrirani as $o)
        <tr>
            <td>{{$o->id}}</td>
            <td>
                <strong>{{$o->ime}}</strong>
            </td>
            <td>{{$o->inventarski_broj}}</td>
            <td>{{$o->erc_broj}}</td>
            <td> 
                @if($o->kancelarija)
                {{$o->kancelarija->sviPodaci()}}
                @endif
            </td>
            <td>{{$o->ocena}}</td>
            <td>
                @if($o->zaposleni)
                {{$o->zaposleni->imePrezime()}}
                @endif
            </td>
            <td>
                @if($o->zaposleni)
                @if($o->zaposleni->uprava)
                <em>{{$o->zaposleni->uprava->naziv}}</em>
                @endif
                @endif
            </td>
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
                            "10%",
                            "15%",
                            "15%",
                            "15%",
                            "15%",
                            "15%",
                            "15%",
                            "15%",
                            "15%"
                        ];
                    },
                    exportOptions: {
                        columns: [
                            1,
                            2,
                            3,
                            4,
                            5,
                            6,
                            7
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