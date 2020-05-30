@extends('sabloni.app')

@section('naziv', 'Oprema | Dodavanje servera')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Dodavanje servera"
                 src="{{url('/images/server.png')}}" style="height:64px;">
            &emsp;Dodavanje servera
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
            <a class="btn btn-primary" href="{{ route('serveri.oprema') }}"
               title="Povratak na listu servera">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form action="{{ route('serveri.dodavanje.post') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            {{-- Red I --}}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group checkboxoviforme">
                        <label>
                            <input type="checkbox" name="firewall" id="firewall"> &emsp;Da li je firewall aktivan na serveru?
                        </label>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group checkboxoviforme">
                        <label>
                            <input type="checkbox" name="virtuelni" id="virtuelni"> &emsp;Da li se radi o virtualnom serveru?
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('host') ? ' has-error' : '' }}">
                        <label for="host">Host na kome je virtualni server:</label>
                        <input type="text" name="host" id="host" class="form-control" value="{{ old('host') }}" maxlength="20"> @if ($errors->has('host'))
                        <span class="help-block">
                            <strong>{{ $errors->first('host') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        <hr>
        {{-- Red II --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('ime') ? ' has-error' : '' }}">
                    <label for="ime">Ime/naziv servera (Aktivni direktorijum):</label>
                    <input type="text" name="ime" id="ime" class="form-control" value="{{ old('ime') }}" maxlength="20" required> @if ($errors->has('ime'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ime') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('domen') ? ' has-error' : '' }}">
                    <label for="domen">Domen:</label>
                    <input type="text" name="domen" id="domen" class="form-control" value="{{ old('domen') }}" maxlength="50"> @if ($errors->has('domen'))
                    <span class="help-block">
                        <strong>{{ $errors->first('domen') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('kancelarija_id') ? ' has-error' : '' }}">
                    <label for="kancelarija_id">Kancelarija:</label>
                    <select name="kancelarija_id" id="kancelarija_id" class="chosen-select form-control" data-placeholder="kancelarija ...">
                        <option value=""></option>
                        @foreach($kancelarije as $kancelarija)
                        <option value="{{ $kancelarija->id }}" {{ old( 'kancelarija_id') == $kancelarija->id ? ' selected' : '' }}> {{ $kancelarija->naziv }}, {{$kancelarija->lokacija->naziv}}, {{$kancelarija->sprat->naziv}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('kancelarija_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('kancelarija_id') }}</strong>
                </span>
                @endif
            </div>
        </div>
</div>

<hr>

{{-- Red II ipo --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('rack') ? ' has-error' : '' }}">
                    <label for="rack">Rack u kome se server nalazi:</label>
                    <input type="text" name="rack" id="rack" class="form-control" value="{{ old('rack') }}" maxlength="50"> @if ($errors->has('rack'))
                    <span class="help-block">
                        <strong>{{ $errors->first('rack') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('ups') ? ' has-error' : '' }}">
                    <label for="ups">UPS/ovi koji ga napaja:</label>
                    <input type="text" name="ups" id="ups" class="form-control" value="{{ old('ups') }}" maxlength="50"> @if ($errors->has('ups'))
                    <span class="help-block">
                        <strong>{{ $errors->first('ups') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('prioritet') ? ' has-error' : '' }}">
                    <label for="prioritet">Prioritet prilikom uključivanja:</label>
                    <select name="prioritet" id="prioritet" class="chosen-select form-control" data-placeholder="prioritet ...">
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                </select>
                @if ($errors->has('prioritet'))
                <span class="help-block">
                    <strong>{{ $errors->first('prioritet') }}</strong>
                </span>
                @endif
            </div>
        </div>
</div>

<hr>

{{-- Red II ipo plus --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('nalog') ? ' has-error' : '' }}">
                    <label for="nalog">Nalog koji se koristi za pristup:</label>
                    <input type="text" name="nalog" id="nalog" class="form-control" value="{{ old('nalog') }}" maxlength="50"> @if ($errors->has('nalog'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nalog') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('lozinka') ? ' has-error' : '' }}">
                    <label for="lozinka">Lozinka:</label>
                    <input type="text" name="lozinka" id="lozinka" class="form-control" value="{{ old('lozinka') }}" maxlength="50"> @if ($errors->has('lozinka'))
                    <span class="help-block">
                        <strong>{{ $errors->first('lozinka') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('hypervisor') ? ' has-error' : '' }}">
                    <label for="hypervisor">Ako je uloga servera VHOST o kom se Hypervisoru radi:</label>
                    <input type="text" name="hypervisor" id="hypervisor" class="form-control" value="{{ old('hypervisor') }}" maxlength="50"> @if ($errors->has('hypervisor'))
                    <span class="help-block">
                        <strong>{{ $errors->first('hypervisor') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

</div>

<hr>

{{-- Red III --}}
<div class="row">

    <div class="col-md-4">
        <div class="form-group{{ $errors->has('rola') ? ' has-error' : '' }}">
            <label for="rola">Role:</label>
            <input type="text" name="rola" id="rola" class="form-control" value="{{ old('rola') }}" maxlength="255" required> @if ($errors->has('rola'))
            <span class="help-block">
                <strong>{{ $errors->first('rola') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-8">
        <div class="form-group{{ $errors->has('rola_opis') ? ' has-error' : '' }}">
            <label for="rola_opis">Detaljni opis role:</label>
            <textarea name="rola_opis" id="rola_opis" class="form-control">{{ old('rola_opis') }}</textarea>
            @if ($errors->has('rola_opis'))
            <span class="help-block">
                <strong>{{ $errors->first('rola_opis') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<hr>
{{-- Red IV --}}
<div class="row">
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('os_id') ? ' has-error' : '' }}">
            <label for="os_id">Operativni sistem:</label>
            <select name="os_id" id="os_id" class="chosen-select form-control" data-placeholder="os ...">
                <option value=""></option>
                @foreach($os as $si)
                <option value="{{ $si->id }}" {{ old( 'os_id') == $si->id ? ' selected' : '' }}> {{$si->naziv}}
            </option>

            @endforeach
        </select>
        @if ($errors->has('os_id'))
        <span class="help-block">
            <strong>{{ $errors->first('os_id') }}</strong>
        </span>
        @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group{{ $errors->has('licenca') ? ' has-error' : '' }}">
            <label for="licenca">Licenca:</label>
            <input type="text" name="licenca" id="licenca" class="form-control" value="{{ old('licenca') }}" maxlength="50"> @if ($errors->has('licenca'))
            <span class="help-block">
                <strong>{{ $errors->first('licenca') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
            <label for="model">Ako se radi o fizičkom serveru o kom se hardverskom modelu radi:</label>
            <input type="text" name="model" id="model" class="form-control" value="{{ old('model') }}" maxlength="50"> @if ($errors->has('model'))
            <span class="help-block">
                <strong>{{ $errors->first('model') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<hr>
{{-- Red V --}}
<div class="row">
    <div class="col-md-3">
        <div class="form-group{{ $errors->has('ip_adresa') ? ' has-error' : '' }}">
            <label for="ip_adresa">IP adresa:</label>
            <input type="text" name="ip_adresa" id="ip_adresa" class="form-control" value="{{ old('ip_adresa') }}"
            maxlength="15"> @if ($errors->has('ip_adresa'))
            <span class="help-block">
            <strong>{{ $errors->first('ip_adresa') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group{{ $errors->has('default_gw') ? ' has-error' : '' }}">
            <label for="default_gw">Uobičajeni gateway:</label>
            <input type="text" name="default_gw" id="default_gw" class="form-control" value="{{ old('default_gw') }}"
            maxlength="15"> @if ($errors->has('default_gw'))
            <span class="help-block">
            <strong>{{ $errors->first('default_gw') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group{{ $errors->has('cpu') ? ' has-error' : '' }}">
            <label for="cpu">CPU (model/broj):</label>
            <input type="text" name="cpu" id="cpu" class="form-control" value="{{ old('cpu') }}" maxlength="50"> @if ($errors->has('cpu'))
            <span class="help-block">
                <strong>{{ $errors->first('cpu') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group{{ $errors->has('ram') ? ' has-error' : '' }}">
            <label for="ram">RAM (kapacitet/tip):</label>
            <input type="text" name="ram" id="ram" class="form-control" value="{{ old('ram') }}" maxlength="50"> @if ($errors->has('ram'))
            <span class="help-block">
                <strong>{{ $errors->first('ram') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<hr>
{{-- Red VI --}}
<div class="row">
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
            <label for="napomena">Napomena:</label>
            <textarea name="napomena" id="napomena" class="form-control">{{ old('napomena') }}</textarea>
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
                <button type="submit" class="btn btn-success btn-block ono"><i class="fa fa-plus-circle"></i>&emsp;&emsp;Dodaj</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger btn-block ono" href="{{route('serveri.oprema')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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

        resizeChosen();
        jQuery(window).on('resize', resizeChosen);

        var chsn = $('.chosen-select').chosen({
            allow_single_deselect: true,
            search_contains: true
        });


        function resizeChosen() {
            $(".chosen-container").each(function () {
                $(this).attr('style', 'width: 100%');
            });
        }

    });

</script>
@endsection
