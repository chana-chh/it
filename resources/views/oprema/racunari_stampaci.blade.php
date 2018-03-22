@extends('sabloni.app')

@section('naziv', 'Oprema | Vezivanje štampača za računar')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Vezivanje štampača za računar"
                 src="{{url('/images/stampac.png')}}" style="height:64px;">
            &emsp;Rad sa štampačima povezanim sa računarom <span class="text-success">{{$uredjaj->ime}}</span>
        </h1>
    </div>
</div>
<hr>
<div class="row" style="margin-bottom: 16px;">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" href="{{route('racunari.oprema.detalj', $uredjaj->id)}}"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('racunari.oprema') }}"
               title="Povratak na listu računara">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
@endsection

@section('sadrzaj')
<h3>Podaci o već povezanim uređajima:</h3>
<div class="row">
    <div class="col-md-12">
        @if ($uredjaj->stampaci->count()>0)
        @foreach($uredjaj->stampaci as $st)
        <h4><em class="text-success">Štampač {{$loop->iteration}}</em></h4>
        <table class="table table-striped" style="table-layout: fixed;">
            <tbody>
                <tr>
                    <th style="width: 40%;">
                        Serijski broj:
                    </th>
                    <td style="width: 60%;">
                        {{$st->serijski_broj}}
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%;">
                        Inventarski broj:
                    </th>
                    <td style="width: 60%;">
                        {{$st->inventarski_broj}}
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%;">
                        Proizvođač:
                    </th>
                    <td style="width: 60%;">
                        {{$st->stampacModel->proizvodjac->naziv}}
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%;">
                        Tip:
                    </th>
                    <td style="width: 60%;">
                        {{$st->stampacModel->tip->naziv}}
                    </td>
                </tr>
               <tr>
                <th style="width: 20%;">Toner:</th>
                <td style="width: 80%;">
                    <strong>{{$st->stampacModel->tipTonera->naziv}}</strong><br>
                    {{$st->stampacModel->tipTonera->modeli_tonera}}
                </td>
            </tr>
            </tbody>
        </table>
<div class="row" style="padding-top: 20px;">
            <div class="col-md-3">
        <a class="btn btn-primary ono btn-block" href="{{ route('racunari.oprema.stampaci.izvadi', $st->id) }}">
            <i class="fa fa-minus-circle fa-fw"></i> Otkači od računara</a>
    </div>
    <div class="col-md-3 col-md-offset-6">
        <a class="btn btn-danger ono btn-block" href="{{ route('racunari.oprema.stampaci.izvadi.obrisi', $st->id) }}">
            <i class="fa fa-trash fa-fw"></i> Otkači i otpiši</a>
    </div>
</div>
<hr style="border-top: 1px solid #18BC9C">
    @endforeach
        @else
        <h4> Komponenta nije povezana ili nema podataka o njoj </h4>
        @endif
    </div>
</div>

@endsection

