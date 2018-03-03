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
        <th style="width: 10%;">Ime računara (AD)</th>
        <th style="width: 10%;">Inventarski broj</th>
        <th style="width: 5%;">IKT broj</th>
        <th style="width: 20%;">Kancelarija</th>
        <th style="width: 5%;">Ocena</th>
        <th style="width: 23%;">Korisnik računara</th>
        <th style="width: 15%;">Uprava</th>
        <th style="width: 7%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tfoot>
                <th>id</th>
                <th>Ime računara (AD)</th>
                <th>Inventarski broj</th>
                <th>IKT broj</th>
                <th>Kancelarija</th>
                <th>Ocena</th>
                <th>Korisnik računara</th>
                <th>Uprava</th>
                <th>Akcija</th>
        </tfoot>
</table>
    </div>
</div>

@endsection

@section('skripte')
<script>
$( document ).ready(function() {

        $('#tabela tfoot th').each( function () {
        $(this).html( '<input type="text" placeholder="&#xF002;" style="font-family:Arial, FontAwesome" />' );
        } );

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
            {data: 'ocena', name: 'ocena'},
            {data: 'zaposleni.naziv', name: 'zaposleni.naziv'},
            {data: 'zaposleni.uprava', name: 'zaposleni.uprava'},
            {data: 'akcije', name: 'akcije', orderable: false, searchable: false},
        ],
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

        tabela.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

        if ($('#tabela').length) {
            new $.fn.dataTable.FixedHeader( tabela );
        }

});
</script>
@endsection