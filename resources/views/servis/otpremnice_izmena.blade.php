@extends('sabloni.app')

@section('naziv', 'Sifarnici | Račun izmena')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Ugovori"
                 src="{{ url('/images/otpremnice.png') }}" style="height:64px;">
            &emsp;Izmena otpremnice: <em>{{ $data->broj }}</em>
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
            <a class="btn btn-primary" href="{{ route('otpremnice') }}"
               title="Povratak na listu otpremnica">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form action="{{ route('otpremnice.izmena.post', $data->id) }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('broj') ? ' has-error' : '' }}">
                        <label for="broj">Broj otpremnice:</label>
                        <input type="text" id="broj" name="broj"
                               class="form-control"
                               value="{{ old('broj', $data->broj) }}"
                               maxlength="50" required>
                        @if ($errors->has('broj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('broj') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('datum') ? ' has-error' : '' }}">
                        <label for="datum">Datum:</label>
                        <input type="text" name="datum" id="datum" class="form-control datepicker" placeholder="dd.mm.yyyy"
                               value="{{ old('datum', $data->formatiran_datum) }}"
                               required>
                        @if ($errors->has('datum'))
                        <span class="help-block">
                            <strong>{{ $errors->first('datum') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('racun_id') ? ' has-error' : '' }}">
                        <label for="racun_id">Račun:</label>
                        <select id="racun_id" name="racun_id"
                                class="chosen-select form-control"
                                data-placeholder="račun ...">
                            <option value=""></option>
                            @foreach($racuni as $racun)
                            <option value="{{ $racun->id }}"
                                    {{ old('racun_id', $data->racun_id) == $racun->id ? ' selected' : '' }}>
                                    {{ $racun->broj }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('racun_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('racun_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('dobavljac_id') ? ' has-error' : '' }}">
                        <label for="dobavljac_id">Dobavljač:</label>
                        <select id="dobavljac_id" name="dobavljac_id"
                                class="chosen-select form-control"
                                data-placeholder="dobavljač ..." required>
                            <option value=""></option>
                            @foreach($dobavljaci as $dobavljac)
                            <option value="{{ $dobavljac->id }}"
                                    {{ old('dobavljac_id', $data->dobavljac_id) == $dobavljac->id ? ' selected' : '' }}>
                                    {{ $dobavljac->naziv }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('dobavljac_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dobavljac_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('broj_profakture') ? ' has-error' : '' }}">
                        <label for="broj_profakture">Broj profakture:</label>
                        <input type="text" id="broj_profakture" name="broj_profakture"
                               class="form-control"
                               value="{{ old('broj_profakture', $data->broj_profakture) }}"
                               maxlength="100">
                        @if ($errors->has('broj_profakture'))
                        <span class="help-block">
                            <strong>{{ $errors->first('broj_profakture') }}</strong>
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
                                  class="form-control">{{ old('napomena', $data->napomena) }}</textarea>
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
                            <a class="btn btn-danger btn-block ono" href="{{route('otpremnice')}}">
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
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
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

    $('.datepicker').datepicker({
            format: 'dd.mm.yyyy',
            autoclose: true,
            endDate: '+1y'
        });
    ;
</script>
@endsection
