@extends('sabloni.app')

@section('naziv', 'Sifarnici | Kancelarije')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header"><span><img class="slicica_animirana" alt="kancelarije" src="{{url('/images/kancelarije.png')}}" style="height:64px;  width:64px"></span>&emsp;Kancelarije</h1>
@endsection

@section('sadrzaj')
<h2 >Lista trenutno raspoloživih kancelarija</h2>
<hr>
	@if($kancelarije->isEmpty())
    		<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
    	@else
    		<table class="table table-striped tabelaKancelarije" cellspacing="0" width="100%" name="tabelaKancelarije" id="tabelaKancelarije">
        		<thead>
                        <th>#</th>
                        <th>Kancelarija</th>
                        <th>Sprat</th>
                        <th>Lokacija</th>
                        <th>Napomena</th>
                        <th style="text-align:center"><i class="fa fa-cogs"></i></th>
        		</thead>
        		<tbody id="kancelarije_lista" name="kancelarije_lista">
            	@foreach ($kancelarije as $kancelarija)
                		<tr>
                            <td>{{$kancelarija->id}}</td>
                            <td><strong>{{$kancelarija->naziv}}</strong></td>
                            <td>{{$kancelarija->sprat->naziv}}</td>
                            <td>{{$kancelarija->lokacija->naziv}}</td>
                            <td>{{$kancelarija->napomena}}</td>
                            <td style="text-align:center">
                    <button class="btn btn-success btn-sm otvori_izmenu" id="dugmeIzmena" data-toggle="modal" data-target="#editModal" value="{{$kancelarija->id}}"><i class="fa fa-pencil"></i></button>
                    <button id="dugmeBrisanje" class="btn btn-danger btn-sm otvori_modal"  value="{{$kancelarija->id}}"><i class="fa fa-trash"></i></button>
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

    {{-- POcetak Modala za dijalog izmena--}}
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-primary">Izmeni stavku</h4>
          </div>
          <div class="modal-body">
            <form action="{{ route('kancelarije.izmena') }}" method="post">
              {{ csrf_field() }}
              
                <div class="form-group">
                  <label for="nazivModal">Naziv/broj:</label>
                  <input type="text" class="form-control" id="nazivModal" name="nazivModal">
                </div>

                <div class="form-group">
                    <label for="lokacija_idModal">Lokacija</label>
                    <select class="form-control" name="lokacija_idModal" id="lokacija_idModal" data-placeholder="lokacija ...">
                    </select>
                </div>

                <div class="form-group">
                  <label for="sprat_idModal">Sprat:</label>
                  <select class="form-control" name="sprat_idModal" id="sprat_idModal" data-placeholder="sprat ...">
                    </select>
                </div>

                <div class="form-group">
                  <label for="napomenaModal">Napomena:</label>
                  <textarea class="form-control" id="napomenaModal" name="napomenaModal"></textarea>
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
<h3 >Dodavanje kancelarije</h3>
<hr>
<div class="well">
    <form action="{{ route('kancelarije.dodavanje') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
            <label for="naziv">Naziv/broj: </label>
            <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv') }}" required>
            @if ($errors->has('naziv'))
                <span class="help-block">
                    <strong>{{ $errors->first('naziv') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('lokacija_id') ? ' has-error' : '' }}">
                    <label for="lokacija_id">Lokacija</label>
                    <select name="lokacija_id" id="lokacija_id" class="chosen-select form-control" data-placeholder="lokacija ..." required>
                    <option value=""></option>
                    @foreach($lokacije as $lokacija)
                    <option value="{{ $lokacija->id }}"{{ old('lokacija_id') == $lokacija->id ? ' selected' : '' }}><strong>{{ $lokacija->naziv }}</strong></option>
                    @endforeach
                    </select>
                        @if ($errors->has('lokacija_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lokacija_id') }}</strong>
                        </span>
                        @endif
                </div>

        <div class="form-group{{ $errors->has('sprat_id') ? ' has-error' : '' }}">
                    <label for="sprat_id">Sprat</label>
                    <select name="sprat_id" id="sprat_id" class="chosen-select form-control" data-placeholder="sprat ..." required>
                    <option value=""></option>
                    @foreach($spratovi as $sprat)
                    <option value="{{ $sprat->id }}"{{ old('sprat_id') == $sprat->id ? ' selected' : '' }}><strong>{{ $sprat->naziv }}</strong></option>
                    @endforeach
                    </select>
                        @if ($errors->has('sprat_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sprat_id') }}</strong>
                        </span>
                        @endif
                </div>

        <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
            <label for="napomena">Напомена: </label>
            <textarea name="napomena" id="napomena" maxlength="255" class="form-control">{{ old('napomena') }}</textarea>
            @if ($errors->has('napomena'))
                <span class="help-block">
                    <strong>{{ $errors->first('napomena') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-plus-circle"></i> Dodaj</button>
            <a class="btn btn-danger" href="{{route('kancelarije')}}"><i class="fa fa-ban"></i> Otkaži</a>
        </div>
    </form>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

        var tabela = $('#tabelaKancelarije').DataTable({

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

    resizeChosen();
    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({allow_single_deselect: true});

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };

    $(document).on('click','.otvori_modal',function(){

        var id = $(this).val();
        
        var ruta = "{{ route('kancelarije.brisanje') }}";


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
        var detalj_ruta = "{{ route('kancelarije.detalj') }}";

        $.ajax({
        url: detalj_ruta,
        type:"POST", 
        data: {"id":id_izmena, _token: "{!! csrf_token() !!}"},
        success: function(result){

          $("#edit_id").val(result.kancelarije.id);
          $("#nazivModal").val(result.kancelarije.naziv);
          $("#napomenaModal").val(result.kancelarije.napomena);
          

            // $('#lokacija_idModal').empty();
            $.each(result.lokacije, function(index, lokObjekat){
            $('#lokacija_idModal').append('<option value="'+lokObjekat.id+'">'+lokObjekat.naziv+'</option>');
            });
            $("#lokacija_idModal").val(result.kancelarije.lokacija_id);

             $.each(result.spratovi, function(i, lokObjekats){
            $('#sprat_idModal').append('<option value="'+lokObjekats.id+'">'+lokObjekats.naziv+'</option>');
            });
             $("#sprat_idModal").val(result.kancelarije.sprat_id);
        }
      });     

    });

});
</script>
@endsection