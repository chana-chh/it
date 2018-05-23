@extends('sabloni.app')

@section('naziv', 'Oprema | Monitori')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Monitori" src="{{url('/images/monitorS.png')}}" style="height:64px;">
            </span>&emsp;Monitori</h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <button id="pretragaDugme" class="btn btn-success btn-block ono">
            <i class="fa fa-search fa-fw"></i> Napredna pretraga
        </button>
    </div>
</div>
<div class="row obavestenje">
    <div class="col-md-10 col-md-offset-1 text-center" style="font-size: 1rem;;">
        <div class="alert alert-info alert-dismissible ono" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Obavštenje: </strong> Dodavanje novog monitora se obavlja kroz <a href="{{ route('otpremnice') }}" style="color: #18BC9C"><strong> otpremnicu </strong></a> ili <a href="{{route('nabavke')}}" style="color: #18BC9C"><strong> nabavku </strong></a>.
        </div>
    </div>
</div>
<hr class="linija" style="display: none;">
<div class="row well" id="pretraga" style="display: none;">
    <div class="col-md-2">
        <a id="pretragaDugme" href="{{route('monitori.oprema.otpisani')}}" class="btn btn-warning btn-sm btn-block">
            <i class="fa fa-recycle fa-fw"></i> Otpisani
        </a>
    </div>
        <div class="col-md-2">
        <a id="serijski" href="{{route('monitori.oprema.serijski')}}" class="btn btn-warning btn-sm btn-block">
            <i class="fa fa-filter fa-fw"></i> Bez serijskog
        </a>
    </div>
    <div class="col-md-2">
        <a id="inventarski" href="{{route('monitori.oprema.inventarski')}}" class="btn btn-warning btn-sm btn-block">
            <i class="fa fa-filter fa-fw"></i> Bez inventarskog
        </a>
    </div>
    <div class="col-md-6">

    </div>
    
</div>
<div class="row">
    <div class="col-md-12">
@if($uredjaj->isEmpty())
            <h3 class="text-danger">Trenutno nema stavki u bazi podataka</h3>
        @else
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%" style="font-size: 0.9375em;">
    <thead>
        <th style="width: 5%;">#</th>
        <th style="width: 8%;">Inv. broj</th>
        <th style="width: 12%;">Serijski broj</th>
        <th style="width: 10%;">Model</th>
        <th style="width: 10%;">Racunar</th>
        <th style="width: 10%;">Kancelarija</th>
        <th style="width: 10%;">Otpremnica</th>
        <th style="width: 10%;">Nabavka</th>
        <th style="width: 15%;">Napomena</th>
        <th style="width: 10%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tbody>
        @foreach ($uredjaj as $o)
        <tr>
            <td>{{$o->id}}</td>
            <td>{{$o->inventarski_broj}}</td>
            <td>
                <small>{{$o->serijski_broj}}</small>
            </td>
            <td><a href="{{route('monitori.modeli.detalj', $o->monitorModel->id)}}">{{$o->monitorModel->proizvodjac->naziv}}, {{$o->monitorModel->dijagonala->naziv}} "</a></td>
            <td> @if($o->racunar)
                {{$o->racunar->ime}}
                @endif

            </td>
            <td> @if($o->kancelarija)
                {{$o->kancelarija->sviPodaci()}}
                @endif

            </td>
            <td>
                @if($o->stavkaOtpremnice)
                <a href="{{route('otpremnice.detalj', $o->stavkaOtpremnice->otpremnica->id)}}">
                {{$o->stavkaOtpremnice->otpremnica->broj}}, {{$o->stavkaOtpremnice->otpremnica->dobavljac->naziv}} od {{$o->stavkaOtpremnice->otpremnica->datum}}
                </a>
                @endif
            </td>
            <td>
                @if($o->nabavkaStavka)
                <a href="{{route('nabavke.detalj', $o->nabavkaStavka->nabavka->id)}}">
                {{$o->nabavkaStavka->nabavka->dobavljac->naziv}} od {{$o->nabavkaStavka->nabavka->datum}}
                </a>
                @endif
            </td>
            <td><em>{{$o->napomena}}</em></td>
            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                <a class="btn btn-success btn-sm" id="dugmeDetalj" href="{{route('monitori.oprema.detalj', $o->id)}}">
                    <i class="fa fa-eye"></i>
                </a>
                <a class="btn btn-info btn-sm" id="dugmeIzmena" href="{{route('monitori.oprema.izmena.get', $o->id)}}">
                    <i class="fa fa-pencil"></i>
                </a>
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

        setTimeout(function(){
            $('.obavestenje').hide();
            $('.linija').show();
            }, 4000);

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
                            "16%",
                            "17%",
                            "17%",
                            "15%",
                            "15%",
                            "20%"
                        ];
                    },
                    exportOptions: {
                        columns: [
                            1,
                            2,
                            3,
                            4,
                            5,
                            8
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

        $('#pretragaDugme').click(function () {
            $('#pretraga').toggle();
        });

});
</script>
@endsection