@extends('sabloni.app')

@section('naziv', 'Šifarnici | Lokacije')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Šifarnik lokacija" 
        src="{{url('/images/map.png')}}" style="height:64px;">
    &emsp;Lokacije
</h1>
@endsection

@section('sadrzaj')
@if($data->isEmpty())
    <h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table id="tabela" class="table table-striped" cellspacing="0" width="100%">
	<thead>
        <th style="width: 5%;"><small>ID</small></th>
		<th style="width: 20%;">Naziv</th>
        <th style="width: 20%;">Adresa</th>
        <th style="width: 10%;">Broj</th>
        <th style="width: 20%;">Napomena</th>
		<th style="width: 15%;">Povezivanje</th>
		<th style="width: 10%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
	</thead>
	<tbody>
	@foreach ($data as $d)
        <tr>
            <td><small>{{ $d->id }}</small></td>
            <td><strong>{{ $d->naziv }}</strong></td>
            <td>{{ $d->adresa_ulica }}</td>
            <td>{{ $d->adresa_broj }}</td>
            <td><small>{{ $d->napomena }}</small></td>
            <td><small>@if($d->povezivanja)  
                @foreach($d->povezivanja as $e)
                        {{ $e->tip }}, {{ $e->brzina }}, {{ $e->cena }}
                        <br>
                    @endforeach
                @endif</small></td>
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
<div class="modal fade" id="editModal">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-primary">Izmeni stavku</h2>
      </div>
      <div class="modal-body">
        <form action="{{ route('lokacije.izmena') }}" method="post">
          {{ csrf_field() }}

            <div class="form-group">
              <label for="nazivModal">Naziv:</label>
              <input type="text" class="form-control" id="nazivModal" name="nazivModal">
            </div>

            <div class="form-group">
              <label for="adresaModal">Adresa:</label>
              <input type="text" class="form-control" id="adresaModal" name="adresaModal">
            </div>

             <div class="form-group">
              <label for="brojModal">Broj:</label>
              <input type="text" class="form-control" id="brojModal" name="brojModal">
            </div>

            <div class="form-group">
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
{{-- Kraj Modala za dijalog izmena--}}
@endsection

@section('traka')
<h4>Dodavanje lokacije</h4>
<hr>
<div class="well">
    <form action="{{ route('lokacije.dodavanje') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
            <label for="naziv">Naziv lokacije: </label>
            <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv') }}" maxlength="50" required>
            @if ($errors->has('naziv'))
                <span class="help-block">
                    <strong>{{ $errors->first('naziv') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('adresa_ulica') ? ' has-error' : '' }}">
            <label for="adresa_ulica">Adresa lokacije: </label>
            <input type="text" name="adresa_ulica" id="adresa_ulica" class="form-control" value="{{ old('adresa_ulica') }}" maxlength="100">
            @if ($errors->has('adresa_ulica'))
                <span class="help-block">
                    <strong>{{ $errors->first('adresa_ulica') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('adresa_broj') ? ' has-error' : '' }}">
            <label for="adresa_broj">Broj: </label>
            <input type="text" name="adresa_broj" id="adresa_broj" class="form-control" value="{{ old('adresa_broj') }}" maxlength="50">
            @if ($errors->has('adresa_broj'))
                <span class="help-block">
                    <strong>{{ $errors->first('adresa_broj') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
            <label for="napomena">Napomena: </label>
            <textarea name="napomena" id="napomena" maxlength="255" class="form-control">{{ old('napomena') }}</textarea>
            @if ($errors->has('napomena'))
                <span class="help-block">
                    <strong>{{ $errors->first('napomena') }}</strong>
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
                        <a class="btn btn-danger btn-block ono" href="{{route('lokacije')}}"><i class="fa fa-ban"></i> Otkaži</a>
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
                orientation: 'landscape',
                pageSize: 'A4',
                customize : function(doc){
            doc.content[1].table.widths = ["30%", "30%", "10%", "30%"];
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
            var ruta = "{{ route('lokacije.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });

   $(document).on('click','.otvori-izmenu',function(){
        var id = $(this).val();
        var ruta = "{{ route('lokacije.detalj') }}";

        $.ajax({
        url: ruta,
        type:"POST", 
        data: {"id":id, _token: "{!! csrf_token() !!}"},
        success: function(data){
              $("#idModal").val(data.id);
              $("#nazivModal").val(data.naziv);
              $("#adresaModal").val(data.adresa_ulica);
              $("#brojModal").val(data.adresa_broj);
              $("#napomenaModal").val(data.napomena);
            }
        });     
    });
});
</script>
@endsection