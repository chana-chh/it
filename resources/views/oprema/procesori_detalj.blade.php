@extends('sabloni.app')

@section('naziv', 'Oprema | Procesor detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Procesor detaljno" src="{{url('/images/cpu.png')}}" style="height:64px;">&emsp;
        Detaljni pregled procesora 
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
            <a class="btn btn-primary" href="{{route('procesori.oprema')}}"
               title="Povratak na listu procesora">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('procesori.oprema.izmena.get', $uredjaj->id)}}"
               title="Izmena podataka procesora">
                <i class="fa fa-pencil"></i>
            </a>
            <button class="btn btn-warning otvori-brisanje"
                    title="Otpis procesora"
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
                <th style="width: 20%;">Otpremnica:</th>
                <td style="width: 80%;">@if($uredjaj->stavkaOtpremnice)<a
                           href="{{ route('otpremnice.detalj', $uredjaj->stavkaOtpremnice->otpremnica->id) }}">
                            {{$uredjaj->stavkaOtpremnice->otpremnica->broj}} 
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
                <td style="width: 80%;">@if($uredjaj->racunar)<a href="{{route('kancelarije.detalj.get', $uredjaj->racunar->kancelarija->id)}}">{{$uredjaj->racunar->kancelarija->lokacija->naziv}}, kancelarija {{$uredjaj->racunar->kancelarija->naziv}}</a>@endif
                </td>
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
                <th style="width: 40%;">Naziv:</th>
                <td style="width: 60%;">{{$uredjaj->procesorModel->naziv}}</td>
            </tr>
            <tr>
                <th style="width: 40%;">Proizvođač:</th>
                <td style="width: 60%;">{{$uredjaj->procesorModel->proizvodjac->naziv}}</td>
            </tr>

             <tr>
                <th style="width: 40%;">Soket:</th>
                <td style="width: 60%;">{{$uredjaj->procesorModel->soket->naziv}}
                </td>
            </tr>

            <tr>
                <th style="width: 40%;">Takt:</th>
                <td style="width: 60%;">{{$uredjaj->procesorModel->takt}}
                </td>
            </tr>

            <tr>
                <th style="width: 40%;">Keš:</th>
                <td style="width: 60%;">{{$uredjaj->procesorModel->kes}}
                </td>
            </tr>

            <tr>
                <th style="width: 40%;">Broj jezgara:</th>
                <td style="width: 60%;">{{$uredjaj->procesorModel->broj_jezgara}}
                </td>
            </tr>

            <tr>
                <th style="width: 40%;">Broj niti:</th>
                <td style="width: 60%;">{{$uredjaj->procesorModel->broj_niti}}
                </td>
            </tr> 
            <tr>
                <th style="width: 40%;">Ocena:</th>
                <td style="width: 60%;">{{$uredjaj->procesorModel->ocena}}
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row">
    <div class="col-md-12 text-right">
                <a class="btn btn-primary btn-sm" id="dugmeDetalj" href="{{route('procesori.modeli.detalj', $uredjaj->procesorModel->id)}}">
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
<h3>Broj procesora ovog modela: <a href="{{route('procesori.modeli.uredjaji', $uredjaj->procesorModel->id) }}" title="Pregled svih uređaja ovog modela procesora"> {{$brojno_stanje}} </a></h3>
</div>
</div>

<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <a href="{{$uredjaj->procesorModel->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
</div>
</div>

@endsection

@section('skripte')
<script>
$( document ).ready(function() {

    $(document).on('click', '.otvori-brisanje', function () {

            var id = $(this).val();
            $('#idOtpis').val(id);
            var ruta = " {{route('procesori.oprema.otpis') }}";
            $('#brisanje-forma').attr('action', ruta); });
});
</script>
@endsection