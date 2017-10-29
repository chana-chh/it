@extends('sabloni.app')

@section('naziv', 'Sifarnici | Ugovori dodavanje')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Ugovori"
                 src="{{ url('/images/ugovor.png') }}" style="height:64px;">
            &emsp;Dodavanje ugovora o održavanju
        </h1>
    </div>
</div>
<hr>

<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form action="{{ route('ugovori.dodavanje.post') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('broj') ? ' has-error' : '' }}">
                        <label for="broj">Broj ugovora:</label>
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
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('iznos_sredstava') ? ' has-error' : '' }}">
                        <label for="iznos_sredstava">Iznos sredstava:</label>
                        <input type="number" id="iznos_sredstava" name="iznos_sredstava"
                               class="form-control"
                               value="{{ old('iznos_sredstava', 0) }}"
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
                               value="{{ old('datum_zakljucivanja') }}"
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
                               value="{{ old('datum_raskida') }}"
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
                            <a class="btn btn-danger btn-block ono" href="{{route('ugovori')}}">
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


