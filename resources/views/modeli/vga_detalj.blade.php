@extends('sabloni.app')

@section('naziv', 'Modeli | Model grafičkog adaptera detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Model grafičkog adaptera detaljno" src="{{url('/images/vga.png')}}" style="height:64px;">
        Detaljni pregled modela grafičkog adaptera &emsp;<em class="text-success">{{$vga->naziv}}</em>
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
            <a class="btn btn-primary" href="{{route('vga.modeli')}}"
                title="Povratak na listu modela grafičkih adaptera">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('vga.modeli.izmena.get', $vga->id) }}"
                title="Izmena osnovnih podataka o modelu grafičkog adaptera">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanjeModela" class="btn btn-primary"
                    title="Brisanje modela grafičkog adaptera"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$vga->id}}">
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
                <td style="width: 80%;">{{$vga->proizvodjac->naziv}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Čip:</th>
                <td style="width: 80%;">{{$vga->cip}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Tip memorije:</th>
                <td style="width: 80%;">{{$vga->tipMemorije->naziv}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Kapacitet memorije:</th>
                <td style="width: 80%;">{{$vga->kapacitet_memorije}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">VGA slotovi:</th>
                <td style="width: 80%;">{{$vga->vgaSlot->naziv}}
            </td>
            </tr>

                        <tr>
                <th style="width: 20%;">Vrste povezivanja:</th>
                <td style="width: 80%;">
                    @php
                        $rezultat = array();
                        foreach ($vga->povezivanja as $p){
                            $rezultat[] = $p->naziv;
                        }
                        echo implode(", ",$rezultat);
                    @endphp
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
    <em>{{$vga->napomena}}</em>
</h5>
</div>
</div>
<!--  POCETAK brisanjeModal -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
<div class="row well" style="overflow: auto; margin-top: 5rem;">
    <div class="col-md-12">
<h4>Broj grafičkog adaptera ovog modela: <a href="{{route('vga.modeli.uredjaji', $vga->id) }}" title="Pregled svih uređaja ovog modela grafičkog adaptera"> {{$vga->grafickiAdapteri->count()}} </a></h4>

<h4>Broj računara sa ovim modelom grafičkog adaptera: <a href="{{route('vga.modeli.racunari', $vga->id) }}" title="Pregled svih računara sa ovim modelom grafičkog adaptera"> {{$racunari}} </a></h4>
</div>
</div>

<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <a href="{{$vga->link}}" target="_blank"><img alt="link" src="{{url('/images/link.png')}}" style="height:32px;"></a>
</div>
</div>

@endsection

@section('skripte')
<script>
    $(document).on('click', '#idBrisanjeModela', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('vga.modeli.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection