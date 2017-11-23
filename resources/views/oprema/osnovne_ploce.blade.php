@extends('sabloni.app')

@section('naziv', 'Oprema | Osnovne ploče')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-4">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Osnovne ploče" src="{{url('/images/mbd.png')}}" style="height:64px;">
            </span>&emsp;Procesori</h1>
    </div>
    <div class="col-md-8 text-right" style="padding-top: 50px; font-size: 1.25rem;;">
    <div class="alert alert-info alert-dismissible ono" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Obavštenje: </strong> Dodavanje osnovne ploče se obavlja kroz otpremnicu ili direktno u računar.
</div>  
</div>  

</div>
        <hr>
<div class="row">
    <div class="col-md-12">
@if($uredjaj->isEmpty())
            <h3 class="text-danger">Trenutno nema stavki u bazi podataka</h3>
        @else
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <th style="width: 5%;">#</th>
        <th style="width: 15%;">Serijski broj</th>
        <th style="width: 20%;">Model</th>
        <th style="width: 20%;">Racunar</th>
        <th style="width: 25%;">Otpremnica</th>
        <th style="width: 15%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tbody>
        @foreach ($uredjaj as $o)
        <tr>
            <td>{{$o->id}}</td>
            <td>
                <strong>{{$o->serijski_broj}}</strong>
            </td>
            <td><a href="{{route('procesori.modeli.detalj', $o->procesorModel->id)}}">{{$o->procesorModel->proizvodjac->naziv}} {{$o->procesorModel->naziv}}, {{$o->procesorModel->takt}} MHz</a></td>
            <td> @if($o->racunar)
                {{$o->racunar->ime}}
                @endif

            </td>
            <td>
                @if($o->stavkaOtpremnice)
                <a href="{{route('otpremnice.detalj', $o->stavkaOtpremnice->otpremnica->id)}}">
                {{$o->stavkaOtpremnice->otpremnica->broj}}, {{$o->stavkaOtpremnice->otpremnica->dobavljac->naziv}} od {{$o->stavkaOtpremnice->otpremnica->datum}}
                </a>
                @endif
            </td>

            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                <a class="btn btn-success btn-sm" id="dugmeDetalj" href="{{route('procesori.oprema.detalj', $o->id)}}">
                    <i class="fa fa-eye"></i>
                </a>
                <a class="btn btn-info btn-sm" id="dugmeIzmena" href="">
                    <i class="fa fa-pencil"></i>
                </a>
                <button class="btn btn-danger btn-sm otvori-brisanje" data-toggle="modal" data-target="#brisanjeModal" value="{{$o->id}}">
                    <i class="fa fa-recycle"></i>
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
$( document ).ready(function() {

    $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            /*var ruta = " route('procesori.oprema.brisanje') }}";*/
            $('#brisanje-forma').attr('action', ruta); });

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