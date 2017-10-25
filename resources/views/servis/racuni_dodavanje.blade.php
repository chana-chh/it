@extends('sabloni.app')

@section('naziv', 'Sifarnici | Račun dodavanje')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row ceo_dva">
    <div class="col-md-10 col-md-offset-1 boxic">
        <h1 class="page-header">
            <img class="slicica_animirana" alt="Ugovori" src="{{url('/images/ugovor.png')}}" style="height:64px;">
            &emsp;Dodavanje računa
        </h1>
        <form action="{{ route('racuni.dodavanje.post') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('ugovor_id') ? ' has-error' : '' }}">
                        <label for="ugovor_id">Ugovor:</label>
                        <select id="ugovor_id" name="ugovor_id"
                                class="chosen-select form-control"
                                data-placeholder="ugovor ..." required>
                            <option value=""></option>
                            @foreach($ugovori as $ugovor)
                            <option value="{{ $ugovor->id }}"
                                    {{ old('ugovor_id') == $ugovor->id ? ' selected' : '' }}>
                                    {{ $ugovor->broj }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('ugovor_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ugovor_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('broj') ? ' has-error' : '' }}">
                    <label for="broj">Broj računa:</label>
                    <input type="text" id="broj" name="broj"
                           class="form-control"
                           value="{{ old('broj') }}"
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
                    <input type="date" id="datum" name="datum"
                           class="form-control"
                           value="{{ old('datum') }}"
                           required>
                    @if ($errors->has('datum'))
                    <span class="help-block">
                        <strong>{{ $errors->first('datum') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('iznos') ? ' has-error' : '' }}">
                    <label for="iznos">Iznos:</label>
                    <input type="number" id="iznos" name="iznos"
                           class="form-control"
                           value="{{ old('iznos', 0) }}"
                           min="0" step="0.01" required>
                    @if ($errors->has('iznos'))
                    <span class="help-block">
                        <strong>{{ $errors->first('iznos') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('pdv') ? ' has-error' : '' }}">
                    <label for="pdv">PDV:</label>
                    <input type="number" id="pdv" name="pdv"
                           class="form-control"
                           value="{{ old('pdv', 0) }}"
                           min="0" step="0.01" required>
                    @if ($errors->has('pdv'))
                    <span class="help-block">
                        <strong>{{ $errors->first('pdv') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('ukupno') ? ' has-error' : '' }}">
                    <label for="ukupno">Ukupno:</label>
                    <input type="number" id="ukupno" name="ukupno"
                           class="form-control"
                           value="{{ old('ukupno', 0) }}"
                           min="0" step="0.01" required>
                    @if ($errors->has('ukupno'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ukupno') }}</strong>
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
                <div class="form-group text-right">
                    <div class="col-md-6 snimi">
                        <button type="submit" class="btn btn-success btn-block ono">
                            <i class="fa fa-plus-circle"></i> Dodaj
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block ono" href="{{route('racuni')}}">
                            <i class="fa fa-ban"></i> Otkaži
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="row dugmici">
    <div class="col-md-10 col-md-offset-1" style="margin-top: 20px">
        <div class="form-group">
            <div class="col-md-6 text-left">
                <a class="btn btn-info" href="{{route('ugovori')}}"
                   title="Povratak na listu ugovora">
                    <i class="fa fa-list" style="color:#2C3E50"></i>
                </a>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-info" href="{{route('pocetna')}}"
                   title="Povratak na početnu stranu">
                    <i class="fa fa-home" style="color:#2C3E50"></i>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
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
    ;
</script>
@endsection
