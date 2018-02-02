@extends('sabloni.app')

@section('naziv', 'Šifarnici | Izmena podataka licence')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Izmena podataka licence"
                src="{{url('/images/licence.png')}}" style="height:64px;">
            &emsp;Izmena podataka licence
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
            <a class="btn btn-primary" href="{{ route('licence') }}"
               title="Povratak na listu licenci">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
        
<div class="row ceo_dva">
    <div class="col-md-12 boxic">

        <form action="{{ route('licence.izmena.post', $model->id) }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}

           <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('tip_licence') ? ' has-error' : '' }}">
                        <label for="tip_licence">Tip licence:</label>
                        <input type="text" name="tip_licence" id="tip_licence" class="form-control"
                               value="{{ old('tip_licence', $model->tip_licence) }}" maxlength="50" required>
                        @if ($errors->has('tip_licence'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tip_licence') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('proizvod') ? ' has-error' : '' }}">
                        <label for="proizvod">Proizvod: </label>
                        <input type="text" name="proizvod" id="proizvod" class="form-control"
                               value="{{ old('proizvod', $model->proizvod) }}" maxlength="50" required>
                        @if ($errors->has('proizvod'))
                        <span class="help-block">
                            <strong>{{ $errors->first('proizvod') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('kljuc') ? ' has-error' : '' }}">
                        <label for="kljuc">Aktivacioni ključ: </label>
                        <input type="text" name="kljuc" id="kljuc" class="form-control"
                               value="{{ old('kljuc', $model->kljuc) }}" maxlength="255">
                        @if ($errors->has('kljuc'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kljuc') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('broj_aktivacija') ? ' has-error' : '' }}">
                        <label for="broj_aktivacija">Broj aktivacija: </label>
                        <input type="number" name="broj_aktivacija" id="broj_aktivacija" class="form-control"
                               value="{{ old('broj_aktivacija', $model->broj_aktivacija) }}">
                        @if ($errors->has('broj_aktivacija'))
                        <span class="help-block">
                            <strong>{{ $errors->first('broj_aktivacija') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

            </div>
            <hr>
            <div class="row">
                                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('datum_pocetka_vazenja') ? ' has-error' : '' }}">
                        <label for="datum_pocetka_vazenja">Datum početka važenja licence:</label>
                        <input type="text" name="datum_pocetka_vazenja" id="datum_pocetka_vazenja" class="form-control datepicker" placeholder="dd.mm.yyyy"
                               value="{{ old('datum_pocetka_vazenja', $model->formatiran_pocetak) }}">
                        @if ($errors->has('datum_pocetka_vazenja'))
                        <span class="help-block">
                            <strong>{{ $errors->first('datum_pocetka_vazenja') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('datum_prestanka_vazenja') ? ' has-error' : '' }}">
                        <label for="datum_prestanka_vazenja">Datum prestanka važenja licence: </label>
                        <input type="text" name="datum_prestanka_vazenja" id="datum_prestanka_vazenja" class="form-control datepicker" placeholder="dd.mm.yyyy"
                               value="{{ old('datum_prestanka_vazenja', $model->formatiran_prestanak) }}">
                        @if ($errors->has('datum_prestanka_vazenja'))
                        <span class="help-block">
                            <strong>{{ $errors->first('datum_prestanka_vazenja') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                        <label for="napomena">Napomena: </label>
                        <textarea name="napomena" id="napomena" maxlength="255" class="form-control">{{ old('napomena', $model->napomena) }}</textarea>
                        @if ($errors->has('napomena'))
                        <span class="help-block">
                            <strong>{{ $errors->first('napomena') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px solid #18BC9C">

            <div class="row dugmici">
                <div class="col-md-6 col-md-offset-6">
                    <div class="form-group text-right">
                        <div class="col-md-6 snimi">
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-floppy-o"></i>&emsp;&emsp;Snimi izmene</button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-danger btn-block ono" href="{{route('licence')}}">
                                <i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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
    $(document).ready(function () {
        $('.datepicker').datepicker({
            format: 'dd.mm.yyyy',
            autoclose: true,
            endDate: '+10y'
        });
    });

</script>
@endsection