@extends('sabloni.app')

@section('naziv', 'Šifarnici | Mobilni Telefoni')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Mobilni Telefoni" src="{{ url('/images/mobilni.png') }}" style="height:64px;  width:64px">
     &emsp;Mobilni telefoni
</h1>
@endsection

@section('sadrzaj')
@if($data->isEmpty())
<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table class="table table-striped" id="tabela">
    <thead>
    <th style="width: 15%;">Broj</th>
    <th style="width: 9%;">Službeni</th>
    <th style="width: 41%;">Zaposleni</th>
    <th style="width: 25%;">Napomena</th>
    <th style="width: 10%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
</thead>
<tbody>
    @foreach ($data as $d)
    <tr>
        <td><strong>{{ $d->broj }}</strong></td>
        <td><strong title="U pitanju je službeni telefon">{{ $d->sluzbeni == 1 ? "s" : " "}}</strong></td>
        <td><a  href="{{ route('zaposleni.detalj', $d->zaposleni->id) }}"><strong>{{ $d->zaposleni->imePrezime() }}</strong></a> - <small> {{ $d->zaposleni->uprava ? $d->zaposleni->uprava->naziv : 'neraspoređen' }}</small></td>
        <td><em>{{ str_limit($d->napomena, 60) }}</em></td>
        <td style="text-align:right;">
            <button class="btn btn-success btn-sm otvori-izmenu"
                    data-toggle="modal" data-target="#editModal"
                    value="{{ $d->id }}">
                <i class="fa fa-pencil"></i>
            </button>
            <button class="btn btn-danger btn-sm" id="idBrisanjeModal"
            title="Brisanje broja mobilnog telefona"
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
                <h2 class="modal-title">Izmeni stavku</h2>
            </div>
            <div class="modal-body">
                <form action="{{ route('mobilni.izmena') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="brojModal">Broj:</label>
                        <input type="text" id="brojModal" name="brojModal" class="form-control" required>
                    </div>

                    <div class="form-group checkboxoviforme">
                                <label><input type="checkbox" name="mobilni_izmena_sluzbeni" id="mobilni_izmena_sluzbeni"> &emsp;Da li je mobilni telefon službeni?</label>
                    </div>

                    <div class="form-group">
                        <label for="zaposleni_idModal">Zaposleni:</label>
                        <select class="form-control" name="zaposleni_idModal" id="zaposleni_idModal" data-placeholder="kancelarija ...">
                        </select>
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
<!--  KRAJ izmenaModal  -->
@endsection

@section('traka')
<h4>Dodavanje broja mobilne telefonije</h4>
<hr>
<div class="well">
    <form action="{{ route('mobilni.dodavanje') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('broj') ? ' has-error' : '' }}">
            <label for="broj">Broj: </label>
            <input  type="text" name="broj" id="broj" class="form-control" value="{{ old('broj') }}" required>
            @if ($errors->has('broj'))
            <span class="help-block">
                <strong>{{ $errors->first('broj') }}</strong>
            </span>
            @endif
        </div>

       <div class="form-group checkboxoviforme">
                <label><input type="checkbox" name="mobilni_dodavanje_sluzbeni" id="mobilni_dodavanje_sluzbeni"> &emsp;Da li je mobilni telefon službeni?</label>
        </div>

        <div class="form-group{{ $errors->has('zaposleni_id') ? ' has-error' : '' }}">
                    <label for="zaposleni_id">Zaposleni:</label>
                    <select name="zaposleni_id" id="zaposleni_id" class="chosen-select form-control" data-placeholder="zaposleni ..." required>
                        <option value=""></option>
                        @foreach($radnici as $radnik)
                        <option value="{{ $radnik->id }}"{{ old('zaposleni_id') == $radnik->id ? ' selected' : '' }}>
                            {{ $radnik->Imeprezime() }}, {{ $radnik->uprava ? $radnik->uprava->naziv : 'neraspoređen' }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('zaposleni_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('zaposleni_id') }}</strong>
                        </span>
                    @endif
        </div>

        <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                    <label for="napomena">Napomena:</label>
                    <textarea name="napomena" id="napomena" class="form-control">{{ old('napomena') }}</textarea>
                    @if ($errors->has('napomena'))
                        <span class="help-block">
                            <strong>{{ $errors->first('napomena') }}</strong>
                        </span>
                    @endif
                </div>

            <div class="row dugmici">
            <div class="col-md-12" style="margin-top: 20px;">
            <div class="form-group">
            <div class="col-md-6 snimi">
                <button type="submit" class="btn btn-success btn-block ono"><i class="fa fa-plus-circle"></i>&emsp;Dodaj</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger btn-block ono" href="{{route('mobilni')}}"><i class="fa fa-ban"></i>&emsp;Otkaži</a>
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
            order: [[ 2, 'asc' ]],
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

        resizeChosen();
    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({allow_single_deselect: true});

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };

        $(document).on('click', '#idBrisanjeModal', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('mobilni.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
        });

        $(document).on('click', '.otvori-izmenu', function () {
            var id = $(this).val();
            var ruta = "{{ route('mobilni.detalj') }}";
            $.ajax({
                url: ruta,
                type: "POST",
                data: {
                    "id": id,
                    "_token": "{!! csrf_token() !!}"
                },
                success: function (data) {
                    $("#idModal").val(data.mobilni.id);
                    $("#brojModal").val(data.mobilni.broj);
                    $("#mobilni_izmena_sluzbeni").prop('checked', data.mobilni.sluzbeni);
                    $("#napomenaModal").val(data.mobilni.napomena);

                     $.each(data.zaposleni, function(index, lokObjekat){
                    $('#zaposleni_idModal').append('<option value="'+lokObjekat.id+'">'+lokObjekat.ime+'  '+lokObjekat.prezime+'</option>');
                    });
                    $("#zaposleni_idModal").val(data.mobilni.zaposleni_id);
                }
            });
        });
    });
</script>
@endsection















































































