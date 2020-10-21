@extends('sabloni.app')

@section('naziv', 'Servis | Statičke')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
    <img class="slicica_animirana" alt="Statičke IP adrese"
         src="{{ url('/images/ip.png') }}" style="height:128px;">
    &emsp;Statičke IP adrese <strong><small class="text-danger">(zauzete)</small></strong>
        </h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 100px;">
        <a class="btn btn-primary" href="{{ route('staticke.slobodne') }}">
            <i class="fa fa-list-alt fa-fw"></i> Pregled dostupnih adresa
        </a>
    </div>
</div>
<hr>
@if($adrese->isEmpty())
<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table id="tabela" class="table table-striped" cellspacing="0" width="100%">
    <thead>
        <th style="width: 5%;">#</th>
        <th style="width: 10%;">Adresa</th>
        <th style="width: 10%;">Uređaj</th>
        <th style="width: 15%;">Ime</th>
        <th style="width: 10%;">Utičnica</th>
        <th style="width: 10%;">VLAN</th>
        <th style="width: 15%;">Prvi čvor</th>
        <th style="width: 10%;">Kancelarija</th>
        <th style="width: 15%;">Napomena</th>
        <th style="text-align:right; width: 9%;"><i class="fa fa-cogs"></i></th>
    </thead>
    <tbody>
        @foreach ($adrese as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td><strong>{{$d->ip_adresa}}</strong></td>
            <td>{{$d->uredjaj}}</td>
            <td>{{$d->ime}}</td>
            <td>{{$d->uticnica}}</td>
            <td>{{$d->vlan}}</td>
            <td>{{$d->prvi_nod}}</td>
            <td>
                @if($d->kancelarija)
                {{$d->kancelarija->sviPodaci()}}
                @endif
            </td>
            <td> {{$d->napomena}}</td>
            <td style="text-align:right;">
                        <a href="{{ route('staticke.detalj.get', $d->id) }}" class="btn btn-success btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                <a class="btn btn-warning btn-sm" href="{{ route('staticke.izmena.get', $d->id) }}">
                    <i class="fa fa-pencil"></i>
                </a>
                <button class="btn btn-danger btn-sm otvori-brisanje"
                        data-toggle="modal" data-target="#brisanjeModal"
                        value="{{ $d->id }}">
                    <i class="fa fa-retweet"></i>
                </button>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
@endif
<div id = "brisanjeModal" class = "modal fade">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button class = "close" data-dismiss = "modal">&times;</button>
                <h1 class = "modal-title text-danger">Upozorenje!</h1>
            </div>
            <div class = "modal-body">
                <h3>Da li želite trajno otkačite uređaj sa ove IP adrese?</h3>
                <p class = "text-danger">* Ova akcija je nepovratna!</p>
                <form id="brisanje-forma" action="" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="idBrisanje" name="idBrisanje">
                    <div class="row dugmici" style="margin-top: 30px;">
                        <div class="col-md-12" >
                            <div class="form-group">
                                <div class="col-md-6 snimi">
                                    <button id = "btn-brisanje-obrisi" type="submit" class="btn btn-danger btn-block ono">
                                        <i class="fa fa-recycle"></i>&emsp;Obriši
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-block ono" data-dismiss="modal">
                                        <i class="fa fa-ban"></i>&emsp;Otkaži
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



@section('skripte')
<script>
$( document ).ready(function() {

        $(document).on('click', '.otvori-brisanje', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('staticke.ciscenje') }}";
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
                            1,
                            2,
                            3,
                            4,
                            5
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

    new $.fn.dataTable.FixedHeader( tabela );
});
</script>
@endsection