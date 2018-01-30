@extends('sabloni.app')

@section('naziv', 'Šifarnici | Licence')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <img class="slicica_animirana" alt="Licence" src="{{ url('/images/licence.png') }}" style="height:64px;"> &emsp;Licence
        </h1>
    </div>

    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary ono" href="{{ route('licence.dodavanje.get') }}">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj licence</a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        @if($data->isEmpty())
        <h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
        @else
        <table class="table table-striped" id="tabela">
            <thead>
                <th style="width: 7%;">#</th>
                <th style="width: 15%;">Tip licence</th>
                <th style="width: 18%;">Proizvod</th>
                <th style="width: 20%;">Ključ</th>
                <th style="width: 10%;">Broj aktivacija</th>
                <th style="width: 10%;">Početak važenja</th>
                <th style="width: 10%;">Prestanak važenja</th>
                <th style="width: 10%;text-align:right">
                    <i class="fa fa-cogs"></i>&emsp;Akcije</th>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>
                        <strong>{{ $d->tip_licence }}</strong>
                    </td>
                    <td>{{ $d->proizvod }}</td>
                    <td>{{ $d->kljuc }}</td>
                    <td>{{ $d->broj_aktivacija }}</td>
                    <td><em>{{ $d->formatiran_pocetak }}</em></td>
                    <td><em>{{ $d->formatiran_prestanak }}</em></td>
                    <td style="text-align:right; vertical-align: middle; line-height: normal;">
                        <a class="btn btn-success btn-sm" id="dugmeDetalj" href="{{route('licence.detalj', $d->id)}}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-sm" id="dugmeIzmena" href="{{route('licence.izmena.get', $d->id)}}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button class="btn btn-danger btn-sm otvori-brisanje" data-toggle="modal" data-target="#brisanjeModal" value="{{ $d->id }}">
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

        $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('licence.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });

        var tabela = $('#tabela').DataTable({

            columnDefs: [{
                orderable: false,
                searchable: false,
                "targets": -1
            }],
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
                infoFiltered: "(filtrirano od ukupno _MAX_ elemenata)",
            },
        });

        new $.fn.dataTable.FixedHeader(tabela);

    });

</script>
@endsection