@extends('sabloni.app')

@section('naziv', 'Oprema | Procesori')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Procesori" src="{{url('/images/cpu.png')}}" style="height:64px;">
            </span>&emsp;Procesori</h1>
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
            <strong>Obavštenje: </strong> Dodavanje procesora se obavlja kroz <a href="{{ route('otpremnice') }}" style="color: #18BC9C"><strong>otpremnicu</strong></a>  ili sa detaljnog pregleda <a href="{{route('racunari.oprema')}}" style="color: #18BC9C"><strong>računara</strong></a>.
        </div>
    </div>
</div>
<hr class="linija" style="display: none;">
<div class="row well" id="pretraga" style="display: none;">
    <div class="col-md-2">
        <a href="{{route('procesori.oprema.otpisani')}}" class="btn btn-success btn-block ono">
            <i class="fa fa-recycle fa-fw"></i> Otpisani
        </a>
    </div>
    <div class="col-md-10">
        Ostalo
    </div>
    
</div>


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
        <th style="width: 20%;">Racunar</th>
        <th style="width: 25%;">Otpremnica</th>
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
            <td> @if($o->racunar)
                {{$o->racunar->ime}}
                @endif

            </td>
            <td>
                @if($o->stavkaOtpremnice)
                <a href="{{route('otpremnice.detalj', $o->stavkaOtpremnice->otpremnica->id)}}">
                {{$o->stavkaOtpremnice->otpremnica->broj}}, {{$o->stavkaOtpremnice->otpremnica->dobavljac->naziv}} od {{$o->stavkaOtpremnice->otpremnica->datum}}
                </a>
                @endif
            </td>

            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                <a class="btn btn-success btn-sm" id="dugmeDetalj" href="{{route('procesori.oprema.detalj', $o->id)}}">
                    <i class="fa fa-eye"></i>
                </a>
                <a class="btn btn-info btn-sm" id="dugmeIzmena" href="{{route('procesori.oprema.izmena.get', $o->id)}}">
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

        if ($('#tabela').length) {
            new $.fn.dataTable.FixedHeader( tabela );
        }

        $('#pretragaDugme').click(function () {
            $('#pretraga').toggle();
        });

});
</script>
@endsection