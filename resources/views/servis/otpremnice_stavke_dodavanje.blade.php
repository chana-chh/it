@extends('sabloni.app')

@section('naziv', 'Otpremnice | Dodavanje stavke')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Ugovori"
                 src="{{ url('/images/otpremnice.png') }}" style="height:64px;">
            &emsp;Dodavanje stavke otpremnice: <em>{{ $otpremnica->broj }}</em>
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
            <a class="btn btn-primary" href="{{ route('otpremnice.stavke', $otpremnica->id) }}"
               title="Povratak na listu stavki otpremnice">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form id="forma" action="{{ route('otpremnice.stavke.dodavanje.post') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <input type="hidden" id="otpremnica_id" name="otpremnica_id" value="{{ $otpremnica->id }}">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
                        <label for="naziv">Naziv stavke:</label>
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
                </div>

                <div class="col-md-4">
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
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('kolicina') ? ' has-error' : '' }}">
                        <label for="kolicina">Količina:</label>
                        <input type="number" id="kolicina" name="kolicina"
                               class="form-control"
                               value="{{ old('kolicina', 0) }}"
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
                                  class="form-control">{{ old('napomena') }}</textarea>
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
                                <i class="fa fa-plus-circle"></i> Dodaj
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-danger btn-block ono" href="{{ route('otpremnice.stavke', $otpremnica->id) }}">
                                <i class="fa fa-ban"></i> Otkaži
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('skripte')
<script>
    $(document).ready(function () {
        jQuery(window).on('resize', resizeChosen);

        $('.chosen-select').chosen({
            allow_single_deselect: true
        });

        function resizeChosen() {
            $(".chosen-container").each(function () {
                $(this).attr('style', 'width: 100%');
            });
        }
    });
</script>
@endsection
