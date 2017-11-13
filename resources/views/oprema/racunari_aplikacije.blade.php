@extends('sabloni.app')

@section('naziv', 'Oprema | Aplikacije na računaru')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
<h1 class="page-header">
    <img class="slicica_animirana" alt="Aplikacije na računaru"
         src="{{ url('/images/aplikacije.png') }}" style="height:64px;">
    &emsp;Aplikacije instalirane na računaru {{$uredjaj->ime}}
</h1>
</div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a href="{{ route('racunari.oprema.detalj', $uredjaj->id) }}" class="btn btn-success btn-block ono">
            <i class="fa fa-arrow-left fa-fw"></i> Nazad na računar
        </a>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary btn-block ono" href="#">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj aplikaciju na računar
        </a>
    </div>
@if($aplikacije->isEmpty())
<h3 class="text-danger">Trenutno nema instaliranih aplikacija</h3>
@else
<table id="tabela" class="table table-striped" cellspacing="0" width="100%">
    <thead>
        <th>#</th>
        <th>Naziv aplikacije</th>
        <th>Proizvođač</th>
        <th>Opis</th>
        <th style="text-align:right"><i class="fa fa-cogs"></i></th>
    </thead>
    <tbody>
        @foreach ($aplikacije as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td><strong>{{$d->naziv}}</strong></td>
            <td>{{$d->proizvodjac->naziv}}</td>
            <td>{{$d->opis}}</td>
            <td style="text-align:right;">
                <button class="btn btn-success btn-sm otvori-izmenu"
                        data-toggle="modal" data-target="#editModal"
                        value="{{ $d->id }}">
                    <i class="fa fa-pencil"></i>
                </button>
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
 
 <!--  POCETAK brisanjeModal  -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

        var tabela = $('#tabela').DataTable({

        responsive: true,
        columnDefs: [
                {
                    orderable: false,
                    searchable: false,
                    "targets": -1
                }
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

        new $.fn.dataTable.FixedHeader( tabela );

    resizeChosen();
    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({allow_single_deselect: true});

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };

   $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "#";
            $('#brisanje-forma').attr('action', ruta);
        });

});
</script>
@endsection