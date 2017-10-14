@extends('sabloni.app')

@section('naziv', 'Šifarnici | Dijagonale')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header"><span><img class="slicica_animirana" alt="spratovi" src="{{url('/images/monitor_size.png')}}" style="height:64px;  width:64px"></span>&emsp;Dijagonale monitora</h1>
@endsection

@section('sadrzaj')
	@if($dijagonale->isEmpty())
    		<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
    	@else
    		<table class="table table-striped tabelaSpratovi" name="tabelaSpratovi" id="tabelaSpratovi">
        		<thead>
            		<th style="width: 15%;">#</th>
            		<th style="width: 70%;">Naziv</th>
            		<th style="width: 15%;text-align:center"><i class="fa fa-cogs"></i></th>
        		</thead>
        		<tbody id="spratovi_lista" name="spratovi_lista">
            	@foreach ($dijagonale as $dijagonala)
                    <tr>
                        <td>{{$dijagonala->id}}</td>
                        <td><strong>{{ $dijagonala->inc() }}</strong></td>
                        <td style="text-align:right;">
                            <button class="btn btn-success btn-sm otvori_izmenu" id="dugmeIzmena" data-toggle="modal" data-target="#editModal" value="{{$dijagonala->id}}"><i class="fa fa-pencil"></i></button>
                            <button id="dugmeBrisanje" class="btn btn-danger btn-sm otvori_modal"  value="{{$dijagonala->id}}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
            	@endforeach
        		</tbody>
    		</table>
    	@endif

    {{-- Modal za dijalog brisanje--}}
    <div class="modal fade" id="brisanjeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upozorenje!</h4>
                </div>
                <div class="modal-body">
                    <h4 class="text-primary">Da li želite trajno da obrišete stavku</h4>
                    <p>Ova akcija je nepovratna!</p>
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
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-primary">Izmeni stavku</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('dijagonale.izmena') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nazivModal">Naziv:</label>
                            <input  type="number" class="form-control" id="nazivModal" name="nazivModal"
                                    min="10"  step="0.5" required>
                        </div>
                        <input type="hidden" id="edit_id" name="edit_id">
                        <button type="submit" class="btn btn-success">Izmeni</button>
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
    <h4>Dodavanje dijagonale monitora</h4>
    <hr>
    <div class="well">
        <form action="{{ route('dijagonale.dodavanje') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
                <label for="naziv">Dijagonala u inčima: </label>
                <input  type="number" name="naziv" id="naziv" class="form-control" value="{{ old('naziv') }}"
                        min="10"  step="0.5" required>
                @if ($errors->has('naziv'))
                    <span class="help-block">
                        <strong>{{ $errors->first('naziv') }}</strong>
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
                <a class="btn btn-danger btn-block ono" href="{{route('spratovi')}}"><i class="fa fa-ban"></i> Otkaži</a>
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

    $('#tabelaSpratovi').DataTable({
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
        var ruta = "{{ route('dijagonale.brisanje') }}";
        $('#brisanjeModal').modal('show');
        $('#btn-obrisi').click(function() {
            $.ajax({
                url: ruta,
                type:"POST",
                data: {"id":id, _token: "{!! csrf_token() !!}"},
                success: function() {
                    location.reload();
                }
            });
            $('#brisanjeModal').modal('hide');
        });
        $('#btn-otkazi').click(function() {
            $('#brisanjeModal').modal('hide');
        });
    });

   $(document).on('click','.otvori_izmenu',function(){
        var id_izmena = $(this).val();
        var detalj_ruta = "{{ route('dijagonale.detalj') }}";
        $.ajax({
            url: detalj_ruta,
            type:"POST",
            data: {"id":id_izmena, _token: "{!! csrf_token() !!}"},
            success: function(result) {
                $("#edit_id").val(result.id);
                $("#nazivModal").val(result.naziv);
            }
        });
    });
});
</script>
<script src="{{ asset('/js/parsley.js') }}"></script>
<script src="{{ asset('/js/parsley_sr.js') }}"></script>
@endsection