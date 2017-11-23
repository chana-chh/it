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
            <a class="btn btn-primary" href=""
               title="Izmena podataka računara">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanje" class="btn btn-primary"
                    title="Otpis računara"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$uredjaj->id}}">
                <i class="fa fa-recycle"></i>
            </button>
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
                <th style="width: 40%;">Operativni sistem:</th>
                <td style="width: 60%;">{{$uredjaj->operativniSistem->naziv}}
                </td>
            </tr>
            <tr>
                <th style="width: 40%;">Da li se radi o <em>BRAND</em> računaru:</th>
                <td style="width: 80%;">
                        @if($uredjaj->brend == 1)
                        <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
                        @endif
                </td>
            </tr>

            @if ($uredjaj->brend == 1)
            <tr>
                <th style="width: 40%;">Proizvođač:</th>
                <td style="width: 80%;">{{$uredjaj->proizvodjac->naziv}}</td>
            </tr>
            @endif

             <tr>
                <th style="width: 40%;">Da li se radi o <em>LAPTOP</em> računaru:</th>
                <td style="width: 60%;">
                     @if($uredjaj->laptop == 1)
                        <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
                        @endif
                </td>
            </tr>

                 <tr>
                <th style="width: 40%;">Da li se radi o <em>SERVERU</em> :</th>
                <td style="width: 60%;">
                     @if($uredjaj->server == 1)
                        <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
                        @endif
                </td>
            </tr>

            <tr>
                <th style="width: 40%;">Naziv računara (Aktivni direktorijum):</th>
                <td style="width: 60%;">{{$uredjaj->ime}}</td>
            </tr>

            <tr>
                <th style="width: 40%;">Broj odeljenja za IKT:</th>
                <td style="width: 60%;">{{$uredjaj->erc_broj}}
                </td>
            </tr>

            <tr>
                <th style="width: 40%;">Lokacija:</th>
                <td style="width: 60%;"><a href="{{route('kancelarije.detalj.get', $uredjaj->kancelarija->id)}}">{{$uredjaj->kancelarija->lokacija->naziv}}, kancelarija {{$uredjaj->kancelarija->naziv}}</a>
                </td>
            </tr>
                        <tr>
                <th style="width: 40%;">Podaci o nabavci:</th>
                <td style="width: 60%;">{{$uredjaj->nabavkaStavka->nabavka->dobavljac->naziv}}, {{$uredjaj->nabavkaStavka->nabavka->datum}} 
                    sa garancijom od {{$uredjaj->nabavkaStavka->nabavka->garancija}} u mesecima
                </td>
                </tr>
                  <tr>
                <th style="width: 40%;">Napomena:</th>
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
<h4>Ocena:</h4>
<div class="row">
<div class="col-md-6 col-md-offset-4">
<p class="{{ $uredjaj->ocena() < 8 ? ' tankoza_danger' : ' tankoza' }} krug_mali">{{$uredjaj->ocena()}}</p>
</div>
</div>

<div class="row">
    <div class="col-md-12">
@if($uredjaj->ocena() < 8)
<div class="alert alert-danger text-center" role="alert">Planirati otpis i zamenu uređaja!</div>
@endif
    </div>
</div>

        <div class="row">
    <div class="col-md-12">
        <h4>Komponente:</h4>
        <table class="table table-condensed table-hover" style="table-layout: fixed;">
        <tbody>
<tr>
    <th style="width: 70%;">@if ($uredjaj->osnovnaPloca) {{$uredjaj->osnovnaPloca->osnovnaPlocaModel->naziv}} 
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
                    <li>{{$p->procesorModel->proizvodjac->naziv}}, {{$p->procesorModel->naziv}}</li>
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
                    <li>{{$m->memorijaModel->proizvodjac->naziv}}, {{$m->memorijaModel->kapacitet}}</li>
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
                    <li>{{$h->hddModel->proizvodjac->naziv}}, {{$h->hddModel->kapacitet}}</li>
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
                    <li>{{$g->grafickiAdapterModel->proizvodjac->naziv}}, {{$g->grafickiAdapterModel->cip}}</li>
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
                    <li>{{$n->napajanjeModel->proizvodjac->naziv}}, {{$n->napajanjeModel->snaga}} W</li>
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
                    <li>{{$mo->monitorModel->proizvodjac->naziv}}, {{$mo->monitorModel->dijagonala->naziv}} "</li>
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
                    <li>{{$st->stampacModel->proizvodjac->naziv}}, {{$st->stampacModel->naziv}}</li>
                @endforeach     
            </ul>
        @else Uređaj nije povezan ili nema podataka o njemu
        @endif
    </th>
    <td style="width: 30%;">
        <a href="#" class="btn btn-primary btn-block">
            Štampači
            
        </a>
    </td>
</tr>
<tr>
    <th style="width: 70%;">
        @if (!$uredjaj->skeneri->isEmpty())
            <ul>
                @foreach($uredjaj->skeneri as $st)
                    <li>{{$st->skenerModel->proizvodjac->naziv}}, {{$st->skenerModel->naziv}}</li>
                @endforeach     
            </ul>
        @else Uređaj nije povezan ili nema podataka o njemu
        @endif
    </th>
    <td style="width: 30%;">
        <a href="#" class="btn btn-primary btn-block">
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

@section('skripte')
<script>
$( document ).ready(function() {

    $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            /*var ruta = " route('procesori.oprema.brisanje') }}";*/
            $('#brisanje-forma').attr('action', ruta); });

});
</script>
@endsection