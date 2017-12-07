@extends('sabloni.app')

@section('naziv', 'Imenik')

@section('stilovi')
<style>
    body {
        padding-top: 3rem;
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
    <div class="col-md-2">
        <a href="{{ route('imenik') }}">
            <img alt="Imenik" src="{{url('/images/imenik.png')}}" style="height: 128px;" id="popImenik"
                 data-toggle="popover"
                 data-content="Pretraga imenika">
        </a>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6">
                <button id="dugmeZaposleni" class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-users"></i>&emsp;
                    Zaposleni
                </button>
            </div>
            <div class="col-md-6">
                <button id="dugmeKancelarije" class="btn btn-primary btn-lg btn-block">
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
                    <div class="input-group-addon">
                        <span class="text-info"><i class="fa fa-search fa-fw"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2 text-right">
        <a href="{{ route('kvar') }}">
            <img alt="Kvar" src="{{url('/images/kvar.png')}}" style="height: 128px;" id="popKvar"
                 data-toggle="popover"
                 data-content="Prijava kvara">
        </a>
    </div>
</div>
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
                        , <small>{{ $zaposleni->uprava->naziv }}</small></h3>
                    <h4>
                        Kancelarija: {{ $zaposleni->kancelarija->naziv }},
                        <small>
                            {{ $zaposleni->kancelarija->lokacija->naziv }},
                            {{ $zaposleni->kancelarija->sprat->naziv }}
                        </small>
                    </h4>
                    <ul style="list-style-type: none;">
                        @foreach($zaposleni->kancelarija->telefoni as $tel)
                        <li><i class="fa fa-phone fa-fw text-success"></i>&emsp;{{ $tel->broj }}</li>
                        @endforeach
                    </ul>
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
                </div>
                <div class="col-md-4 text-right">
                    <img src="{{url('/images/sara.jpg')}}" alt="sara" class="img-circle" style="height:128px;">
                </div>
            </div>
            <hr style="border:none; border-top:1px dotted #18BC9C; color:#18BC9C; height:1px;">
        </div>
    </div>
    @endforeach
    @endif
</div>
<div id="sveKancelarije">
    @if($kanc)
    @foreach($kanc as $kancelarija)
    <div class="row redKancelarija">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-12">
                    <h3>
                        Kancelarija:
                        <span class="kancelarijaNazivBroj">
                            {{ $kancelarija->naziv }}
                        </span> ,
                        <small>
                            {{ $kancelarija->lokacija->naziv }},
                            {{ $kancelarija->sprat->naziv }}
                        </small>
                    </h3>
                    <ul style="list-style-type: none;">
                        @foreach($kancelarija->telefoni as $tel)
                        <li><i class="fa fa-phone fa-fw text-success"></i>&emsp;{{ $tel->broj }}</li>
                        @endforeach
                    </ul>
                    <h4>Zaposleni</h4>
                    <ul style="list-style-type: none;">
                        @foreach($kancelarija->zaposleni as $z)
                        <li><i class="fa fa-user fa-fw text-info"></i>&emsp;{{ $z->imePrezime() }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <hr style="border:none; border-top:1px dotted #18BC9C; color:#18BC9C; height:1px;">
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection

@section('skripte')
<script>
    $(document).ready(function () {
        var sviZaposleni = $('#sviZaposleni');
        var sveKancelarije = $('#sveKancelarije');
        var vrstaPretrage = $('#vrstaPretrage');
        var tekstPretrage = $('#tekstPretrage');
        var opcije, skrivalica;
        $('#dugmeZaposleni').on('click', function () {
            sviZaposleni.show();
            sveKancelarije.hide();
            tekstPretrage.prop('disabled', false);
            tekstPretrage.attr('placeholder', 'Kucajte ovde za pretragu zaposlenog');
            vrstaPretrage.text('Zaposleni');
            tekstPretrage.focus();
            opcije = $('#sviZaposleni').find('.zaposleniImePrezime');
            skrivalica = '.redZaposleni';
        });
        $('#dugmeKancelarije').on('click', function () {
            sveKancelarije.show();
            sviZaposleni.hide();
            tekstPretrage.prop('disabled', false);
            tekstPretrage.attr('placeholder', 'Kucajte ovde za pretragu kancelarije');
            vrstaPretrage.text('Kancelarije');
            tekstPretrage.focus();
            opcije = $('#sveKancelarije').find('.kancelarijaNazivBroj');
            skrivalica = '.redKancelarija';
        });
        tekstPretrage.on('keyup', function () {
            var tekst;
            var filter = tekstPretrage.val().toUpperCase();
            for (var i = 0; i < opcije.length; i++) {
                tekst = $(opcije[i]).text();
                if (tekst.toUpperCase().indexOf(filter) > -1) {
                    $(opcije[i]).parents(skrivalica).show();
                } else {
                    $(opcije[i]).parents(skrivalica).hide();
                }
            }
        });

        $('#popImenik').popover({
            trigger: 'hover',
            placement: 'bottom'
        });

        $('#popKvar').popover({
            trigger: 'hover',
            placement: 'bottom'
        });
    });

</script>
@endsection
