@extends('sabloni.app')

@section('naziv', 'Modeli | Osnovne ploče')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <div class="row">
        <div class="col-md-10">
            <h1><span><img class="slicica_animirana" alt="Modeli osnovne ploče" src="{{url('/images/mbd.png')}}" style="height:64px;"></span>&emsp;Modeli osnovnih ploča</h1>
        </div>

         <div class="col-md-2 text-right" style="padding-top: 50px;">
            <a class="btn btn-primary ono" href="{{route('osnovne_ploce.modeli.dodavanje.get')}}"><i class="fa fa-plus-circle fa-fw"></i> Dodaj model osnovne ploče</a>
        </div>
        </div>
        <hr>
<div class="row">
    <div class="col-md-12">
@if($osnovne_ploce->isEmpty())
            <h3 class="text-danger">Trenutno nema stavki u bazi podataka</h3>
        @else
            <table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
                <thead>
                        <th style="width: 5%;">#</th>
                        <th style="width: 20%;">Naziv</th>
                        <th style="width: 10%;">Proizvođač</th>
                        <th style="width: 10%;">Čipset</th>
                        <th style="width: 10%;">Soket</th>
                        <th style="width: 10%;">USB 3.0</th>
                        <th style="width: 10%;">Ocena</th>
                        <th style="width: 10%;">Link</th>
                        <th style="width: 15%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
                </thead>
                <tbody>
                @foreach ($osnovne_ploce as $m)
                        <tr>
                            <td>{{$m->id}}</td>
                            <td>{{$m->naziv}}</td>
                            <td>{{$m->proizvodjac->naziv}}</td>
                            <td>{{$m->cipset}}</td>
                            <td>{{$m->soket->naziv}}</td>
                            <td>
                            <span title="U pitanju ploča sa USB 3.0 ili novijim portom" style="color: #18bc9c;">
                                {!! $m->usb_tri == 1 ? "<i class=\"fa fa-check-square-o\"></i>" : " "!!}
                            </span>
                            </td>
                            <td>{{$m->ocena}}</td>
                            <td><a href="{{$m->link}}" target="_blank" style="font-size: 2rem;">
                                    <i class="fa fa-link"></i>
                                </a>
                            </td>
                            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                    <a class="btn btn-success btn-sm" id="dugmeDetalj"  href="{{route('osnovne_ploce.modeli.detalj', $m->id)}}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-info btn-sm" id="dugmeIzmena"  href="{{route('osnovne_ploce.modeli.izmena.get', $m->id)}}"><i class="fa fa-pencil"></i></a>
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
            var ruta = "{{ route('osnovne_ploce.modeli.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });

    var tabela;
    tabela = $('#tabela').DataTable({

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

        new $.fn.dataTable.FixedHeader( tabela );

});
</script>
@endsection