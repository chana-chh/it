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
        <table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
            <thead>
                <th style="width: 5%;">#</th>
                <th style="width: 25%;">Ime</th>
                <th style="width: 20%;">Uprava</th>
                <th style="width: 20%;">Kancelarija</th>
                <th style="width: 20%;">Email</th>
                <th style="width: 10%; text-align:right;">
                <i class="fa fa-cogs"></i>&emsp;Akcije
            </th>
            </thead>
        </table>
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

        processing: true,
        serverSide: true,
        ajax: '{!! route('zaposleni.ajax') !!}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'ime', name: 'ime'},
            {data: 'uprava.naziv', name: 'uprava.naziv'},
            {data: 'kancelarija.naziv', name: 'kancelarija.naziv'},
            {data: 'email', name: 'email'},
            {data: 'akcije', name: 'akcije', orderable: false, searchable: false}
        ],
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