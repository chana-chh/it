@extends('sabloni.app')

@section('naziv', 'Imenik | Prijava nepotpunih ili neispravnih podataka')

@section('naslov')
<div class="row">
    <div class="col-md-6">
        <h2>
            <img class="slicica_animirana" alt="Kontakt forma" src="{{ url('/images/email.png') }}" style="height:64px;">&emsp;Prijava nepotpunih ili neispravnih podataka
        </h2>
    </div>

    <div class="col-md-6 text-right" style="padding-top: 50px;">
        <div class="btn-group">
            <a class="btn btn-primary" onclick="window.history.back();"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('imenik') }}"
                title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
        </div>
    </div>
</div>
<hr>
<div class="row ceo_dva" id="formaPrijava">
    <div class="col-md-8 col-md-offset-2 boxic">
        <form action="{{ route('forma.post') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('ime') ? ' has-error' : '' }}">
                    <label for="ime">Ime i prezime:</label>
                    <input type="text" name="ime" id="ime" class="form-control" value="{{ old('ime') }}" maxlength="50" required> 
                    @if ($errors->has('ime'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ime') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email adresa:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required> 
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('tema') ? ' has-error' : '' }}">
                    <label for="tema">Naslov:</label>
                    <input type="text" name="tema" id="tema" class="form-control" value="{{ old('tema') }}"> 
                    @if ($errors->has('tema'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tema') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="form-group{{ $errors->has('sadrzaj') ? ' has-error' : '' }}">
                    <label for="sadrzaj">Sadržaj:</label>
                    <textarea name="sadrzaj" id="sadrzaj" class="form-control" value="{{ old('sadrzaj') }}" required></textarea>
                    @if ($errors->has('sadrzaj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sadrzaj') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            </div>
            <hr>
            <div class="row dugmici">
                <div class="col-md-6 col-md-offset-6">
                    <div class="form-group text-right">
                        <div class="col-md-6 snimi">
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-paper-plane-o"></i> Pošalji</button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-danger btn-block ono" href="{{route('imenik')}}">
                                <i class="fa fa-ban"></i> Otkaži</a>
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

$('.prijava').popover({
            placement: 'top',
            trigger: 'hover'
        });

});
</script>
@endsection