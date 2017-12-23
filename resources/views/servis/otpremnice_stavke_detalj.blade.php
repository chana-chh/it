@extends('sabloni.app')

@section('naziv', 'Otpremnica stavka')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Otpremnica" src="{{ url('/images/nabavke.png') }}" style="height:64px;">
    Otpremnica:
    <em class="text-success">
        {{ $stavka->otpremnica->broj }}
        <small>Stavka: <em class="text-success">{{ $stavka->naziv }}</em></small>
    </em>
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
            <a class="btn btn-primary" href="{{ route('otpremnice.detalj', $stavka->otpremnica->id) }}"
               title="Povratak na otpremnicu">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('otpremnice.stavke.izmena.get', $stavka->id) }}"
               title="Izmena stavke otpremnice">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="brisanjeStavkeOtpremnice" class="btn btn-primary"
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
                    <th style="width: 20%;">Vrsta uređaja:</th>
                    <td style="width: 80%;">{{ $stavka->vrstaUredjaja->naziv }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Naziv:</th>
                    <td style="width: 80%;">{{ $stavka->naziv }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Jedinica mere:</th>
                    <td style="width: 80%;">{{ $stavka->jedinica_mere }}</td>
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
<hr>
<div class="row well" style="overflow: auto;">
    <h3>Uređaju vezani za stavku: <span class="text-success">{{ $stavka->naziv }}</span></h3>
    <hr style="border-top: 1px solid #18BC9C">
    @if(!$stavka->uredjaji() || $stavka->uredjaji()->isEmpty())
    <p class="text-danger">Trenutno nema uređaja vezanih za ovu stavku</p>
    @else

    @if(in_array($stavka->vrstaUredjaja->id, [2, 3, 4, 5]))
    @include('servis.inc.tabela_eksterni')
    @endif

    @if(in_array($stavka->vrstaUredjaja->id, [6, 7, 8, 9, 10, 11]))
    @include('servis.inc.tabela_interni')
    @endif

    @if($stavka->vrstaUredjaja->id === 12)
    @include('servis.inc.tabela_projektor')
    @endif

    @if($stavka->vrstaUredjaja->id === 13)
    @include('servis.inc.tabela_mrezni')
    @endif

    @endif
</div>
@endsection

@section('traka')
<div class="well">
    <h3>Dodavanje uređaja: <span class="text-success">{{ $stavka->vrstaUredjaja->naziv }}</span></h3>
    <hr style="border-top: 1px solid #18BC9C">
    @if($stavka->vrstaUredjaja->id === 1)
    @include('servis.inc.forma_racunar')
    @endif
    @if($stavka->vrstaUredjaja->id === 2)
    @include('servis.inc.forma_monitor')
    @endif
    @if($stavka->vrstaUredjaja->id === 3)
    @include('servis.inc.forma_stampac')
    @endif
    @if($stavka->vrstaUredjaja->id === 4)
    @include('servis.inc.forma_skener')
    @endif
    @if($stavka->vrstaUredjaja->id === 5)
    @include('servis.inc.forma_ups')
    @endif
    @if($stavka->vrstaUredjaja->id === 12)
    @include('servis.inc.forma_projektor')
    @endif
    @if($stavka->vrstaUredjaja->id === 13)
    @include('servis.inc.forma_mrezni')
    @endif
</div>

<!--  POCETAK brisanjeModal -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('skripte')
<script>

    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({
        allow_single_deselect: true
    });

    function resizeChosen() {
        $(".chosen-container").each(function () {
            $(this).attr('style', 'width: 100%');
        });
    }

    $(document).on('click', '#brisanjeStavkeOtpremnice', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('otpremnice.stavke.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection
