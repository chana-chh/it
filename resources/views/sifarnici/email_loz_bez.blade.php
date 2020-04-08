@extends('sabloni.app')

@section('naziv', 'Šifarnici | Elektronske adrese')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="email" src="{{ url('/images/email.png') }}" style="height:64px;  width:64px">
    &emsp;Adrese elektronske pošte kojima nije upisana lozinka u bazu podataka
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
            <a class="btn btn-primary" href="{{ route('email') }}"
               title="Povratak na listu email-ova">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

@if($data->isEmpty())
<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table class="table table-striped" id="tabela">
    <thead>
    <th style="width: 5%;"><small>id</small></th>
    <th style="width: 20%;">Adresa</th>
    <th style="width: 15%;">Lozinka</th>
    <th style="width: 10%;">Službeni</th>
    <th style="width: 20%;">Zaposleni</th>
    <th style="width: 20%;">Napomena</th>
    <th style="width: 10%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
</thead>
<tbody>
    @foreach ($data as $d)
    <tr>
        <td><small>{{ $d->id }}</small></td>
        <td>
                <strong class="text-info lozinka">
                    {{ $d->adresa }}
                </strong>
        </td>
        <td>
            @if(Auth::user()->imaUlogu('admin'))
                <strong class="text-info lozinka">
                    {{ $d->lozinka }}
                </strong>
            @endif

        </td>
        <td>
            <span title="U pitanju je služben elektronska adresa" style="color: #18bc9c;">
                {!! $d->sluzbena == 1 ? "<i class=\"fa fa-check-square-o\"></i>" : " "!!}
            </span>
        </td>
        <td>
            <a href="{{ route('zaposleni.detalj', $d->zaposleni->id) }}">
                <strong>{{ $d->zaposleni->imePrezime() }}</strong>
            </a>
        </td>
        <td><em>{{ str_limit($d->napomena, 60) }}</em></td>
        <td style="text-align:right;">
            <button class="btn btn-success btn-sm otvori-izmenu"
                    data-toggle="modal" data-target="#editModal"
                    value="{{ $d->id }}">
                <i class="fa fa-pencil"></i>
            </button>
            <button class="btn btn-danger btn-sm" id="idBrisanjeModal"
                    title="Brisanje elektronske adrese"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{ $d->id }}">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
@endif
@endsection

@section('skripte')
<script>
    $(document).ready(function () {

        $('#tabela').DataTable({
            order: [
                [
                    1,
                    'asc'
                ]
            ],
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
                            "30%",
                            "30%",
                            "30%"
                        ];
                    },
                    exportOptions: {
                        columns: [
                            1,
                            3,
                            4
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
            stateSave: true,
            language: {
                search: "Pronađi u tabeli",
                paginate: {
                    first: "Prva",
                    previous: "Prethodna",
                    next: "Sledeća",
                    last: "Poslednja"
                },
                processing: "Procesiranje u toku ...",
                lengthMenu: "Prikaži _MENU_ elemenata",
                zeroRecords: "Nije pronađen nijedan zapis za zadati kriterijum",
                info: "Prikazano _START_ do _END_ od ukupno _TOTAL_ elemenata",
                infoFiltered: "(filtrirano od _MAX_ elemenata)"
            }
        });
    });
</script>
@endsection