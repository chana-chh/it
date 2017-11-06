@extends('sabloni.app')

@section('naziv', 'Stavke otpremnice')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Stavke otpremnice"
                 src="{{ url('/images/otpremnice.png') }}" style="height:64px;">
            &emsp;Stavke otpremnice: <em>{{ $otpremnica->broj }}</em>
        </h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a href="{{ route('otpremnice.detalj', $otpremnica->id) }}" class="btn btn-success btn-block ono">
            <i class="fa fa-arrow-left fa-fw"></i> Nazad na otpremnicu
        </a>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary btn-block ono" href="{{ route('otpremnice.stavke.dodavanje.get', $otpremnica->id) }}">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj stavku otpremnice
        </a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        @if($otpremnica->stavke->isEmpty())
        <h3 class="text-danger">Trenutno nema stavki za otpremnicu {{ $otpremnica->broj }}</h3>
        @else
        <table class="table table-striped table-responsive" id="tabela">
            <thead>
                <tr>
                    <th style="width: 10%;">#</th>
                    <th style="width: 25%;">Naziv</th>
                    <th style="width: 10%;">Jedinica mere</th>
                    <th style="width: 10%; text-align: right;">Količina</th>
                    <th style="width: 30%;">Napomena</th>
                    <th style="width: 15%; text-align: right;">Akcije</th>
                </tr>
            </thead>
            <tbody>
                @foreach($otpremnica->stavke as $stavka)
                <tr>
                    <td>{{ $stavka->id }}</td>
                    <td>{{ $stavka->naziv }}</td>
                    <td>{{ $stavka->jedinica_mere }}</td>
                    <td class="text-right">{{ $stavka->kolicina }}</td>
                    <td>{{ $stavka->napomena }}</td>
                    <td class="text-right">
                        <a href="" class="btn btn-success btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-sm"
                           href="{{ route('otpremnice.stavke.izmena.get', $stavka->id) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button class="btn btn-danger btn-sm otvori-brisanje"
                                data-toggle="modal" data-target="#brisanjeModal"
                                value="{{ $stavka->id }}">
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

        $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('otpremnice.stavke.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });
    });
</script>
@endsection
