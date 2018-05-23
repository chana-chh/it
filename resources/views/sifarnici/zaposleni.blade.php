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
        @if($zaposleni->isEmpty())
<h3 class="text-danger">Trenutno nema zaposlenih u bazi</h3>
@else
        <table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
            <thead>
                <th style="width: 5%;">#</th>
                <th style="width: 17%;">Ime</th>
                <th style="width: 15%;">Uprava</th>
                <th style="width: 18%;">Radno mesto</th>
                <th style="width: 20%;">Kancelarija</th>
                <th style="width: 15%;">Email</th>
                <th style="width: 10%; text-align:right;">
                <i class="fa fa-cogs"></i>&emsp;Akcije
            </th>
            </thead>
            <tbody>
    @foreach ($zaposleni as $d)
                <?php
                $eml = explode("#", $d->emailovi);
                ?>
    <tr>
        <td>
            {{$d->zaposleni_id}}
        </td>
        <td>
            <a href="{{ route('zaposleni.detalj', $d->zaposleni_id) }}">
                {{ $d->ime_zaposlenog }} {{ $d->prezime_zaposlenog }}
            </a>
        </td>
        <td>
            {{$d->uprava}}
        </td>
        <td><small>{{ $d->radno_mesto_zaposlenog}}</small></td>
        <td>  
            @if($d->id_kancelarije) 
            <a href="{{route('kancelarije.detalj.get', $d->id_kancelarije)}}"> {{$d->kancelarija}}, {{$d->lokacija}}, {{$d->sprat}} </a> 
            @endif
        </td>

        <td>
              @foreach($eml as $e)
                        <a href="mailto:{{ $e }}">{{ $e }}</a>
                        <br>
                    @endforeach
        </td>
        <td>
            <a class="btn btn-success btn-sm" 
id="dugmeDetalj" href="{{ route('zaposleni.detalj', $d->zaposleni_id) }}">
<i class="fa fa-eye"></i>
</a>
<a class="btn btn-info btn-sm" 
id="dugmeIzmena" href="{{ route('zaposleni.izmena.get', $d->zaposleni_id) }}">
<i class="fa fa-pencil"></i>
</a>
<button class="btn btn-danger btn-sm otvori-brisanje" 
data-toggle="modal" data-target="#brisanjeModal"
value="{{ $d->zaposleni_id }}">
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
            dom: 'Bflrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',{
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4',
                customize : function(doc){
            doc.content[1].table.widths = ["20%", "20%", "20%", "20%", "20%"];
        },
                exportOptions: {
        columns: [ 1, 2, 3, 4, 5 ]
        }
            }
                
        ],
        columnDefs: [
                {
                    orderable: false,
                    searchable: false,
                    "targets": -1
                }
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