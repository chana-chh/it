@extends('sabloni.app')

@section('naziv', 'Šifarnici | Izmena podataka o dobavljaču')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Izmena podataka o dobavljaču"
                src="{{url('/images/kamion.png')}}" style="height:64px;">
            &emsp;Izmena podataka o dobavljaču
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
            <a class="btn btn-primary" href="{{ route('dobavljaci') }}"
               title="Povratak na listu dobavljača">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
        
<div class="row ceo_dva">
    <div class="col-md-12 boxic">

        <form action="{{ route('dobavljaci.izmena.post', $model->id) }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
                        <label for="naziv">Naziv:</label>
                        <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv', $model->naziv) }}" maxlength="190"
                            required> @if ($errors->has('naziv'))
                        <span class="help-block">
                            <strong>{{ $errors->first('naziv') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('adresa_mesto') ? ' has-error' : '' }}">
                        <label for="adresa_mesto">Adresa - mesto: </label>
                        <input type="text" name="adresa_mesto" id="adresa_mesto" class="form-control" value="{{ old('adresa_mesto', $model->adresa_mesto) }}"
                            maxlength="50"> @if ($errors->has('adresa_mesto'))
                        <span class="help-block">
                            <strong>{{ $errors->first('adresa_mesto') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <hr> {{-- Red II --}}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('adresa_ulica') ? ' has-error' : '' }}">
                        <label for="adresa_ulica">Adresa - ulica: </label>
                        <input type="text" name="adresa_ulica" id="adresa_ulica" class="form-control" value="{{ old('adresa_ulica', $model->adresa_ulica) }}"
                            maxlength="100"> @if ($errors->has('adresa_ulica'))
                        <span class="help-block">
                            <strong>{{ $errors->first('adresa_ulica') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('adresa_broj') ? ' has-error' : '' }}">
                        <label for="adresa_broj">Adresa - broj: </label>
                        <input type="text" name="adresa_broj" id="adresa_broj" class="form-control" value="{{ old('adresa_broj', $model->adresa_broj) }}"
                            maxlength="50"> @if ($errors->has('adresa_broj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('adresa_broj') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $model->email) }}"> @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

            </div>

            <hr> {{-- Red III --}}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('telefon') ? ' has-error' : '' }}">
                        <label for="telefon">Broj telefona: </label>
                        <input type="text" name="telefon" id="telefon" class="form-control" value="{{ old('telefon', $model->telefon) }}"> @if ($errors->has('telefon'))
                        <span class="help-block">
                            <strong>{{ $errors->first('telefon') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                        <label for="link">Link: </label>
                        <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $model->link) }}" maxlenght="255"> @if ($errors->has('link'))
                        <span class="help-block">
                            <strong>{{ $errors->first('link') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                        <label for="napomena">Napomena: </label>
                        <textarea name="napomena" id="napomena" maxlength="255" class="form-control">{{ old('napomena', $model->napomena) }}</textarea>
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
                            <a class="btn btn-danger btn-block ono" href="{{route('dobavljaci')}}">
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