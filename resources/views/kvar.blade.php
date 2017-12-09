@extends('sabloni.app')

@section('naziv', 'Prijava kvara')

@section('stilovi')
<style>
    body {
        padding-top: 1rem;
    }
</style>
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-2 text-center">
        <a href="{{ route('imenik') }}">
            <img alt="Imenik" src="{{url('/images/imenik.png')}}" style="height: 128px;">
        </a>
        <h4>Pretraživanje imenika</h4>
    </div>
    <div class="col-md-8">
        <h1 class="text-center">Prijava/status kvara</h1>
        <div class="row">
            <a href="{{ route('status', 1) }}">status</a>
        </div>
    </div>
    <div class="col-md-2 text-center">
        <a href="{{ route('kvar') }}">
            <img alt="Kvar" src="{{url('/images/kvar.png')}}" style="height: 128px;">
        </a>
        <h4>Prijava/status kvara</h4>
    </div>
</div>
<hr>
<div class="row ceo_dva">
    <div class="col-md-8 col-md-offset-2 boxic">
        <form action="{{ route('kvar.post') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('zaposleni_id') ? ' has-error' : '' }}">
                <label for="zaposleni_id">Zaposleni koji prijavljuje kvar:</label>
                <select id="zaposleni_id" name="zaposleni_id"
                        class="chosen-select form-control"
                        data-placeholder="Zaposleni ..." required>
                    <option value=""></option>
                    @foreach($zap as $z)
                    <option value="{{ $z->id }}"
                            {{ old('zaposleni_id') == $z->id ? ' selected' : '' }}>
                            {{ $z->imePrezime() }},
                            {{ $z->uprava->naziv }},
                            {{ $z->kancelarija->sviPodaci() }}</option>
                    @endforeach
                </select>
                @if ($errors->has('zaposleni_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('zaposleni_id') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('kancelarija_id') ? ' has-error' : '' }}">
                <label for="kancelarija_id">Kancelarija u kojoj je došlo do kvara:</label>
                <select id="kancelarija_id" name="kancelarija_id"
                        class="chosen-select form-control"
                        data-placeholder="Kancelarija ..." required>
                    <option value=""></option>
                    @foreach($kanc as $k)
                    <option value="{{ $k->id }}"
                            {{ old('kancelarija_id') == $k->id ? ' selected' : '' }}>
                            {{ $k->sviPodaci() }}</option>
                    @endforeach
                </select>
                @if ($errors->has('kancelarija_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('kancelarija_id') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('opis_kvara') ? ' has-error' : '' }}">
                <label for="opis_kvara">Opis kvara koji se prijavljuje:</label>
                <select id="opis_kvara" name="opis_kvara"
                        class="chosen-select form-control"
                        data-placeholder="Opis kvara ..." required>
                    <option value=""></option>
                    <option value="Opis1">
                        Opis 1
                    </option>
                    <option value="Opis2">
                        Opis 2
                    </option>
                    <option value="Opis3">
                        Opis 3
                    </option>
                    <option value="Ostalo">
                        Ostalo
                    </option>
                </select>
                @if ($errors->has('opis_kvara'))
                <span class="help-block">
                    <strong>{{ $errors->first('opis_kvara') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                <label for="napomena">Dodatno objašnjenje kvara (ako je potrebno):</label>
                <textarea id="napomena" name="napomena"
                          class="form-control">{{ old('napomena') }}</textarea>
                @if ($errors->has('napomena'))
                <span class="help-block">
                    <strong>{{ $errors->first('napomena') }}</strong>
                </span>
                @endif
            </div>
            <div class="row dugmici">
                <div class="col-md-6 col-md-offset-6">
                    <div class="form-group">
                        <div class="col-md-6 snimi">
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-plus-circle"></i> Prijavi kvar
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-danger btn-block ono" href="{{route('kvar')}}">
                                <i class="fa fa-ban"></i> Otkaži prijavu kvara
                            </a>
                        </div>
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
