@extends('sabloni.app')

@section('naziv', 'Šifarnici | Kancelarije')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Kancelarije"
         src="{{ url('/images/kancelarije.png') }}" style="height:64px;">
    &emsp;Kancelarije
</h1>
@endsection

@section('sadrzaj')
@if($kancelarije->isEmpty())
<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table id="tabela" class="table table-striped" cellspacing="0" width="100%">
    <thead>
        <th style="width: 5%;"><small>id</small></th>
        <th style="width: 20%;">Kancelarija</th>
        <th style="width: 20%;">Sprat</th>
        <th style="width: 20%;">Lokacija</th>
        <th style="width: 20%;">Napomena</th>
        <th style="text-align:right; width: 15%"><i class="fa fa-cogs"></i></th>
    </thead>
    <tbody>
        @foreach ($kancelarije as $kancelarija)
        <tr>
            <td><small>{{$kancelarija->id}}</small></td>
            <td><strong>{{$kancelarija->naziv}}</strong></td>
            <td>{{$kancelarija->sprat->naziv}}</td>
            <td>{{$kancelarija->lokacija->naziv}}</td>
            <td>{{$kancelarija->napomena}}</td>
            <td style="text-align:right;">
                <a class="btn btn-success btn-sm" id="dugmeDetalj" href="{{route('kancelarije.detalj.get', $kancelarija->id)}}">
                    <i class="fa fa-eye"></i>
                </a>
                <button class="btn btn-info btn-sm otvori-izmenu"
                        data-toggle="modal" data-target="#editModal"
                        value="{{ $kancelarija->id }}">
                    <i class="fa fa-pencil"></i>
                </button>
                <button class="btn btn-danger btn-sm otvori-brisanje"
                        data-toggle="modal" data-target="#brisanjeModal"
                        value="{{ $kancelarija->id }}">
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
            <label for="povrsinaModal">Površina (m2):</label>
            <input type="number" id="povrsinaModal" name="povrsinaModal" class="form-control" min="0" step="0.01">
            </div>

                <div class="form-group">
                  <label for="napomenaModal">Napomena:</label>
                  <textarea class="form-control" id="napomenaModal" name="napomenaModal"></textarea>
                </div>

              <input type="hidden" id="idModal" name="idModal">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Snimi izmene
                    </button>
            </form>
          </div>
         <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-ban"></i> Otkaži
                </button>
            </div> 
        </div>
        
      </div>
    </div>
    {{-- Kraj Modala za dijalog izmena--}}

@endsection

