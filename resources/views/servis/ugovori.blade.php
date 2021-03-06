@extends('sabloni.app')

@section('naziv', 'Ugovori o održavanju')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Ugovori"
                 src="{{ url('/images/ugovor.png') }}" style="height:64px;">
            &emsp;Ugovori o održavanju
        </h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <button id="pretragaDugme" class="btn btn-success btn-block ono">
            <i class="fa fa-search fa-fw"></i> Napredna pretraga
        </button>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary btn-block ono" href="{{ route('ugovori.dodavanje.get') }}">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj ugovor
        </a>
    </div>
</div>
<hr>
<div id="pretraga" class="row well" style="display: none;">
    <div class="col-md-2">
        <a id="aktivni" href="{{route('ugovori.aktivni')}}" class="btn btn-warning btn-sm btn-block">
            <i class="fa fa-filter fa-fw"></i> Samo aktivni
        </a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @if($ugovori->isEmpty())
        <h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
        @else
        <table class="table table-striped display" cellspacing="0" width="100%" id="tabela">
            <thead>
            <th style="width: 5%;">#</th>
            <th style="width: 10%;">Predmet ugovora</th>
            <th style="width: 10%;">Broj ugovora</th>
            <th style="width: 12%;">Datum zaključivanja</th>
            <th style="width: 12%;">Datum prestanka</th>
            <th style="width: 12%; text-align: right;">Ukupan iznos sredstava</th>
            <th style="width: 12%; text-align: right;">Utrošeno sredstava</th>
            <th style="width: 12%; text-align: right;">Preostalo sredstava</th>
            <th style="width: 15%; text-align:right;">
                <i class="fa fa-cogs"></i>&emsp;Akcije
            </th>
            </thead>
            <tbody>
                @foreach ($ugovori as $ugovor)
                <tr>
                    <td>{{ $ugovor->id }}</td>
                    <td><strong>{{ $ugovor->predmet_ugovora }}</strong></td>
                    <td>
                        <a href="{{ route('ugovori.detalj', $ugovor->id) }}">
                            <strong>{{ $ugovor->broj }}</strong>
                        </a>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($ugovor->datum_zakljucivanja)->format('d.m.Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($ugovor->datum_raskida)->format('d.m.Y') }}</td>
                    <td class="text-right">{{ number_format($ugovor->iznos_sredstava, 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($ugovor->utroseno(), 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($ugovor->preostalo(), 2, ',', '.') }}</td>
                    <td class="text-right">
                        <a class="btn btn-success btn-sm"
                           href="{{ route('ugovori.detalj', $ugovor->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-sm"
                           href="{{ route('ugovori.izmena.get', $ugovor->id) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button class="btn btn-danger btn-sm otvori-brisanje"
                                data-toggle="modal" data-target="#brisanjeModal"
                                value="{{ $ugovor->id }}">
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
<script src="{{ asset('/js/moment.min.js') }}"></script>
<script src="{{ asset('/js/datetime-moment.js') }}"></script>
<script>
$(document).ready(function () {
    $.fn.dataTable.moment('DD.MM.YYYY');

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
                first: "Prva",
                previous: "Prethodna",
                next: "Sledeća",
                last: "Poslednja"
            },
            processing: "Procesiranje u toku...",
            lengthMenu: "Prikaži _MENU_ elemenata",
            zeroRecords: "Nije pronađen nijedan rezultat",
            info: "Prikaz _START_ do _END_ od ukupno _TOTAL_ elemenata",
            infoFiltered: "(filtrirano od ukupno _MAX_ elemenata)"
        }
    });
    new $.fn.dataTable.FixedHeader(tabela);

    $(document).on('click', '.otvori-brisanje', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('ugovori.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });

    $('#pretragaDugme').click(function () {
        $('#pretraga').toggle();
    });

});
</script>
@endsection
