@extends('sabloni.app')

@section('naziv', 'Računi')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<!--{{ gethostbyaddr($_SERVER['REMOTE_ADDR']) }}-->
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Ugovori"
                 src="{{ url('/images/ugovor.png') }}" style="height:64px;">
            &emsp;Računi
        </h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <button id="pretragaDugme" class="btn btn-success btn-block ono">
            <i class="fa fa-search fa-fw"></i> Napredna pretraga
        </button>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary btn-block ono" href="{{ route('racuni.dodavanje.get') }}">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj račun
        </a>
    </div>
</div>
<hr>
<div id="pretraga" class="well" style="display: none;">
    NAPREDNA PRETRAGA
</div>

<div class="row">
    <div class="col-md-12">
        @if($racuni->isEmpty())
        <h3 class="text-danger">Trenutno nema računa</h3>
        @else
        <table class="table table-striped display" cellspacing="0" width="100%" id="tabela">
            <thead>
            <th style="width: 5%;">#</th>
            <th style="width: 20%;">Opis</th>
            <th style="width: 10%;">Broj računa</th>
            <th style="width: 7%;">Datum</th>
            <th style="width: 18%;">Ugovor</th>
            <th style="width: 10%; text-align: right;">Iznos</th>
            <th style="width: 10%; text-align: right;">PDV</th>
            <th style="width: 10%; text-align: right;">Ukupno</th>
            <th style="width: 10%; text-align:right;">
                <i class="fa fa-cogs"></i>&emsp;Akcije
            </th>
            </thead>
            <tbody>
                @foreach ($racuni as $racun)
                <tr>
                    <td>{{ $racun->id }}</td>
                    <td> <strong>{{ $racun->opis }}</strong> </td>
                    <td>
                        <a href="{{ route('racuni.detalj', $racun->id) }}">
                            <strong>{{ $racun->broj }}</strong>
                        </a>
                    </td>
                    <td>{{ $racun->formatiran_datum }}</td>
                    <td>@if($racun->ugovor) 
                        <small>
                        {{ $racun->ugovor->broj }} - {{ $racun->ugovor->dobavljac->naziv}}, {{ $racun->ugovor->predmet_ugovora}}
                        </small>
                        @endif
                    </td>
                    <td class="text-right">{{ number_format($racun->iznos, 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($racun->pdv, 2, ',', '.') }}</td>
                    <td class="text-right">{{ number_format($racun->ukupno, 2, ',', '.') }}</td>
                    <td class="text-right">
                        <a class="btn btn-success btn-sm"
                           href="{{ route('racuni.detalj', $racun->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-sm"
                           href="{{ route('racuni.izmena.get', $racun->id) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button class="btn btn-danger btn-sm otvori-brisanje"
                                data-toggle="modal" data-target="#brisanjeModal"
                                value="{{ $racun->id }}">
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
        var ruta = "{{ route('racuni.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });

    $('#pretragaDugme').click(function () {
        $('#pretraga').toggle();
    });
//    });
</script>
@endsection
