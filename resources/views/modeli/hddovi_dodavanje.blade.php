@extends('sabloni.app') 
@section('naziv', 'Modeli | Dodavanje modela čvrstog diska') 
@section('meni') 
@include('sabloni.inc.meni')
@endsection @section('naslov')

<div class="row ceo_dva">
    <div class="col-md-10 col-md-offset-1 boxic">

        <h1 class="page-header">
            <span>
                <img class="slicica_animirana" alt="Modeli čvrstih diskova - dodavanje" src="{{url('/images/hdd.png')}}" style="height:64px;">
            </span>&emsp;Dodavanje modela čvrstog diska</h1>

        <form action="{{ route('hddovi.modeli.dodavanje.post') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('proizvodjac_id') ? ' has-error' : '' }}">
                        <label for="proizvodjac_id">Proizvođač:</label>
                        <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control" data-placeholder="proizvodjaci ..."
                            required>
                            <option value=""></option>
                            @foreach($proizvodjaci as $proizvodjac)
                            <option value="{{ $proizvodjac->id }}" {{ old( 'proizvodjac_id')==$ proizvodjac->id ? ' selected' : '' }}> {{ $proizvodjac->naziv }}
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
                            <option value="{{ $t->id }}" {{ old( 'povezivanje_id')==$ t->id ? ' selected' : '' }}> {{ $t->naziv }}
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
                        <input type="number" name="kapacitet" id="kapacitet" class="form-control" value="{{ old('kapacitet') }}" required> @if ($errors->has('kapacitet'))
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
                            <input type="checkbox" name="ssd" id="ssd"> &emsp;Da li se radi o Solid State Disk-u?
                        </label>
                    </div>
                </div>

                <div class="col-md-8">
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
            <hr> {{-- Red III --}}
            <div class="row">
                <div class="col-md-7">
                    <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                        <label for="link">Link modela procesora: </label>
                        <input type="url" name="link" id="link" class="form-control" value="{{ old('link') }}" maxlenght="255"> @if ($errors->has('link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('link') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>

                <div class="col-md-2">

                    <div class="form-group{{ $errors->has('ocena') ? ' has-error' : '' }}">
                        <label for="ocena">Ocena: </label>
                        <input type="number" name="ocena" id="ocena" class="form-control" value="{{ old('ocena') }}" min="1" max="4" step="1" required> @if ($errors->has('ocena'))
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
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-plus-circle"></i>&emsp;&emsp;Dodaj</button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-danger btn-block ono" href="{{route('hddovi.modeli')}}">
                                <i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <div class="row dugmici">
        <div class="col-md-10 col-md-offset-1" style="margin-top: 20px">
            <div class="form-group">
                <div class="col-md-6 text-left">
                    <a class="btn btn-info" href="{{route('hddovi.modeli')}}" title="Povratak na listu modela čvrstih diskova">
                        <i class="fa fa-list" style="color:#2C3E50"></i>
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-info" href="{{route('pocetna')}}" title="Povratak na početnu stranu">
                        <i class="fa fa-home" style="color:#2C3E50"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('skripte')
<script>
$(document).ready(function () {

    resizeChosen();
    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({
        allow_single_deselect: true
    });

    function resizeChosen() {
        $(".chosen-container").each(function () {
            $(this).attr('style', 'width: 100%');

        });
    };
});
</script>
@endsection