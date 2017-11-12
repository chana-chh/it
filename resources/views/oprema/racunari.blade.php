@extends('sabloni.app')

@section('naziv', 'Oprema | Računari')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Računari" src="{{url('/images/kompjuterici.png')}}" style="height:64px;">
            </span>&emsp;Računari</h1>
    </div>

    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary ono" href="{{route('racunari.oprema.dodavanje.get')}}">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj računar</a>
    </div>
</div>
        <hr>
<div class="row">
    <div class="col-md-12">
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <th style="width: 5%;">#</th>
        <th style="width: 15%;">Ime računara (AD)</th>
        <th style="width: 20%;">Inventarski broj</th>
        <th style="width: 10%;">IKT broj</th>
        <th style="width: 20%;">Kancelarija</th>
        <th style="width: 20%;">Korisnik računara</th>
        <th style="width: 10%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
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
$( document ).ready(function() {

    $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            /*var ruta = " route('procesori.oprema.brisanje') }}";*/
            $('#brisanje-forma').attr('action', ruta); });

        var tabela = $('#tabela').DataTable({

            processing: true,
            serverSide: true,
            ajax: '{!! route('racunari.ajax') !!}',
            columns: [
            {data: 'id', name: 'id'},
            {data: 'ime', name: 'ime'},
            {data: 'inventarski_broj', name: 'inventarski_broj'},
            {data: 'erc_broj', name: 'erc_broj'},
            {data: 'kancelarija.naziv', name: 'kancelarija.naziv'},
            {data: 'zaposleni.naziv', name: 'zaposleni.naziv'},
            {data: 'akcije', name: 'akcije', orderable: false, searchable: false},
        ],
            responsive: true,
            stateSave: true,
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
            first:      "Prva",
            previous:   "Prethodna",
            next:       "Sledeća",
            last:       "Poslednja"
        },
        processing:   "Procesiranje u toku...",
        lengthMenu:   "Prikaži _MENU_ elemenata",
        zeroRecords:  "Nije pronađen nijedan rezultat",
        info:         "Prikaz _START_ do _END_ od ukupno _TOTAL_ elemenata",
        infoFiltered: "(filtrirano od ukupno _MAX_ elemenata)",
    },
    });

        new $.fn.dataTable.FixedHeader( tabela );

});
</script>
@endsection