@extends('sabloni.app')

@section('naziv', 'Oprema | Projektor detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Projektor detaljno" src="{{url('/images/projektor.png')}}" style="height:64px;">&emsp;
        Detaljni pregled projektora
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
            <a class="btn btn-primary" href="{{route('projektori.oprema')}}"
               title="Povratak na listu projektora">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('projektori.oprema.izmena.get', $uredjaj->id)}}"
               title="Izmena podataka projektora">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanje" class="btn btn-warning otvori-brisanje"
                    title="Otpis projektora"
                    data-toggle="modal" data-target="#otpisModal"
                    value="{{$uredjaj->id}}">
                <i class="fa fa-recycle"></i>
            </button>
           
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 2rem;">
            <tr>
                <th style="width: 20%;">Serijski broj:</th>
                <td style="width: 80%;">{{$uredjaj->serijski_broj}}</td>
            </tr>
            <tr>
                <th style="width: 20%;">Inventarski broj:</th>
                <td style="width: 80%;">{{$uredjaj->inventarski_broj}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Otpremnica:</th>
                <td style="width: 80%;">@if($uredjaj->stavkaOtpremnice)
                    <a
                           href="{{ route('otpremnice.detalj', $uredjaj->stavkaOtpremnice->otpremnica->id) }}">
                            {{$uredjaj->stavkaOtpremnice->otpremnica->broj}} 
                        </a>
                        @endif
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Nabavka:</th>
                <td style="width: 80%;">@if($uredjaj->nabavkaStavka)
                        <a
                           href="{{ route('nabavke.detalj', $uredjaj->nabavkaStavka->nabavka->id) }}">
                            {{$uredjaj->nabavkaStavka->nabavka->dobavljac->naziv}} od {{$uredjaj->nabavkaStavka->nabavka->datum}} 
                        </a>
                        @endif
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Lokacija:</th>
                @if($uredjaj->kancelarija)
                <td style="width: 80%;">{{$uredjaj->kancelarija->sviPodaci()}}</td>
                @endif
            </tr>
        </tbody>
    </table>
</div>
</div>

    
<div class="row ceo_dva">
<div class="col-md-12 boxic">
<h5>Napomena: 
    <br>
    <hr>
    <em>{{$uredjaj->napomena}}</em>
</h5>
</div>
</div>

<!--  POCETAK brisanjeModal  -->
@include('sifarnici.inc.modal_otpis')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
<div class="row" style="margin-top: 5rem;">
    <div class="col-md-12">
<div class="panel panel-info noborder">
  <div class="panel-heading">
    <h4 class="panel-title" style="color: #2c3e50">Tehnički detalji:</h4>
  </div>
  <div class="panel-body">
    <table class="table">
        <tbody>
            <tr>
                <th style="width: 20%;">Naziv:</th>
                <td style="width: 80%;">{{$uredjaj->naziv}}
                </td>
            </tr>
            <tr>
                <th style="width: 40%;">Proizvođač:</th>
                <td style="width: 60%;">{{$uredjaj->proizvodjac->naziv}}</td>
            </tr>
            <tr>
                <th style="width: 20%;">Tip lampe:</th>
                <td style="width: 80%;">@if($uredjaj->tip_lampe){{$uredjaj->tip_lampe}}@endif
                </td>
            </tr>
             <tr>
                <th style="width: 20%;">Rezolucija:</th>
                <td style="width: 80%;">@if($uredjaj->rezolucija){{$uredjaj->rezolucija}}@endif
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Kontrast:</th>
                <td style="width: 80%;">@if($uredjaj->kontrast){{$uredjaj->kontrast}}@endif
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Povezivanje:</th>
                <td style="width: 80%;">
                    @php
                        $rezultat = array();
                        foreach ($uredjaj->povezivanja as $p){
                            $rezultat[] = $p->naziv;
                        }
                        echo implode(", ",$rezultat);
                    @endphp
                </td>
            </tr>
        </tbody>
    </table>
  </div>
</div>
</div>
</div>

@if($uredjaj->link)
<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <a href="{{$uredjaj->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
</div>
</div>
@endif
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

    $(document).on('click', '.otvori-brisanje', function () {

            var id = $(this).val();
            $('#idOtpis').val(id);
            var ruta = " {{route('projektori.oprema.otpis') }}";
            $('#brisanje-forma').attr('action', ruta); });
});
</script>
@endsection