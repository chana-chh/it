@extends('sabloni.app')

@section('naziv', 'Otpremnice')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <img class="slicica_animirana" alt="Ugovori"
                 src="{{ url('/images/otpremnice.png') }}" style="height:64px;">
            &emsp;Otpremnice <small class="text-danger"><em>(filtrirane)</em></small>
        </h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary btn-block ono" href="{{ route('otpremnice') }}">
            <i class="fa fa-plus-circle fa-fw"></i> Ukloni filter
        </a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        @if($otpremnice->isEmpty())
        <h3 class="text-danger">Nema podataka za zadate kriterijume pretrage</h3>
        @else
        <table class="table table-striped display" cellspacing="0" width="100%" id="tabela">
            <thead>
            <th style="width: 5%;">#</th>
            <th style="width: 25%;">Broj otpremnice</th>
            <th style="width: 15%;">Datum</th>
            <th style="width: 15%;">Broj računa</th>
            <th style="width: 15%;">Dobavljač</th>
            <th style="width: 15%;">Broj profakture</th>
            <th style="width: 10%; text-align:right;">
                <i class="fa fa-cogs"></i>&emsp;Akcije
            </th>
            </thead>
            <tbody>
                @foreach ($otpremnice as $otpremnica)
                <tr>
                    <td>{{ $otpremnica->id }}</td>
                    <td>
                        <a href="{{ route('otpremnice.detalj', $otpremnica->id) }}">
                            <strong>{{ $otpremnica->broj }}</strong>
                        </a>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($otpremnica->datum)->format('d.m.Y') }}</td>
                    @if($otpremnica->racun === null)
                    <td></td>
                    @else
                    <td>{{ $otpremnica->racun->broj }}</td>
                    @endif
                    <td>{{ $otpremnica->dobavljac->naziv }}</td>
                    <td>{{ $otpremnica->broj_profakture }}</td>
                    <td class="text-right">
                        <a class="btn btn-success btn-sm"
                           href="{{ route('otpremnice.detalj', $otpremnica->id) }}">
                            <i class="fa fa-eye"></i>
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
    $(document).ready(function () {
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
