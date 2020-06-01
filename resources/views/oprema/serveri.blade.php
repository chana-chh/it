@extends('sabloni.app')

@section('naziv', 'Oprema | Serveri')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <div class="row">
        <div class="col-md-8">
            <h1><span><img alt="Serveri" src="{{url('/images/server.png')}}" style="height:64px;"></span>
            <span><img alt="Serveri" src="{{url('/images/server.png')}}" style="height:64px;"></span>&emsp;SERVERI</h1>
        </div>

        <div class="col-md-2 text-right" style="padding-top: 50px;">
            <a class="btn btn-primary ono" href="{{route('serveri.dodavanje.get')}}"><i class="fa fa-plus-circle fa-fw"></i> Dodaj server</a>
        </div>
        <div class="col-md-1 text-right" style="padding-top: 50px;">
            <a class="btn btn-info ono" href="{{route('serveri.up.get')}}"><i class="fa fa-bomb fa-fw text-primary"></i> Ažuriranja</a>
        </div>
        <div class="col-md-1 text-right" style="padding-top: 50px;">
            <a class="btn btn-info ono" href="{{route('serveri.bu.get')}}"><i class="fa fa fa-archive fa-fw text-primary"></i> Rezervne kopije</a>
        </div>
        </div>
        <hr>
<div class="row">
    <div class="col-md-12">
@if($serveri->isEmpty())
            <h3 class="text-danger">Trenutno nema stavki u bazi podataka</h3>
        @else
            <table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
                <thead>
                        <th style="width: 5%;" class="text-center">P</th>
                        <th style="width: 5%;" class="text-center">VR</th>
                        <th style="width: 5%;" class="text-center">!</th>
                        <th style="width: 5%;" class="text-center"><i class="fa fa-calendar"></i></th>
                        <th style="width: 15%;">Ime</th>
                        <th style="width: 10%;">Domen</th>
                        <th style="width: 10%;">Host</th>
                        <th style="width: 10%;">Rola</th>
                        <th style="width: 15%;">OS</th>
                        <th style="width: 10%;">IP adresa</th>
                        <th style="width: 10%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
                </thead>
                <tbody>
                @foreach ($serveri as $m)
                        <tr>
                            <td class="text-danger text-center"><strong>{{$m->prioritet}}</strong></td>
                            <td class="text-center">
                                @if($m->virtuelni == 1)
                                    <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($m->problemi)
                                    <i class="fa fa-exclamation-circle" aria-hidden="true" style="color: #FF0000"></i>
                                @endif
                            </td>
                            <td class="text-warning">{{$m->instalacija}}</td>
                            <td><strong>{{$m->ime}}</strong></td>
                            <td>{{$m->domen}}</td>
                            <td><em>{{$m->host}}</em></td>
                            <td><strong>{{$m->rola}}</strong></td>
                            <td>
                                @if($m->os_id)
                                <small><strong>{{$m->operativniSistem->naziv}}</strong></small></td>
                                @endif
                            <td>{{$m->ip_adresa}}</td>
                            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                    <a class="btn btn-success btn-sm" id="dugmeDetalj"  href="{{route('serveri.detalj', $m->id)}}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-info btn-sm" id="dugmeIzmena"  href="{{route('serveri.izmena.get', $m->id)}}"><i class="fa fa-pencil"></i></a>
                    <button class="btn btn-danger btn-sm otvori-brisanje"
                        data-toggle="modal" data-target="#brisanjeModal"
                        value="{{ $m->id }}">
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
<script>
$( document ).ready(function() {

        $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('serveri.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });

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
                    exportOptions: {
                        columns: [
                            0,
                            3,
                            4,
                            5,
                            6,
                            7,
                            8,
                            9
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