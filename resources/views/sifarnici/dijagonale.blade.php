@extends('sabloni.app')

@section('naziv', 'Šifarnici | Dijagonale')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Dijagonale monitora"
         src="{{ url('/images/monitor_size.png') }}" style="height:64px;">
    &emsp;Dijagonale monitora
</h1>
@endsection

@section('sadrzaj')
@if($data->isEmpty())
<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table id="tabela" class="table table-striped">
    <thead>
    <th style="width: 15%;">#</th>
    <th style="width: 70%;">Naziv</th>
    <th style="width: 15%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
</thead>
<tbody>
    @foreach ($data as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td><strong>{{ $d->inc() }}</strong></td>
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
<div id="editModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title text-primary">Izmeni stavku</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('dijagonale.izmena') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nazivModal">Naziv:</label>
                        <input  type="number" class="form-control" id="nazivModal" name="nazivModal"
                                min="10"  step="0.5" required>
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
                        <button type="submit" class="btn btn-success btn-block ono">
                            <i class="fa fa-plus-circle"></i> Dodaj
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block ono" href="{{route('dijagonale')}}">
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
    $(document).ready(function () {

        $('#tabela').DataTable({
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

        $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('dijagonale.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });

        $(document).on('click', '.otvori-izmenu', function () {
            var id = $(this).val();
            var ruta = "{{ route('dijagonale.detalj') }}";
            $.ajax({
                url: ruta,
                type: "POST",
                data: {
                    "id": id,
                    _token: "{!! csrf_token() !!}"
                },
                success: function (data) {
                    $("#idModal").val(data.id);
                    $("#nazivModal").val(data.naziv);
                }
            });
        });
    });
</script>
@endsection

