@extends('sabloni.app')

@section('naziv', 'Oprema | Vezivanje monitora za računar')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Vezivanje monitora za računar"
                 src="{{url('/images/monitorS.png')}}" style="height:64px;">
            &emsp;Rad sa monitoroma povezanih sa računarom {{$uredjaj->ime}}
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
               title="Povratak na listu računara">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
@endsection

@section('sadrzaj')
<h3>Podaci o već povezanom uređaju:</h3>
<div class="row">
    <div class="col-md-12">
        @if ($uredjaj->monitori->count()>0)
        @foreach($uredjaj->monitori as $mon)
        <h4><em class="text-success">Monitor {{$loop->iteration}}</em></h4>
        <table class="table table-striped" style="table-layout: fixed;">
            <tbody>
                <tr>
                    <th style="width: 40%;">

                        Serijski broj:
                    </th>
                    <td style="width: 60%;">
                        {{$mon->serijski_broj}}
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%;">
                        Proizvođač:
                    </th>
                    <td style="width: 60%;">
                        {{$mon->monitorModel->proizvodjac->naziv}}
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%;">
                        Dijagonala:
                    </th>
                    <td style="width: 60%;">
                        {{$mon->monitorModel->dijagonala->naziv}}"
                    </td>
                </tr>
               <tr>
                <th style="width: 20%;">Vrste povezivanja:</th>
                <td style="width: 80%;">
                    @php
                        $rezultat = array();
                        foreach ($mon->monitorModel->povezivanja as $p){
                            $rezultat[] = $p->naziv;
                        }
                        echo implode(", ",$rezultat);
                    @endphp
                </td>
            </tr>
            </tbody>
        </table>
<div class="row" style="padding-top: 20px;">
            <div class="col-md-3">
        <a class="btn btn-primary ono btn-block" href="{{ route('racunari.oprema.monitori.izvadi', $mon->id) }}">
            <i class="fa fa-minus-circle fa-fw"></i> Otkači od računara</a>
    </div>
    <div class="col-md-3 col-md-offset-6">
        <a class="btn btn-danger ono btn-block" href="{{ route('racunari.oprema.monitori.izvadi.obrisi', $mon->id) }}">
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
        <form action="{{route('racunari.oprema.monitori.dodaj.postojecu',  $uredjaj->id)}}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="row" style="margin-top: 1rem">

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('monitor_id') ? ' has-error' : '' }}">
                        <label for="monitor_id">Monitori:</label>
                        <select name="monitor_id" id="monitor_id" class="chosen-select form-control" data-placeholder="monitori ..." required>
                            <option value=""></option>
                            @foreach($monitori_uredjaji as $p)
                            <option value="{{ $p->id }}" {{ old( 'monitor_id')== $p->id ? ' selected' : '' }}> sn: {{ $p->serijski_broj }}, {{ $p->monitorModel->proizvodjac->naziv }}, 
                                {{ $p->monitorModel->dijagonala->naziv }}"
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('monitor_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('monitor_id') }}</strong>
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
<h4> Dodavanje novog monitora u bazu i vezivanje za računar</h4>
    <div class="col-md-12 well" style="margin-top: 1rem">
        <form action="{{route('racunari.oprema.monitori.dodaj.novu', $uredjaj->id)}}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
             <div class="row">
             <div class="col-md-12">
                    <div class="form-group{{ $errors->has('stavka_otpremnice_id') ? ' has-error' : '' }}">
                        <label for="stavka_otpremnice_id">Stavka otpremnice:</label>
                        <select name="stavka_otpremnice_id" id="stavka_otpremnice_id" class="chosen-select form-control otpremnice" data-placeholder="otpremnice ...">
                            <option value=""></option>
                            @foreach($otpremnice as $o)
                            <optgroup label="{{ $o->dobavljac->naziv }}, {{ $o->broj }} od {{ $o->datum }}">
                                @foreach($o->stavke as $s)
                                <option value="{{ $s->id }}" {{ $s->id == old('stavka_otpremnice_id') ? ' selected' : '' }}> 
                                    {{$s->naziv}} (popunjeno je {{$s->monitori->count()
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
                        <select name="stavka_nabavke_id" id="stavka_nabavke_id" class="chosen-select form-control nabavke" data-placeholder="nabavke ...">
                            <option value=""></option>
                            @foreach($nabavke as $o)
                            <optgroup label="{{ $o->dobavljac->naziv }} od {{ $o->datum }}">
                                @foreach($o->stavke as $s)
                                <option value="{{ $s->id }}" {{ $s->id == old('stavka_nabavke_id') ? ' selected' : '' }}>
                                    {{$s->naziv}} (popunjeno je {{$s->monitori->count() }} od {{$s->kolicina}}
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
                    <div class="form-group{{ $errors->has('monitor_model_id') ? ' has-error' : '' }}">
                        <label for="monitor_model_id">Modeli monitora:</label>
                        <select name="monitor_model_id" id="monitor_model_id" class="chosen-select form-control" data-placeholder="model ..."
                            required>
                            <option value=""></option>
                            @foreach($modeli as $m)
                            <option value="{{ $m->id }}" {{ old( 'monitor_model_id')== $m->id ? ' selected' : '' }}> {{ $m->proizvodjac->naziv }},  {{ $m->dijagonala->naziv }}"
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('monitor_model_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('monitor_model_id') }}</strong>
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
            allow_single_deselect: true
        });

        function resizeChosen() {
            $(".chosen-container").each(function () {
                $(this).attr('style', 'width: 100%');
            });
        }

        $('.nabavke option').each(function() {
            if($(this).is(':selected'))
            $('.stavka_otpremnice_id').prop('disabled', 'disabled');
        });

        $('.otpremnice option').each(function() {
            if($(this).is(':selected'))
            $('.stavka_nabavke_id').prop('disabled', 'disabled');
        });
    });

</script>
@endsection
