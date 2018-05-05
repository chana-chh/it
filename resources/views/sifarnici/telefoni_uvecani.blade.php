@extends('sabloni.app')

@section('naziv', 'Šifarnici | Telefoni')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Fiksna telefonija"
                  src="{{ url('/images/telefon.png') }}" style="height:64px;">
            &emsp;Fiksni telefoni <small>(Prilagođen prikaz)</small>
        </h1>
    </div>

    <div class="col-md-4 text-right" style="padding-top: 50px;">
        <div class="btn-group-lg" >
            <a class="btn btn-primary" onclick="window.history.back();"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('telefoni') }}"
               title="Normalni prikaz">
                <i class="fa fa-compress"></i>
            </a>
            <a class="btn btn-primary" href="{{route('telefoni.dodavanje.get')}}"
               title="Dodavanje broja fiksne telefonije">
                <i class="fa fa-plus"></i>
            </a>
        </div>
</div>
</div>
<hr>
@if($data->isEmpty())
<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table class="table table-striped" id="tabela">
    <thead style="font-size: 1.5rem">
    <th style="width: 5%;">#</th>
    <th style="width: 20%;">Broj</th>
    <th style="width: 10%;">Vrsta</th>
    <th style="width: 25%;">Kancelarija</th>
    <th style="width: 25%;">Napomena</th>
    <th style="width: 15%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
</thead>
<tbody>
    @foreach ($data as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td style="font-size: 3rem"><strong>{{ $d->broj }}</strong></td>
        <td style="font-size: 3rem"><strong>{{ $d->vrsta }}</strong></td>
        <td style="font-size: 2rem">{{$d->kancelarija->naziv}}, {{$d->kancelarija->lokacija->naziv}}, {{$d->kancelarija->sprat->naziv}}</td>
        <td style="font-size: 2rem"><em>{{ str_limit($d->napomena, 60) }}</em></td>
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

<!--  POCETAK izmenaModal  -->
<div id="editModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class = "close" data-dismiss = "modal">&times;</button>
                <h2 class="modal-title">Izmeni stavku</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('telefoni.izmena') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group-lg">
                        <label for="brojModal">Broj:</label>
                        <input type="text" id="brojModal" name="brojModal" class="form-control" required>
                    </div>

                    <div class="form-group-lg">
                        <label for="vrstaModal">Vrsta:</label>
                            <select class="form-control" name="vrstaModal" id="vrstaModal" data-placeholder="vrsta ...">
                                <option value="1">Direktni</option>
                                <option value="2">Lokal</option>
                                <option value="3">Fax</option>
                            </select>
                    </div>

                    <div class="form-group-lg">
                        <label for="kancelarija_idModal">Kancelarija:</label>
                        <select class="form-control" name="kancelarija_idModal" id="kancelarija_idModal" data-placeholder="kancelarija ...">
                        </select>
                    </div>

                    <div class="form-group-lg">
                        <label for="napomenaModal">Napomena:</label>
                        <textarea class="form-control" id="napomenaModal" name="napomenaModal"></textarea>
                    </div>

                    <input type="hidden" id="idModal" name="idModal">
                    <hr>

                                <div class="row dugmici" style="margin-top: 30px;">
            <div class="col-md-12" >
                <div class="form-group">
                    <div class="col-md-6 snimi">
                        <button id = "btn-snimi" type="submit" class="btn btn-success btn-block ono">
                            <i class="fa fa-save"></i>&emsp;Snimi izmene
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-primary btn-block ono" data-dismiss="modal">
                            <i class="fa fa-ban"></i>&emsp;Otkaži
                        </a>
                    </div>
                </div>
            </div>
        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--  KRAJ izmenaModal  -->
@endsection

@section('skripte')
<script>
    $(document).ready(function () {

        $('#tabela').DataTable({
            dom: 'Bflrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',{
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                customize : function(doc){
            doc.content[1].table.widths = ["20%", "15%", "50%", "15%"];
        },
                exportOptions: {
        columns: [ 1, 2, 3, 4 ]
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
                processing: "Procesiranje u toku ...",
                lengthMenu: "Prikaži _MENU_ elemenata",
                zeroRecords: "Nije pronađen nijedan zapis za zadati kriterijum",
                info: "Prikazano _START_ do _END_ od ukupno _TOTAL_ elemenata",
                infoFiltered: "(filtrirano od _MAX_ elemenata)"
            }
        });

    resizeChosen();
    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({allow_single_deselect: true, search_contains: true});

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };

    $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('telefoni.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });

        $(document).on('click', '.otvori-izmenu', function () {
            var id = $(this).val();
            var ruta = "{{ route('telefoni.detalj') }}";
            $.ajax({
                url: ruta,
                type: "POST",
                data: {
                    "id": id,
                    "_token": "{!! csrf_token() !!}"
                },
                success: function (data) {
                    $("#idModal").val(data.telefoni.id);
                    $("#brojModal").val(data.telefoni.broj);
                    switch (data.telefoni.vrsta) { 
                            case 'direktni': 
                                $("#vrstaModal").val(1);
                                break;
                            case 'lokal': 
                                $("#vrstaModal").val(2);
                                break;
                            case 'fax': 
                                $("#vrstaModal").val(3);
                                break;   
                            default:
                                $("#vrstaModal").val(0);
                        }
                    $("#napomenaModal").val(data.telefoni.napomena);

                     $.each(data.kancelarije, function(index, lokObjekat){
                    $('#kancelarija_idModal').append('<option value="'+lokObjekat.id+'">'+lokObjekat.naziv+', '+lokObjekat.lokacija.naziv+', '+lokObjekat.sprat.naziv+'</option>');
                    });
                    $("#kancelarija_idModal").val(data.telefoni.kancelarija_id);
                }
            });
        });
    });
</script>
@endsection















































































