@extends('sabloni.app')

@section('naziv', 'Oprema | Računari')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Računari" src="{{url('/images/kompjuterici.png')}}" style="height:64px;">
            </span>&emsp;Računari</h1>
    </div>

    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary ono" href="{{route('racunari.oprema.dodavanje.get')}}">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj računar</a>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <button id="pretragaDugme" class="btn btn-success btn-block ono">
            <i class="fa fa-search fa-fw"></i> Napredna pretraga
        </button>
    </div>
</div>
<hr>

<div class="row well" id="pretraga" style="display: none;">
<div class="row">
    <div class="col-md-2">
        <a id="pretragaDugme" href="" class="btn btn-warning btn-sm btn-block" disabled>
            <i class="fa fa-recycle fa-fw"></i> Otpisani
        </a>
    </div>
        <div class="col-md-2">
        <a id="serijski" href="{{route('racunari.oprema.ikt')}}" class="btn btn-warning btn-sm btn-block">
            <i class="fa fa-filter fa-fw"></i> Bez IKT broja
        </a>
    </div>
    <div class="col-md-2">
        <a id="inventarski" href="{{route('racunari.oprema.inventarski')}}" class="btn btn-warning btn-sm btn-block">
            <i class="fa fa-filter fa-fw"></i> Bez inventarskog
        </a>
    </div>
    <div class="col-md-6">

    </div>
    
</div>
<hr class="linija" style="display: none;">
    <form id="pretraga" action="{{ route('racunari.pretraga.post') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dobavljac_id">Dobavljač:</label>
                    <select id="dobavljac_id" name="dobavljac_id"
                            class="chosen-select form-control"
                            data-placeholder="Dobavljač ...">
                        <option value=""></option>
                        @foreach($dobavljaci as $dobavljac)
                        <option value="{{ $dobavljac->id }}">
                            {{ $dobavljac->naziv }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <label for="operator_ocena">Ocena računara je:</label>
                <select name="operator_ocena" id="operator_ocena" class="chosen-select form-control"
                        data-placeholder="Odaberite kriterijum ...">
                    <option value=""></option>
                    <option value=">=">veća ili jednaka</option>
                    <option value="<=">manja ili jednaka</option>
                    <option value="=">jednaka</option>
                    <option value=">">veća</option>
                    <option value="<">manja</option>
                </select>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ocena">Ocena:</label>
                    <input type="number" id="ocena" name="ocena" class="form-control"
                           value="0" min="0" step="1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <label for="napomena">Napomena</label>
                <textarea
                    name="napomena" id="napomena"
                    class="form-control"></textarea>
            </div>
        </div>
        <div class="row dugmici">
            <div class="col-md-6 col-md-offset-6">
                <div class="form-group text-right ceo_dva">
                    <div class="col-md-6 snimi">
                        <button type="submit" id="dugme_pretrazi" class="btn btn-success btn-block">
                            <i class="fa fa-search"></i>&emsp;Pretraži
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block" href="{{ route('racunari.oprema') }}">
                            <i class="fa fa-ban"></i>&emsp;Otkaži
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<hr class="linija" style="display: none;">

<div class="row">
    <div class="col-md-12">
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%" style="table-layout: fixed; font-size: 0.9375em;">
    <thead>
        <th style="width: 5%;">#</th>
        <th style="width: 10%;">Ime (AD)</th>
        <th style="width: 8%;">Inventarski broj</th>
        <th style="width: 5%;">IKT broj</th>
        <th style="width: 17%;">Kancelarija</th>
        <th style="width: 5%;">Ocena</th>
        <th style="width: 17%;">Korisnik računara</th>
        <th style="width: 15%;">Uprava</th>
        <th style="width: 11%;">Napomena</th>
        <th style="width: 7%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tbody>
        @foreach ($uredjaj as $o)
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
            <td>
                <small>{{$o->napomena}}</small>
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
{{--     <tfoot>
                <th>id</th>
                <th>Ime računara (AD)</th>
                <th>Inventarski broj</th>
                <th>IKT broj</th>
                <th>Kancelarija</th>
                <th>Ocena</th>
                <th>Korisnik računara</th>
                <th>Uprava</th>
                <th>Akcija</th>
        </tfoot> --}}
</table>
    </div>
</div>

@endsection

@section('skripte')
<script>
$( document ).ready(function() {

        $('#pretragaDugme').click(function () {
            $('#pretraga').toggle();
            $('.linija').toggle();
        });

        // $('#tabela tfoot th').each( function () {
        // $(this).html( '<input type="text" placeholder="&#xF002;" style="font-family:Arial, FontAwesome" />' );
        // } );

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

        //     processing: true,
        //     serverSide: true,
        //     deferRender: true,
        //     ajax: '{ route('racunari.ajax') !!}',
        //     columns: [
        //     {data: 'id', name: 'id'},
        //     {data: 'ime', name: 'ime'},
        //     {data: 'inventarski_broj', name: 'inventarski_broj'},
        //     {data: 'erc_broj', name: 'erc_broj'},
        //     {data: 'kancelarija.naziv', name: 'kancelarija.naziv'},
        //     {data: 'ocena', name: 'ocena'},
        //     {data: 'zaposleni.naziv', name: 'zaposleni.naziv'},
        //     {data: 'zaposleni.uprava', name: 'zaposleni.uprava'},
        //     {data: 'napomena', name: 'napomena'},
        //     {data: 'akcije', name: 'akcije', orderable: false, searchable: false},
        // ],
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

    //     tabela.columns().every( function () {
    //     var that = this;
 
    //     $( 'input', this.footer() ).on( 'keyup change', function () {
    //         if ( that.search() !== this.value ) {
    //             that
    //                 .search( this.value )
    //                 .draw();
    //         }
    //     } );
    // } );

        if ($('#tabela').length) {
            new $.fn.dataTable.FixedHeader( tabela );
        }

});
</script>
@endsection