@extends('sabloni.app')

@section('naziv', 'Otpremnice')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Ugovori"
                 src="{{ url('/images/otpremnice.png') }}" style="height:64px;">
            &emsp;Otpremnice
        </h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <button id="pretragaDugme" class="btn btn-success btn-block ono">
            <i class="fa fa-search fa-fw"></i> Napredna pretraga
        </button>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary btn-block ono" href="{{ route('otpremnice.dodavanje.get') }}">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj otpremnicu
        </a>
    </div>
</div>
<hr>
<div id="pretraga" class="well" style="display: none;">
    <form id="pretraga" action="{{ route('otpremnice.pretraga') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="broj">Broj otpremnice:</label>
                    <input type="text" id="broj" name="broj" class="form-control" maxlength="50">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="dobavljac_id">Dobavljač:</label>
                    <select id="dobavljac_id" name="dobavljac_id" class="chosen-select form-control"
                            data-placeholder="dobavljač ...">
                        <option value=""></option>
                        @foreach($dobavljaci as $dobavljac)
                        <option value="{{ $dobavljac->id }}">{{ $dobavljac->naziv }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="racun_id">Račun:</label>
                    <select id="racun_id" name="racun_id" class="chosen-select form-control"
                            data-placeholder="Račun ...">
                        <option value=""></option>
                        @foreach($racuni as $racun)
                        <option value="{{ $racun->id }}">{{ $racun->broj }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="broj_profakture">Broj profakture:</label>
                    <input type="text" id="broj_profakture" name="broj_profakture" class="form-control" maxlength="100">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="opis">Datum 1</label>
                <input type="date" name="datum_1" id="datum_1" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="opis">Datum 2</label>
                <input type="date" name="datum_2" id="datum_2" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label class="text-warning">Napomena</label>
                <p class="text-warning">
                    Ako se unese samo prvi datum pretraga će se vršiti za predmete sa tim datumom. Ako se unesu oba datuma pretraga će se vršiti za predmete između ta dva datuma.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label for="napomena">Napomena</label>
                <textarea
                    name="napomena" id="napomena"
                    class="form-control"></textarea>
            </div>
        </div>
        <div class="row dugmici">
            <div class="col-md-6 col-md-offset-6">
                <div class="form-group text-right ceo_dva">
                    <div class="col-md-6 snimi">
                        <button type="submit" id="dugme_pretrazi" class="btn btn-success btn-block">
                            <i class="fa fa-search"></i>&emsp;Pretraži
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block" href="{{ route('nabavke') }}">
                            <i class="fa fa-ban"></i>&emsp;Otkaži
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-md-12">
        @if($otpremnice->isEmpty())
        <h3 class="text-danger">Trenutno nema otprmnica</h3>
        @else
        <table class="table table-striped display" cellspacing="0" width="100%" id="tabela">
            <thead>
            <th style="width: 5%;">#</th>
            <th style="width: 25%;">Broj otpremnice</th>
            <th style="width: 15%;">Datum</th>
            <th style="width: 15%;">Broj računa</th>
            <th style="width: 15%;">Dobavljač</th>
            <th style="width: 15%;">Broj profakture</th>
            <th style="width: 10%; text-align:right;">
                <i class="fa fa-cogs"></i>&emsp;Akcije
            </th>
            </thead>
            <tbody>
                @foreach ($otpremnice as $otpremnica)
                <tr>
                    <td>{{ $otpremnica->id }}</td>
                    <td>
                        <a href="{{ route('otpremnice.detalj', $otpremnica->id) }}">
                            <strong>{{ $otpremnica->broj }}</strong>
                        </a>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($otpremnica->datum)->format('d.m.Y') }}</td>
                    @if($otpremnica->racun === null)
                    <td></td>
                    @else
                    <td>{{ $otpremnica->racun->broj }}</td>
                    @endif
                    <td>{{ $otpremnica->dobavljac->naziv }}</td>
                    <td>{{ $otpremnica->broj_profakture }}</td>
                    <td class="text-right">
                        <a class="btn btn-success btn-sm"
                           href="{{ route('otpremnice.detalj', $otpremnica->id) }}">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection

@section('skripte')
<script>
    $(document).ready(function () {
        var tabela = $('#tabela').DataTable({
            columnDefs: [
                {
                    orderable: false,
                    searchable: false,
                    "targets": -1
                }
            ],
            responsive: true,
            language: {
                search: "Pronađi u tabeli",
                paginate: {
                    first: "Prva",
                    previous: "Prethodna",
                    next: "Sledeća",
                    last: "Poslednja"
                },
                processing: "Procesiranje u toku...",
                lengthMenu: "Prikaži _MENU_ elemenata",
                zeroRecords: "Nije pronađen nijedan rezultat",
                info: "Prikaz _START_ do _END_ od ukupno _TOTAL_ elemenata",
                infoFiltered: "(filtrirano od ukupno _MAX_ elemenata)"
            }
        });
        new $.fn.dataTable.FixedHeader(tabela);

        $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('otpremnice.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });

        $('.chosen-select').chosen({
            allow_single_deselect: true,
            search_contains: true
        });

        function resizeChosen() {
            $(".chosen-container").each(function () {
                $(this).attr('style', 'width: 100%');
            });
        }

        $('#pretragaDugme').click(function () {
            $('#pretraga').toggle();
            resizeChosen();
        });

        $('#datum_1').on('change', function () {
            if (this.value !== '') {
                $('#datum_2').prop('readonly', false);
            } else {
                $('#datum_2').prop('readonly', true).val('');
            }
        });

    });
</script>
@endsection
