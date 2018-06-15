@extends('sabloni.app')

@section('naziv', 'Šifarnici | Povezivanje lokacija')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Povezivanje"
         src="{{ url('/images/ppovezivanje.png') }}" style="height:64px;">
    &emsp;Povezivanje lokacija
</h1>
@endsection

@section('sadrzaj')
@if($povezivanje->isEmpty())
<h3 class="text-danger">Trenutno nema veza ka lokacijama u bazi podataka</h3>
@else
<table id="tabela" class="table table-striped" cellspacing="0" width="100%">
    <thead>
        <th style="width: 5%;">id</th>
        <th style="width: 20%;">Lokacija</th>
        <th style="width: 12%;">Provajder</th>
        <th style="width: 14%;">Tip veze</th>
        <th style="width: 12%;">Brzina</th>
        <th style="width: 12%;">Cena/ugovor</th>
        <th style="width: 15%;">Napomena</th>
        <th style="text-align:right; width: 10%"><i class="fa fa-cogs"></i></th>
    </thead>
    <tbody>
        @foreach ($povezivanje as $p)
        <tr>
            <td>{{$p->id}}</td>
            <td>{{$p->lokacija->naziv}}</td>
            <td>{{$p->proizvodjac->naziv}}</td>
            <td>{{$p->tip}}</td>
            <td>{{$p->brzina}}</td>
            <td>{{$p->cena}}</td>
            <td><small>{{$p->napomena}}</small></td>
            <td style="text-align:right;">
                <button class="btn btn-info btn-sm otvori-izmenu"
                        data-toggle="modal" data-target="#editModal"
                        value="{{ $p->id }}">
                    <i class="fa fa-pencil"></i>
                </button>
                <button class="btn btn-danger btn-sm otvori-brisanje"
                        data-toggle="modal" data-target="#brisanjeModal"
                        value="{{ $p->id }}">
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
            <form action="{{ route('povezivanje.izmena') }}" method="post">
              {{ csrf_field() }}
              
                <div class="form-group">
                  <label for="tipModal">Tip veze:</label>
                  <input type="text" maxlength="75" class="form-control" id="tipModal" name="tipModal">
                </div>

                <div class="form-group">
                  <label for="brzinaModal">Brzina:</label>
                  <input type="text" maxlength="50" class="form-control" id="brzinaModal" name="brzinaModal">
                </div>

                <div class="form-group">
                    <label for="lokacija_idModal">Lokacija</label>
                    <select class="form-control" name="lokacija_idModal" id="lokacija_idModal" data-placeholder="lokacija ...">
                    </select>
                </div>

                <div class="form-group">
                  <label for="proizvodjac_idModal">Provajder:</label>
                  <select class="form-control" name="proizvodjac_idModal" id="proizvodjac_idModal" data-placeholder="provajder ...">
                    </select>
                </div>


                <div class="form-group">
                  <label for="cenaModal">Cena/ugovor:</label>
                  <input type="text" maxlength="50" class="form-control" id="cenaModal" name="cenaModal">
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
<h3>Dodavanje povezivanja lokacija</h3>
<hr>
<div class="well">
    <form action="{{ route('povezivanje.dodavanje') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('tip') ? ' has-error' : '' }}">
            <label for="tip">Tip veze: </label>
            <input type="text" maxlength="75" name="tip" id="tip" class="form-control" value="{{ old('tip') }}" required> @if ($errors->has('tip'))
            <span class="help-block">
                <strong>{{ $errors->first('tip') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('brzina') ? ' has-error' : '' }}">
            <label for="brzina">Brzina veze: </label>
            <input type="text" maxlength="50" name="brzina" id="brzina" class="form-control" value="{{ old('brzina') }}" required> @if ($errors->has('brzina'))
            <span class="help-block">
                <strong>{{ $errors->first('brzina') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('lokacija_id') ? ' has-error' : '' }}">
            <label for="lokacija_id">Lokacija</label>&emsp;
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

        <div class="form-group{{ $errors->has('proizvodjac_id') ? ' has-error' : '' }}">
            <label for="proizvodjac_id">Provajder</label>
            <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control" data-placeholder="proizvodjac ..." required>
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

        <div class="form-group{{ $errors->has('cena') ? ' has-error' : '' }}">
            <label for="cena">Cena/ugovor: </label>
            <input type="text" maxlength="50" name="cena" id="cena" class="form-control" value="{{ old('cena') }}" required> @if ($errors->has('cena'))
            <span class="help-block">
                <strong>{{ $errors->first('cena') }}</strong>
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
                        <a class="btn btn-danger btn-block ono" href="{{route('povezivanje')}}">
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

       if ($('#tabela').length) {
            new $.fn.dataTable.FixedHeader( tabela );
        }

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
            var ruta = "{{ route('povezivanje.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });


    $(document).on('click','.otvori-izmenu',function(){

        var id = $(this).val();
        var ruta = "{{ route('povezivanje.detalj') }}";

        $.ajax({
        url: ruta,
        type:"POST", 
        data: {"id":id, _token: "{!! csrf_token() !!}"},
        success: function(result){

          $("#idModal").val(result.povezivanje.id);
          $("#tipModal").val(result.povezivanje.tip);
          $("#brzinaModal").val(result.povezivanje.brzina);
          $("#cenaModal").val(result.povezivanje.cena);
          $("#napomenaModal").val(result.povezivanje.napomena);
          
            $.each(result.lokacije, function(index, lokObjekat){
            $('#lokacija_idModal').append('<option value="'+lokObjekat.id+'">'+lokObjekat.naziv+'</option>');
            });
            $("#lokacija_idModal").val(result.povezivanje.lokacija_id);

             $.each(result.proizvodjaci, function(i, lokObjekats){
            $('#proizvodjac_idModal').append('<option value="'+lokObjekats.id+'">'+lokObjekats.naziv+'</option>');
            });
             $("#proizvodjac_idModal").val(result.povezivanje.proizvodjac_id);
        }
      });     

    });

});
</script>
@endsection