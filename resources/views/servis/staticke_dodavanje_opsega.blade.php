@extends('sabloni.app')

@section('naziv', 'Servis | Dodavanje opsega statičkih adresa')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Dodavanje opsega statičkih adresa"
                src="{{url('/images/ip.png')}}" style="height:128px;">
            &emsp;Dodavanje opsega statičkih adresa
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
            <a class="btn btn-primary" href="{{ route('staticke.slobodne') }}"
               title="Povratak na listu slobodnih statičkih adresa">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
        
        <div class="row ceo_dva">
        <div class="col-md-12 boxic">
        <form action="{{ route('staticke.opseg.post') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="row">

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('ip_pocetak') ? ' has-error' : '' }}">
                    <label for="ip_pocetak">Početak IP opsega:</label>
                    <input type="text" name="ip_pocetak" id="ip_pocetak" class="form-control" value="{{ old('ip_pocetak') }}" maxlength="15" required>
                    @if ($errors->has('ip_pocetak'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ip_pocetak') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group{{ $errors->has('ip_kraj') ? ' has-error' : '' }}">
                    <label for="ip_kraj">Kraj IP opsega:</label>
                    <input type="text" name="ip_kraj" id="ip_kraj" class="form-control" value="{{ old('ip_kraj') }}" maxlength="15" required>
                    @if ($errors->has('ip_kraj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ip_kraj') }}</strong>
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
                <a class="btn btn-danger btn-block ono" href="{{route('staticke.slobodne')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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

</script>
@endsection