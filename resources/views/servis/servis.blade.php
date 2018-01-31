@extends('sabloni.app')

@section('naziv', 'Servis')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Čvrsti diskovi" src="{{url('/images/kvar.png')}}" style="height:64px;">
            </span>&emsp;Servis</h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <button id="pretragaDugme" class="btn btn-success btn-block ono">
            <i class="fa fa-search fa-fw"></i> Napredna pretraga
        </button>
    </div>
</div>
<hr>
<div class="row well" id="pretraga" style="display: none;">
    <div class="col-md-2">
        <a id="pretragaDugme" href="" class="btn btn-success btn-block ono">
            <i class="fa fa-recycle fa-fw"></i> Definisati kriterijume pretrage
        </a>
    </div>
    <div class="col-md-10">
        Ostalo
    </div>
    
</div>
<div class="row">
    <div class="col-md-12">
@if($data->isEmpty())
            <h3 class="text-danger">Trenutno nema stavki u bazi podataka</h3>
        @else
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <th style="width: 5%;">#</th>
        <th style="width: 10%;">Broj prijave</th>
        <th style="width: 10%;">Zaposleni</th>
        <th style="width: 15%;">Kancelarija</th>
        <th style="width: 10%;">Datum prijave</th>
        <th style="width: 10%;">IP prijave</th>
        <th style="width: 15%;">Status</th>
        <th style="width: 15%;">Opis(zaposleni)</th>
        <th style="width: 10%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tbody>
        @foreach ($data as $o)
        <tr>
            <td>{{$o->id}}</td>
            <td>
                <strong>{{$o->broj_prijave}}</strong>
            </td>
            <td><a href="{{ route('zaposleni.detalj', $o->zaposleni->id) }}">{{$o->zaposleni->imePrezime()}}</a></td>
            <td><a href="{{route('kancelarije.detalj.get', $o->kancelarija->id)}}">{{$o->kancelarija->sviPodaci()}}</a></td>
            <td><strong>{{ date('d.m.Y', strtotime($o->datum_prijave))}}</strong></td>
            <td>@if($o->ip_prijave){{$o->ip_prijave}}@endif</td>
            <td> <em>{{$o->status->naziv}}</em> </td>
            <td><small>{{$o->opis_kvara_zaposleni}}</small></td>

            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                <a class="btn btn-success btn-sm" id="dugmeDetalj" href="{{ route('servis.detalj', $o->id) }}">
                    <i class="fa fa-eye"></i>
                </a>
                <a class="btn btn-info btn-sm" id="dugmeIzmena" href="{{route('servis.izmena.get', $o->id)}}">
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
<script src="{{ asset('/js/moment.min.js') }}"></script>
<script src="{{ asset('/js/datetime-moment.js') }}"></script>
<script>
$( document ).ready(function() {

        $.fn.dataTable.moment('DD.MM.YYYY');

        var tabela = $('#tabela').DataTable({

        order: [[ 4, 'desc' ]],
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

        $('#pretragaDugme').click(function () {
            $('#pretraga').toggle();
        });
});
</script>
@endsection