@extends('sabloni.app')

@section('naziv', 'Modeli | Grafički adapteri')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <div class="row">
        <div class="col-md-10">
            <h1><span><img class="slicica_animirana" alt="Modeli grafičkih adaptera" src="{{url('/images/vga.png')}}" style="height:64px;"></span>&emsp;Modeli grafičkih adaptera</h1>
        </div>

         <div class="col-md-2 text-right" style="padding-top: 50px;">
            <a class="btn btn-primary ono" href="{{route('vga.modeli.dodavanje.get')}}"><i class="fa fa-plus-circle fa-fw"></i> Dodaj model grafičkog adaptera</a>
        </div>
        </div>
        <hr>
<div class="row">
    <div class="col-md-12">
@if($vga->isEmpty())
            <h3 class="text-danger">Trenutno nema stavki u bazi podataka</h3>
        @else
            <table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
                <thead>
                        <th style="width: 5%;">#</th>
                        <th style="width: 15%;">Naziv</th>
                        <th style="width: 10%;">Proizvođač</th>
                        <th style="width: 10%;">Tip memorije</th>
                        <th style="width: 15%;">Kapacitet</th>
                        <th style="width: 15%;">VGA slot</th>
                        <th style="width: 15%;">Link</th>
                        <th style="width: 15%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
                </thead>
                <tbody>
                @foreach ($vga as $m)
                        <tr>
                            <td>{{$m->id}}</td>
                            <td>{{$m->naziv}}</td>
                            <td>{{$m->proizvodjac->naziv}}</td>
                            <td>{{$m->tipMemorije->naziv}}</td>
                            <td>{{$m->kapacitet_memorije}} MB</td>
                            <td>{{$m->vgaSlot->naziv}}</td>
                            <td><a href="{{$m->link}}" target="_blank" style="font-size: 2rem;">
                                    <i class="fa fa-link"></i>
                                </a>
                            </td>
                            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                    <a class="btn btn-success btn-sm" id="dugmeDetalj"  href="{{route('vga.modeli.detalj', $m->id)}}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-info btn-sm" id="dugmeIzmena"  href="{{route('vga.modeli.izmena.get', $m->id)}}"><i class="fa fa-pencil"></i></a>
                    <button class="btn btn-danger btn-sm otvori-brisanje"
                        data-toggle="modal" data-target="#brisanjeModal"
                        value="{{ $m->id }}">
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
$( document ).ready(function() {

        $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('vga.modeli.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });

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