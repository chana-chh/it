@extends('sabloni.app')

@section('naziv', 'Oprema | Izmena štampača')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Izmena štampača" src="{{url('/images/stampac.png')}}" style="height:64px;"> &emsp;Izmena podataka štampača
        </h1>
    </div>
</div>
<hr>
<div class="row" style="margin-bottom: 16px;">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" onclick="window.history.back();" title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}" title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('stampaci.oprema') }}" title="Povratak na listu štampača">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form action="{{ route('stampaci.oprema.izmena.post', $uredjaj->id) }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-2">
                    <div class="form-group{{ $errors->has('serijski_broj') ? ' has-error' : '' }}">
                        <label for="serijski_broj">Serijski broj:</label>
                        <input type="text" name="serijski_broj" id="serijski_broj" class="form-control" value="{{ old('serijski_broj', $uredjaj->serijski_broj) }}"
                            maxlength="50"> @if ($errors->has('serijski_broj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serijski_broj') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group{{ $errors->has('inventarski_broj') ? ' has-error' : '' }}">
                        <label for="inventarski_broj">Inventarski broj:</label>
                        <input type="text" name="inventarski_broj" id="inventarski_broj" class="form-control" value="{{ old('inventarski_broj', $uredjaj->inventarski_broj) }}"
                            maxlength="10"> @if ($errors->has('inventarski_broj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('inventarski_broj') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('stavka_otpremnice_id') ? ' has-error' : '' }}">
                        <label for="stavka_otpremnice_id">Stavka otpremnice:</label>
                        <select name="stavka_otpremnice_id" id="stavka_otpremnice_id" class="chosen-select form-control" data-placeholder="otpremnice ...">
                            <option value=""></option>
                            @foreach($otpremnice as $o)
                            <optgroup label="{{ $o->dobavljac->naziv }}, {{ $o->broj }} od {{ $o->datum }}">
                                @foreach($o->stavke as $s)
                                <option value="{{ $s->id }}" {{ $s->id == old('stavka_otpremnice_id') ? ' selected' : '' }} {{ $uredjaj->stavka_otpremnice_id
                                    == $s->id ? ' selected' : '' }}> {{$s->naziv}} (popunjeno je {{$s->stampaci->count()
                                    }} od {{$s->kolicina}} {{$s->jedinica_mere}})
                                </option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                        @if ($errors->has('stavka_otpremnice_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('stavka_otpremnice_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('stavka_nabavke_id') ? ' has-error' : '' }}">
                        <label for="stavka_nabavke_id">Stavka nabavke:</label>
                        <select name="stavka_nabavke_id" id="stavka_nabavke_id" class="chosen-select form-control" data-placeholder="nabavke ...">
                            <option value=""></option>
                            @foreach($nabavke as $o)
                            <optgroup label="{{ $o->dobavljac->naziv }} od {{ $o->datum }}">
                                @foreach($o->stavke as $s)
                                <option value="{{ $s->id }}" {{ $s->id == old('stavka_nabavke_id') ? ' selected' : '' }} {{ $uredjaj->stavka_nabavke_id == $s->id
                                    ? ' selected' : '' }}> {{$s->naziv}} (popunjeno je {{$s->stampaci->count() }} od {{$s->kolicina}}
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


            </div>

            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group checkboxoviforme">
                        <label>
                            <input type="checkbox" name="mrezni" id="mrezni" {!!$uredjaj->mrezni == 0 ? "" :'checked="checked"'!!}> &emsp;Da li je uređaj podešen za rad u mreži?
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="nevidljivi form-group{{ $errors->has('ip_adresa') ? ' has-error' : '' }}">
                        <label for="ip_adresa">IP adresa:</label>
                        <input type="text" name="ip_adresa" id="ip_adresa" class="form-control" value="{{ old('ip_adresa', $uredjaj->ip_adresa) }}"
                            maxlength="15"> @if ($errors->has('ip_adresa'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ip_adresa') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group{{ $errors->has('stampac_model_id') ? ' has-error' : '' }}">
                        <label for="stampac_model_id">Model štampača:</label>
                        <select name="stampac_model_id" id="stampac_model_id" class="chosen-select form-control" data-placeholder="model ..." required>
                            <option value=""></option>
                            @foreach($modeli as $m)
                            <option value="{{ $m->id }}" {{ $m->id == old('stampac_model_id') ? ' selected' : '' }} {{ $uredjaj->stampac_model_id == $m->id ?
                                ' selected' : '' }}> {{ $m->proizvodjac->naziv }}, {{ $m->naziv }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('stampac_model_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('stampac_model_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p id="obavestenje" class="text-primary" style="font-size: 120%;"></p>
                </div>
            </div>
            {{-- Red II --}}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('racunar_id') ? ' has-error' : '' }}">
                        <label for="racunar_id">Računar:</label>
                        <select name="racunar_id" id="racunar_id" class="chosen-select form-control" data-placeholder="računar ...">
                            <option value=""></option>
                            @foreach($racunari as $r)
                            <option data-procesor="{{ $r->monitori()->count() > 0 ? 'Ovaj računar je već povezan sa štampačem!' : 'Računar je bez štampača.'}}"
                                value="{{ $r->id }}" {{ $r->id == old('racunar_id') ? ' selected' : '' }} @if($uredjaj->racunar) {{ $uredjaj->racunar->id
                                == $r->id ? ' selected' : '' }} @endif> {{ $r->ime }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('racunar_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('racunar_id') }}</strong>
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
                            <option value="{{ $kancelarija->id }}" {{ old( 'kancelarija_id')==$kancelarija->id ? ' selected' : '' }} {{ $uredjaj->kancelarija_id == $kancelarija->id ? ' selected' : '' }}>
                                {{ $kancelarija->sviPodaci() }}
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
                <div class="col-md-5">
                    <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                        <label for="napomena">Napomena:</label>
                        <textarea name="napomena" id="napomena" class="form-control">{{ old('napomena', $uredjaj->napomena) }}</textarea>
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
                            <a class="btn btn-danger btn-block ono" href="{{route('stampaci.oprema')}}">
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
<script>
    $(document).ready(function () {

        if (($("#mrezni").is(":checked")) ) {
                $(".nevidljivi").show();
            } else {
                $(".nevidljivi").hide();
        }

        $("#mrezni").click(function () {
            if (($(this).is(":checked"))) {
                $(".nevidljivi").show(300);
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
    });

</script>
@endsection
