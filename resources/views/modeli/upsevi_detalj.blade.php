@extends('sabloni.app')

@section('naziv', 'Modeli | Model UPS uređaja detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Model UPS uređaja detaljno" src="{{url('/images/ups1.jpg')}}" style="height:64px;">&emsp;
        Detaljni pregled modela 
         <em class="text-success">{{ $model->naziv }}</em>
         UPS uređaja
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
            <a class="btn btn-primary" href="{{route('upsevi.modeli')}}"
                title="Povratak na listu modela UPS uređaja">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('upsevi.modeli.izmena.get', $model->id) }}"
                title="Izmena podataka o modelu UPS uređaja">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanjeModela" class="btn btn-primary"
                    title="Brisanje modela UPS uređaja"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$model->id}}">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 2rem;">
            <tr>
                <th style="width: 20%;">Proizvođač:</th>
                <td style="width: 80%;">{{$model->proizvodjac->naziv}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Snaga:</th>
                <td style="width: 80%;">{{$model->snaga}} W
                </td>
            </tr>

                        <tr>
                <th style="width: 20%;">Kapacitet:</th>
                <td style="width: 80%;">{{$model->kapacitet}} VA
                </td>
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
    <em>{{$model->napomena}}</em>
</h5>
</div>
</div>
<!--  POCETAK brisanjeModal -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
<div class="row well" style="margin-top: 5rem;">
    <div class="col-md-12">
        <h4><i class="fa fa-battery-half" style="color:#2C3E50"></i>&emsp;Podaci o pripadajućim baterijima</h4>
    <table class="table">
        <tbody>

            <tr>
                <th style="width: 40%;">Baterija (naziv):</th>
                <td style="width: 60%;">{{$model->tipBaterije->naziv}}</td>
            </tr>
            <tr>
                <th style="width: 40%;">Broj baterija:</th>
                <td style="width: 60%;">{{$model->broj_baterija}}</td>
            </tr>

            <tr>
                <th style="width: 40%;">Kapacitet baterije:</th>
                <td style="width: 60%;">{{$model->tipBaterije->kapacitet}} Ah
                </td>
            </tr>

                        <tr>
                <th style="width: 40%;">Napon baterije:</th>
                <td style="width: 60%;">{{$model->tipBaterije->napon}} V
                </td>
            </tr>

             <tr>
                <th style="width: 40%;">Dimenzije baterije:</th>
                <td style="width: 60%;">{{$model->tipBaterije->dimenzije}}
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>

<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <h3>Broj UPS uređaja ovog modela: <a href="{{route('upsevi.modeli.uredjaji', $model->id) }}" title="Pregled svih uređaja ovog UPS modela"> {{$model->upsevi->count()}} </a></h3>
    @if($model->link)
    <a href="{{$model->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
    @endif
</div>
</div>

@endsection

@section('skripte')
<script>
    $(document).on('click', '#idBrisanjeModela', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('upsevi.modeli.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection