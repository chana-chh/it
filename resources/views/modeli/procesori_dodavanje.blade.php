@extends('sabloni.app')

@section('naziv', 'Modeli | Modeli procesora')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
        
        <div class="row ceo_dva">
        <div class="col-md-10 col-md-offset-1 boxic">

        <h1 class="page-header"><span><img class="slicica_animirana" alt="korisnici" src="{{url('/images/cpu.png')}}" style="height:64px;"></span>&emsp;Dodavanje modela procesora</h1>

        <form action="{{ route('procesori.modeli.dodavanje.post') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="row">

            <div class="col-md-6">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
                    <label for="naziv">Naziv:</label>
                    <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv') }}" maxlength="50">
                    @if ($errors->has('naziv'))
                        <span class="help-block">
                            <strong>{{ $errors->first('naziv') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

                <div class="col-md-6">
                   <div class="form-group{{ $errors->has('proizvodjac_id') ? ' has-error' : '' }}">
                    <label for="proizvodjac_id">Proizvođač:</label>
                    <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control" data-placeholder="proizvodjac ..." required>
                        <option value=""></option>
                        @foreach($proizvodjaci as $proizvodjac)
                        <option value="{{ $proizvodjac->id }}"{{ old('proizvodjac_id') == $proizvodjac->id ? ' selected' : '' }}>
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
        </div>

        <hr>
        {{-- Red II --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('soket_id') ? ' has-error' : '' }}">
                    <label for="soket_id">Soket:</label>
                    <select name="soket_id" id="soket_id" class="chosen-select form-control" data-placeholder="soket ..." required>
                        <option value=""></option>
                        @foreach($soketi as $soket)
                        <option value="{{ $soket->id }}"{{ old('soket_id') == $soket->id ? ' selected' : '' }}>
                            {{ $soket->naziv }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('soket_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('soket_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">

                <div class="form-group{{ $errors->has('takt') ? ' has-error' : '' }}">
            <label for="takt">Takt u MHz: </label>
            <input  type="number" name="takt" id="takt" class="form-control" value="{{ old('takt') }}"
                    min="1000"  step="100" required>
            @if ($errors->has('takt'))
            <span class="help-block">
                <strong>{{ $errors->first('takt') }}</strong>
            </span>
            @endif
            </div>

            </div>

            <div class="col-md-4">
                    <div class="form-group{{ $errors->has('kes') ? ' has-error' : '' }}">
                    <label for="kes">Keš u MB:</label>
                    <input type="text" name="kes" id="kes" class="form-control" value="{{ old('kes') }}" maxlength="50">
                    @if ($errors->has('kes'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kes') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

        </div>

        <hr>

        <div class="row">
            <div class="col-md-3">
                    <div class="form-group{{ $errors->has('broj_jezgara') ? ' has-error' : '' }}">
                    <label for="broj_jezgara">Broj jezgara:</label>
                    <input type="number" name="broj_jezgara" id="broj_jezgara" class="form-control" value="{{ old('broj_jezgara') }}" maxlength="50">
                    @if ($errors->has('broj_jezgara'))
                        <span class="help-block">
                            <strong>{{ $errors->first('broj_jezgara') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('broj_niti') ? ' has-error' : '' }}">
                    <label for="broj_niti">Broj niti:</label>
                    <input type="number" name="broj_niti" id="broj_niti" class="form-control" value="{{ old('broj_niti') }}" maxlength="50">
                    @if ($errors->has('broj_niti'))
                        <span class="help-block">
                            <strong>{{ $errors->first('broj_niti') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

            <div class="col-md-6">
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

        <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
            <label for="link">Link modela procesora: </label>
            <input type="url" name="link" id="link" class="form-control" value="{{ old('link') }}" maxlenght="255">
            @if ($errors->has('link'))
                <span class="help-block">
                    <strong>{{ $errors->first('link') }}</strong>
                </span>
            @endif
        </div>

            </div>
        </div>

           <div class="row dugmici">
            <div class="col-md-6 col-md-offset-6">
            <div class="form-group text-right">
            <div class="col-md-6 snimi">
                <button type="submit" class="btn btn-success btn-block ono"><i class="fa fa-plus-circle"></i> Dodaj</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger btn-block ono" href="{{route('procesori.modeli')}}"><i class="fa fa-ban"></i> Otkaži</a>
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
                <a class="btn btn-info" href="{{route('procesori.modeli')}}" title="Povratak na listu modela procesora"><i class="fa fa-laptop" style="color:#2C3E50"></i></a>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-info" href="{{route('pocetna')}}" title="Povratak na početnu stranu"><i class="fa fa-home" style="color:#2C3E50"></i></a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {
    
    resizeChosen();
    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({allow_single_deselect: true});

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };
   });

</script>
<script src="{{ asset('/js/parsley.js') }}"></script>
<script src="{{ asset('/js/parsley_sr.js') }}"></script>
@endsection