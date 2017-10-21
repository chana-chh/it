@extends('sabloni.app')

@section('naziv', 'Šifarnici | Tipovi memorije')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Tip memorije"
         src="{{ url('/images/memorija.png') }}" style="height:64px;">
    &emsp;Tipovi memorije (ram, mbd, vga)
</h1>
@endsection

@section('sadrzaj')
@if($data->isEmpty())
    <h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table class="table table-striped" id="tabela">
    <thead>
    <th style="width: 15%;">#</th>
    <th style="width: 70%;">Naziv</th>
    <th style="width: 15%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
</thead>
<tbody>
    @foreach ($data as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td><strong>{{ $d->naziv }}</strong></td>
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
<div id="editModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class = "close" data-dismiss = "modal">&times;</button>
                <h1 class="modal-title text-info">Izmeni stavku</h1>
            </div>
            <div class="modal-body">
                <form action="{{ route('tipovi_memorije.izmena') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nazivModal">Naziv:</label>
                        <input type="text" id="nazivModal" name="nazivModal" class="form-control" required>
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
<h4>Dodavanje novog tipa memorije</h4>
<hr>
<div class="well">
    <form action="{{ route('tipovi_memorije.dodavanje') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
            <label for="naziv">Tip memorije:</label>
            <input  type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv') }}" required>
            @if ($errors->has('naziv'))
            <span class="help-block">
                <strong>{{ $errors->first('naziv') }}</strong>
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
                        <a class="btn btn-danger btn-block ono" href="{{route('tipovi_memorije')}}">
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
            var ruta = "{{ route('tipovi_memorije.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });

        $(document).on('click', '.otvori-izmenu', function () {
            var id = $(this).val(                            );
            var ruta = "{{ route('tipovi_memorije.detalj') }}";
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
                }
            });
        });
    });
</script>
@endsection






















































































