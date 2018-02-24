@extends('sabloni.app')

@section('naziv', 'Nabavke')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Nabavke"
                 src="{{ url('/images/nabavke.png') }}" style="height:64px;">
            &emsp;Nabavke opreme
        </h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <button id="pretragaDugme" class="btn btn-success btn-block ono">
            <i class="fa fa-search fa-fw"></i> Napredna pretraga
        </button>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary btn-block ono" href="{{ route('nabavke.dodavanje.get') }}">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj nabavku
        </a>
    </div>
</div>
<hr>
<div id="pretraga" class="well" style="display: none;">
    <form id="pretraga" action="{{ route('nabavke.pretraga') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dobavljac_id">Dobavljač:</label>
                    <select id="dobavljac_id" name="dobavljac_id"
                            class="chosen-select form-control"
                            data-placeholder="Dobavljač ...">
                        <option value=""></option>
                        @foreach($dobavljaci as $dobavljac)
                        <option value="{{ $dobavljac->id }}">
                            {{ $dobavljac->naziv }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <label for="operator_garancija">Garancija je:</label>
                <select name="operator_garancija" id="operator_garancija" class="chosen-select form-control"
                        data-placeholder="Odaberite kriterijum ...">
                    <option value=""></option>
                    <option value=">=">veća ili jednaka</option>
                    <option value="<=">manja ili jednaka</option>
                    <option value="=">jednaka</option>
                    <option value=">">veća</option>
                    <option value="<">manja</option>
                </select>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="garancija">Meseci:</label>
                    <input type="number" id="garancija" name="garancija" class="form-control"
                           value="0" min="0" step="1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3">
                <label for="opis">Datum 1</label>   
                <input type="text" name="datum_1" id="datum_1" class="form-control datepicker" placeholder="dd.mm.yyyy">
            </div>
            <div class="form-group col-md-3">
                <label for="opis">Datum 2</label>
                <input type="text" name="datum_2" id="datum_2" class="form-control datepicker" placeholder="dd.mm.yyyy" readonly>
            </div>
            <div class="col-md-6">
                <label class="text-warning">Napomena</label>
                <p class="text-warning">
                    Ako se unese samo prvi datum pretraga će se vršiti za predmete sa tim datumom. Ako se unesu oba datuma pretraga će se vršiti za predmete između ta dva datuma.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
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
        @if($nabavke->isEmpty())
        <h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
        @else
        <table class="table table-striped display" cellspacing="0" width="100%" id="tabela">
            <thead>
            <th style="width: 5%;">#</th>
            <th style="width: 20%;">Dobavljač</th>
            <th style="width: 10%;">Datum</th>
            <th style="width: 10%; text-align: right;">Garancija (mes)</th>
            <th style="width: 45%;">Napomena</th>
            <th style="width: 10%; text-align:right;">
                <i class="fa fa-cogs"></i>&emsp;Akcije
            </th>
            </thead>
            <tbody>
                @foreach ($nabavke as $nabavka)
                <tr>
                    <td>{{ $nabavka->id }}</td>
                    <td><strong>{{ $nabavka->dobavljac->naziv }}</strong></td>
                    <td>{{$nabavka->formatiran_datum }}</td>
                    <td class="text-right">{{ $nabavka->garancija }}</td>
                    <td>{{ $nabavka->napomena }}</td>
                    <td class="text-right">
                        <a class="btn btn-success btn-sm"
                           href="{{ route('nabavke.detalj', $nabavka->id) }}">
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
<script src="{{ asset('/js/moment.min.js') }}"></script>
<script src="{{ asset('/js/datetime-moment.js') }}"></script>
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $.fn.dataTable.moment('DD.MM.YYYY');

        $('.datepicker').datepicker({
            format: 'dd.mm.yyyy',
            autoclose: true,
        });
        
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

        jQuery(window).on('resize', resizeChosen);

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
