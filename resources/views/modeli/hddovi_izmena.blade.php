@extends('sabloni.app') 
@section('naziv', 'Modeli | Dodavanje modela čvrstog diska') 
@section('meni') 
@include('sabloni.inc.meni')
@endsection @section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Modeli čvrstih diskova - izmena"
                  src="{{url('/images/hdd.png')}}" style="height:64px;">
            &emsp;Izmena detalja modela čvrstog diska
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
            <a class="btn btn-primary" href="{{ route('hddovi.modeli') }}"
               title="Povratak na listu modela čvrstih diskova">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

        <div class="row ceo_dva">
            <div class="col-md-12 boxic">

                <form action="{{ route('hddovi.modeli.izmena.post', $hddovi->id) }}" method="POST" data-parsley-validate>
                    {{ csrf_field() }}

                    <div class="row">

                        <div class="col-md-3">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
                    <label for="naziv">Naziv:</label>
                    <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv', $hddovi->naziv) }}" maxlength="100">
                    @if ($errors->has('naziv'))
                        <span class="help-block">
                            <strong>{{ $errors->first('naziv') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('proizvodjac_id') ? ' has-error' : '' }}">
                    <label for="proizvodjac_id">Proizvođač:</label>
                    <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control" data-placeholder="proizvođač ..." required>
                        <option value=""></option>
                        @foreach($proizvodjaci as $proizvodjac)
                        <option value="{{ $proizvodjac->id }}"
                            {{ $proizvodjac->id == old('proizvodjac_id')   ? ' selected' : '' }}
                            {{ $hddovi->proizvodjac_id == $proizvodjac->id ? ' selected' : '' }}>
                            {{ $proizvodjac->naziv }}
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

                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('povezivanje_id') ? ' has-error' : '' }}">
                                <label for="povezivanje_id">Tip povezivanja:</label>
                                <select name="povezivanje_id" id="povezivanje_id" class="chosen-select form-control" data-placeholder="tipovi ..." required>
                                    <option value=""></option>
                                    @foreach($povezivanja as $t)
                                    <option value="{{ $t->id }}"
                                    {{ $t->id == old('povezivanje_id')   ? ' selected' : '' }}
                                    {{ $hddovi->povezivanje_id == $t->id ? ' selected' : '' }}>
                                    {{ $t->naziv }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('povezivanje_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('povezivanje_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('kapacitet') ? ' has-error' : '' }}">
                                <label for="kapacitet">Kapacitet u GB: </label>
                                <input type="number" name="kapacitet" id="kapacitet" class="form-control" value="{{ old('kapacitet', $hddovi->kapacitet) }}" required> @if ($errors->has('kapacitet'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kapacitet') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <hr> {{-- Red II --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group checkboxoviforme">
                                <label>
                                    <input type="checkbox" name="ssd" id="ssd" {!!$hddovi->ssd == 0 ? "" :'checked="checked"'!!}> &emsp;Da li se radi o Solid State Disk-u?
                                </label>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                                <label for="napomena">Napomena:</label>
                                <textarea name="napomena" id="napomena" class="form-control">{{ old('napomena', $hddovi->napomena) }}</textarea>
                                @if ($errors->has('napomena'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('napomena') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr> {{-- Red III --}}
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                <label for="link">Link modela čvrstog diska: </label>
                                <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $hddovi->link) }}" maxlenght="255"> @if ($errors->has('link'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('link') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                        <div class="col-md-2">

                            <div class="form-group{{ $errors->has('ocena') ? ' has-error' : '' }}">
                                <label for="ocena">Ocena: </label>
                                <input type="number" name="ocena" id="ocena" class="form-control" value="{{ old('ocena', $hddovi->ocena) }}" min="1" max="4" step="1" required> @if ($errors->has('ocena'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ocena') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                        <div class="col-md-3">
                            <h4>* Način ocenjivanja</h4>
                            <ul>
                                <li>1 - Star uređaj, loše performanse</li>
                                <li>2 - Star uređaj, dobre performanse</li>
                                <li>3 - Nov uređaj, loše performanse</li>
                                <li>4 - Nov uređaj, dobre performanse</li>
                            </ul>

                        </div>
                    </div>

                    <hr style="border-top: 1px solid #18BC9C">

                    <div class="row dugmici">
            <div class="col-md-6 col-md-offset-6">
            <div class="form-group text-right">
            <div class="col-md-6 snimi">
                <button type="submit" class="btn btn-success btn-block ono"><i class="fa fa-floppy-o"></i>&emsp;&emsp;Snimi izmene</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger btn-block ono" href="{{route('hddovi.modeli')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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

    $('.chosen-select').chosen({
        allow_single_deselect: true,
        search_contains: true
    });

    function resizeChosen() {
        $(".chosen-container").each(function () {
            $(this).attr('style', 'width: 100%');

        });
    };
});
</script>
@endsection