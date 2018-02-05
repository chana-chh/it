@extends('sabloni.app')

@section('naziv', 'Servis | Dodavanje uređaja na kome je detektovan kvar')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="kvar"
                 src="{{url('/images/kvar.png')}}" style="height:64px;">
            &emsp;Dodavanje uređaja na kome je detektovan kvar
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
        <form action="{{ route('servis.izmena.post', $servis->id) }}" method="POST" data-parsley-validate>
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
                                    {{ $servis->vrsta_uredjaja_id == $u->id ? ' selected' : '' }}>
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
        </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('uredjaj_id') ? ' has-error' : '' }}">
                        <label for="uredjaj_id">Uređaj:</label>
                        <select name="uredjaj_id" id="uredjaj_id" class="chosen-select form-control" data-placeholder="uređaji ..." >
                            <option value=""></option>
                            @if($servis->vrsta_uredjaja_id == 1 || $servis->vrsta_uredjaja_id == 2 || $servis->vrsta_uredjaja_id == 3 || $servis->vrsta_uredjaja_id == 4
                                || $servis->vrsta_uredjaja_id == 5 || $servis->vrsta_uredjaja_id == 12 || $servis->vrsta_uredjaja_id == 13)
                            @if($uredjaji)
                            @foreach($uredjaji as $d)
                                <option value="{{ $d->id }}"
                                    {{ $d->id == old('uredjaj_id') ? ' selected' : '' }}
                                    {{ $servis->uredjaj_id == $d->id ? ' selected' : '' }}>
                                    {{$d->id}}, IB: {{$d->inventarski_broj}}, SB: {{$d->serijski_broj}}
                            </option>
                            @endforeach
                            @endif
                            @else
                            @if($uredjaji)
                            @foreach($uredjaji as $d)
                                <option value="{{ $d->id }}"
                                    {{ $d->id == old('uredjaj_id') ? ' selected' : '' }}
                                    {{ $servis->uredjaj_id == $d->id ? ' selected' : '' }}>
                                    {{$d->id}}
                            </option>
                            @endforeach
                            @endif

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
    });

</script>
@endsection
