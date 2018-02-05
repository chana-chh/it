@extends('sabloni.app')

@section('naziv', 'Modeli | Izmena modela procesora')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Izmena podataka modela procesora"
                 src="{{url('/images/cpu_add.png')}}" style="height:64px;">
            &emsp;Izmena podataka modela procesora
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
            <a class="btn btn-primary" href="{{ route('procesori.modeli') }}"
               title="Povratak na listu modela procesora">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
        
        <div class="row ceo_dva">
        <div class="col-md-12 boxic">

        <form action="{{ route('procesori.modeli.izmena.post', $procesor->id) }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="row">

            <div class="col-md-6">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
                    <label for="naziv">Naziv:</label>
                    <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv', $procesor->naziv) }}" maxlength="50">
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
                    <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control" data-placeholder="proizvođač ..." required>
                        <option value=""></option>
                        @foreach($proizvodjaci as $proizvodjac)
                        <option value="{{ $proizvodjac->id }}"
                            {{ $proizvodjac->id == old('proizvodjac_id')   ? ' selected' : '' }}
                            {{ $procesor->proizvodjac_id == $proizvodjac->id ? ' selected' : '' }}>
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
                        <option value="{{ $soket->id }}"
                            {{ $soket->id == old('soket_id')   ? ' selected' : '' }}
                            {{ $procesor->soket_id == $soket->id ? ' selected' : '' }}>
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
            <input  type="number" name="takt" id="takt" class="form-control" value="{{ old('takt', $procesor->takt) }}"
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
                    <input type="text" name="kes" id="kes" class="form-control" value="{{ old('kes', $procesor->kes) }}" maxlength="50">
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
                    <input type="number" name="broj_jezgara" id="broj_jezgara" class="form-control" value="{{ old('broj_jezgara', $procesor->broj_jezgara) }}">
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
                    <input type="number" name="broj_niti" id="broj_niti" class="form-control" value="{{ old('broj_niti', $procesor->broj_niti) }}">
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
                    <textarea name="napomena" id="napomena" class="form-control">{{ old('napomena', $procesor->napomena) }}</textarea>
                    @if ($errors->has('napomena'))
                        <span class="help-block">
                            <strong>{{ $errors->first('napomena') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
            <label for="link">Link modela procesora: </label>
            <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $procesor->link) }}" maxlenght="255">
            @if ($errors->has('link'))
                <span class="help-block">
                    <strong>{{ $errors->first('link') }}</strong>
                </span>
            @endif
        </div>

            </div>

            <div class="col-md-2">

                <div class="form-group{{ $errors->has('ocena') ? ' has-error' : '' }}">
            <label for="ocena">Ocena: </label>
            <input  type="number" name="ocena" id="ocena" class="form-control" value="{{ old('ocena', $procesor->ocena) }}"
                    min="1"  max="4" step="1" required>
            @if ($errors->has('ocena'))
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
                <a class="btn btn-danger btn-block ono" href="{{route('procesori.modeli')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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
@endsection