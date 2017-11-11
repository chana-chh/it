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
               title="Povratak na listu procesora">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href=""
               title="Izmena podataka procesora">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanje" class="btn btn-primary"
                    title="Otpis procesora"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$uredjaj->id}}">
                <i class="fa fa-recycle"></i>
            </button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 1.875rem;">
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
                <td style="width: 60%;">{{$uredjaj->nabavka->dobavljac->naziv}}, {{$uredjaj->nabavka->datum}} sa garancijom u mesecima - {{$uredjaj->nabavka->garancija}}
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
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h4>Komponente:</h4>
        <ul class="list-group">
  <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">
        Osnovna ploča <i class="fa fa-arrow-right fa-fw"></i>
</a></li>
  <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">
        Procesori<i class="fa fa-arrow-right fa-fw"></i>
</a></li>
  <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">
        Memorija <i class="fa fa-arrow-right fa-fw"></i>
</a></li>
  <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">
        Čvrsti diskovi <i class="fa fa-arrow-right fa-fw"></i>
</a></li>
  <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">
        Grafički adapteri <i class="fa fa-arrow-right fa-fw"></i>
</a></li>
  <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">
        Napajanje <i class="fa fa-arrow-right fa-fw"></i>
</a></li>
</ul>
<hr style="border-top: 1px solid #18BC9C">
<h4>Periferija:</h4>
<ul class="list-group">
  <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">
        Monitori <i class="fa fa-arrow-right fa-fw"></i>
</a></li>
  <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">
        Štampači <i class="fa fa-arrow-right fa-fw"></i>
</a></li>
  <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">
        Skeneri <i class="fa fa-arrow-right fa-fw"></i>
</a></li>
</ul>
<hr style="border-top: 1px solid #18BC9C">
<ul class="list-group">
  <li class="list-group-item"><a href="#" class="btn btn-primary btn-block">
        Aplikacije <i class="fa fa-arrow-right fa-fw"></i>
</a></li>
</ul>




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