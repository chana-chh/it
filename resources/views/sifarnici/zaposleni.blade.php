@extends('sabloni.app') 

@section('naziv', 'Šifarnici | Zaposleni') 

@section('meni') 
@include('sabloni.inc.meni') 
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <img class="slicica_animirana" alt="Zaposleni" src="{{ url('/images/korisnik.png') }}" style="height:64px;"> &emsp;Zaposleni
        </h1>
    </div>

    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary ono" href="{{ route('zaposleni.dodavanje.get') }}">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj zaposlenog</a>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        @if($data->isEmpty())
        <h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
        @else
        <table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
            <thead>
                <th style="width: 5%;">#</th>
                <th style="width: 22%;">Prezime i ime</th>
                <th style="width: 23%;">Uprava</th>
                <th style="width: 10%;">Kancelarija</th>
                <th style="width: 10%;">Mobilni</th>
                <th style="width: 15%;">E-mail</th>
                <th style="width: 15%;text-align:right">
                    <i class="fa fa-cogs"></i>&emsp;Akcije</th>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td style="vertical-align: middle; line-height: normal;">{{$d->id}}</td>
                    <td style="vertical-align: middle; line-height: normal;">
                        <strong>{{$d->imePrezime()}}</strong>
                    </td>
                    <td style="vertical-align: middle; line-height: normal;">{{$d->uprava->naziv}}</td>
                    <td style="vertical-align: middle; line-height: normal;">{{$d->kancelarija->naziv}}</td>
                    <td style="vertical-align: middle; line-height: normal;">
                        <ul class="liste_bez">
                            @foreach ($d->mobilni as $mobilni)
                            <li>
                                {{ $mobilni->broj }}
                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td style="vertical-align: middle; line-height: normal;">
                        <ul class="liste_bez">
                            @foreach ($d->emailovi as $email)
                            <li>
                                {{ $email->adresa }}
                            </li>
                            @endforeach
                        </ul>
                    </td>
                    <td style="text-align:right; vertical-align: middle; line-height: normal;">
                        <a class="btn btn-success btn-sm" 
                            id="dugmeDetalj" href="{{ route('zaposleni.detalj', $d->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a class="btn btn-info btn-sm" 
                            id="dugmeIzmena" href="{{ route('zaposleni.izmena.get', $d->id) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <button class="btn btn-danger btn-sm otvori-brisanje" 
                            data-toggle="modal" data-target="#brisanjeModal"
                            value="{{ $d->id }}">
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
            var ruta = "{{ route('zaposleni.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });


        var tabela = $('#tabela').DataTable({

            columnDefs: [{
                orderable: false,
                searchable: false,
                "targets": -1
            }],
            responsive: true,
            stateSave: true,
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