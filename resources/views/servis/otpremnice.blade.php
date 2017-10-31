@extends('sabloni.app')

@section('naziv', 'Otpremnice')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Ugovori"
                 src="{{ url('/images/otpremnice.png') }}" style="height:64px;">
            &emsp;Otpremnice
        </h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <button id="pretragaDugme" class="btn btn-success btn-block ono">
            <i class="fa fa-search fa-fw"></i> Napredna pretraga
        </button>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary btn-block ono" href="{{ route('otpremnice.dodavanje.get') }}">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj otpremnicu
        </a>
    </div>
</div>
<hr>
<div id="pretraga" class="well" style="display: none;">
    NAPREDNA PRETRAGA
</div>
<div class="row">
    <div class="col-md-12">
        @if($otpremnice->isEmpty())
        <h3 class="text-danger">Trenutno nema otprmnica</h3>
        @else
        <table class="table table-striped display" cellspacing="0" width="100%" id="tabela">
            <thead>
            <th style="width: 5%;">#</th>
            <th style="width: 20%;">Broj otpremnice</th>
            <th style="width: 15%;">Datum</th>
            <th style="width: 15%;">Broj računa</th>
            <th style="width: 15%;">Dobavljač</th>
            <th style="width: 15%;">Broj profakture</th>
            <th style="width: 15%; text-align:right;">
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
                        <a class="btn btn-info btn-sm"
                           href="{{ route('otpremnice.izmena.get', $otpremnica->id) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button class="btn btn-danger btn-sm otvori-brisanje"
                                data-toggle="modal" data-target="#brisanjeModal"
                                value="{{ $otpremnica->id }}">
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
<script>
//    $(document).ready(function () {
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
        var ruta = "{{ route('otpremnice.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });

    $('#pretragaDugme').click(function () {
        $('#pretraga').toggle();
    });
//    });
</script>
@endsection
