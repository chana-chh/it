@extends('sabloni.app')

@section('naziv', 'Modeli | Dodavanje modela napajanja')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Dodavanje modela napajanja"
                src="{{url('/images/napajanje.png')}}" style="height:64px;">
            &emsp;Dodavanje modela napajanja
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
            <a class="btn btn-primary" href="{{ route('napajanja.modeli') }}"
               title="Povratak na listu modela procesora">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
        
        <div class="row ceo_dva">
        <div class="col-md-12 boxic">
        <form action="{{ route('napajanja.modeli.dodavanje.post') }}" method="POST" data-parsley-validate>
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
                    <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control" data-placeholder="proizvođač ..." required>
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
                    <div class="form-group{{ $errors->has('snaga') ? ' has-error' : '' }}">
                    <label for="snaga">Snaga u W:</label>
                    <input type="text" name="snaga" id="snaga" class="form-control" value="{{ old('snaga') }}" maxlength="50">
                    @if ($errors->has('snaga'))
                        <span class="help-block">
                            <strong>{{ $errors->first('snaga') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

                            <div class="col-md-4">
                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
            <label for="link">Link modela napajanja: </label>
            <input type="url" name="link" id="link" class="form-control" value="{{ old('link') }}" maxlenght="255">
            @if ($errors->has('link'))
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
                <a class="btn btn-danger btn-block ono" href="{{route('napajanja.modeli')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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

    $('.chosen-select').chosen({allow_single_deselect: true, search_contains: true});

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };
   });

</script>
@endsection