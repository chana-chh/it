@extends('sabloni.app')

@section('naziv', 'Šifarnici | Aplikacije')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Aplikacije"
         src="{{ url('/images/aplikacije.png') }}" style="height:64px;">
    &emsp;Aplikacije
</h1>
@endsection

@section('sadrzaj')
@if($aplikacije->isEmpty())
<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table id="tabela" class="table table-striped" cellspacing="0" width="100%">
    <thead>
        <th>#</th>
        <th>Naziv</th>
        <th>Proizvođač</th>
        <th>Opis</th>
        <th style="text-align:right"><i class="fa fa-cogs"></i></th>
    </thead>
    <tbody>
        @foreach ($aplikacije as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td><strong>{{$d->naziv}}</strong></td>
            <td>{{$d->proizvodjac->naziv}}</td>
            <td>{{$d->opis}}</td>
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
            <form action="{{ route('aplikacije.izmena') }}" method="post" data-parsley-validate>
              {{ csrf_field() }}
              
                <div class="form-group">
                  <label for="nazivModal">Naziv/broj:</label>
                  <input type="text" class="form-control" id="nazivModal" name="nazivModal" required>
                </div>

                <div class="form-group">
                    <label for="proizvodjac_idModal">Proizvođač</label>
                    <select class="form-control" name="proizvodjac_idModal" id="proizvodjac_idModal" data-placeholder="proizvodjaci ..." required>
                    </select>
                </div>

                <div class="form-group">
                  <label for="opisModal">Opis:</label>
                  <textarea class="form-control" id="opisModal" name="opisModal"></textarea>
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
<h3>Dodavanje aplikacije</h3>
<hr>
<div class="well">
    <form action="{{ route('aplikacije.dodavanje') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
            <label for="naziv">Naziv/broj: </label>
            <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv') }}" required> @if ($errors->has('naziv'))
            <span class="help-block">
                <strong>{{ $errors->first('naziv') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('proizvodjac_id') ? ' has-error' : '' }}">
            <label for="proizvodjac_id">Proizvođač</label>
            <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control" data-placeholder="proizvođač ..." required>
                <option value=""></option>
                @foreach($proizvodjaci as $proizvodjac)
                <option value="{{ $proizvodjac->id }}" {{ old( 'proizvodjac_id')==$proizvodjac->id ? ' selected' : '' }}>
                    <strong>{{ $proizvodjac->naziv }}</strong>
                </option>
                @endforeach
            </select>
            @if ($errors->has('proizvodjac_id'))
            <span class="help-block">
                <strong>{{ $errors->first('proizvodjac_id') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('opis') ? ' has-error' : '' }}">
            <label for="opis">Napomena: </label>
            <textarea name="opis" id="opis" maxlength="255" class="form-control">{{ old('opis') }}</textarea>
            @if ($errors->has('opis'))
            <span class="help-block">
                <strong>{{ $errors->first('opis') }}</strong>
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
                        <a class="btn btn-danger btn-block ono" href="{{route('aplikacije')}}">
                            <i class="fa fa-ban"></i> Otkaži
                        </a>
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

        var tabela = $('#tabela').DataTable({

        responsive: true,
        columnDefs: [
                {
                    orderable: false,
                    searchable: false,
                    "targets": -1
                }
            ],
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

   $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('aplikacije.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });


    $(document).on('click','.otvori-izmenu',function(){

        var id = $(this).val();
        var ruta = "{{ route('aplikacije.detalj') }}";

        $.ajax({
        url: ruta,
        type:"POST", 
        data: {"id":id, _token: "{!! csrf_token() !!}"},
        success: function(data){
          $("#idModal").val(data.aplikacija.id);
          $("#nazivModal").val(data.aplikacija.naziv);
          $("#opisModal").val(data.aplikacija.opis);
          
            $.each(data.proizvodjaci, function(index, lokObjekat){
            $('#proizvodjac_idModal').append('<option value="'+lokObjekat.id+'">'+lokObjekat.naziv+'</option>');
            });
            $("#proizvodjac_idModal").val(data.aplikacija.proizvodjac_id);
        }
      });     

    });

});
</script>
@endsection