@extends('sabloni.app')

@section('naziv', 'Oprema | Izmena procesora')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Izmena procesora"
                 src="{{url('/images/cpu.png')}}" style="height:64px;">
            &emsp;Izmena podataka procesora
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
            <a class="btn btn-primary" href="{{ route('procesori.oprema') }}"
               title="Povratak na listu procesora">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form action="{{ route('procesori.oprema.izmena.post', $uredjaj->id) }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('serijski_broj') ? ' has-error' : '' }}">
                        <label for="serijski_broj">Serijski broj:</label>
                        <input type="text" name="serijski_broj" id="serijski_broj" class="form-control" value="{{ old('serijski_broj', $uredjaj->serijski_broj) }}" maxlength="50">
                        @if ($errors->has('serijski_broj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serijski_broj') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group{{ $errors->has('stavka_otpremnice_id') ? ' has-error' : '' }}">
                        <label for="stavka_otpremnice_id">Stavka otpremnice:</label>
                        <select name="stavka_otpremnice_id" id="stavka_otpremnice_id" class="chosen-select form-control" data-placeholder="otpremnice ..." >
                            <option value=""></option>
                            @foreach($otpremnice as $o)
                            <optgroup label="{{ $o->dobavljac->naziv }}, {{ $o->broj }} od {{ $o->datum }}">
                                @foreach($o->stavke as $s)
                                <option value="{{ $s->id }}"
                                    {{ $s->id == old('stavka_otpremnice_id') ? ' selected' : '' }}
                                    {{ $uredjaj->stavka_otpremnice_id == $s->id ? ' selected' : '' }}>
                                    {{$s->naziv}} (popunjeno je {{$s->procesori->count() }} od {{$s->kolicina}} {{$s->jedinica_mere}})
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
                <div class="form-group{{ $errors->has('procesor_model_id') ? ' has-error' : '' }}">
                    <label for="procesor_model_id">Model procesora:</label>
                    <select name="procesor_model_id" id="procesor_model_id" class="chosen-select form-control" data-placeholder="model ..." required>
                        <option value=""></option>
                        @foreach($modeli as $m)
                        <option value="{{ $m->id }}"
                            {{ $m->id == old('procesor_model_id') ? ' selected' : '' }}
                            {{ $uredjaj->procesor_model_id == $m->id ? ' selected' : '' }}>
                            {{ $m->proizvodjac->naziv }}, {{ $m->naziv }} na {{ $m->takt }} MHz
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('procesor_model_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('procesor_model_id') }}</strong>
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
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('racunar_id') ? ' has-error' : '' }}">
                <label for="racunar_id">Računar:</label>
                <select name="racunar_id" id="racunar_id" class="chosen-select form-control" data-placeholder="računar ..." >
                    <option value=""></option>
                    @foreach($racunari as $r)
                    <option data-procesor="{{ $r->procesori()->count() > 0 ? 'Ovaj računar već ima ugrađen-a '. $r->procesori()->count().' procesor-a!' : 'Računar je bez procesora.'}}"
                            value="{{ $r->id }}"
                            {{ $r->id == old('racunar_id') ? ' selected' : '' }}
                            {{ $uredjaj->racunar_id == $r->id ? ' selected' : '' }}>
                            {{ $r->ime }}
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

    <div class="col-md-6">
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
                <button type="submit" class="btn btn-success btn-block ono"><i class="fa fa-plus-circle"></i>&emsp;&emsp;Dodaj</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger btn-block ono" href="{{route('procesori.oprema')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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
            allow_single_deselect: true
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
