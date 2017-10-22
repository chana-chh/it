@extends('sabloni.app')

@section('naziv', 'Šifarnici | Ugovor o održavanju')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Ugovor" src="{{ url('/images/ugovor.png') }}" style="height:64px;">
    Detaljni pregled ugovora broj:
    <em>{{ $data->broj }}</em>
</h1>
@endsection

@section('sadrzaj')
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped" style="table-layout: fixed;">
            <tbody>
                <tr>
                    <th style="width: 20%;">Broj:</th>
                    <td style="width: 80%;">{{ $data->broj }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Datum zaključenja:</th>
                    <td style="width: 80%;">{{ \Carbon\Carbon::parse($data->datum_zakljucivanja)->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Datum isteka:</th>
                    <td style="width: 80%;">{{ \Carbon\Carbon::parse($data->datum_raskida)->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Iznos sredstava:</th>
                    <td style="width: 80%;">{{ number_format($data->iznos_sredstava, 2, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<hr>
<div class="row well" style="overflow: auto;">
    <h3>Računi</h3>
    <hr style="border-top: 1px solid #18BC9C">
    @if($data->racuni->isEmpty())
    <p class="text-danger">Trenutno nema podataka o računima za ovaj ugovor</p>
    @else
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th style="width: 25%;">Broj</th>
                <th style="width: 15%;">Datum</th>
                <th style="width: 15%; text-align: right;">Iznos</th>
                <th style="width: 15%; text-align: right;">PDV</th>
                <th style="width: 15%; text-align: right;">Ukupno</th>
                <th style="width: 15%; text-align: right;">
                    Akcije
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($data->racuni as $racun)
            <tr>
                <td>{{ $racun->broj }}</td>
                <td>{{ \Carbon\Carbon::parse($racun->datum)->format('d.m.Y') }}</td>
                <td class="text-right">{{ number_format($racun->iznos, 2, ',', '.') }}</td>
                <td class="text-right">{{ number_format($racun->pdv, 2, ',', '.') }}</td>
                <td class="text-right">{{ number_format($racun->ukupno, 2, ',', '.') }}</td>
                <td class="text-right">
                    <a class="btn btn-success btn-xs">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-info btn-xs">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <a class="btn btn-danger btn-xs">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-right"><strong>Ukupno</strong></td>
                <td class="text-right text-danger">
                    <strong>{{ number_format($data->utroseno(), 2, ',', '.') }}</strong>
                </td>
                <td></td>
            </tr>
        </tfoot>
    </table>
    @endif
</div>
<hr>
<div class="row dugmici">
    <div class="col-md-4 text-left">
        <a class="btn btn-info" href="{{route('ugovori')}}"
           title="Povratak na listu ugovora">
            <i class="fa fa-list" style="color:#2C3E50"></i>
        </a>
    </div>
    <div class="col-md-4 text-center">
        <a class="btn btn-info" href="{{route('ugovori.izmena.get', $data->id) }}"
           title="Izmena podataka o ugovoru">
            <i class="fa fa-pencil" style="color:#2C3E50"></i>
        </a>
    </div>
    <div class="col-md-4 text-right">
        <a class="btn btn-info" href="{{route('pocetna')}}"
           title="Povratak na početnu stranu">
            <i class="fa fa-home" style="color:#2C3E50"></i>
        </a>
    </div>
</div>
@endsection

@section('traka')
<div class="well">
    <p class="lead">
        Ukupna sredstva po ugovoru:
    </p>
    <p class="lead text-right text-info">
        {{ number_format($data->iznos_sredstava, 2, ',', '.') }}
    </p>
    <p class="lead">
        Utrošena sredstva po ugovoru:
    </p>
    <p class="lead text-right text-danger">
        {{ number_format($data->utroseno(), 2, ',', '.') }}
    </p>
    <p class="lead">
        Preostala sredstva po ugovoru:
    </p>
    <p class="lead text-right text-success">
        <strong>{{ number_format($data->preostalo(), 2, ',', '.') }}</strong>
    </p>
</div>
@endsection

@section('skripte')
<script>
    //    $(document).ready(function () {
    //
    //        var mobilni_brisanje_ruta = "{{ route('mobilni.zaposleni.brisanje') }}";
    //        var mobilni_detalj_ruta = "{{ route('mobilni.zaposleni.detalj') }}";
    //        var email_brisanje_ruta = "{{ route('email.zaposleni.brisanje') }}";
    //        var email_detalj_ruta = "{{ route('email.zaposleni.detalj') }}";
    //
    //        $('#slikaModal').on('show.bs.modal', function (e) {
    //            var image = $(e.relatedTarget).attr('src');
    //            $(".img-responsive").attr("src", image);
    //        });
    //
    //        // Modal mobilni dodavanje
    //        $("#dugmeModalDodajMobilni").on('click', function () {
    //            $('#frmMobilniDodavanje').submit();
    //        });
    //
    //        // Modal mobilni brisanje
    //        $(document).on('click', '#dugmeMobilniBrisanje', function () {
    //            var id_brisanje = $(this).val();
    //
    //            $('#brisanjeMobilniModal').modal('show');
    //
    //            $('#dugmeModalObrisiMobilniBrisi').on('click', function () {
    //
    //                $.ajax({
    //                    url: mobilni_brisanje_ruta,
    //                    type: "POST",
    //                    data: {
    //                        "id": id_brisanje,
    //                        _token: "{!! csrf_token() !!}"
    //                    },
    //                    success: function () {
    //                        location.reload();
    //                    }
    //                });
    //
    //                $('#brisanjeMobilniModal').modal('hide');
    //
    //            });
    //
    //            $('#dugmeModalObrisiMobilniOtkazi').on('click', function () {
    //                $('#brisanjeMobilniModal').modal('hide');
    //            });
    //        });
    //
    //        // Modal uprave izmene
    //        $("#dugmeModalIzmeniMobilni").on('click', function () {
    //            $('#frmMobilniIzmena').submit();
    //        });
    //
    //        $(document).on('click', '#dugmeMobilniIzmeni', function () {
    //            var id_menjanje = $(this).val();
    //
    //            $.ajax({
    //                url: mobilni_detalj_ruta,
    //                type: "POST",
    //                data: {
    //                    "id": id_menjanje,
    //                    _token: "{!! csrf_token() !!}"
    //                },
    //                success: function (result) {
    //                    $("#mobilni_izmena_broj").val(result.broj);
    //                    $("#mobilni_izmena_sluzbeni").prop('checked', result.sluzbeni);
    //                    $("#mobilni_izmena_napomena").val(result.napomena);
    //                }
    //            });
    //        });
    //
    //
    //        // Modal email dodavanje
    //        $("#dugmeModalDodajEmail").on('click', function () {
    //            $('#frmEmailDodavanje').submit();
    //        });
    //
    //        // Modal email brisanje
    //        $(document).on('click', '#dugmeEmailBrisanje', function () {
    //            var id_brisanje = $(this).val();
    //
    //            $('#brisanjeEmailModal').modal('show');
    //
    //            $('#dugmeModalObrisiEmailBrisi').on('click', function () {
    //
    //                $.ajax({
    //                    url: email_brisanje_ruta,
    //                    type: "POST",
    //                    data: {
    //                        "id": id_brisanje,
    //                        _token: "{!! csrf_token() !!}"
    //                    },
    //                    success: function () {
    //                        location.reload();
    //                    }
    //                });
    //
    //                $('#brisanjeEmailModal').modal('hide');
    //
    //            });
    //
    //            $('#dugmeModalObrisiEmailOtkazi').on('click', function () {
    //                $('#brisanjeEmailModal').modal('hide');
    //            });
    //        });
    //
    //        // Modal uprave izmene
    //        $("#dugmeModalIzmeniEmail").on('click', function () {
    //            $('#frmEmailIzmena').submit();
    //        });
    //
    //        $(document).on('click', '#dugmeEmailIzmeni', function () {
    //            var id_menjanje = $(this).val();
    //
    //            $.ajax({
    //                url: email_detalj_ruta,
    //                type: "POST",
    //                data: {
    //                    "id": id_menjanje,
    //                    _token: "{!! csrf_token() !!}"
    //                },
    //                success: function (result) {
    //                    $("#email_izmena_adresa").val(result.adresa);
    //                    $("#email_izmena_sluzbeni").prop('checked', result.sluzbeni);
    //                    $("#email_izmena_napomena").val(result.napomena);
    //                }
    //            });
    //        });
    //
    //    });
</script>
@endsection






















































