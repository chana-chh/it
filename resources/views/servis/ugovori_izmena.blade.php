@extends('sabloni.app')

@section('naziv', 'Ugovor o održavanju | Izmena')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Ugovori"
                 src="{{ url('/images/ugovor.png') }}" style="height:64px;">
            &emsp;Izmena ugovora o održavanju: <em>{{ $data->broj }}</em>
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
            <a class="btn btn-primary" href="{{ route('ugovori') }}"
               title="Povratak na listu ugovora">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form action="{{ route('ugovori.izmena.post', $data->id) }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('predmet_ugovora') ? ' has-error' : '' }}">
                        <label for="predmet_ugovora">Predmet ugovora:</label>
                        <input type="text" id="predmet_ugovora" name="predmet_ugovora"
                               class="form-control"
                               value="{{ old('predmet_ugovora', $data->predmet_ugovora) }}"
                               maxlength="70">
                        @if ($errors->has('predmet_ugovora'))
                        <span class="help-block">
                            <strong>{{ $errors->first('predmet_ugovora') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('broj') ? ' has-error' : '' }}">
                        <label for="broj">Broj ugovora:</label>
                        <input type="text" id="broj" name="broj"
                               class="form-control"
                               value="{{ old('broj', $data->broj) }}"
                               maxlength="50">
                        @if ($errors->has('broj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('broj') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('iznos_sredstava') ? ' has-error' : '' }}">
                        <label for="iznos_sredstava">Iznos sredstava:</label>
                        <input type="number" id="iznos_sredstava" name="iznos_sredstava"
                               class="form-control"
                               value="{{ old('iznos_sredstava', $data->iznos_sredstava) }}"
                               min="0" step="0.01" required>
                        @if ($errors->has('iznos_sredstava'))
                        <span class="help-block">
                            <strong>{{ $errors->first('iznos_sredstava') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('datum_zakljucivanja') ? ' has-error' : '' }}">
                        <label for="datum_zakljucivanja">Datum zaključenja ugovora:</label>
                        <input type="date" id="datum_zakljucivanja" name="datum_zakljucivanja"
                               class="form-control"
                               value="{{ old('datum_zakljucivanja', $data->datum_zakljucivanja) }}"
                               required>
                        @if ($errors->has('datum_zakljucivanja'))
                        <span class="help-block">
                            <strong>{{ $errors->first('datum_zakljucivanja') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('datum_raskida') ? ' has-error' : '' }}">
                        <label for="datum_raskida">Datum isteka ugovora:</label>
                        <input type="date" id="datum_raskida" name="datum_raskida"
                               class="form-control"
                               value="{{ old('datum_raskida', $data->datum_raskida) }}"
                               required>
                        @if ($errors->has('datum_raskida'))
                        <span class="help-block">
                            <strong>{{ $errors->first('datum_raskida') }}</strong>
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
                    <div class="form-group text-right">
                        <div class="col-md-6 snimi">
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-save"></i> Snimi izmene
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-danger btn-block ono" href="{{route('ugovori')}}">
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




