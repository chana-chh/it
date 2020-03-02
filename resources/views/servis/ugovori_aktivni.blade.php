@extends('sabloni.app')

@section('naziv', 'Ugovori o održavanju')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Ugovori"
                 src="{{ url('/images/ugovor.png') }}" style="height:64px;">
            &emsp;Ugovori o održavanju - <small class="text-danger">[AKTIVNI] <i class="fa fa-filter"></i></small>
        </h1>
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
            <a class="btn btn-primary" href="{{route('ugovori')}}"
               title="Povratak na listu svih ugovora">
                <i class="fa fa-list"></i>
            </a>
        </div>
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

});
</script>
@endsection
