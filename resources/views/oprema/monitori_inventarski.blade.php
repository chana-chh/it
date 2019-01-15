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
            </span>&emsp;Monitori kojima nedostaje <span class="text-success">inventarski broj</span></h1>
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
            <a class="btn btn-primary" href="{{route('monitori.oprema')}}"
               title="Povratak na listu monitora">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
@if($uredjaj->isEmpty())
            <h3 class="text-danger">Trenutno nema stavki u bazi podataka</h3>
        @else
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%" style="table-layout: fixed; font-size: 0.9375em;">
    <thead>
        <th style="width: 5%;">#</th>
        <th style="width: 9%;">Inventarski broj</th>
        <th style="width: 11%;">Serijski broj</th>
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
                <strong>{{$o->serijski_broj}}</strong>
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

});
</script>
@endsection