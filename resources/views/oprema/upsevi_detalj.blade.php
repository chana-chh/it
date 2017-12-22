@extends('sabloni.app')

@section('naziv', 'Oprema | UPS uređaj detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="UPS uređaj detaljno" src="{{url('/images/ups1.jpg')}}" style="height:64px;">&emsp;
        Detaljni pregled UPS uređaja
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
            <a class="btn btn-primary" href="{{route('upsevi.oprema')}}"
               title="Povratak na listu UPS uređaja">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('upsevi.oprema.izmena.get', $uredjaj->id)}}"
               title="Izmena podataka UPS uređaja">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanje" class="btn btn-warning otvori-brisanje"
                    title="Otpis UPS uređaja"
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
                <th style="width: 20%;">Računar:</th>
                <td style="width: 80%;">@if($uredjaj->racunar){{$uredjaj->racunar->ime}}@endif
                </td>
            </tr>


            <tr>
                <th style="width: 20%;">Lokacija:</th>
                @if($uredjaj->kancelarija)
                <td style="width: 80%;">{{$uredjaj->kancelarija->sviPodaci()}}</td>
                @else
                <td style="width: 80%;">@if($uredjaj->racunar)<a href="{{route('kancelarije.detalj.get', $uredjaj->racunar->kancelarija->id)}}">{{$uredjaj->racunar->kancelarija->lokacija->naziv}}, kancelarija {{$uredjaj->racunar->kancelarija->naziv}}</a>@endif
                </td>
                @endif
            </tr>
        </tbody>
    </table>
</div>
</div>

<div class="row">
    <div class="col-md-12">
@if ($uredjaj->racunar)
<h4>Ovaj računar koristi: <a href="{{ route('zaposleni.detalj', $uredjaj->racunar->zaposleni->id) }}">{{$uredjaj->racunar->zaposleni->imePrezime()}}</a></h4>
@endif

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
    <h4 class="panel-title" style="color: #2c3e50">Podaci o modelu:</h4>
  </div>
  <div class="panel-body">
    <table class="table">
        <tbody>
            <tr>
                <th style="width: 20%;">Naziv:</th>
                <td style="width: 80%;">{{$uredjaj->upsModel->naziv}}
                </td>
            </tr>
            <tr>
                <th style="width: 40%;">Proizvođač:</th>
                <td style="width: 60%;">{{$uredjaj->upsModel->proizvodjac->naziv}}</td>
            </tr>
             <tr>
                <th style="width: 20%;">Snaga:</th>
                <td style="width: 80%;">{{$uredjaj->upsModel->snaga}} W
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Kapacitet:</th>
                <td style="width: 80%;">{{$uredjaj->upsModel->kapacitet}} VA
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Broj baterija:</th>
                <td style="width: 80%;">{{$uredjaj->upsModel->broj_baterija}}
                </td>
            </tr>
            <tr>
                <th style="width: 20%;">Naziv baterije:</th>
                <td style="width: 80%;">{{$uredjaj->upsModel->tipBaterije->naziv}}
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row">
    <div class="col-md-12 text-right">
                <a class="btn btn-primary btn-sm" id="dugmeDetalj" href="{{route('upsevi.modeli.detalj', $uredjaj->upsModel->id)}}">
                    <i class="fa fa-eye"></i>
                </a>
            </div>
        </div>
  </div>
</div>
</div>
</div>

<div class="row well" style="margin-right: 1px; margin-left: 1px">
    <div class="col-md-12">
<h3>Broj Ups uređaja ovog modela: <a href="{{route('upsevi.modeli.uredjaji', $uredjaj->upsModel->id) }}" title="Pregled svih uređaja ovog modela Ups uređaja"> {{$brojno_stanje}} </a></h3>
</div>
</div>
@if($uredjaj->upsModel->link)
<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <a href="{{$uredjaj->upsModel->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
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
            var ruta = " {{route('upsevi.oprema.otpis') }}";
            $('#brisanje-forma').attr('action', ruta); });
});
</script>
@endsection