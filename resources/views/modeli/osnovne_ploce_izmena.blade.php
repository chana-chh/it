@extends('sabloni.app')

@section('naziv', 'Modeli | Izmena modela osnovne ploče')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
        
        <div class="row ceo_dva">
        <div class="col-md-10 col-md-offset-1 boxic">

        <h1 class="page-header"><span><img class="slicica_animirana" alt="Modeli osnovnih ploča izmena" src="{{url('/images/mbd.png')}}" style="height:64px;"></span>&emsp;Izmena modela osnovne ploče</h1>

        <form action="{{ route('osnovne_ploce.modeli.izmena.post', $osnovna_ploca->id) }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="row">
            <div class="col-md-4">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
                    <label for="naziv">Naziv:</label>
                    <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv', $osnovna_ploca->naziv) }}" maxlength="50" required>
                    @if ($errors->has('naziv'))
                        <span class="help-block">
                            <strong>{{ $errors->first('naziv') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group{{ $errors->has('cipset') ? ' has-error' : '' }}">
            <label for="cipset">Čipset: </label>
            <input type="text" name="cipset" id="cipset" class="form-control" value="{{ old('cipset', $osnovna_ploca->cipset) }}" maxlength="255" required>
            @if ($errors->has('cipset'))
            <span class="help-block">
                <strong>{{ $errors->first('cipset') }}</strong>
            </span>
            @endif
            </div>
            </div>

                <div class="col-md-4">
                  <div class="form-group{{ $errors->has('proizvodjac_id') ? ' has-error' : '' }}">
                    <label for="proizvodjac_id">Proizvođač:</label>
                    <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control" data-placeholder="proizvođač ..." required>
                        <option value=""></option>
                        @foreach($proizvodjaci as $proizvodjac)
                        <option value="{{ $proizvodjac->id }}"
                            {{ $proizvodjac->id == old('proizvodjac_id')   ? ' selected' : '' }}
                            {{ $osnovna_ploca->proizvodjac_id == $proizvodjac->id ? ' selected' : '' }}>
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
            <div class="col-md-6">
            <div class="form-group{{ $errors->has('soket_id') ? ' has-error' : '' }}">
                    <label for="soket_id">Soket:</label>
                    <select name="soket_id" id="soket_id" class="chosen-select form-control" data-placeholder="soket ..." required>
                        <option value=""></option>
                        @foreach($soketi as $soket)
                        <option value="{{ $soket->id }}"
                            {{ $soket->id == old('soket_id')   ? ' selected' : '' }}
                            {{ $osnovna_ploca->soket_id == $soket->id ? ' selected' : '' }}>
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

            <div class="col-md-6">
                  <div class="form-group{{ $errors->has('tip_memorije_id') ? ' has-error' : '' }}">
                    <label for="tip_memorije_id">Tip memorije:</label>
                    <select name="tip_memorije_id" id="tip_memorije_id" class="chosen-select form-control" data-placeholder="tipovi ..." required>
                        <option value=""></option>
                        @foreach($tip as $t)
                        <option value="{{ $t->id }}"
                            {{ $t->id == old('tip_memorije_id')   ? ' selected' : '' }}
                            {{ $osnovna_ploca->tip_memorije_id == $t->id ? ' selected' : '' }}>
                            {{ $t->naziv }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('tip_memorije_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tip_memorije_id') }}</strong>
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
                <input type="checkbox" name="usb_tri" id="usb_tri" {!!$osnovna_ploca->usb_tri == 0 ? "" :'checked="checked"'!!}>
                &emsp;Da li osnovna ploča ima makra jedan USB 3.0 port?
            </label>
        </div>
    </div>

        <div class="col-md-3">
        <div class="form-group checkboxoviforme">
            <label>
                <input type="checkbox" name="integrisana_grafika" id="integrisana_grafika" {!!$osnovna_ploca->integrisana_grafika == 0 ? "" :'checked="checked"'!!}>
                &emsp;Da li osnovna ploča ima integrisan grafički adapter?
            </label>
        </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                    <label for="napomena">Napomena:</label>
                    <textarea name="napomena" id="napomena" class="form-control">{{ old('napomena', $osnovna_ploca->napomena) }}</textarea>
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
            <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $osnovna_ploca->link) }}" maxlenght="255">
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
            <input  type="number" name="ocena" id="ocena" class="form-control" value="{{ old('ocena', $osnovna_ploca->ocena) }}"
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
                <a class="btn btn-danger btn-block ono" href="{{route('osnovne_ploce.modeli')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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