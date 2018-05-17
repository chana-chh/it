@extends('sabloni.app')

@section('naziv', 'Imenik')

@section('stilovi')
<style>
    body {
        padding-top: 1rem;
    }
    #sviZaposleni {
        display: none;
    }
    #sveKancelarije {
        display: none;
    }
</style>
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-2 text-center">
        <a href="{{ route('imenik') }}">
            <img alt="Imenik" src="{{url('/images/imenik.png')}}" style="height: 128px;">
        </a>
        <a href="{{ route('imenik') }}" class="btn btn-success" style="margin-top: 3rem;">Pretraživanje imenika</a>
    </div>
    <div class="col-md-8">
        <h1 class="text-center" style="margin-bottom: 20px;">Napredno pretraživanje imenika <small>{{ $zap ? $zap->count() : '' }}</small></h1>
        <form action="{{ route('napredna.post') }}" method="POST">

            {{ csrf_field() }}

            <div class="row" style="margin-top: 3rem;">
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-addon" style="min-width: 10rem; text-align: left;">
                            <span class="text-info">Prezme</span>
                        </div>
                        <input type="text" name="prezime" class="form-control" value="{{ $staro ? $staro['prezime'] : '' }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-addon" style="min-width: 10rem; text-align: left;">
                            <span class="text-info">Ime</span>
                        </div>
                        <input type="text" name="ime" class="form-control" value="{{ $staro ? $staro['ime'] : '' }}">
                    </div>
                </div>
            </div>
            <div    class="row" style="margin-top: 2rem;">
                <div        class="col-md-6">
                    <div            class="input-group">
                        <div                class="input-group-addon" style="min-width: 10rem; text-align: left;">
                            <span class="text-info">Uprava</span>
                        </div>
                        <select name="uprava" class="form-control">
                            <option value=""></option>
                            @foreach($uprave as $uprava)
                            <option value="{{$uprava->id}}"{{ ($staro && $staro['uprava'] == $uprava->id) ? ' selected' : '' }}>{{$uprava->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-addon" style="min-width: 10rem; text-align: left;">
                            <span class="text-info">Lokacija</span>
                        </div>
                        <select name="lokacija" class="form-control">
                            <option value=""></option>
                            @foreach($lokacije as $lokacija)
                            <option value="{{$lokacija->id}}"{{ ($staro && $staro['lokacija'] == $lokacija->id) ? ' selected' : '' }}>{{$lokacija->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 2rem;">
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-addon" style="min-width: 10rem; text-align: left;">
                            <span class="text-info">Email</span>
                        </div>
                        <input type="text" name="email" class="form-control" value="{{ $staro ? $staro['email'] : '' }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-addon" style="min-width: 10rem; text-align: left;">
                            <span class="text-info">Kancelarija</span>
                        </div>
                        <input type="number" step="1" name="kancelarija" class="form-control" value="{{ $staro ? $staro['kancelarija'] : '' }}">
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 2rem;">
                <div class="col-md-6">
                    <input id="dugmePretrazi" type="submit" value="Pretraži" class="btn btn-block btn-primary">
                </div>
                <div class="col-md-6">
                    <a href="{{ route('napredna.get') }}" class="btn btn-block btn-primary">Poništi</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2 text-center">
        <a href="{{-- {{ route('kvar') }} --}}">
            <img alt="Kvar" src="{{url('/images/kvar.png')}}" style="height: 128px;" title="Obaveštenje:" class="kvarPopover"  style="cursor: pointer;"
                 data-content="Ova sekcija trenutno nije dostupna. Baza računara je trenutno u izradi.">
        </a>
        <a href="{{-- {{ route('kvar') }} --}}" title="Obaveštenje:" data-content="Ova sekcija trenutno nije dostupna. Baza računara je trenutno u izradi." class="btn btn-success kvarPopover" style="margin-top: 3rem; cursor: pointer;">Prijava/status kvara</a>
    </div>
</div>

@if(Auth::user())
<div class="row" style="margin: 10px 0px 10px 20px;">
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
        </div>
    </div>
</div>
@endif
<hr>
@if($zap)
@foreach($zap as $zaposleni)
<div class="row redZaposleni">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-8">
                <h3>
                    <span class="zaposleniImePrezime">{{$zaposleni->ime_zaposlenog}} {{ $zaposleni->prezime_zaposlenog }}</span>
                    , <small>{{ $zaposleni->uprava }}</small>
                </h3>
                <p class="text-success"><em>{{$zaposleni->radno_mesto_zaposlenog}}</em></p>
                <hr>
                <h4>
                    @if($zaposleni->kancelarija)
                    Kancelarija: {{ $zaposleni->kancelarija }},
                    <small>
                        {{ $zaposleni->lokacija }},
                        {{ $zaposleni->sprat }}
                        @if($zaposleni->kancelarija_napomena)
                        <span class="text-success">
                            ({{$zaposleni->kancelarija_napomena}})
                        </span>
                        @endif
                    </small>
                    @endif
                </h4>
                <?php
                $tel = explode("#", $zaposleni->telefoni);
                $mob = explode("#", $zaposleni->mobilni);
                $eml = explode("#", $zaposleni->emailovi);
                ?>

                <ul style="list-style-type: none; margin-top: 1rem">
                    @foreach($tel as $t)
                    <li><i class="fa fa-phone fa-fw text-success"></i>&emsp;{{ $t }}</li>
                    @endforeach
                </ul>
                <ul style="list-style-type: none; margin-top: 1rem">
                    @foreach($mob as $m)
                    <li><i class="fa fa-mobile fa-fw text-danger"></i>&emsp;{{ $m }}</li>
                    @endforeach
                </ul>
                <ul style="list-style-type: none; margin-top: 1rem">
                    @foreach($eml as $e)
                    <li>
                        <i class="fa fa-envelope fa-fw text-info"></i>&emsp;
                        <a href="mailto:{{ $e }}">{{ $e }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-4 text-right">
                @if (!empty($zaposleni->src))
                <img id="{{ $zaposleni->zaposleni_id }}" src="{{asset('images/slike_zaposlenih/'.$zaposleni->src)}}" class="img-circle"  alt="Slika zaposlenog"
                     style="height:128px; margin-top: 18px;">
                @else
                <img src="{{url('/images/korisnik_jedan.png')}}" alt="placeholder"
                     style="height:64px; margin-top: 9px;">
                @endif
            </div>
        </div>
                    <div class="row">
                <div class="col-md-12 text-right">
                    @if(!empty($zaposleni->id_kancelarije))
                    <a class="btn btn-primary btn-xs" href="{{route('plan', $zaposleni->id_kancelarije)}}"
               title="Prikaz tlocrta sa lokacijom" style="margin-right: 22px">
                <i class="fa fa-map-signs"></i>
            </a>
            @else
            <a class="btn btn-primary btn-xs" href=" "
               title="Prikaz tlocrta sa lokacijom" style="margin-right: 22px">
                <i class="fa fa-map-signs"></i>
            </a>
            @endif
                </div>
            </div>
        <hr style="border:none; border-top:2px dotted #18BC9C; color:#18BC9C; height:1px;">
    </div>
</div>
@endforeach
@endif
@endsection

@section('skripte')
<script>
    $(document).
            ready(function () {
                $('.kvarPopover').
                        popover({
                            placement: 'left',
                            trigger: 'hover'
                        });
            });

</script>
@endsection
