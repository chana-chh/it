@extends('sabloni.app')

@section('naziv', 'Korisnici | Pregled')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Korisnik detalj" src="{{url('/images/korisnik_jedan.png')}}" style="height:50px;">
    Detaljni pregled korisnika &emsp;
    <em class="text-success">{{$korisnik->name}}</em>
</h1>
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
            <a class="btn btn-primary" href="{{ route('korisnici') }}"
               title="Povratak na listu korisnika">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

<form action="{{ route('korisnici.izmena',  $korisnik->id) }}" method="POST" data-parsley-validate>
    {{ csrf_field() }}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Ime i prezime: </label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $korisnik->name) }}" maxlength="255" required>
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username">Korisničko ime: </label>
                <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $korisnik->username) }}" maxlength="190" required>
                @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Lozinka: </label>
                <input type="password" name="password" id="password" class="form-control">
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm">Potvrda lozinke: </label>
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control">
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">
                <label for="role_id">Uloga korisnika</label>
                <select id="role_id" name="role_id"
                        class="chosen-select form-control"
                        data-placeholder="Uloga korisnika ..." required>
                    <option value=""></option>
                    @foreach($uloge as $uloga)
                    <option value="{{ $uloga->id }}" {{ old('role_id', $korisnik->role->id) == $uloga->id ? 'selected' : '' }}>
                            {{ $uloga->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('role_id') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>

    <div class="row dugmici">
        <div class="col-md-6 col-md-offset-6">
            <div class="form-group text-right">
                <div class="col-md-6 snimi">
                    <button type="submit" class="btn btn-success btn-block ono">
                        <i class="fa fa-floppy-o"></i>&emsp;Snimi</button>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger btn-block ono" href="{{route('korisnici')}}">
                        <i class="fa fa-ban"></i>&emsp;Otkaži</a>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

@section('skripte')
<script>
    $(document).ready(function () {
        jQuery(window).on('resize', resizeChosen);

        $('.chosen-select').chosen({
            allow_single_deselect: true,
            search_contains: true
        });

        function resizeChosen() {
            $(".chosen-container").each(function () {
                $(this).attr('style', 'width: 100%');
            });
        }

    });
</script>
@endsection
