@extends('sabloni.app')

@section('naziv', 'Šifarnici | Reciklaže')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
        <h1 class="page-header">
        <img alt="Šifarnik spratova" class="slicica_animirana"
        src="{{url('/images/reciklaze.png')}}" style="height:64px;">
        &emsp;Reciklaže
        </h1>
@endsection

@section('sadrzaj')
	@if($data->isEmpty())
    		<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
    	@else
    		<table id="tabela" class="table table-striped" >
        		<thead>
            		<th style="width: 15%;">#</th>
                                <th style="width: 30%;">Datum</th>
            		<th style="width: 40%;">Napomena</th>
            		<th style="width: 15%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
        		</thead>
        		<tbody>
            	@foreach ($data as $d)
                    <tr>
                        <td>{{$d->id}}</td>
                        <td> <a href="{{ route('reciklaze.uredjaji', $d->datum) }}"> {{ $d->formatiran_datum }}</a></td>
                        <td><em>{{ $d->napomena }}</em></td>
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
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h2 class="modal-title text-primary">Izmeni stavku</h2>
          </div>
          <div class="modal-body">
            <form action="{{ route('reciklaze.izmena') }}" method="post">
              {{ csrf_field() }}

                <div class="form-group">
                  <label for="datumModal">Datum:</label>
                  <input type="text" class="form-control datepicker" id="datumModal" name="datumModal" placeholder="dd.mm.yyyy">
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
<h4>Dodavanje reciklaže</h4>
<hr>
<div class="well">
    <form action="{{ route('reciklaze.dodavanje') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('datum') ? ' has-error' : '' }}">
            <label for="datum">Datum: </label>
            <input type="text" name="datum" id="datum" class="form-control datepicker" value="{{ old('datum') }}"  placeholder="dd.mm.yyyy" required>
            @if ($errors->has('datum'))
                <span class="help-block">
                    <strong>{{ $errors->first('datum') }}</strong>
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
                        <a class="btn btn-danger btn-block ono" href="{{route('reciklaze')}}"><i class="fa fa-ban"></i> Otkaži</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('skripte')
<script src="{{ asset('/js/moment.min.js') }}"></script>
<script src="{{ asset('/js/datetime-moment.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script>
$( document ).ready(function() {

    $.fn.dataTable.moment('DD.MM.YYYY');

    $('#tabela').DataTable({
        columnDefs: [{ orderable: false, searchable: false, "targets": -1 }],
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
        var ruta = "{{ route('reciklaze.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });

   $(document).on('click','.otvori-izmenu',function(){
        var id = $(this).val();
        var ruta = "{{ route('reciklaze.detalj') }}";
        $.ajax({
            url: ruta,
            type:"POST",
            data: {"id":id, _token: "{!! csrf_token() !!}"},
            success: function(data){
                  $("#idModal").val(data.id);
                  $("#datumModal").val(data.formatiran_datum);
                  $("#napomenaModal").val(data.napomena);
            }
        });
    });

           $('.datepicker').datepicker({
            format: 'dd.mm.yyyy',
            autoclose: true,
            endDate: '+10y'
        });
});
</script>
@endsection