@section('traka')
<h3>Dodavanje kancelarije</h3>
<hr>
<div class="well">
    <form action="{{ route('kancelarije.dodavanje') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
            <label for="naziv">Naziv/broj: </label>
            <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv') }}" required> @if ($errors->has('naziv'))
            <span class="help-block">
                <strong>{{ $errors->first('naziv') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('lokacija_id') ? ' has-error' : '' }}">
            <label for="lokacija_id">Lokacija</label>&emsp;
            <button type="button" class="btn btn-success btn-xs otvori-lokacije"
                        data-toggle="modal" data-target="#lokacijaModal">
                    <i class="fa fa-plus"></i>
                </button>
            <select name="lokacija_id" id="lokacija_id" class="chosen-select form-control" data-placeholder="lokacija ..." required>
                <option value=""></option>
                @foreach($lokacije as $lokacija)
                <option value="{{ $lokacija->id }}" {{ old( 'lokacija_id')==$lokacija->id ? ' selected' : '' }}>
                    <strong>{{ $lokacija->naziv }}</strong>
                </option>
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
                <option value="{{ $sprat->id }}" {{ old( 'sprat_id')==$sprat->id ? ' selected' : '' }}>
                    <strong>{{ $sprat->naziv }}</strong>
                </option>
                @endforeach
            </select>
            @if ($errors->has('sprat_id'))
            <span class="help-block">
                <strong>{{ $errors->first('sprat_id') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('povrsina') ? ' has-error' : '' }}">
            <label for="povrsina">Površina (m2):</label>
            <input type="number" id="povrsina" name="povrsina"
                   class="form-control"
                   value="{{ old('povrsina', 0) }}"
                   min="0" step="0.01">
            @if ($errors->has('povrsina'))
            <span class="help-block">
                <strong>{{ $errors->first('povrsina') }}</strong>
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
                        <button type="submit" class="btn btn-success btn-block ono">
                            <i class="fa fa-plus-circle"></i> Dodaj
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block ono" href="{{route('kancelarije')}}">
                            <i class="fa fa-ban"></i> Otkaži
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- Pocetak Modala za dodavanje lokacije--}}
<div class="modal fade" id="lokacijaModal">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-primary">Dodaj lokaciju</h4>
      </div>
      <div class="modal-body">
        <form id="lokacijaForma">

            <div class="form-group nazivLokacije">
              <label for="nazivLokacije">Naziv:</label>
              <input type="text" class="form-control" id="nazivLokacije" name="nazivLokacije">
            </div>

            <div class="form-group">
              <label for="adresaLokacije">Adresa:</label>
              <input type="text" class="form-control" id="adresaLokacije" name="adresaLokacije">
            </div>

             <div class="form-group">
              <label for="brojLokacije">Broj:</label>
              <input type="text" class="form-control" id="brojLokacije" name="brojLokacije">
            </div>

            <div class="form-group">
              <label for="napomenaLokacije">Napomena:</label>
              <textarea class="form-control" id="napomenaLokacije" name="napomenaLokacije"></textarea>
            </div>
                <button type="button" class="btn btn-success dodajLokaciju">
                    <i class="fa fa-plus-circle"></i> Dodaj
                </button>
            </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-ban"></i> Otkaži
                </button>
            </div>
        </div>
    </div>
</div>
{{-- Kraj Modala za dodavanje lokacije--}}
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

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
            doc.content[1].table.widths = ["20%", "20%", "30%", "30%"];
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

    $('.chosen-select').chosen({
            allow_single_deselect: true,
            search_contains: true
            });

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };

   $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('kancelarije.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });


    $(document).on('click','.otvori-izmenu',function(){

        var id = $(this).val();
        var ruta = "{{ route('kancelarije.detalj') }}";

        $.ajax({
        url: ruta,
        type:"POST", 
        data: {"id":id, _token: "{!! csrf_token() !!}"},
        success: function(result){

          $("#idModal").val(result.kancelarije.id);
          $("#nazivModal").val(result.kancelarije.naziv);
          $("#povrsinaModal").val(result.kancelarije.povrsina);
          $("#napomenaModal").val(result.kancelarije.napomena);
          
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

    $(document).on('click', '.dodajLokaciju', function () {
            
            var ruta = "{{ route('lokacije.dodavanje.ajax') }}";

            var nazivLokacije = $('#nazivLokacije').val();
            var adresaLokacije = $('#adresaLokacije').val();
            var brojLokacije = $('#brojLokacije').val();
            var napomenaLokacije = $('#napomenaLokacije').val();

            if (!$('#nazivLokacije').val()) {
                $('.nazivLokacije').addClass('has-error');
                alert("Polje sa nazivom lokacije je obavezno i jedinstveno!")
            }
            else{
            $.ajax({
                url: ruta,
                type: 'POST',
                dataType: 'json',
                data: { _token: "{!! csrf_token() !!}", nazivLokacije: nazivLokacije, adresaLokacije: adresaLokacije, brojLokacije: brojLokacije, napomenaLokacije: napomenaLokacije},
                success: function(data){
                    if(data.status == "1")
                        $('#lokacijaForma').trigger("reset");
                        $('#lokacijaModal').modal('hide');
                        var novaLokacija = $('<option value="'+data.novi_id+'">'+data.novi_naziv+'</option>');
                        $('#lokacija_id').append(novaLokacija);
                        $('#lokacija_id').trigger("chosen:updated");
                },

            });

        }
                
        });


});
</script>
@endsection