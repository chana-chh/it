@extends('sabloni.app')

@section('naziv', 'Šifarnici | Telefoni')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Fiksna telefonija"
                  src="{{ url('/images/telefon.png') }}" style="height:64px;">
            &emsp;Dodavanje broja fiksne telefonije
        </h1>
    </div>

    <div class="col-md-4 text-right" style="padding-top: 50px;">
        <div class="btn-group" >
            <a class="btn btn-primary" onclick="window.history.back();"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
        </div>
</div>
</div>
<hr>
<div class="well">
    <form action="{{ route('telefoni.dodavanje') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <div class="form-group {{ $errors->has('broj') ? ' has-error' : '' }}">
            <label for="broj" class="uvecano">Broj: </label>
            <input  type="text" name="broj" id="broj" class="form-control uvecano" value="{{ old('broj') }}" required>
            @if ($errors->has('broj'))
            <span class="help-block">
                <strong>{{ $errors->first('broj') }}</strong>
            </span>
            @endif
        </div>
        </div>
        </div>

        <div class="row" style="font-size: 2rem; margin-top: 1rem">
        <div class="col-md-8 col-md-offset-2">
        <div class="form-group uvecano {{ $errors->has('vrsta') ? ' has-error' : '' }}">
            <label for="vrsta">Vrsta:</label>
                <select name="vrsta" id="vrsta" class="chosen-select form-control" data-placeholder="izbor vrsta ..." required>
                <option value=""></option>
                  <option value="1">Direktni</option>
                  <option value="2">Lokal</option>
                  <option value="3">Fax</option>
                </select>
                @if ($errors->has('vrsta'))
                    <span class="help-block">
                        <strong>{{ $errors->first('vrsta') }}</strong>
                    </span>
                @endif
        </div>
    </div>
</div>
        
        <div class="row" style="font-size: 2rem; margin-top: 1rem">
        <div class="col-md-8 col-md-offset-2">
        <div class="form-group uvecano {{ $errors->has('kancelarija_id') ? ' has-error' : '' }}">
                    <label for="kancelarija_id">Kancelarija:</label>
                    <select name="kancelarija_id" id="kancelarija_id" class="chosen-select form-control" data-placeholder="izbor kancelarija ..." required>
                        <option value=""></option>
                        @foreach($kancelarije as $kancelarija)
                        <option value="{{ $kancelarija->id }}"{{ old('kancelarija_id') == $kancelarija->id ? ' selected' : '' }}>
                            {{ $kancelarija->naziv }}, {{$kancelarija->lokacija->naziv}}, {{$kancelarija->sprat->naziv}}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('kancelarija_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kancelarija_id') }}</strong>
                        </span>
                    @endif
        </div>
    </div>
</div>
        
        <div class="row" style="font-size: 2rem; margin-top: 1rem">
        <div class="col-md-8 col-md-offset-2">
        <div class="form-group uvecano {{ $errors->has('napomena') ? ' has-error' : '' }}">
                    <label for="napomena">Napomena:</label>
                    <textarea name="napomena" id="napomena" class="form-control uvecano">{{ old('napomena') }}</textarea>
                    @if ($errors->has('napomena'))
                        <span class="help-block">
                            <strong>{{ $errors->first('napomena') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

            <div class="row dugmici">
            <div class="col-md-6 col-md-offset-6" style="margin-top: 20px;">
            <div class="form-group">
            <div class="col-md-6 snimi">
                <button type="submit" class="btn btn-success btn-block ono btn-lg"><i class="fa fa-plus-circle"></i>&emsp;Dodaj</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger btn-block ono btn-lg" href="{{route('telefoni')}}"><i class="fa fa-ban"></i>&emsp;Otkaži</a>
            </div>
            </div>
            </div>
            </div>

    </form>
</div>
@endsection

@section('skripte')
<script>
    $(document).ready(function () {

    resizeChosen();
    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({allow_single_deselect: true, search_contains: true});

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };

   $(".chosen-container-single .chosen-drop").addClass("uvecano");
   $(".chosen-container").addClass("uvecano");

    $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('telefoni.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });

    });
</script>
@endsection















































































