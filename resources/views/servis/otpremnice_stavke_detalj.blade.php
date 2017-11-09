@extends('sabloni.app')

@section('naziv', 'Otpremnica stavka')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Racun" src="{{ url('/images/otpremnice.png') }}" style="height:64px;">
    Pregled stavke otpremnice: <em>{{ $stavka->otpremnica->broj }}</em>
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
            <a class="btn btn-primary" href="{{ route('otpremnice.stavke', $stavka->otpremnica->id) }}"
               title="Povratak na listu stavki otpremnice">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('otpremnice.stavke.izmena.get', $stavka->id) }}"
               title="Izmena stavke otpremnice">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="brisanjeOtpremnice" class="btn btn-primary"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$stavka->id}}"
                    title="Brisanje stavke otpremnice">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped" style="table-layout: fixed;">
            <tbody>
                <tr>
                    <th style="width: 20%;">Otpremnica:</th>
                    <td style="width: 80%;">
                        <a href="{{ route('otpremnice.detalj', $stavka->otpremnica->id) }}">{{ $stavka->otpremnica->broj }}</a>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%;">Naziv:</th>
                    <td style="width: 80%;">{{ $stavka->naziv }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Jedinica mere:</th>
                    <td style="width: 80%;">{{ $stavka->jednica_mere }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Količina:</th>
                    <td style="width: 80%;">{{ $stavka->kolicina }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Napomena:</th>
                    <td style="width: 80%;">{{ $stavka->napomena }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!--  POCETAK brisanjeModal [brisanje slike] -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
<hr>
<div class="row well" style="overflow: auto;">

    <h3>Oprema povezana sa ovom stavkom otpremnice</h3>
    <hr style="border-top: 1px solid #18BC9C">
    @if($stavka->vrstaUredjaja() == 0)
    <p class="text-danger">Trenutno nema povezane opreme za ovu stavku otpremnice</p>
    @else
    @if($stavka->vrstaUredjaja() == 1)
    @include('servis.inc.vrsta1')
    @endif
    @if($stavka->vrstaUredjaja() == 2)
    @include('servis.inc.vrsta2')
    @endif
    @if($stavka->vrstaUredjaja() == 3)
    @include('servis.inc.vrsta3')
    @endif
    @if($stavka->vrstaUredjaja() == 4)
    @include('servis.inc.vrsta4')
    @endif
    @endif
    <div class="row">
        <div class="col-md-6 col-md-offset-6 text-right">
            @if($uredjaji)
            {{ $uredjaji->links() }}
            @endif
        </div>
    </div>
</div>
@endsection

@section('traka')
<div class="well">
    <h3>Neki k</h3>
</div>
@endsection

@section('skripte')
<script>
    $(document).on('click', '#brisanjeOtpremnice', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('otpremnice.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection
