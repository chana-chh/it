@extends('sabloni.app')

@section('naziv', 'Šifarnici | Dobavljači detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Šifarnik dobavljača" src="{{url('/images/kamion.png')}}" style="height:64px;">&emsp;
        Detaljni pregled dobavljača
         <i>{{ $model->naziv }}</i>
         
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
            <a class="btn btn-primary" href="{{route('dobavljaci')}}"
               title="Povratak na listu dobavljača">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('dobavljaci.izmena.get', $model->id) }}"
               title="Izmena podataka o dobavljaču">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanjeDobavljaca" class="btn btn-primary"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$model->id}}"
                    title="Brisanje dobavljača">
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
                <th style="width: 20%;">Adresa:</th>
                <td style="width: 80%;">{{$model->adresa_ulica}} {{$model->adresa_broj}}, {{$model->adresa_mesto}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Telefon:</th>
                <td style="width: 80%;">{{$model->telefon}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">E-mail:</th>
                <td style="width: 80%;"><a href="mailto:{{$model->email}}">{{$model->email}}</a>
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

<!--  POCETAK brisanjeModal  -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')

<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <a href="{{$model->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
</div>
</div>

@endsection

@section('skripte')
<script>
    $(document).on('click', '#idBrisanjeDobavljaca', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('dobavljaci.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection