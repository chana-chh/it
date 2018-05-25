@extends('sabloni.app')

@section('naziv', 'Prijava kvara')

@section('stilovi')
<style>
    body {
        padding-top: 1rem;
    }
    #formaPrijava {
        display: none;
    }
    #formaStatus {
        display: none;
    }
</style>
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-2 text-center">
        <a href="{{ route('imenik') }}">
            <img alt="Imenik" src="{{url('/images/imenik.png')}}" style="height: 128px;">
        </a>
        <a href="{{ route('imenik') }}" class="btn btn-success" style="margin-top: 3rem;">Pretraživanje imenika</a>
    </div>
    <div class="col-md-8">
        <h1 class="text-center">Prijava/status kvara</h1>
        <div class="row">
            <div class="col-md-6">
                <button id="dugmeStatus" class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-info-circle"></i>&emsp;Provera statusa prijave kvara
                </button>
            </div>
            <div class="col-md-6">
                <button id="dugmePrijava" class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-exclamation-triangle"></i>&emsp;Prijava kvara
                </button>
            </div>
        </div>
    </div>
    <div class="col-md-2 text-center">
        <a href="{{ route('kvar') }}">
            <img alt="Kvar" src="{{url('/images/kvar.png')}}" style="height: 128px;">
        </a>
        <a href="{{ route('kvar') }}" class="btn btn-success" style="margin-top: 3rem;">Prijava/status kvara</a>
    </div>
</div>

@if(Auth::user())
<div class="row" style="margin: 10px 0px 10px 20px;">
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
        </div>
    </div>
</div>
@endif

<hr>
<div class="row ceo_dva" id="formaPrijava">
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
                            {{ $z->uprava ? $z->uprava->naziv : 'neraspoređen' }},
                            {{ $z->kancelarija ? $z->kancelarija->sviPodaci() : 'neraspoređen' }}</option>
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
                        Računar radi (čuju se ventilatori) ali ne prikazuje sliku na monitoru
                    </option>
                    <option value="Opis2">
                        Plavi ekran, restartovanje usred rada
                    </option>
                    <option value="Opis3">
                        Računar radi sporo
                    </option>
                    <option value="Opis4">
                        Računar „pišti” kad se uključi
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
                <div class="col-md-6">
                    <p class="text-danger text-left">
                        * Nakon prijave kvara obavezno zapamtiti (zapisati) broj prijave kako bi se kasnije mogao pratiti status.
                    </p>
                </div>
                <div class="col-md-6">
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
        </form>
    </div>
</div>

@if($kvarovi->isEmpty())
<h3 class="text-danger">Trenutno nema prijavljenih kvarova</h3>
@else
<div class="row ceo_dva" id="formaStatus">
    <div class="col-md-8 col-md-offset-2 boxic">
        <div class="col-md-9">
            <div class="form-group">
                <label for="kvar_id">Broj prijave kvara:</label>
                <select id="kvar_id" name="kvar_id"
                        class="chosen-select form-control">
                    @foreach($kvarovi as $kvar)
                    <option value="{{ $kvar->id }}">
                        {{ $kvar->broj_prijave }},
                        {{ $kvar->zaposleni->imePrezime() }},
                        {{ $kvar->kancelarija->naziv }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-3" style="margin-top: 2.5rem;">
            <div class="form-group">
                <a class="btn btn-success btn-block" id="dugmeLinkProvere" href="{{route('status', $kvar->first()->id)}}">
                    <i class="fa fa-info-circle fa-fw"></i> Proveri status prijave
                </a>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@section('skripte')
<script>
    $(document).ready(function () {
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

        $('#dugmePrijava').on('click', function () {
            $('#formaStatus').hide();
            $('#formaPrijava').show();
            resizeChosen();
        });

        $('#dugmeStatus').on('click', function () {
            $('#formaPrijava').hide();
            $('#formaStatus').show();
            resizeChosen();
        });

        $('#kvar_id').on('change', function () {
            var id = $('#kvar_id').val();
            var ruta = "{{route('status', ':id')}}";
            ruta = ruta.replace(':id', id);
            $('#dugmeLinkProvere').attr('href', ruta);
        });
    });
</script>
@endsection
