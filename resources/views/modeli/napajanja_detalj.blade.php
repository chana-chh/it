@extends('sabloni.app')

@section('naziv', 'Modeli | Model napajanja detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Model napajanja detaljno" src="{{url('/images/napajanje.png')}}" style="height:64px;">&emsp;
        Detaljni pregled modela 
         <em class="text-success">{{ $model->naziv }}</em>
         napajanja
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
            <a class="btn btn-primary" href="{{route('napajanja.modeli')}}"
                title="Povratak na listu modela napajanja">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('napajanja.modeli.izmena.get', $model->id) }}"
                title="Izmena osnovnih podataka o modelu napajanja">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanjeModela" class="btn btn-primary"
                    title="Brisanje modela napajanja"
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
<h4>Broj napajanja ovog modela: <a href="{{route('napajanja.modeli.uredjaji', $model->id) }}" title="Pregled svih uređaja ovog modela napajanja"> {{$model->napajanja->count()}} </a></h4>

<h4>Broj računara sa ovim modelom napajanja: <a href="{{route('napajanja.modeli.racunari', $model->id) }}" title="Pregled svih računara sa ovim modelom napajanja"> {{$racunari}} </a></h4>
</div>
</div>

<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <a href="{{$model->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
</div>
</div>

@endsection

@section('skripte')
<script>
    $(document).on('click', '#idBrisanjeModela', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('napajanja.modeli.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection