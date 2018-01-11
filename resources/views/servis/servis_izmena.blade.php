@extends('sabloni.app')

@section('naziv', 'Servis | Izmena podataka o servisu')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Izmena podataka o servisu"
                 src="{{url('/images/kvar.png')}}" style="height:64px;">
            &emsp;Izmena podataka o servisu
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
            <a class="btn btn-primary" href="{{ route('servis') }}"
               title="Povratak na listu prijavljenih kvarova">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form action="{{ route('servis.izmena.post', $data->id) }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('vrsta_uredjaja_id') ? ' has-error' : '' }}">
                        <label for="vrsta_uredjaja_id">Vrsta uređaja:</label>
                        <select name="vrsta_uredjaja_id" id="vrsta_uredjaja_id" class="chosen-select form-control" data-placeholder="vrste uređaja ..." >
                            <option value=""></option>
                            @foreach($vrste_uredjaja as $u)
                                <option value="{{ $u->id }}"
                                    {{ $u->id == old('vrsta_uredjaja_id') ? ' selected' : '' }}
                                    {{ $data->vrsta_uredjaja_id == $u->id ? ' selected' : '' }}>
                                    {{$u->naziv}}
                            </option>
                            @endforeach
                    </select>
                    @if ($errors->has('vrsta_uredjaja_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('vrsta_uredjaja_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('uredjaj_id') ? ' has-error' : '' }}">
                        <label for="uredjaj_id">Uređaj:</label>
                        <select name="uredjaj_id" id="uredjaj_id" class="chosen-select form-control" data-placeholder="uređaji ..." >
                            <option value=""></option>
                            @if($uredjaji)
                            @foreach($uredjaji as $d)
                                <option value="{{ $d->id }}"
                                    {{ $d->id == old('uredjaj_id') ? ' selected' : '' }}
                                    {{ $data->uredjaj_id == $d->id ? ' selected' : '' }}>
                                    {{$d->id}}
                            </option>
                            @endforeach
                            @endif
                    </select>
                    @if ($errors->has('uredjaj_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('uredjaj_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            </div>

            <div class="row">

                <div class="col-md-4">
    <div class="form-group{{ $errors->has('datum_prijema') ? ' has-error' : '' }}">
        <label for="datum_prijema">Datum prijema:</label>
        <input type="date" name="datum_prijema" id="datum_prijema" class="form-control"
                       value="{{ old('datum_prijema', $data->datum_prijema) }}">
                @if ($errors->has('datum_prijema'))
        <span class="help-block">
            <strong>{{ $errors->first('datum_prijema') }}</strong>
        </span>
        @endif
    </div>
</div>

               <div class="col-md-4">
    <div class="form-group{{ $errors->has('datum_popravke') ? ' has-error' : '' }}">
        <label for="datum_popravke">Datum popravke:</label>
         <input type="date" name="datum_popravke" id="datum_popravke" class="form-control"
                       value="{{ old('datum_popravke', $data->datum_popravke) }}">
                @if ($errors->has('datum_popravke'))
        <span class="help-block">
            <strong>{{ $errors->first('datum_popravke') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="col-md-4">
    <div class="form-group{{ $errors->has('datum_isporuke') ? ' has-error' : '' }}">
        <label for="datum_isporuke">Datum isporuke:</label>
       <input type="date" name="datum_isporuke" id="datum_isporuke" class="form-control"
                       value="{{ old('datum_isporuke', $data->datum_isporuke) }}">
                @if ($errors->has('datum_isporuke'))
        <span class="help-block">
            <strong>{{ $errors->first('datum_isporuke') }}</strong>
        </span>
        @endif
    </div>
</div>
    </div>
    {{-- Red II --}}
    <div class="row">
            <div class="col-md-6">
        <div class="form-group{{ $errors->has('opis_kvara_servis') ? ' has-error' : '' }}">
            <label for="opis_kvara_servis">Opis kvara servisera:</label>
            <textarea name="opis_kvara_servis" id="opis_kvara_servis" class="form-control">{{ old('opis_kvara_servis', $data->opis_kvara_servis) }}</textarea>
            @if ($errors->has('opis_kvara_servis'))
            <span class="help-block">
                <strong>{{ $errors->first('opis_kvara_servis') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
            <label for="napomena">Napomena:</label>
            <textarea name="napomena" id="napomena" class="form-control">{{ old('napomena', $data->napomena) }}</textarea>
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
                <button type="submit" class="btn btn-success btn-block ono"><i class="fa fa-floppy-o"></i>&emsp;&emsp;Snimi izmene</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger btn-block ono" href="{{route('servis')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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

        $("#vrsta_uredjaja_id").on('change', function () {
            var id = $(this).value;
            $.ajax({
            url: ruta,
            type:"POST", 
            data: {"id":id, _token: "{!! csrf_token() !!}"}, 
            success: function(){
            location.reload(); 
          }
        });
        });



    });

</script>
@endsection
