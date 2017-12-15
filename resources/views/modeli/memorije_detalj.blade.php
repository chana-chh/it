@extends('sabloni.app')

@section('naziv', 'Modeli | Model memorije detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Model memorije detaljno" src="{{url('/images/memorija.png')}}" style="height:64px;">
        Detaljni pregled modela memorije
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
            <a class="btn btn-primary" href="{{route('memorije.modeli')}}"
                title="Povratak na listu modela memorije">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('memorije.modeli.izmena.get', $memorija->id) }}"
                title="Izmena osnovnih podataka o modelu memorije">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanjeModela" class="btn btn-primary"
                    title="Brisanje modela memorije"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$memorija->id}}">
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
                <th style="width: 20%;">Naziv:</th>
                <td style="width: 80%;">{{$memorija->naziv}}</td>
            </tr>
            <tr>
                <th style="width: 20%;">Proizvođač:</th>
                <td style="width: 80%;">{{$memorija->proizvodjac->naziv}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Tip memorije:</th>
                <td style="width: 80%;">{{$memorija->tipMemorije->naziv}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Brzina:</th>
                <td style="width: 80%;">{{$memorija->brzina}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Kapacitet:</th>
                <td style="width: 80%;">{{$memorija->kapacitet}}
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
    <em>{{$memorija->napomena}}</em>
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
<p class="tankoza krug_mali">{{$memorija->ocena}}</p>
</div>
</div>

<div class="row">
<div class="col-md-10 col-md-offset-3">
    <h4>Ocena modela memorije</h4>
</div>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
<h3>Broj memorije ovog modela: <a href="{{route('memorije.modeli.uredjaji', $memorija->id) }}" title="Pregled svih uređaja ovog modela memorije"> {{$memorija->memorije->count()}} </a></h3>

<h3>Broj računara sa ovim modelom memorije: <a href="{{route('memorije.modeli.racunari', $memorija->id) }}" title="Pregled svih računara sa ovim modelom memorije"> {{$racunari}} </a></h3>
</div>
</div>

<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <a href="{{$memorija->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
</div>
</div>

@endsection

@section('skripte')
<script>
    $(document).on('click', '#idBrisanjeModela', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('memorije.modeli.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection