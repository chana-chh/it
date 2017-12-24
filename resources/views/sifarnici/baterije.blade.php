@extends('sabloni.app')

@section('naziv', 'Šifarnici | Baterije')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Baterije"
         src="{{ url('/images/baterija.png') }}" style="height:64px;">
    &emsp;Baterije
</h1>
@endsection

@section('sadrzaj')
@if($data->isEmpty())
<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table class="table table-striped" id="tabela">
    <thead>
    <th style="width: 10%;">#</th>
    <th style="width: 20%;">Naziv grupe</th>
    <th style="width: 20%;">Kompatibilni modeli</th>
    <th style="width: 10%;">Kapacitet</th>
    <th style="width: 10%;">Napon</th>
    <th style="width: 10%;">Dimenzije</th>
    <th style="width: 10%;">Broj</th>
    <th style="width: 10%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
</thead>
<tbody>
    @foreach ($data as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td><strong>{{ $d->naziv }}</strong></td>
        <td><strong>{{ $d->modeli_baterija }}</strong></td>
        <td>{{ $d->kapacitet }} Ah</td>
        <td>{{ $d->napon }} V</td>
        <td>{{ $d->dimenzije }}</td>
        <td> <strong class="text-success">{{ $d->broj() }}</strong></td>
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

<!--  POCETAK izmenaModal  -->
<div id="editModal" class="modal fade" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-primary">Izmeni stavku</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('baterije.izmena') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nazivModal">Naziv grupe:</label>
                        <input type="text" id="nazivModal" name="nazivModal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="modeliModal">Kompatibilni modeli:</label>
                        <textarea class="form-control" id="modeliModal" name="modeliModal"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kapacitetModal">Kapacitet (Ah):</label>
                        <input type="text" id="kapacitetModal" name="kapacitetModal" class="form-control" maxlength="30" required>
                    </div>
                    <div class="form-group">
                        <label for="naponModal">Napon (V):</label>
                        <input type="text" id="naponModal" name="naponModal" class="form-control" maxlength="30" required>
                    </div>
                    <div class="form-group">
                        <label for="dimenzijeModal">Dimenzije (ŠxVxD mm):</label>
                        <input type="text" id="dimenzijeModal" name="dimenzijeModal" class="form-control" maxlength="30" required>
                    </div>
                    <input type="hidden" id="idModal" name="idModal">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Snimi izmene
                    </button>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-ban fa-fw"></i> Otkaži
                </button>
            </div>
        </div>
    </div>
</div>
<!--  KRAJ izmenaModal  -->
@endsection

@section('traka')
<h4>Dodavanje baterije</h4>
<hr>
<div class="well">
    <form action="{{ route('baterije.dodavanje') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
            <label for="naziv">Naziv grupe:</label>
            <input  type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv') }}" maxlength="50" required>
            @if ($errors->has('naziv'))
            <span class="help-block">
                <strong>{{ $errors->first('naziv') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('modeli_baterija') ? ' has-error' : '' }}">
            <label for="modeli_baterija">Kompatibilni modeli:</label>
            <textarea name="modeli_baterija" id="modeli_baterija" maxlength="255" class="form-control">{{ old('modeli_baterija') }}</textarea>
            @if ($errors->has('modeli_baterija'))
            <span class="help-block">
                <strong>{{ $errors->first('modeli_baterija') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('kapacitet') ? ' has-error' : '' }}">
            <label for="kapacitet">Kapacitet (Ah):</label>
            <input  type="text" name="kapacitet" id="kapacitet" class="form-control" value="{{ old('kapacitet') }}" maxlength="30" required>
            @if ($errors->has('kapacitet'))
            <span class="help-block">
                <strong>{{ $errors->first('kapacitet') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('napon') ? ' has-error' : '' }}">
            <label for="napon">Napon (V):</label>
            <input  type="text" name="napon" id="napon" class="form-control" value="{{ old('napon') }}" maxlength="30" required>
            @if ($errors->has('napon'))
            <span class="help-block">
                <strong>{{ $errors->first('napon') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('dimenzije') ? ' has-error' : '' }}">
            <label for="dimenzije">Dimenzije (ŠxVxD mm):</label>
            <input  type="text" name="dimenzije" id="dimenzije" class="form-control" value="{{ old('dimenzije') }}" maxlength="30" required>
            @if ($errors->has('dimenzije'))
            <span class="help-block">
                <strong>{{ $errors->first('dimenzije') }}</strong>
            </span>
            @endif
        </div>
        <div class="row dugmici">
            <div class="col-md-12" style="margin-top: 20px;">
                <div class="form-group">
                    <div class="col-md-6 snimi">
                        <button type="submit" class="btn btn-success btn-block ono">
                            <i class="fa fa-plus-circle"></i>&emsp;Dodaj
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block ono" href="{{route('baterije')}}">
                            <i class="fa fa-ban"></i>&emsp;Otkaži
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
            var ruta = "{{ route('baterije.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });

        $(document).on('click', '.otvori-izmenu', function () {
            var id = $(this).val(                            );
            var ruta = "{{ route('baterije.detalj') }}";
            $.ajax({
                url: ruta,
                type: "POST",
                data: {
                    "id": id,
                    "_token": "{!! csrf_token() !!}"
                },
                success: function (data) {
                    $("#idModal").val(data.id);
                    $("#nazivModal").val(data.naziv);
                    $("#modeliModal").val(data.modeli_baterija);
                    $("#kapacitetModal").val(data.kapacitet);
                    $("#naponModal").val(data.napon);
                    $("#dimenzijeModal").val(data.dimenzije);
                }
            });
        });
    });
</script>
@endsection




























































































