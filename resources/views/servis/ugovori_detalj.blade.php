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
                <tr>
                    <th style="width: 20%;">Napomena:</th>
                    <td style="width: 80%;">{{ $data->napomena }}</td>
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
                <td>
                    <a href="{{ route('racuni.detalj', $racun->id) }}">
                        <strong>{{ $racun->broj }}</strong>
                    </a>
                </td>
                <td>{{ \Carbon\Carbon::parse($racun->datum)->format('d.m.Y') }}</td>
                <td class="text-right">{{ number_format($racun->iznos, 2, ',', '.') }}</td>
                <td class="text-right">{{ number_format($racun->pdv, 2, ',', '.') }}</td>
                <td class="text-right">{{ number_format($racun->ukupno, 2, ',', '.') }}</td>
                <td class="text-right">
                    <a href="{{ route('racuni.detalj', $racun->id) }}" class="btn btn-success btn-xs">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-info btn-xs"
                       href="{{ route('racuni.izmena.get', $racun->id) }}">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <button class="btn btn-danger btn-xs otvori-brisanje"
                            data-toggle="modal" data-target="#brisanjeModal"
                            value="{{ $racun->id }}">
                        <i class="fa fa-trash"></i>
                    </button>
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
    <a href="{{ route('racuni.dodavanje.get', $data->id) }}" class="btn btn-primary btn-sm">
        <i class="fa fa-plus-circle"></i> Dodaj račun
    </a>
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
<!--  POCETAK brisanjeModal [brisanje racuna] -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
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
    $(document).on('click', '.otvori-brisanje', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('racuni.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection
