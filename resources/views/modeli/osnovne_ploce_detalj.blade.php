@extends('sabloni.app')

@section('naziv', 'Modeli | Model osnovne ploče detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Model osnovne ploče detaljno" src="{{url('/images/mbd.png')}}" style="height:64px;">
        Detaljni pregled modela 
         <em class="text-success">{{ $osnovna_ploca->naziv }}</em>
         osnovne ploče
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
            <a class="btn btn-primary" href="{{route('osnovne_ploce.modeli')}}"
                title="Povratak na listu modela osnovnih ploča">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('osnovne_ploce.modeli.izmena.get', $osnovna_ploca->id) }}"
                title="Izmena osnovnih podataka o modelu osnovne ploče">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanjeModela" class="btn btn-primary"
                    title="Brisanje modela osnovne ploče"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$osnovna_ploca->id}}">
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
                <td style="width: 80%;">{{$osnovna_ploca->proizvodjac->naziv}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Čipset:</th>
                <td style="width: 80%;">{{$osnovna_ploca->cipset}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Soket:</th>
                <td style="width: 80%;">{{$osnovna_ploca->soket->naziv}}
                </td>
            </tr>

           <tr>
                <th style="width: 20%;">Tip memorije:</th>
                <td style="width: 80%;">{{$osnovna_ploca->tipMemorije->naziv}}
                </td>
            </tr>
        </tbody>
    </table>
     <div class="row">
            <div class="col-md-6">

                <div class="form-group checkboxoviforme">
            <label>
                <input type="checkbox" name="usb_tri" id="usb_tri" {!!$osnovna_ploca->usb_tri == 0 ? "" :'checked="checked"'!!} onclick="return false;">
                &emsp;Da li osnovna ploča ima makra jedan USB 3.0 port?
            </label>
        </div>
    </div>

        <div class="col-md-6">
        <div class="form-group checkboxoviforme">
            <label>
                <input type="checkbox" name="integrisana_grafika" id="integrisana_grafika" {!!$osnovna_ploca->integrisana_grafika == 0 ? "" :'checked="checked"'!!} onclick="return false;">
                &emsp;Da li osnovna ploča ima integrisan grafički adapter?
            </label>
        </div>
            </div>
        </div>
</div>
</div>
    <hr>
<div class="row ceo_dva">
<div class="col-md-12 boxic">
<h4>Napomena: 
    <br>
    <hr>
    <em>{{$osnovna_ploca->napomena}}</em>
</h4>
</div>
</div>
<!--  POCETAK brisanjeModal -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
<div class="row" style="margin-top: 5rem;">
<div class="col-md-6 col-md-offset-4">
<p class="tankoza krug_mali">{{$osnovna_ploca->ocena}}</p>
</div>
</div>

<div class="row">
<div class="col-md-10 col-md-offset-3">
    <h4>Ocena modela osnovne ploče</h4>
</div>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
<h3>Broj osnovnih ploča ovog modela: <a href="{{route('osnovne_ploce.modeli.uredjaji', $osnovna_ploca->id) }}" title="Pregled svih uređaja ovog modela osnovne ploče"> {{$osnovna_ploca->osnovnePloce->count()}} </a></h3>

<h3>Broj računara sa ovim modelom osnovne ploče: <a href="{{route('osnovne_ploce.modeli.racunari', $osnovna_ploca->id) }}" title="Pregled svih računara sa ovim modelom osnovne ploče"> {{$racunari}} </a></h3>
</div>
</div>

<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <a href="{{$osnovna_ploca->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
</div>
</div>

@endsection

@section('skripte')
<script>
    $(document).on('click', '#idBrisanjeModela', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('osnovne_ploce.modeli.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection