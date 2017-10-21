@extends('sabloni.app')

@section('naziv', 'Sifarnici | Zaposleni izmena')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
        
        <div class="row ceo_dva">
        <div class="col-md-10 col-md-offset-1 boxic">

        <h1 class="page-header"><span><img class="slicica_animirana" alt="korisnici" src="{{url('/images/korisnik_edit.png')}}" style="height:64px;"></span>&emsp;Izmena osnovnih podataka o zaposlenom<i>&emsp;{{ $zaposleni->imePrezime() }}</i></h1>

        <form action="{{ route('zaposleni.izmena.post', $zaposleni->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        {{ csrf_field() }}

        <div class="row">

            <div class="col-md-6">
                    <div class="form-group{{ $errors->has('ime') ? ' has-error' : '' }}">
                    <label for="ime">Ime:</label>
                    <input type="text" name="ime" id="ime" class="form-control" value="{{ old('ime', $zaposleni->ime) }}" maxlength="50">
                    @if ($errors->has('ime'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ime') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('prezime') ? ' has-error' : '' }}">
                    <label for="prezime">Prezime:</label>
                    <input type="text" name="prezime" id="prezime" class="form-control"  value="{{ old('prezime', $zaposleni->prezime) }}" maxlength="100" required>
                    @if ($errors->has('prezime'))
                        <span class="help-block">
                            <strong>{{ $errors->first('prezime') }}</strong>
                        </span>
                    @endif
                </div>
                </div>
        </div>

        <hr>
        {{-- Red sa upravom --}}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('uprava_id') ? ' has-error' : '' }}">
                    <label for="uprava_id">Uprava:</label>
                    <select name="uprava_id" id="uprava_id" class="chosen-select form-control" data-placeholder="uprava ..." required>
                        <option value=""></option>
                        @foreach($uprave as $uprava)
                        <option value="{{ $uprava->id }}"
                            {{ $uprava->id == old('uprava_id')   ? ' selected' : '' }}
                            {{ $zaposleni->uprava_id == $uprava->id ? ' selected' : '' }}>
                            {{ $uprava->naziv }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('uprava_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('uprava_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group{{ $errors->has('kancelarija_id') ? ' has-error' : '' }}">
                    <label for="kancelarija_id">Kancelarija:</label>
                    <select name="kancelarija_id" id="kancelarija_id" class="chosen-select form-control" data-placeholder="kancelarija ..." required>
                        <option value=""></option>
                        @foreach($kancelarije as $kancelarija)
                        <option value="{{ $kancelarija->id }}"
                            {{ old('kancelarija_id') == $kancelarija->id ? ' selected' : '' }}
                            {{ $zaposleni->kancelarija_id == $kancelarija->id ? ' selected' : '' }}>
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

        <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                    <label for="napomena">Napomena:</label>
                    <textarea name="napomena" id="napomena" class="form-control">{{ old('napomena', $zaposleni->napomena) }}</textarea>
                    @if ($errors->has('napomena'))
                        <span class="help-block">
                            <strong>{{ $errors->first('napomena') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-md-6 text-center">
                <img src="{{asset('images/slike_zaposlenih/'.$zaposleni->src)}}" class="img-rounded" style="max-height: 120px" alt="Slika zaposlenog">
                <hr>
                <label for="slika" style="margin: 20px 20px;" class="btn btn-default ono">Izmeni fotografiju zaposlenog&emsp;<i class="fa fa-upload" aria-hidden="true"></i></label>
                <input type="file" style="display:none" name="slika" id="slika" />
            </div>
        </div>
           <div class="row dugmici">
            <div class="col-md-6 col-md-offset-6">
            <div class="form-group text-right">
            <div class="col-md-6 snimi">
                <button type="submit" class="btn btn-success btn-block ono"><i class="fa fa-floppy-o"></i>&emsp;Snimi</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger btn-block ono" href="{{route('zaposleni')}}"><i class="fa fa-ban"></i>&emsp;Otkaži</a>
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
                <a class="btn btn-info" href="{{route('zaposleni')}}" title="Povratak na listu zaposlenih"><i class="fa fa-users" style="color:#2C3E50"></i></a>
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
@endsection