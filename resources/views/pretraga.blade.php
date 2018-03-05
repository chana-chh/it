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
        <h1 class="text-center" style="margin-bottom: 20px;">Pretraživanje imenika</h1>
        <div class="row">
            <div class="col-md-6">
                <button id="dugmeZaposleni" class="btn btn-primary btn-lg btn-block" style="margin-bottom: 15px">
                    <i class="fa fa-users"></i>&emsp;
                    Zaposleni
                </button>
            </div>
            <div class="col-md-6">
                <button id="dugmeKancelarije" class="btn btn-primary btn-lg btn-block" style="margin-bottom: 15px">
                    <i class="fa fa-building"></i>&emsp;
                    Kancelarije
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12"  style="margin-top: 3rem;">
                <div class="input-group">
                    <div class="input-group-addon">
                        <span id="vrstaPretrage" class="text-info">
                            Izaberi vrstu pretrage&emsp;<i class="fa fa-fw fa-arrow-up"></i>
                        </span>
                    </div>
                    <input type="text" id="tekstPretrage" class="form-control input-lg" disabled>
                    <div class="input-group-addon" style="width: 10rem;">
                        <span id="brojRezultata" class="text-info"><i class="fa fa-search fa-fw"></i></span>
                    </div>
                </div>
            </div>
        </div>
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
<div id="sviZaposleni">
    @if($zap)
    @foreach($zap as $zaposleni)
    <div class="row redZaposleni">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-8">
                    <h3>
                        <span class="zaposleniImePrezime">{{ $zaposleni->imePrezime() }}</span>
                        , <small>{{ $zaposleni->uprava->naziv }}</small>
                    </h3>
                    <p class="text-success"><em>{{$zaposleni->radno_mesto}}</em></p>
                    <hr>
                    <h4>
                        @if($zaposleni->kancelarija)
                        Kancelarija: {{ $zaposleni->kancelarija->naziv }},
                        <small>
                            {{ $zaposleni->kancelarija->lokacija->naziv }},
                            {{ $zaposleni->kancelarija->sprat->naziv }} 
                            @if($zaposleni->kancelarija->napomena)
                            <span class="text-success">
                            ({{ $zaposleni->kancelarija->napomena }})
                            </span>
                            @endif
                        </small>

                    
                    <ul style="list-style-type: none; margin-top: 1rem">
                        @foreach($zaposleni->kancelarija->telefoni as $tel)
                        <li><i class="fa fa-phone fa-fw text-success"></i>&emsp;{{ $tel->broj }}, <small> {{ $tel->vrsta }}</small></li>
                        @endforeach
                    </ul>
                    @endif
                    <ul style="list-style-type: none;">
                        @foreach($zaposleni->mobilni as $mob)
                        <li><i class="fa fa-mobile fa-fw text-danger"></i>&emsp;{{ $mob->broj }}</li>
                        @endforeach
                    </ul>
                    <ul style="list-style-type: none;">
                        @foreach($zaposleni->emailovi as $mail)
                        <li>
                            <i class="fa fa-envelope fa-fw text-info"></i>&emsp;
                            <a href="mailto:{{ $mail->adresa }}">{{ $mail->adresa }}</a>
                        </li>
                        @endforeach
                    </ul>
                    </h4>
                </div>
                <div class="col-md-4 text-right">
                    @if (!empty($zaposleni->src))
                    <img id="{{ $zaposleni->id }}" src="{{asset('images/slike_zaposlenih/'.$zaposleni->src)}}" class="img-circle"  alt="Slika zaposlenog" 
                    style="height:128px; margin-top: 18px;">
                    @else
                    <img src="{{url('/images/korisnik_jedan.png')}}" alt="placeholder"
                         style="height:64px; margin-top: 9px;">
                    @endif
                </div>
            </div>
            <hr style="border:none; border-top:2px dotted #18BC9C; color:#18BC9C; height:1px;">
        </div>
    </div>
    @endforeach
    @endif
</div>

{{-- KANCELARIJE POCETAK --}}

