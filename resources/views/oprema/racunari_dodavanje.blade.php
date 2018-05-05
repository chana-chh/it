@extends('sabloni.app')

@section('naziv', 'Oprema | Dodavanje računara')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Dodavanje računara"
                 src="{{url('/images/kompaS.png')}}" style="height:64px;">
            &emsp;Dodavanje računara
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
            <a class="btn btn-primary" href="{{ route('racunari.oprema') }}"
               title="Povratak na listu procesora">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form action="{{ route('racunari.oprema.dodavanje.post') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            {{-- Red I --}}
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group checkboxoviforme">
                        <label>
                            <input type="checkbox" name="laptop" id="laptop"> &emsp;Da li se radi o laptop računaru?
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group checkboxoviforme">
                        <label>
                            <input type="checkbox" name="brend" id="brend"> &emsp;Da li se radi o brend računaru?
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group checkboxoviforme">
                        <label>
                            <input type="checkbox" name="serverf" id="server"> &emsp;Da li se radi o serveru?
                        </label>
                    </div>
                </div>
                <div class="col-md-6 nevidljivi">
                    <div class="form-group{{ $errors->has('proizvodjac_id') ? ' has-error' : '' }}">
                        <label for="proizvodjac_id">Proizvođač:</label>
                        <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control" data-placeholder="proizvođač ...">
                            <option value=""></option>
                            @foreach($proizvodjaci as $proizvodjac)
                            <option value="{{ $proizvodjac->id }}" {{ old( 'proizvodjac_id') == $proizvodjac->id ? ' selected' : '' }}> {{ $proizvodjac->naziv }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('proizvodjac_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('proizvodjac_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <hr>

        {{-- Red II --}}
        <div class="row">

            <div class="col-md-3 nevidljivi">
                <div class="form-group{{ $errors->has('serijski_broj') ? ' has-error' : '' }}">
                    <label for="serijski_broj">Serijski broj:</label>
                    <input type="text" name="serijski_broj" id="serijski_broj" class="form-control" value="{{ old('serijski_broj') }}" maxlength="50"> @if ($errors->has('serijski_broj'))
                    <span class="help-block">
                        <strong>{{ $errors->first('serijski_broj') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group{{ $errors->has('inventarski_broj') ? ' has-error' : '' }}">
                    <label for="inventarski_broj">Inventarski broj:</label>
                    <input type="text" name="inventarski_broj" id="inventarski_broj" class="form-control" value="{{ old('inventarski_broj') }}" maxlength="10"> @if ($errors->has('inventarski_broj'))
                    <span class="help-block">
                        <strong>{{ $errors->first('inventarski_broj') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group{{ $errors->has('stavka_nabavke_id') ? ' has-error' : '' }}">
                    <label for="stavka_nabavke_id">Stavka nabavke:</label>
                    <select name="stavka_nabavke_id" id="stavka_nabavke_id" class="chosen-select form-control" data-placeholder="nabavke ..." required>
                        <option value=""></option>
                        @foreach($nabavke as $o)
                        <optgroup label="{{ $o->dobavljac->naziv }}, {{ $o->broj }} od {{ $o->datum }}">
                            @foreach($o->stavke as $s)
                            <option value="{{ $s->id }}" {{ old( 'stavka_nabavke_id') == $s->id ? ' selected' : '' }}> {{$s->naziv}} (popunjeno je {{$s->racunari->count() }} od {{$s->kolicina}}
                                    {{$s->jedinica_mere}})
                        </option>
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>
                @if ($errors->has('stavka_nabavke_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('stavka_nabavke_id') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-3">
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

{{-- Red III --}}
<div class="row">

    <div class="col-md-3">
        <div class="form-group{{ $errors->has('ime') ? ' has-error' : '' }}">
            <label for="ime">Ime računara (Aktivni direktorijum):</label>
            <input type="text" name="ime" id="ime" class="form-control" value="{{ old('ime') }}" maxlength="100" required> @if ($errors->has('ime'))
            <span class="help-block">
                <strong>{{ $errors->first('ime') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group{{ $errors->has('erc_broj') ? ' has-error' : '' }}">
            <label for="erc_broj">Broj IKT odeljenja:</label>
            <input type="text" name="erc_broj" id="erc_broj" class="form-control" value="{{ old('erc_broj') }}" maxlength="100"> @if ($errors->has('erc_broj'))
            <span class="help-block">
                <strong>{{ $errors->first('erc_broj') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group zaposleni_select {{ $errors->has('zaposleni_id') ? ' has-error' : '' }}">
            <label for="zaposleni_id">Zaposleni koji koristi račnar:</label>
            <select name="zaposleni_id" id="zaposleni_id" class="chosen-select form-control" data-placeholder="zaposleni ...">
                <option data-kanc="0" value=""></option>
                @foreach($zaposleni as $za)
                <option data-kanc="[{{ $za->kancelarija_id }}]" value="{{ $za->id }}" {{ old( 'zaposleni_id') == $za->id ? ' selected' : '' }}> {{$za->imePrezime()}}, {{$za->uprava->naziv}}
            </option>

            @endforeach
        </select>
        @if ($errors->has('zaposleni_id'))
        <span class="help-block">
            <strong>{{ $errors->first('zaposleni_id') }}</strong>
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
<div class="col-md-4 nevidljivi">
    <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
        <label for="link">Link proizvođača: </label>
        <input type="url" name="link" id="link" class="form-control" value="{{ old('link') }}" maxlenght="255"> @if ($errors->has('link'))
        <span class="help-block">
            <strong>{{ $errors->first('link') }}</strong>
        </span>
        @endif
    </div>

</div>
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
                <a class="btn btn-danger btn-block ono" href="{{route('racunari.oprema')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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
        $(".nevidljivi").hide();

        $("#laptop").click(function () {
            if (($(this).is(":checked")) || ($("#brend").is(":checked")) || ($("#server").is(":checked"))) {
                $(".nevidljivi").show(300);
                resizeChosen();
            } else {
                $(".nevidljivi").hide(200);
            }
        });
        $("#brend").click(function () {
            if ($(this).is(":checked") || ($("#laptop").is(":checked")) || ($("#server").is(":checked"))) {
                $(".nevidljivi").show(300);
                resizeChosen();
            } else {
                $(".nevidljivi").hide(200);
            }
        });
        $("#server").click(function () {
            if ($(this).is(":checked") || ($("#brend").is(":checked")) || ($("#laptop").is(":checked"))) {
                $(".nevidljivi").show(300);
                resizeChosen();
            } else {
                $(".nevidljivi").hide(200);
            }
        });

        resizeChosen();
        jQuery(window).on('resize', resizeChosen);

        var chsn = $('.chosen-select').chosen({
            allow_single_deselect: true,
            search_contains: true
        });

        chsn.on('change', function (evt, params) {
            if (params == undefined && evt.currentTarget.id == 'racunar_id') {
                $('#obavestenje').hide();
            } else {
                $('#obavestenje').show();
            }
        });

        function resizeChosen() {
            $(".chosen-container").each(function () {
                $(this).attr('style', 'width: 100%');
            });
        }

        $("#racunar_id").on('change', function () {
            var ima_nema = $(this).find(":selected").data("procesor");
            $("#obavestenje").html(ima_nema);
        });

        function filtrirajZaposlene() {    
        var trenutnaKancelarija = parseInt($('#kancelarija_id').val());
        console.log(trenutnaKancelarija);
        $('.zaposleni_select option').each(function () {
        var arrKancelarije = JSON.parse($(this).attr('data-kanc'));
        console.log(arrKancelarije);
        if ($.inArray(trenutnaKancelarija, arrKancelarije) > -1) {
            $(this).show();
        } else {
            $(this).hide();
        }
        });
        
        if ($('.zaposleni_select :selected').is(':hidden')) {
        $('.zaposleni_select').val('');
        }
    };

    $('#kancelarija_id').on('change', function() {
    filtrirajZaposlene();
    $('select.chosen-select').trigger("chosen:updated");
});
    });

</script>
@endsection
