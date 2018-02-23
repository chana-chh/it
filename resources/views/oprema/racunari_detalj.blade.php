@extends('sabloni.app')

@section('naziv', 'Oprema | Računar detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Računar detaljno" src="{{url('/images/kompaS.png')}}" style="height:64px;">&emsp;
        Detaljni pregled računara <span style="color: #18bc9c">{{$uredjaj->ime}}</span>
    </h1>
@endsection

@section('sadrzaj')
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
            <a class="btn btn-primary" href="{{route('racunari.oprema')}}"
               title="Povratak na listu računara">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('racunari.oprema.izmena.get', $uredjaj->id)}}"
               title="Izmena podataka računara">
                <i class="fa fa-pencil"></i>
            </a>
            <a class="btn btn-warning" href="{{route('racunari.oprema.otpis', $uredjaj->id)}}"
               title="Otpis računara">
                <i class="fa fa-recycle"></i>
            </a>
        </div>
    </div>
</div>
@if ($uredjaj->garancija()>0)
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Obavštenje: </strong> Uređaj je još uvek u garanciji, još {{$uredjaj->garancija()}} meseca(i).
</div>    
@endif
<div class="row">
    <div class="col-md-12">
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 1.5rem;">
            <tr>
                <th style="width: 40%;"><strong>Operativni sistem:</strong></th>
                <td style="width: 60%;">{{$uredjaj->operativniSistem ? $uredjaj->operativniSistem->naziv : ''}}
                </td>
            </tr>
            <tr>
                <th style="width: 40%;">Da li se radi o <strong>BRAND</strong> računaru:</th>
                <td style="width: 80%;">
                        @if($uredjaj->brend == 1)
                        <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
                        @endif
                </td>
            </tr>

            @if ($uredjaj->brend == 1)
            <tr>
                <th style="width: 40%;"><strong>Proizvođač:</strong></th>
                
                <td style="width: 80%;">
                    @if($uredjaj->proizvodjac)
                    {{$uredjaj->proizvodjac->naziv}}
                    @endif
                </td>
                
            </tr>
            @endif

             <tr>
                <th style="width: 40%;">Da li se radi o <strong>LAPTOP</strong> računaru:</th>
                <td style="width: 60%;">
                     @if($uredjaj->laptop == 1)
                        <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
                        @endif
                </td>
            </tr>

                 <tr>
                <th style="width: 40%;">Da li se radi o <strong>SERVERU</strong> :</th>
                <td style="width: 60%;">
                     @if($uredjaj->server == 1)
                        <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
                        @endif
                </td>
            </tr>

            <tr>
                <th style="width: 40%;"><strong>Naziv računara (Aktivni direktorijum):</strong></th>
                <td style="width: 60%;">{{$uredjaj->ime}}</td>
            </tr>

            <tr>
                <th style="width: 40%;"><strong>Inventarski broj:</strong></th>
                <td style="width: 60%;">{{$uredjaj->inventarski_broj}}
                </td>
            </tr>

            <tr>
                <th style="width: 40%;"><strong>Broj odeljenja za IKT:</strong></th>
                <td style="width: 60%;">{{$uredjaj->erc_broj}}
                </td>
            </tr>

            <tr>
                <th style="width: 40%;"><strong>Lokacija:</strong></th>
                <td style="width: 60%;">@if($uredjaj->kancelarija)<a href="{{route('kancelarije.detalj.get', $uredjaj->kancelarija->id)}}">{{$uredjaj->kancelarija->lokacija->naziv}}, kancelarija {{$uredjaj->kancelarija->naziv}}</a>@endif
                </td>
            </tr>
                        <tr>
                <th style="width: 40%;"><strong>Podaci o nabavci:</strong></th>
                <td style="width: 60%;">{{$uredjaj->nabavkaStavka->nabavka->dobavljac->naziv}}, {{$uredjaj->nabavkaStavka->nabavka->datum}} 
                    sa garancijom od {{$uredjaj->nabavkaStavka->nabavka->garancija}} u mesecima
                </td>
                </tr>
                  <tr>
                <th style="width: 40%;"><strong>Napomena:</strong></th>
                <td style="width: 60%;">{{$uredjaj->napomena}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<hr style="border-top: 1px solid #18BC9C">
<div class="row">
    <div class="col-md-12 text-center">
@if ($uredjaj->zaposleni)
<h3><img alt="Zaposleni" src="{{ url('/images/korisnik.png') }}" style="height:32px;">&emsp;Ovaj računar koristi: <a href="{{ route('zaposleni.detalj', $uredjaj->zaposleni->id) }}">{{$uredjaj->zaposleni->imePrezime()}}</a></h3>
@else
<h4>Ovaj računar ne koristi nijedan činovnik</h4>
@endif

</div>
</div>

<!--  POCETAK brisanjeModal  -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
<h4>Ocena: </h4>
<div class="row">
<?php
$kompletan = false;
if ($uredjaj->osnovnaPloca && !$uredjaj->procesori->isEmpty() && !$uredjaj->memorije->isEmpty() && !$uredjaj->hddovi->isEmpty()) {
   $kompletan = true;
}
?>
@if($kompletan)
<div class="col-md-6 col-md-offset-4">
<p class="{{ $uredjaj->ocena < 8 ? ' tankoza_danger' : ' tankoza' }} krug_mali">{{number_format($uredjaj->ocena, 2, '.', ',')}}</p>
@else
<div class="col-md-12">
<h4 class="text-danger text-center">Računar ne sadrži sve komponente neophodne za ocenjivanje</h4>
@endif
</div>
</div>

@if($kompletan)
<div class="row">
    <div class="col-md-12">
@if($uredjaj->ocena < 8)
<div class="alert alert-danger text-center" role="alert">Planirati otpis i zamenu uređaja!</div>
@endif
    </div>
</div>
@endif

        <div class="row">
    <div class="col-md-12">
        <h4>Komponente:</h4>
        <table class="table table-condensed table-hover" style="table-layout: fixed;">
        <tbody>
<tr>
    <th style="width: 70%;">@if ($uredjaj->osnovnaPloca)<a href="{{route('osnovne_ploce.oprema.detalj', $uredjaj->osnovnaPloca->id)}}">
     {{$uredjaj->osnovnaPloca->osnovnaPlocaModel->naziv}} 
 </a>
                            @else Komponenta nije dodata ili nema podataka o njoj
                            @endif
    </th>
    <td style="width: 30%;">
        <a href="{{ route('racunari.oprema.ploce', $uredjaj->id) }}" class="btn btn-primary btn-block">
            Osnovna ploča
            
        </a>
    </td>
</tr>
<tr>
    <th style="width: 70%;">
        @if (!$uredjaj->procesori->isEmpty())
            <ul class="liste_bez">
                @foreach($uredjaj->procesori as $p)
                    <li><a href="{{route('procesori.oprema.detalj', $p->id)}}">{{$p->procesorModel->proizvodjac->naziv}}, {{$p->procesorModel->naziv}}</a></li>
                @endforeach     
            </ul>
        @else Komponenta nije dodata ili nema podataka o njoj
        @endif
    </th>
    <td style="width: 30%;">
        <a href="{{ route('racunari.oprema.procesori', $uredjaj->id) }}" class="btn btn-primary btn-block">
            Procesori
            
        </a>
    </td>
</tr>
<tr>
    <th style="width: 70%;">
        @if (!$uredjaj->memorije->isEmpty())
            <ul class="liste_bez">
                @foreach($uredjaj->memorije as $m)
                    <li><a href="{{route('memorije.oprema.detalj', $m->id)}}">{{$m->memorijaModel->proizvodjac->naziv}}, {{$m->memorijaModel->kapacitet}}</a></li>
                @endforeach     
            </ul>
        @else Komponenta nije dodata ili nema podataka o njoj
        @endif
    </th>
    <td style="width: 30%;">
        <a href="{{ route('racunari.oprema.memorije', $uredjaj->id) }}" class="btn btn-primary btn-block">
            Memorijski moduli
            
        </a>
    </td>
</tr>
<tr>
    <th style="width: 70%;">
        @if (!$uredjaj->hddovi->isEmpty())
            <ul class="liste_bez">
                @foreach($uredjaj->hddovi as $h)
                    <li><a href="{{route('hddovi.oprema.detalj', $h->id)}}">{{$h->hddModel->proizvodjac->naziv}}, {{$h->hddModel->kapacitet}}</a></li>
                @endforeach     
            </ul>
        @else Komponenta nije dodata ili nema podataka o njoj
        @endif
    </th>
    <td style="width: 30%;">
        <a href="{{ route('racunari.oprema.hddovi', $uredjaj->id) }}" class="btn btn-primary btn-block">
            Čvrsti diskovi
            
        </a>
    </td>
</tr>
<tr>
    <th style="width: 70%;">
        @if (!$uredjaj->grafickiAdapteri->isEmpty())
            <ul class="liste_bez">
                @foreach($uredjaj->grafickiAdapteri as $g)
                    <li><a href="{{route('vga.oprema.detalj', $g->id)}}">{{$g->grafickiAdapterModel->proizvodjac->naziv}}, {{$g->grafickiAdapterModel->cip}}</a></li>
                @endforeach     
            </ul>
        @else Komponenta nije dodata ili nema podataka o njoj
        @endif
    </th>
    <td style="width: 30%;">
        <a href="{{ route('racunari.oprema.vga', $uredjaj->id) }}" class="btn btn-primary btn-block">
            Grafički adapteri
            
        </a>
    </td>
</tr>
<tr>
    <th style="width: 70%;">
        @if (!$uredjaj->napajanja->isEmpty())
            <ul class="liste_bez">
                @foreach($uredjaj->napajanja as $n)
                    <li><a href="{{route('napajanja.oprema.detalj', $n->id)}}">{{$n->napajanjeModel->proizvodjac->naziv}}, {{$n->napajanjeModel->snaga}} W</a></li>
                @endforeach     
            </ul>
        @else Komponenta nije dodata ili nema podataka o njoj
        @endif
    </th>
    <td style="width: 30%;">
        <a href="{{ route('racunari.oprema.napajanja', $uredjaj->id) }}" class="btn btn-primary btn-block">
            Napajanja
            
        </a>
    </td>
</tr>
        </tbody>
    </table>
<hr style="border-top: 1px solid #18BC9C">
<h4>Periferija:</h4>
<table class="table table-condensed table-hover" style="table-layout: fixed;">
        <tbody>
<tr>
    <th style="width: 70%;">
        @if (!$uredjaj->monitori->isEmpty())
            <ul>
                @foreach($uredjaj->monitori as $mo)
                    <li><a href="{{route('monitori.oprema.detalj', $mo->id)}}">{{$mo->monitorModel->proizvodjac->naziv}}, {{$mo->monitorModel->dijagonala->naziv}} "</a></li>
                @endforeach     
            </ul>
        @else Uređaj nije povezan ili nema podataka o njemu
        @endif
    </th>
    <td style="width: 30%;">
        <a href="{{ route('racunari.oprema.monitori', $uredjaj->id) }}" class="btn btn-primary btn-block">
            Monitori
            
        </a>
    </td>
</tr>
<tr>
    <th style="width: 70%;">
        @if (!$uredjaj->stampaci->isEmpty())
            <ul>
                @foreach($uredjaj->stampaci as $st)
                    <li><a href="{{route('stampaci.oprema.detalj', $st->id)}}">{{$st->stampacModel->proizvodjac->naziv}}, {{$st->stampacModel->naziv}}</a></li>
                @endforeach     
            </ul>
        @else Uređaj nije povezan ili nema podataka o njemu
        @endif
    </th>
    <td style="width: 30%;">
        <a href="{{ route('racunari.oprema.stampaci', $uredjaj->id) }}" class="btn btn-primary btn-block">
            Štampači
            
        </a>
    </td>
</tr>
<tr>
    <th style="width: 70%;">
        @if (!$uredjaj->skeneri->isEmpty())
            <ul>
                @foreach($uredjaj->skeneri as $sk)
                    <li><a href="{{route('skeneri.oprema.detalj', $sk->id)}}">{{$sk->skenerModel->proizvodjac->naziv}}, {{$sk->skenerModel->naziv}}</a></li>
                @endforeach     
            </ul>
        @else Uređaj nije povezan ili nema podataka o njemu
        @endif
    </th>
    <td style="width: 30%;">
        <a href="{{ route('racunari.oprema.skeneri', $uredjaj->id) }}" class="btn btn-primary btn-block">
            Skeneri
            
        </a>
    </td>
</tr>
</tbody>
</table>
<hr style="border-top: 1px solid #18BC9C">
<table class="table" style="table-layout: fixed;">
        <tbody>
<tr>
    <th style="width: 50%; text-align:left"><a href="{{ route('racunari.oprema.aplikacije', $uredjaj->id) }}" class="btn btn-primary btn-block">
        Aplikacije
</a>
    </th>
    <td style="width: 50%;">
        <a href="#" class="btn btn-primary btn-block">
            Servis
        </a>
    </td>
</tr>
</tbody>
</table>
</div>
</div>

@endsection