<div id="sveKancelarije">
    @if($kanc)
    @foreach($kanc as $kancelarija)
    <div class="row redKancelarija">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        <span class="kancelarijaNazivBroj">
                        {{ $kancelarija->naziv }}
                        </span> , 
                        <small>
                            {{ $kancelarija->lokacija->naziv }},
                            {{ $kancelarija->sprat->naziv }}
                        </small>
                        @if($kancelarija->napomena)
                        <h5 class="text-success">({{$kancelarija->napomena}})</h5>
                        @endif
                    </h2>
                    <ul style="list-style-type: none; font-size: 2rem;">
                        @foreach($kancelarija->telefoni as $tel)
                        <li><i class="fa fa-phone fa-fw text-success"></i>&emsp;<strong>{{ $tel->broj }}</strong>, <small> {{ $tel->vrsta }}</small></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6">
                    <h4 style="margin-top: 15px;" >Zaposleni:</h4>
                    <ul style="list-style-type: none; padding-left: 0;">
                        <table class="table" style="table-layout: fixed;">
                            <tbody style="font-size: 1.75rem;">
                                @foreach($kancelarija->zaposleni as $z)
                                <tr>
                                    <th style="width: 50%;">
                                        @if(strlen($z->imePrezime())<24 )
                                        <h4 class="zaposleniPopover"  style="cursor: pointer; margin-bottom: 15px"
                                                                data-title="{{ $z->imePrezime() }}"
                                                                data-content="<img src='{{ $z->src ? asset('images/slike_zaposlenih/'.$z->src) : '' }}' class='img-rounded' style='height: 256px;'>"><i class="fa fa-user fa-fw text-success"></i>&emsp;{{ $z->imePrezime() }}</h4>
                                        @else
                                        <h5 class="zaposleniPopover"  style="cursor: pointer; margin-bottom: 15px"
                                                                data-title="{{ $z->imePrezime() }}"
                                                                data-content="<img src='{{ $z->src ? asset('images/slike_zaposlenih/'.$z->src) : '' }}' class='img-rounded' style='height: 256px;'>"><i class="fa fa-user fa-fw text-success"></i>&emsp;{{ $z->imePrezime() }}</h5>
                                        @endif
                                                            </th>
                                    <td style="width: 50%;">  <ul style="list-style-type: none;">
                                            @foreach($z->mobilni as $m)
                                            <li>
                                                <i class="fa fa-mobile fa-fw text-danger"></i>&emsp;{{ $m->broj }}
                                            </li>
                                            @endforeach
                                        </ul>
                                        <ul style="list-style-type: none;">
                                            @foreach($z->emailovi as $e)
                                            @if(strlen($e->adresa)<22 )
                                            <li>
                                                <i class="fa fa-envelope fa-fw text-info"></i>&emsp;
                                                {{ $e->adresa }}
                                            </li>
                                            @else
                                            <li style="font-size: 1.5rem;">
                                                <i class="fa fa-envelope fa-fw text-info"></i>&emsp;
                                                {{ $e->adresa }}
                                            </li>
                                            @endif
                                            @endforeach
                                        </ul></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </ul>
                </div>
            </div>
            <hr style="border:none; border-top:2px dotted #18BC9C; color:#18BC9C; height:2px;">
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection

@section('skripte')
<script>
    $(document).ready(function () {
        
        $('.kvarPopover').popover({
            placement: 'left',
            trigger: 'hover'
        });

        var sviZaposleni = $('#sviZaposleni');
        var sveKancelarije = $('#sveKancelarije');
        var vrstaPretrage = $('#vrstaPretrage');
        var tekstPretrage = $('#tekstPretrage');
        var brojRezultata = $('#brojRezultata');
        var opcije, skrivalica;

        $('#dugmeZaposleni').on('click', function () {
            sviZaposleni.show();
            sveKancelarije.hide();
            tekstPretrage.prop('disabled', false);
            tekstPretrage.attr('placeholder', 'Kucajte ovde za pretragu zaposlenog');
            vrstaPretrage.text('Zaposleni');
            opcije = $('#sviZaposleni').find('.zaposleniImePrezime');
            skrivalica = '.redZaposleni';
            ponistiPretragu();
        });
        $('#dugmeKancelarije').on('click', function () {
            sveKancelarije.show();
            sviZaposleni.hide();
            tekstPretrage.prop('disabled', false);
            tekstPretrage.attr('placeholder', 'Kucajte ovde za pretragu kancelarije');
            vrstaPretrage.text('Kancelarije');
            opcije = $('#sveKancelarije').find('.kancelarijaNazivBroj');
            skrivalica = '.redKancelarija';
            ponistiPretragu();
        });

        tekstPretrage.on('keyup', function () {
            var tekst;
            var filter = tekstPretrage.val().toUpperCase();
            var broj = 0;
            for (var i = 0; i < opcije.length; i++) {
                tekst = $(opcije[i]).text();
                if (tekst.toUpperCase().indexOf(filter) > -1) {
                    $(opcije[i]).parents(skrivalica).show();
                    broj += 1;
                } else {
                    $(opcije[i]).parents(skrivalica).hide();
                }
            }
            brojRezultata.text(broj);
        });

        function ponistiPretragu() {
            tekstPretrage.focus().val('');
            var broj = 0;
            for (var i = 0; i < opcije.length; i++) {
                $(opcije[i]).parents(skrivalica).show();
                broj += 1;
            }
            brojRezultata.text(broj);
        }

        $('.zaposleniPopover').popover({
            placement: 'left',
            trigger: 'hover',
            html: true
        });

    });

</script>
@endsection