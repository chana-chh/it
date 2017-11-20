@extends('sabloni.app')

@section('naziv', 'Šifarnici | Licence detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Šifarnik dobavljača" src="{{url('/images/licence.png')}}" style="height:64px;">&emsp;
        Detaljni pregled licence
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
            <a class="btn btn-primary" href="{{route('licence')}}"
               title="Povratak na listu licenci">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('licence.izmena.get', $model->id) }}"
               title="Izmena podataka o licencama">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanjeLicenci" class="btn btn-primary"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$model->id}}"
                    title="Brisanje licence">
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
                <th style="width: 20%;">Tip licence:</th>
                <td style="width: 80%;">{{ $model->tip_licence }} 
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Proizvod:</th>
                <td style="width: 80%;">{{$model->proizvod}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Ključ:</th>
                <td style="width: 80%;">{{$model->kljuc}}
                </td>
            </tr>

             <tr>
                <th style="width: 20%;">Broj aktivacija:</th>
                <td style="width: 80%;">{{$model->broj_aktivacija}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Početak važenja:</th>
                <td style="width: 80%;">{{$model->datum_pocetka_vazenja}}
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
<div class="row" style="margin-top: 5rem">
<div class="col-md-12">
    @if ( \Carbon\Carbon::parse($model->datum_prestanka_vazenja)->isPast() ) 
    <div class="alert alert-danger" role="alert">Licenca je istekla: {{$model->datum_prestanka_vazenja}}</div>
    @else
    <div class="alert alert-success" role="alert">Licenca važi do: {{$model->datum_prestanka_vazenja}}</div>
    @endif
</div>
</div>
@endsection

@section('skripte')
<script>
    $(document).on('click', '#idBrisanjeLicenci', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('licence.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection