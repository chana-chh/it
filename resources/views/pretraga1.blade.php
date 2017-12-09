@extends('sabloni.app')

@section('naziv', 'Rezultati')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('stilovi')
<style>
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
        <img alt="Imenik" src="{{url('/images/imenik.png')}}" style="height: 128px;">
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6">
                <button id="dugmeZaposleni" class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-users"></i>
                    Zaposleni
                </button>
            </div>
            <div class="col-md-6">
                <button id="dugmeKancelarije" class="btn btn-primary btn-lg btn-block">
                    <i class="fa fa-building"></i>
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
</div>
<hr>

<div id="sviZaposleni">
    @if($zap)
    @foreach($zap as $zaposleni)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-8">
                    <h3>{{ $zaposleni->imePrezime() }}, <small>{{ $zaposleni->uprava->naziv }}</small></h3>
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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="row">
                <div class="col-md-12">
                    <h3>
                        Kancelarija: {{ $kancelarija->naziv }},
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

        $('#dugmeZaposleni').on('click', function () {
            sviZaposleni.show();
            sveKancelarije.hide();
            tekstPretrage.prop('disabled', false);
            tekstPretrage.attr('placeholder', 'Kucajte ovde za pretragu zaposlenog');
            vrstaPretrage.text('Zaposleni');
            tekstPretrage.focus();
        });

        $('#dugmeKancelarije').on('click', function () {
            sveKancelarije.show();
            sviZaposleni.hide();
            tekstPretrage.prop('disabled', false);
            tekstPretrage.attr('placeholder', 'Kucajte ovde za pretragu kancelarije');
            vrstaPretrage.text('Kancelarije');
            tekstPretrage.focus();
        });
    });
</script>
@endsection
