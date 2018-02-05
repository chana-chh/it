@extends('sabloni.app')

@section('naziv', 'Nabavka')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Nabavka" src="{{ url('/images/nabavke.png') }}" style="height:64px;">
    Nabavka:
    <em class="text-success">
        {{ $nabavka->dobavljac->naziv }} od {{ \Carbon\Carbon::parse($nabavka->datum)->format('d.m.Y') }}
    </em>
</h1>
@endsection

@section('sadrzaj')
<div class="row" style="margin-bottom: 16px;">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" onclick="window.history.back();"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('nabavke') }}"
               title="Povratak na listu nabavki">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('nabavke.izmena.get', $nabavka->id) }}"
               title="Izmena podataka o nabavci">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="brisanjeNabavke" class="btn btn-primary"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$nabavka->id}}"
                    title="Brisanje nabavke">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped" style="table-layout: fixed;">
            <tbody>
                <tr>
                    <th style="width: 20%;">Dobavljač:</th>
                    <td style="width: 80%;">
                        <a href="{{ route('dobavljaci.detalj', $nabavka->dobavljac->id) }}">
                            <strong>{{ $nabavka->dobavljac->naziv }}</strong>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%;">Datum:</th>
                    <td style="width: 80%;">{{ \Carbon\Carbon::parse($nabavka->datum)->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Garancija (meseci):</th>
                    <td style="width: 80%;">{{ $nabavka->garancija }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Napomena:</th>
                    <td style="width: 80%;">{{ $nabavka->napomena }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<hr>
<div class="row well" style="overflow: auto;">
    <h3>Stavke nabavke</h3>
    <hr style="border-top: 1px solid #18BC9C">
    @if($nabavka->stavke->isEmpty())
    <p class="text-danger">Trenutno nema stavki za ovu nabavku</p>
    @else
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th style="width: 10%;">#</th>
                <th style="width: 15%;">Vrsta uređaja</th>
                <th style="width: 30%;">Naziv</th>
                <th style="width: 15%;">Jedinica mere</th>
                <th style="width: 15%; text-align: right;">Količina</th>
                <th style="width: 15%; text-align: right;">Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nabavka->stavke as $stavka)
            <tr>
                <td>{{ $stavka->id }}</td>
                <td>{{ $stavka->vrstaUredjaja->naziv }}</td>
                <td>{{ $stavka->naziv }}</td>
                <td>{{ $stavka->jedinica_mere }}</td>
                <td class="text-right">{{ $stavka->kolicina }}</td>
                <td class="text-right">
                    <a href="{{ route('nabavke.stavke.detalj', $stavka->id) }}" class="btn btn-success btn-xs">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection

@section('traka')
<div class="well">
    <h3>Dodavanje stavke</h3>
    <hr style="border-top: 1px solid #18BC9C">
    <form action="{{ route('nabavke.stavke.dodavanje.post') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}
        <input type="hidden" name="nabavka_id" value="{{ $nabavka->id }}">
        <div class="form-group{{ $errors->has('vrsta_uredjaja_id') ? ' has-error' : '' }}">
            <label for="vrsta_uredjaja_id">Vrsta u                ređaja:</label>
            <select id="vrsta_uredjaja_id" name="vrsta_uredjaja_id"
                    class="chosen-select form-control"
                    data-placeholder="vrsta uređaja ..." required>
                <option value=""></option>
                @foreach($vrste as $vrsta)
                <option value="{{ $vrsta->id }}"
                        {{ old('vrsta_uredjaja_id') == $vrsta->id ? ' selected' : '' }}>
                        {{ $vrsta->naziv }}</option>
                @endforeach
            </select>
            @if ($errors->has('vrsta_uredjaja_id'))
            <span class="help-block">
                <strong>{{ $errors->first('vrsta_uredjaja_id') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
            <label for="naziv">Naziv:</label>
            <input type="text" id="naziv" name="naziv"
                   class="form-control"
                   value="{{ old('naziv') }}"
                   maxlength="255" required>
            @if ($errors->has('naziv'))
            <span class="help-block">
                <strong>{{ $errors->first('naziv') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('jedinica_mere') ? ' has-error' : '' }}">
            <label for="jedinica_mere">Jedinica mere:</label>
            <select id="jedinica_mere" name="jedinica_mere"
                    class="chosen-select form-control"
                    data-placeholder="jedinica mere ...">
                <option value=""></option>
                <option value="komad">komad</option>
                <option value="sat">sat</option>
                <option value="metar">metar</option>
                <option value="kilogram">kilogram</option>
            </select>
            @if ($errors->has('jedinica_mere'))
            <span class="help-block">
                <strong>{{ $errors->first('jedinica_mere') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('kolicina') ? ' has-error' : '' }}">
            <label for="kolicina">Količina:</label>
            <input type="number" id="kolicina" name="kolicina"
                   class="form-control"
                   value="{{ old('kolicina', 0) }}"
                   min="0" required>
            @if ($errors->has('kolicina'))
            <span class="help-block">
                <strong>{{ $errors->first('kolicina') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
            <label for="napomena">Napomena:</label>
            <textarea id="napomena" name="napomena"
                      class="form-control">{{ old('napomena') }}</textarea>
            @if ($errors->has('napomena'))
            <span class="help-block">
                <strong>{{ $errors->first('napomena') }}</strong>
            </span>
            @endif
        </div>
        <div class="row dugmici">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-6 snimi">
                        <button type="submit" class="btn btn-success btn-block ono">
                            <i class="fa fa-plus-circle"></i> Dodaj
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block ono" href="{{ route('nabavke.detalj', $nabavka->id) }}">
                            <i class="fa fa-ban"></i> Otkaži
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!--  POCETAK brisanjeModal -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('skripte')
<script>

    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({
        allow_single_deselect: true
    });

            $("#jedinica_mere").change(function() {
        var vrednost = $(this).val();
        if (vrednost != "komad") {
            $('#kolicina').prop('step', "0.01");
        }else{
            $('#kolicina').prop('step', null);
        }
        });

    function resizeChosen() {
        $(".chosen-container").each(function () {
            $(this).attr('style', 'width: 100%');
        });
    }

    $(document).on('click', '#brisanjeNabavke', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('nabavke.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });

</script>
@endsection
