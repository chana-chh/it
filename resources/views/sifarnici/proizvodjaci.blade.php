@extends('sabloni.app')

@section('naziv', 'Sifarnici | Proizvodjaci')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header"><span><img class="slicica_animirana" alt="proizvodjaci" src="{{url('/images/proizvodjaci.png')}}" style="height:64px; margin-bottom: 15px"></span>&emsp;Proizvođači</h1>
@endsection

@section('sadrzaj')
{{-- <h3>Lista trenutno raspoloživih proizvođača</h3>
<hr> --}}
	@if($proizvodjaci->isEmpty())
    		<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
    	@else
    		<table class="table table-striped tabelaProizvodjaci" name="tabelaProizvodjaci" id="tabelaProizvodjaci">
        		<thead>
            		<th style="width: 10%;">#</th>
            		<th style="width: 50%;">Naziv</th>
            		<th style="width: 25%;">Link</th>
            		<th style="width: 15%;text-align:center"><i class="fa fa-cogs"></i></th>
        		</thead>
        		<tbody id="proizvodjaci_lista" name="proizvodjaci_lista">
            	@foreach ($proizvodjaci as $proizvodjac)
                    <tr>
                        <td>{{$proizvodjac->id}}</td>
                        <td><strong>{{ $proizvodjac->naziv }}</strong></td>
                        <td><a href="{{ $proizvodjac->link }}" target="_blank">Link</a></td>
                        <td style="text-align:right;">
                            <button class="btn btn-success btn-sm otvori_izmenu" id="dugmeIzmena" data-toggle="modal" data-target="#editModal" value="{{$proizvodjac->id}}"><i class="fa fa-pencil"></i></button>
                            <button id="dugmeBrisanje" class="btn btn-danger btn-sm otvori_modal"  value="{{$proizvodjac->id}}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
            	@endforeach
        		</tbody>
    		</table>
    	@endif
    	{{-- Modal za dijalog brisanje--}}
    <div class="modal fade" id="brisanjeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="brisanjeModalLabel">Upozorenje!</h4>
            </div>
            <div class="modal-body">
                <h4 class="text-primary">Da li želite trajno da obrišete stavku</strong></h4>
                <p ><strong>Ova akcija je nepovratna!</strong></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btn-obrisi">Obriši</button>
            <button type="button" class="btn btn-danger" id="btn-otkazi">Otkaži</button>
            </div>
        </div>
      </div>
  </div>
    {{-- Kraj Modala za dijalog brisanje--}}

    {{-- Pocetak Modala za dijalog izmena--}}
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-primary">Izmeni stavku</h4>
          </div>
          <div class="modal-body">
            <form action="{{ route('proizvodjaci.izmena') }}" method="post">
              {{ csrf_field() }}

                <div class="form-group">
                  <label for="nazivModal">Naziv:</label>
                  <input type="text" class="form-control" id="nazivModal" name="nazivModal">
                </div>

                <div class="form-group">
                  <label for="linkModal">Link:</label>
                  <input type="text" class="form-control" id="linkModal" name="linkModal">
                </div>

              <button type="submit" class="btn btn-success">Izmeni</button>
              <input type="hidden" id="edit_id" name="edit_id">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Zatvori</button>
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
        <div class="form-group text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Dodaj</button>
            <a class="btn btn-danger" href="{{route('proizvodjaci')}}"><i class="fa fa-ban"></i> Otkaži</a>
        </div>
    </form>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

    $('#tabelaProizvodjaci').DataTable({
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

    $(document).on('click','.otvori_modal',function(){

        var id = $(this).val();

        var ruta = "{{ route('proizvodjaci.brisanje') }}";


        $('#brisanjeModal').modal('show');

        $('#btn-obrisi').click(function(){
            $.ajax({
            url: ruta,
            type:"POST",
            data: {"id":id, _token: "{!! csrf_token() !!}"},
            success: function(){
            location.reload();
          }
        });

        $('#brisanjeModal').modal('hide');
        });
        $('#btn-otkazi').click(function(){
            $('#brisanjeModal').modal('hide');
        });
    });

   $(document).on('click','.otvori_izmenu',function(){

        var id_izmena = $(this).val();
        var detalj_ruta = "{{ route('proizvodjaci.detalj') }}";

        $.ajax({
        url: detalj_ruta,
        type:"POST",
        data: {"id":id_izmena, _token: "{!! csrf_token() !!}"},
        success: function(result){
          $("#edit_id").val(result.id);
          $("#nazivModal").val(result.naziv);
          $("#linkModal").val(result.link);
        }
      });

    });

});
</script>
<script src="{{ asset('/js/parsley.js') }}"></script>
<script src="{{ asset('/js/parsley_sr.js') }}"></script>
@endsection