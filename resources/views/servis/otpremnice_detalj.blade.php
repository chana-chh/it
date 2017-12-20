@extends('sabloni.app')

@section('naziv', 'Šifarnici | Otpremnica')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Racun" src="{{ url('/images/otpremnice.png') }}" style="height:64px;">
    Pregled otpremnice: <em>{{ $otpremnica->broj }}</em>
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
            <a class="btn btn-primary" href="{{ route('otpremnice') }}"
               title="Povratak na listu računa">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('otpremnice.izmena.get', $otpremnica->id) }}"
               title="Izmena podataka o računu">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="brisanjeOtpremnice" class="btn btn-primary"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$otpremnica->id}}"
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
                    <td style="width: 80%;">{{ $otpremnica->broj }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Datum:</th>
                    <td style="width: 80%;">{{ \Carbon\Carbon::parse($otpremnica->datum)->format('d.m.Y') }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Račun:</th>
                    <td style="width: 80%;">
                        @if($otpremnica->racun)
                        <a href="{{ route('racuni.detalj', $otpremnica->racun->id)}}">
                            <strong>{{ $otpremnica->racun->broj }}</strong>
                        </a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%;">Dobavljač:</th>
                    <td style="width: 80%;">{{ $otpremnica->dobavljac->naziv }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Broj profakture:</th>
                    <td style="width: 80%;">{{ $otpremnica->broj_profakture }}</td>
                </tr>
                <tr>
                    <th style="width: 20%;">Napomena:</th>
                    <td style="width: 80%;">{{ $otpremnica->napomena }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<hr>
<div class="row well" style="overflow: auto;">

    <a href="{{ route('otpremnice.stavke', $otpremnica->id) }}" class="btn btn-primary btn-lg">
        Stavke otpremnice <i class="fa fa-arrow-right fa-fw"></i>
    </a>
    <hr style="border-top: 1px solid #18BC9C">
    @if($otpremnica->stavke->isEmpty())
    <p class="text-danger">Trenutno nema stavki za ovu otpremnicu</p>
    @else
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th style="width: 10%;">#</th>
                <th style="width: 45%;">Naziv</th>
                <th style="width: 15%;">Jedinica mere</th>
                <th style="width: 15%; text-align: right;">Količina</th>
                <th style="width: 15%; text-align: right;">Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($otpremnica->stavke as $stavka)
            <tr>
                <td>{{ $stavka->id }}</td>
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
    <h3>Dodavanje slike</h3>
    <form action="{{route('otpremnice.dodavanje.slike', $otpremnica->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <label for="slika" class="btn btn-warning ono">
            <i class="fa fa-upload"></i> Izaberi scan otpremnice
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
    @if($otpremnica->slike->isEmpty())
    <h5 class="text-danger">Trenutno nema slika za ovu otpremnicu</h5>
    @else
    @foreach($otpremnica->slike as $slika)
    <div class="img-thumbnail center-block" style="width: 80%; margin: 10px auto;">
        <img data-toggle="modal"
             data-target="#slikaModal"
             src="{{asset('images/otpremnice/' . $slika->src)}}"
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
                <img id="slikaOtpremnice" class="img-responsive center-block" src="">
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
        $('#slikaOtpremnice').attr('src', image);
    });

    $(document).on('click', '.otvori-brisanje', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('otpremnice.brisanje.slike') }}";
        $('#brisanje-forma').attr('action', ruta);
    });

    $(document).on('click', '#brisanjeOtpremnice', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('otpremnice.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });
</script>
@endsection
