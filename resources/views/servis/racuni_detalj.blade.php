@extends('sabloni.app')

@section('naziv', 'Šifarnici | Račun')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Racun" src="{{ url('/images/ugovor.png') }}" style="height:64px;">
    Detaljni pregled računa broj:
    <em>{{ $racun->broj }}</em>
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
            <a class="btn btn-primary" href="{{ route('racuni') }}"
               title="Povratak na listu računa">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('racuni.izmena.get', $racun->id) }}"
               title="Izmena podataka o računu">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="brisanjeRacuna" class="btn btn-primary"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$racun->id}}"
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
                    <th style="width: 20%;">Broj:</th>
                    <td style="width: 80%;">{{ $racun->broj }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Datum:</th>
                    <td style="width: 80%;">{{ \Carbon\Carbon::parse($racun->datum)->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Iznos:</th>
                    <td style="width: 80%;">{{ number_format($racun->iznos, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">PDV:</th>
                    <td style="width: 80%;">{{ number_format($racun->pdv, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Ukupno:</th>
                    <td style="width: 80%;">{{ number_format($racun->ukupno, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Ugovor:</th>
                    <td style="width: 80%;">
                        <a href="{{ route('ugovori.detalj', $racun->ugovor->id) }}">
                            <strong>{{ $racun->ugovor->broj }}</strong>
                        </a>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%;">Napomena:</th>
                    <td style="width: 80%;">{{ $racun->napomena }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<hr>
<div class="row well" style="overflow: auto;">
    <h3>Otpremnice</h3>
    <hr style="border-top: 1px solid #18BC9C">
    @if($otpremnice->isEmpty())
    <p class="text-danger">Trenutno nema podataka o otpremnicama za ovaj račun</p>
    @else
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th style="width: 25%;">Broj</th>
                <th style="width: 15%;">Datum</th>
                <th style="width: 15%">Dobavljač</th>
                <th style="width: 15%;">Broj profakture</th>
                <th style="width: 15%; text-align: right;">Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($otpremnice as $otpremnica)
            <tr>
                <td>
                    <a href="{{ route('otpremnice.detalj', $otpremnica->id) }}">
                        <strong>{{ $otpremnica->broj }}</strong>
                    </a>
                </td>
                <td>{{ \Carbon\Carbon::parse($otpremnica->datum)->format('d.m.Y') }}</td>
                <td class="text-right">{{ $otpremnica->dobavljac->naziv }}</td>
                <td class="text-right">{{ $otpremnica->broj_profakture }}</td>
                <td class="text-right">
                    <a href="{{ route('otpremnice.detalj', $otpremnica->id) }}" class="btn btn-success btn-xs">
                        <i class="fa fa-eye"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('otpremnice.dodavanje.get', $racun->id) }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus-circle"></i> Dodaj otpremnicu
            </a>
        </div>
        <div class="col-md-6 text-right">
            {{ $otpremnice->links() }}
        </div>
    </div>
</div>
@endsection

@section('traka')
<div class="well">
    <h3>Dodavanje slike</h3>
    <form action="{{route('racuni.dodavanje.slike', $racun->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <label for="slika" class="btn btn-warning ono">
            <i class="fa fa-upload"></i> Izaberi scan računa
        </label>
        <input type="file" name="slika" id="slika" class="hide" required>
        <button type="submit" class="btn btn-success ono">
            <i class="fa fa-floppy-o"></i> Prosledi scan
        </button>
        <button type="reset" class="btn btn-danger ono">
            <i class="fa fa-ban"></i> Otkaži
        </button>
    </form>
    <hr style="border-top: 1px solid #18BC9C">
    <h3>Slike</h3>
    @if($racun->slike->isEmpty())
    <h5 class="text-danger">Trenutno nema slika za ovaj račun</h5>
    @else
    @foreach($racun->slike as $slika)
    <div class="img-thumbnail center-block" style="width: 80%; margin: 10px auto;">
        <img data-toggle="modal"
             data-target="#slikaModal"
             src="{{asset('images/racuni/' . $slika->src)}}"
             class="img-responsive"
             style="width: 80%; margin: 10px auto;">
        <button class="btn btn-danger btn-xs btn-block otvori-brisanje"
                style="width: 80%; margin: 5px auto;"
                data-toggle="modal" data-target="#brisanjeModal"
                value="{{$slika->id}}">
            <i class="fa fa-trash"></i>
        </button>
    </div>

    @endforeach
    @endif
</div>

<!--  POCETAK brisanjeModal [brisanje slike] -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->

<!-- Modal za pregled fotografija -->
<div id="slikaModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <img id="slikaRacuna" class="img-responsive center-block" src="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('skripte')
<script>
    $('#slikaModal').on('show.bs.modal', function (e) {
        var image = $(e.relatedTarget).attr('src');
        $('#slikaRacuna').attr('src', image);
    });

    $(document).on('click', '.otvori-brisanje', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('racuni.brisanje.slike') }}";
        $('#brisanje-forma').attr('action', ruta);
    });

    $(document).on('click', '#brisanjeRacuna', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('racuni.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection
