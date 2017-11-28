@extends('sabloni.app')

@section('naziv', 'Nabavka stavka izmena')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Nabavka" src="{{ url('/images/nabavke.png') }}" style="height:64px;">
            &emsp;Izmena stavke nabavke
        </h1>
    </div>
</div>
<hr>
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
            <a class="btn btn-primary" href="{{ route('nabavke.stavke.detalj', $stavka->id) }}"
               title="Povratak na listu stavki">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>


<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form action="{{ route('nabavke.stavke.izmena.post', $stavka->id) }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('vrsta_uredjaja_id') ? ' has-error' : '' }}">
                        <label for="vrsta_uredjaja_id">Vrsta uređaja:</label>
                        <select id="vrsta_uredjaja_id" name="vrsta_uredjaja_id"
                                class="chosen-select form-control"
                                data-placeholder="vrsta uređaja ..." required>
                            <option value=""></option>
                            @foreach($vrste as $vrsta)
                            <option value="{{ $vrsta->id }}"
                                    {{ old('vrsta_uredjaja_id', $stavka->vrsta_uredjaja_id) == $vrsta->id ? ' selected' : '' }}>
                                    {{ $vrsta->naziv }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('vrsta_uredjaja_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vrsta_uredjaja_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
                        <label for="naziv">Naziv:</label>
                        <input type="text" id="naziv" name="naziv"
                               class="form-control"
                               value="{{ old('naziv', $stavka->naziv) }}"
                               maxlength="255" required>
                        @if ($errors->has('naziv'))
                        <span class="help-block">
                            <strong>{{ $errors->first('naziv') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('jedinica_mere') ? ' has-error' : '' }}">
                        <label for="jedinica_mere">Jedinica mere:</label>
                        <select id="jedinica_mere" name="jedinica_mere"
                                class="chosen-select form-control"
                                data-placeholder="jedinica mere ...">
                            <option value=""></option>
                            <option value="komad"{{ old('jedinica_mere', $stavka->jedinica_mere) == 'komad' ? ' selected' : '' }}>komad</option>
                            <option value="sat"{{ old('jedinica_mere', $stavka->jedinica_mere) == 'sat' ? ' selected' : '' }}>sat</option>
                            <option value="metar"{{ old('jedinica_mere', $stavka->jedinica_mere) == 'metar' ? ' selected' : '' }}>metar</option>
                            <option value="kilogram"{{ old('jedinica_mere', $stavka->jedinica_mere) == 'kilogram' ? ' selected' : '' }}>kilogram</option>
                        </select>
                        @if ($errors->has('jedinica_mere'))
                        <span class="help-block">
                            <strong>{{ $errors->first('jedinica_mere') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('kolicina') ? ' has-error' : '' }}">
                        <label for="kolicina">Količina:</label>
                        <input type="number" id="kolicina" name="kolicina"
                               class="form-control"
                               value="{{ old('kolicina', $stavka->kolicina) }}"
                               min="0" step="0.01" required>
                        @if ($errors->has('kolicina'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kolicina') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                        <label for="napomena">Napomena:</label>
                        <textarea id="napomena" name="napomena"
                                  class="form-control">{{ old('napomena', $stavka->napomena) }}</textarea>
                        @if ($errors->has('napomena'))
                        <span class="help-block">
                            <strong>{{ $errors->first('napomena') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row dugmici">
                <div class="col-md-6 col-md-offset-6">
                    <div class="form-group">
                        <div class="col-md-6 snimi">
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-save"></i> Snimi izmene
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-danger btn-block ono" href="{{ route('nabavke.stavke.detalj', $stavka->id) }}">
                                <i class="fa fa-ban"></i> Otkaži
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
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

    function resizeChosen() {
        $(".chosen-container").each(function () {
            $(this).attr('style', 'width: 100%');
        });
    }

    $('#vrsta_uredjaja_id').prop('disabled', true).trigger("chosen:updated");
</script>
@endsection
