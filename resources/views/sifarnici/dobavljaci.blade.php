@extends('sabloni.app')

@section('naziv', 'Šifarnici | Dobavljači')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Šifarnik dobavljača" src="{{url('/images/kamion.png')}}" style="height:64px;">
            </span>&emsp;Dobavljači</h1>
    </div>

    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary ono" href="{{route('dobavljaci.dodavanje.get')}}">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj dobavljača</a>
    </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
        @if($data->isEmpty())
        <h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
        @else
        <table id="tabela" class="table table-striped">
            <thead>
                <th style="width: 7%;">#</th>
                <th style="width: 15%;">Naziv</th>
                <th style="width: 19%;">Adresa</th>
                <th style="width: 10%;">Broj telefona</th>
                <th style="width: 14%;">E-mail</th>
                <th style="width: 7%;">Link</th>
                <th style="width: 16%;">Napomena</th>
                <th style="width: 9%;text-align:right">
                    <i class="fa fa-cogs"></i>&emsp;Akcije</th>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td>{{$d->id}}</td>
                    <td>
                        <strong>{{ $d->naziv }}</strong>
                    </td>
                    <td>@if($d->adresa_ulica)
                            {{ $d->adresa_ulica }} 
                        @elseif($d->adresa_ulica && $d->adresa_broj)
                            {{ $d->adresa_ulica }} {{ $d->adresa_broj }}
                        @elseif($d->adresa_ulica && $d->adresa_broj && $d->adresa_mesto)
                            {{ $d->adresa_ulica }} {{ $d->adresa_broj }}, {{ $d->adresa_mesto }}
                        @else ()
                            {{ $d->adresa_mesto }}
                        @endif
                        </td>
                    <td>{{ $d->telefon }}</td>
                    <td>
                        <a href="mailto:{{$d->email}}">{{$d->email}}</a>
                    </td>
                    <td>@if($d->link)
                        <a href="{{$d->link}}" target="_blank" style="font-size: 2rem;">
                            <i class="fa fa-link"></i>
                        </a>
                        @endif
                    </td>
                    <td>{{ str_limit($d->napomena, 80) }}</td>
                    <td style="text-align:right; vertical-align: middle; line-height: normal;">
                        <a class="btn btn-success btn-sm" id="dugmeDetalj" href="{{route('dobavljaci.detalj', $d->id)}}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-sm" id="dugmeIzmena" href="{{route('dobavljaci.izmena.get', $d->id)}}">
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
<script>
$(document).ready(function () {

    $(document).on('click', '.otvori-brisanje', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('dobavljaci.brisanje') }}";
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