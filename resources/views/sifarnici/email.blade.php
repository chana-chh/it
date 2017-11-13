@extends('sabloni.app')

@section('naziv', 'Šifarnici | Elektronske adrese')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="email" src="{{ url('/images/email.png') }}" style="height:64px;  width:64px">
     &emsp;Adrese elektronske pošte
</h1>
@endsection

@section('sadrzaj')
@if($data->isEmpty())
<h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
@else
<table class="table table-striped" id="tabela">
    <thead>
    <th style="width: 5%;">#</th>
    <th style="width: 20%;">Adresa</th>
    <th style="width: 10%;">Službeni</th>
    <th style="width: 25%;">Zaposleni</th>
    <th style="width: 25%;">Napomena</th>
    <th style="width: 15%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
</thead>
<tbody>

    @foreach ($data as $d)
    <tr>
        <td>{{ $d->id }}</td>
        <td>
            <a href="mailto:{{ $d->adresa }}"><strong class="text-info lozinka" data-toggle="lozinka" title="Lozinka:" data-content="{{ $d->lozinka }}">{{ $d->adresa }}</strong></a>
        </td>
        <td>
            <span title="U pitanju je služben elektronska adresa" style="color: #18bc9c;">
                {!! $d->sluzbena == 1 ? "<i class=\"fa fa-check-square-o\"></i>" : " "!!}
            </span>
        </td>
        <td>
            <a href="{{ route('zaposleni.detalj', $d->zaposleni->id) }}">
                <strong>{{ $d->zaposleni->imePrezime() }}</strong>
            </a>
        </td>
        <td><em>{{ str_limit($d->napomena, 60) }}</em></td>
        <td style="text-align:right;">
            <button class="btn btn-success btn-sm otvori-izmenu"
                    data-toggle="modal" data-target="#editModal"
                    value="{{ $d->id }}">
                <i class="fa fa-pencil"></i>
            </button>
            <button class="btn btn-danger btn-sm otvori-brisanje"
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
                <form action="{{ route('email.izmena') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="adresaModal">Adresa:</label>
                        <input type="text" id="adresaModal" name="adresaModal" class="form-control" required>
                    </div>
                    <div class="form-group checkboxoviforme">
                        <label>
                            <input type="checkbox" id="sluzbenaModal" name="sluzbenaModal">
                            &emsp;Da li je elektronska adresa službena?
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="zaposleniIdModal">Zaposleni:</label>
                        <select class="form-control"
                                id="zaposleniIdModal"
                                name="zaposleniIdModal"
                                data-placeholder="zaposleni ...">
                        </select>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fa fa-ban"></i> Otkaži
                </button>
            </div>
        </div>
    </div>
</div>
<!--  KRAJ izmenaModal  -->
@endsection

@section('traka')
<h4>Dodavanje elektronske adrese zaposlenog</h4>
<hr>
<div class="well">
    <form action="{{ route('email.dodavanje') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('adresa') ? ' has-error' : '' }}">
            <label for="adresa">Adresa: </label>
            <input  type="email" id="adresa" name="adresa" class="form-control" value="{{ old('adresa') }}" required>
            @if ($errors->has('adresa'))
            <span class="help-block">
                <strong>{{ $errors->first('adresa') }}</strong>
            </span>
            @endif
        </div>
               <div class="form-group{{ $errors->has('lozinka') ? ' has-error' : '' }}">
            <label for="lozinka">Lozinka: </label>
            <input  type="text" id="lozinka" name="lozinka" class="form-control" value="{{ old('lozinka') }}" required>
            @if ($errors->has('lozinka'))
            <span class="help-block">
                <strong>{{ $errors->first('lozinka') }}</strong>
            </span>
            @endif
        </div>
       <div class="form-group checkboxoviforme">
            <label>
                <input type="checkbox" name="sluzbena" id="sluzbena">
                &emsp;Da li je adresa elektronske pošte službena?
            </label>
        </div>
        <div class="form-group{{ $errors->has('zaposleni_id') ? ' has-error' : '' }}">
            <label for="zaposleni_id">Zaposleni:</label>
            <select id="zaposleni_id" name="zaposleni_id"
                    class="chosen-select form-control"
                    data-placeholder="zaposleni ..." required>
                <option value=""></option>
                @foreach($radnici as $radnik)
                <option value="{{ $radnik->id }}"{{ old('zaposleni_id') == $radnik->id ? ' selected' : '' }}>
                    {{ $radnik->Imeprezime() }}
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
                        <button type="submit" class="btn btn-success btn-block ono">
                            <i class="fa fa-plus-circle"></i>&emsp;Dodaj
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block ono" href="{{route('email')}}">
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
        
        $('.lozinka').popover({
            placement : 'right',
            trigger : 'hover',
            delay: { 
                show: "2000"
            }
        });

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
            var ruta = "{{ route('email.brisanje') }}";
            $('#brisanjeModal').modal('show');
            $('#btn-brisanje-obrisi').click(function () {
                $.ajax({
                    url: ruta,
                    type: "POST",
                    data: {
                        "id": id,
                        "_token": "{!! csrf_token() !!}"
                    },
                    success: function () {
                        location.reload();
                    }
                });
                $('#brisanjeModal').modal('hide');
            });
            $('#btn-brisanje-otkazi').click(function () {
                $('#brisanjeModal').modal('hide');
            });
        });

        $(document).on('click', '.otvori-izmenu', function () {
            var id = $(this).val();
            var ruta = "{{ route('email.detalj') }}";
            $.ajax({
                url: ruta,
                type: "POST",
                data: {
                    "id": id,
                    "_token": "{!! csrf_token() !!}"
                },
                success: function (data) {
                    $("#idModal").val(data.email.id);
                    $("#adresaModal").val(data.email.adresa);
                    $("#sluzbenaModal").prop('checked', data.email.sluzbena);
                    $("#napomenaModal").val(data.email.napomena);

                    $.each(data.zaposleni, function(index, lokObjekat){
                        $('#zaposleniIdModal').append('<option value="'
                                + lokObjekat.id + '">'
                                + lokObjekat.ime + '  '
                                + lokObjekat.prezime + '</option>');
                    });
                    $("#zaposleniIdModal").val(data.email.zaposleni_id);
                }
            });
        });
    });
</script>
@endsection




























































































