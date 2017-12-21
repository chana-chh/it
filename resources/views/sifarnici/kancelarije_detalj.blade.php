@extends('sabloni.app')

@section('naziv', 'Šifarnici | Kancelarija detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Kancelarija detaljno"
         src="{{ url('/images/kancelarije.png') }}" style="height:64px;">
    &emsp;Kancelarija detaljno
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
            <a class="btn btn-primary" href="{{route('kancelarije')}}"
               title="Povratak na listu kancelarija">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href=""
               title="Izmena podataka kancelarije">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanjeKancelarije" class="btn btn-primary"
                    title="Brisanje kancelarije"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$kancelarija->id}}">
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
                <th style="width: 20%;">Lokacija:</th>
                <td style="width: 80%;">{{$kancelarija->lokacija->naziv}}</td>
            </tr>
            <tr>
                <th style="width: 20%;">Naziv/broj:</th>
                <td style="width: 80%;">{{$kancelarija->naziv}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Sprat:</th>
                <td style="width: 80%;">{{$kancelarija->sprat->naziv}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Telefoni:</th>
                <td style="width: 80%;">
                    @foreach ($kancelarija->telefoni as $t)
                        {{$t->broj}}, {{$t->vrsta}}<br>
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>

<div class="row">
    <div class="col-md-12">
    <h4>IKT oprema u kancelariji:</h4>
    @if($uredjaji->isEmpty())
    <p class="text-danger">U ovoj kancelariji nema IKT opreme</p>
    @else
    <table class="table table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Vrsta</th>
                <th>Naziv</th>
                <th>Serijski broj</th>
                <th>Inventarski broj</th>
                <th>Tehnički detalj</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uredjaji as $uredjaj)
            <tr>
                <td>{{ $uredjaj->vrsta_uredjaja }}</td>
                <td>{{ $uredjaj->naziv }}</td>
                <td>{{ $uredjaj->serijski_broj }}</td>
                <td>{{ $uredjaj->inventarski_broj }}</td>
                <td>{{ $uredjaj->tehnicki_detalji }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $uredjaji->render() }}
    @endif
</div>
</div>
    
<div class="row ceo_dva">
<div class="col-md-12 boxic">
<h5>Napomena: 
    <br>
    <hr>
    <em>{{$kancelarija->napomena}}</em>
</h5>
</div>
</div>

<!--  POCETAK brisanjeModal  -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
<div class="row well" style="margin-top: 5rem;">
    <div class="col-md-12">
<h4>Činovnici u kancelariji:</h4>
<ul>
    @foreach ($kancelarija->zaposleni as $z)
            <li><a href="{{ route('zaposleni.detalj', $z->id) }}">{{$z->imePrezime()}}</a></li>
    @endforeach

</ul>
</div>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

    $(document).on('click', '#idBrisanjeKancelarije', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('kancelarije.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta); });

});
</script>
@endsection