@section('traka')
<h4> Povezivanje već postojećih, neraspoređenih uređaja</h4>
<div class="row">
    <div class="col-md-12">
        <form action="{{route('racunari.oprema.stampaci.dodaj.postojecu',  $uredjaj->id)}}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="row" style="margin-top: 1rem">

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('stampac_id') ? ' has-error' : '' }}">
                        <label for="stampac_id">Štampači:</label>
                        <select name="stampac_id" id="stampac_id" class="chosen-select form-control" data-placeholder="štampači ..." required>
                            <option value=""></option>
                            @foreach($stampaci_uredjaji as $p)
                            <option value="{{ $p->id }}" {{ old( 'stampac_id')== $p->id ? ' selected' : '' }}> sn: {{ $p->serijski_broj }}, {{ $p->stampacModel->proizvodjac->naziv }}, {{ $p->stampacModel->naziv }}
                                {{ $p->stampacModel->tip->naziv }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('stampac_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('stampac_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <hr style="border-top: 1px solid #18BC9C">

            <div class="row dugmici">
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <div class="col-md-6 col-md-offset-6">
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-plus-circle"></i>&emsp;&emsp;Dodaj</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>
<h4> Dodavanje novog štampača u bazu i vezivanje za računar</h4>
    <div class="col-md-12 well" style="margin-top: 1rem">
        <form action="{{route('racunari.oprema.stampaci.dodaj.novu', $uredjaj->id)}}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <p class="text-warning">* Moguće je odaberati SAMO JEDAN način na koji je uređaj pribavljen!</p>
            <div class="row">
             <div class="col-md-12">
                    <div class="form-group{{ $errors->has('stavka_otpremnice_id') ? ' has-error' : '' }}">
                        <label for="stavka_otpremnice_id">Stavka otpremnice:</label>
                        <select name="stavka_otpremnice_id" id="stavka_otpremnice_id" class="chosen-select form-control" data-placeholder="otpremnice ..." required>
                            <option value=""></option>
                            @foreach($otpremnice as $o)
                            <optgroup label="{{ $o->dobavljac->naziv }}, {{ $o->broj }} od {{ $o->datum }}">
                                @foreach($o->stavke as $s)
                                <option value="{{ $s->id }}" {{ $s->id == old('stavka_otpremnice_id') ? ' selected' : '' }}> 
                                    {{$s->naziv}} (popunjeno je {{$s->stampaci->count()
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
            </div>
                 <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('stavka_nabavke_id') ? ' has-error' : '' }}">
                        <label for="stavka_nabavke_id">Stavka nabavke:</label>
                        <select name="stavka_nabavke_id" id="stavka_nabavke_id" class="chosen-select form-control" data-placeholder="nabavke ..." required>
                            <option value=""></option>
                            @foreach($nabavke as $o)
                            <optgroup label="{{ $o->dobavljac->naziv }} od {{ $o->datum }}">
                                @foreach($o->stavke as $s)
                                <option value="{{ $s->id }}" {{ $s->id == old('stavka_nabavke_id') ? ' selected' : '' }}>
                                    {{$s->naziv}} (popunjeno je {{$s->stampaci->count() }} od {{$s->kolicina}}
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('stampac_model_id') ? ' has-error' : '' }}">
                        <label for="stampac_model_id">Modeli štampača:</label>
                        <select name="stampac_model_id" id="stampac_model_id" class="chosen-select form-control" data-placeholder="model ..."
                            required>
                            <option value=""></option>
                            @foreach($modeli as $m)
                            <option value="{{ $m->id }}" {{ old( 'stampac_model_id')== $m->id ? ' selected' : '' }}> {{ $m->proizvodjac->naziv }} - ({{ $m->naziv }}),  {{ $m->tip->naziv }}, {{ $m->tipTonera->modeli_tonera }}
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
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('serijski_broj') ? ' has-error' : '' }}">
                        <label for="serijski_broj">Serijski broj:</label>
                        <input type="text" name="serijski_broj" id="serijski_broj" class="form-control" value="{{ old('serijski_broj') }}" maxlength="50"
                            required> @if ($errors->has('serijski_broj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serijski_broj') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('inventarski_broj') ? ' has-error' : '' }}">
                        <label for="inventarski_broj">Inventarski broj:</label>
                        <input type="text" name="inventarski_broj" id="inventarski_broj" class="form-control" value="{{ old('inventarski_broj') }}" maxlength="10"
                            required> @if ($errors->has('inventarski_broj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('inventarski_broj') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
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
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <div class="col-md-6 col-md-offset-6">
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-plus-circle"></i>&emsp;&emsp;Dodaj</button>
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

         $('#stavka_nabavke_id').on('change', function() {
            if(this.value !== "") {
                $('#stavka_otpremnice_id').prop('disabled', true).trigger("chosen:updated");
                $("#stavka_otpremnice_id").prop('required',false);
            }else{
                $('#stavka_otpremnice_id').prop('disabled', false).trigger("chosen:updated");
                $("#stavka_otpremnice_id").prop('required',true);
            }
        });

        $('#stavka_otpremnice_id').on('change', function() {
            if(this.value !== "") {
                $('#stavka_nabavke_id').prop('disabled', true).trigger("chosen:updated");
                $("#stavka_nabavke_id").prop('required',false);
            }else{
                $('#stavka_nabavke_id').prop('disabled', false).trigger("chosen:updated");
                $("#stavka_nabavke_id").prop('required',true);
            }
        });
    });

</script>
@endsection
