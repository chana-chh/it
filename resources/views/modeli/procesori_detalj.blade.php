@extends('sabloni.app')

@section('naziv', 'Modeli | Model procesora detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Model procesora detaljno" src="{{url('/images/cpu.png')}}" style="height:64px;">
        Detaljni pregled modela 
         <em class="text-success">{{ $procesor->naziv }}</em>
         procesora
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
            <a class="btn btn-primary" href="{{route('procesori.modeli')}}"
                title="Povratak na listu modela procesora">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('procesori.modeli.izmena.get', $procesor->id) }}"
           title="Izmena osnovnih podataka o modelu procesora">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanjeModela" class="btn btn-primary"
                    title="Brisanje modela procesora"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$procesor->id}}">
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
                <td style="width: 80%;">{{$procesor->proizvodjac->naziv}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Soket:</th>
                <td style="width: 80%;">{{$procesor->soket->naziv}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Takt:</th>
                <td style="width: 80%;">{{$procesor->takt}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Keš:</th>
                <td style="width: 80%;">{{$procesor->kes}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Broj jezgara:</th>
                <td style="width: 80%;">{{$procesor->broj_jezgara}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Broj niti:</th>
                <td style="width: 80%;">{{$procesor->broj_niti}}
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
    <em>{{$procesor->napomena}}</em>
</h5>
</div>
</div>

<!--  POCETAK brisanjeModal -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
<div class="row" style="margin-top: 5rem;">
<div class="col-md-6 col-md-offset-4">
<p class="tankoza krug_mali">{{$procesor->ocena}}</p>
</div>
</div>

<div class="row">
<div class="col-md-10 col-md-offset-3">
    <h4>Ocena modela procesora</h4>
</div>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
<h3>Broj procesora ovog modela: <a href="{{route('procesori.modeli.uredjaji', $procesor->id) }}" title="Pregled svih uređaja ovog modela procesora"> {{$procesor->procesori->count()}} </a></h3>

<h3>Broj računara sa ovim modelom procesora: <a href="{{route('procesori.modeli.racunari', $procesor->id) }}" title="Pregled svih računara sa ovim modelom procesora"> {{$racunari}} </a></h3>
</div>
</div>

<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <a href="{{$procesor->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
</div>
</div>

@endsection

@section('skripte')
<script>
    $(document).on('click', '#idBrisanjeModela', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('procesori.modeli.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection