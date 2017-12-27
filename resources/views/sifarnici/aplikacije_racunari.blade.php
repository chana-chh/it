@extends('sabloni.app')

@section('naziv', 'Šifarnici | Računari')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Računari-aplikacija" src="{{url('/images/aplikacije.png')}}" style="height:64px;">
            </span>&emsp;Računari na kojima je instalirana aplikacija <em class="text-success">{{$aplikacija->naziv}}</em></h1>
    </div>
</div>
<div class="row" style="margin-bottom: 25px; margin-top: 20px;">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" onclick="window.history.back();"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('aplikacije') }}"
               title="Povratak na listu aplikacija">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 16px;" >
<div class="col-md-12">
@if($racunari->isEmpty())
<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table id="tabela" class="table table-striped" cellspacing="0" width="100%">
    <thead>
        <th>#</th>
        <th>Ime</th>
        <th>Kancelarija</th>
        <th>Inventarski broj</th>
        <th>Zaposleni</th>

    </thead>
    <tbody>
    @foreach ($racunari as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td><strong>{{$d->ime}}</strong></td>
            <td>@if($d->kancelarija){{$d->kancelarija->sviPodaci()}}@endif</td>
            <td>{{$d->inventarski_broj}}</td>
            <td>@if($d->zaposleni){{$d->zaposleni->imePrezime()}}@endif</td>
        </tr>
    @endforeach
</tbody>
</table>
@endif
</div>
</div>
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

});
</script>
@endsection