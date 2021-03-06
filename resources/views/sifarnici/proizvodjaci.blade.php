@extends('sabloni.app')

@section('naziv', 'Šifarnici | Proizvođači hardware-a i software-a')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Proizvođači hardware-a i software-a"
            src="{{url('/images/proizvodjaci.png')}}" style="height:64px; margin-bottom: 15px">
    &emsp;Proizvođači</h1>
@endsection

@section('sadrzaj')
@if($data->isEmpty())
    <h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table id="tabela" class="table table-striped" >
    <thead>
        <th style="width: 10%;">#</th>
        <th style="width: 50%;">Naziv</th>
        <th style="width: 25%;">Link</th>
        <th style="width: 15%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tbody>
        @foreach ($data as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td><strong>{{ $d->naziv }}</strong></td>
            <td>
                @if($d->link)
                <a href="{{ $d->link }}" target="_blank" title="{{ $d->link }}" style="font-size: 2rem;">
                    <i class="fa fa-link"></i>
                </a>
                @endif
            </td>
            <td style="text-align:right;">
                <button class="btn btn-success btn-sm otvori-izmenu"
                data-toggle="modal" data-target="#editModal"
                value="{{$d->id}}">
                <i class="fa fa-pencil"></i>
                </button>
                <button class="btn btn-danger btn-sm otvori-brisanje"
                data-toggle="modal" data-target="#brisanjeModal"
                value="{{$d->id}}">
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

{{-- Pocetak Modala za dijalog izmena--}}
<div id="editModal" class="modal fade" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title text-primary">Izmeni stavku</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('proizvodjaci.izmena') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nazivModal">Naziv:</label>
                        <input type="text" class="form-control" id="nazivModal" name="nazivModal" required>
                    </div>
                    <div class="form-group">
                        <label for="linkModal">Link:</label>
                        <input type="text" class="form-control" id="linkModal" name="linkModal">
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
{{-- Kraj Modala za dijalog izmena--}}
@endsection

@section('traka')
<h4>Dodavanje proizvođača</h4>
<hr>
<div class="well">
    <form action="{{ route('proizvodjaci.dodavanje') }}" method="POST" data-parsley-validate>
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
        <label for="naziv">Naziv proizvođača: </label>
        <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv') }}" required>
        @if ($errors->has('naziv'))
        <span class="help-block">
            <strong>{{ $errors->first('naziv') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
        <label for="link">Link proizvođača: </label>
        <input type="url" name="link" id="link" class="form-control" value="{{ old('link') }}" maxlenght="255">
        @if ($errors->has('link'))
        <span class="help-block">
            <strong>{{ $errors->first('link') }}</strong>
        </span>
        @endif
    </div>
        <div class="row dugmici">
            <div class="col-md-12">
                <div class="form-group text-right">
                    <div class="col-md-6 snimi">
                        <button type="submit" class="btn btn-success btn-block ono"><i class="fa fa-plus-circle"></i> Dodaj</button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block ono" href="{{route('proizvodjaci')}}"><i class="fa fa-ban"></i> Otkaži</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {
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
            doc.content[1].table.widths = ["100%"];
        },
                exportOptions: {
        columns: [ 1 ]
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
            first:      "Prva",
            previous:   "Prethodna",
            next:       "Sledeća",
            last:       "Poslednja"
            },
            processing:   "Procesiranje u toku ...",
            lengthMenu:   "Prikaži _MENU_ elemenata",
            zeroRecords:  "Nije pronađen nijedan zapis za zadati kriterijum",
            info:         "Prikazano _START_ do _END_ od ukupno _TOTAL_ elemenata",
            infoFiltered: "(filtrirano od _MAX_ elemenata)",
        },
    });


    $(document).on('click', '.otvori-brisanje', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('proizvodjaci.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });

    $(document).on('click','.otvori-izmenu',function(){
        var id = $(this).val();
        var ruta = "{{ route('proizvodjaci.detalj') }}";
        $.ajax({
            url: ruta,
            type:"POST",
            data: {"id":id, _token: "{!! csrf_token() !!}"},
            success: function(data){
                    $("#idModal").val(data.id);
                    $("#nazivModal").val(data.naziv);
                    $("#linkModal").val(data.link);
                }
            });

        });

    });
</script>
@endsection