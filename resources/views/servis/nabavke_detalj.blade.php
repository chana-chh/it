@extends('sabloni.app')

@section('naziv', 'Nabavka')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Nabavka" src="{{ url('/images/nabavke.png') }}" style="height:64px;">
    Pregled nabavke:
    <em class="text-danger">
        {{ $nabavka->dobavljac->naziv }} od {{ \Carbon\Carbon::parse($nabavka->datum)->format('d.m.Y') }}
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
            <a class="btn btn-primary" href="{{ route('nabavke') }}"
               title="Povratak na listu nabavki">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('nabavke.izmena.get', $nabavka->id) }}"
               title="Izmena podataka o nabavci">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="brisanjeOtpremnice" class="btn btn-primary"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$nabavka->id}}"
                    title="Brisanje računa">
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
                    <th style="width: 20%;">Dobavljač:</th>
                    <td style="width: 80%;">
                        <a href="{{ route('dobavljaci.detalj', $nabavka->dobavljac->id) }}">
                            <strong>{{ $nabavka->dobavljac->naziv }}</strong>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%;">Datum:</th>
                    <td style="width: 80%;">{{ \Carbon\Carbon::parse($nabavka->datum)->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Garancija (meseci):</th>
                    <td style="width: 80%;">{{ $nabavka->garancija }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Napomena:</th>
                    <td style="width: 80%;">{{ $nabavka->napomena }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<hr>
<div class="row well" style="overflow: auto;">
    <h3>Stavke nabavke</h3>
    <hr style="border-top: 1px solid #18BC9C">
    @if($nabavka->stavke->isEmpty())
    <p class="text-danger">Trenutno nema stavki za ovu nabavku</p>
    @else
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th style="width: 10%;">#</th>
                <th style="width: 15%;">Vrsta uređaja</th>
                <th style="width: 30%;">Naziv</th>
                <th style="width: 15%;">Jedinica mere</th>
                <th style="width: 15%; text-align: right;">Količina</th>
                <th style="width: 15%; text-align: right;">Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($nabavka->stavke as $stavka)
            <tr>
                <td>{{ $stavka->id }}</td>
                <td>{{ $stavka->vrstaUredjaja->naziv }}</td>
                <td>{{ $stavka->naziv }}</td>
                <td>{{ $stavka->jedinica_mere }}</td>
                <td class="text-right">{{ $stavka->kolicina }}</td>
                <td class="text-right">
                    <a href="" class="btn btn-success btn-xs">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection

@section('traka')
<div class="well">
    <h3>Dodavanje stavke</h3>
    <hr style="border-top: 1px solid #18BC9C">
</div>

<!--  POCETAK brisanjeModal [brisanje slike] -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('skripte')
<script>
    $(document).on('click', '#brisanjeOtpremnice', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('nabavke.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection
