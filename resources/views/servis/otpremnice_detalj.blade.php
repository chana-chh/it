@extends('sabloni.app')

@section('naziv', 'Šifarnici | Otpremnica')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Racun" src="{{ url('/images/otpremnice.png') }}" style="height:64px;">
    Pregled otpremnice: <em class="text-success">{{ $otpremnica->broj }}</em>
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
                    <td style="width: 80%;">{{ $otpremnica->formatiran_datum }}</td>
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
    <h3>Stavke otpremnice</h3>
    <hr style="border-top: 1px solid #18BC9C">
    @if($otpremnica->stavke->isEmpty())
    <p class="text-danger">Trenutno nema stavki za ovu otpremnicu</p>
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
            @foreach($otpremnica->stavke as $stavka)
            <tr>
                <td>{{ $stavka->id }}</td>
                <td>{{ $stavka->vrstaUredjaja->naziv }}</td>
                <td>{{ $stavka->naziv }}</td>
                <td>{{ $stavka->jedinica_mere }}</td>
                <td class="text-right">{{ $stavka->kolicina }}</td>
                <td class="text-right">
                    <a href="{{route('otpremnice.stavke.detalj', $stavka->id)}}" class="btn btn-success btn-xs">
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
    <form action="{{ route('otpremnice.stavke.dodavanje.post') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}
        <input type="hidden" name="otpremnica_id" value="{{ $otpremnica->id }}">
        <div class="form-group{{ $errors->has('vrsta_uredjaja_id') ? ' has-error' : '' }}">
            <label for="vrsta_uredjaja_id">Vrsta uređaja:</label>
            <select id="vrsta_uredjaja_id" name="vrsta_uredjaja_id"
                    class="chosen-select form-control"
                    data-placeholder="Vrsta uređaja ..." required>
                <option value=""></option>
                @foreach($vrste as $vrsta)
                <option value="{{ $vrsta->id }}"
                        {{ old('vrsta_uredjaja_id') == $vrsta->id ? ' selected' : '' }}>
                        {{ $vrsta->naziv }}</option>
                @endforeach
            </select>
            @if ($errors->has('vrsta_uredjaja_id'))
            <span class="help-block">
                <strong>{{ $errors->first('vrsta_uredjaja_id') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
            <label for="naziv">Naziv:</label>
            <input type="text" id="naziv" name="naziv"
                   class="form-control"
                   value="{{ old('naziv') }}"
                   maxlength="255" required>
            @if ($errors->has('naziv'))
            <span class="help-block">
                <strong>{{ $errors->first('naziv') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('jedinica_mere') ? ' has-error' : '' }}">
            <label for="jedinica_mere">Jedinica mere:</label>
            <select id="jedinica_mere" name="jedinica_mere"
                    class="chosen-select form-control"
                    data-placeholder="jedinica mere ...">
                <option value=""></option>
                <option value="komad">komad</option>
                <option value="sat">sat</option>
                <option value="metar">metar</option>
                <option value="kilogram">kilogram</option>
            </select>
            @if ($errors->has('jedinica_mere'))
            <span class="help-block">
                <strong>{{ $errors->first('jedinica_mere') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('kolicina') ? ' has-error' : '' }}">
            <label for="kolicina">Količina:</label>
            <input type="number" id="kolicina" name="kolicina"
                   class="form-control"
                   value="{{ old('kolicina', 0) }}"
                   min="0" required>
            @if ($errors->has('kolicina'))
            <span class="help-block">
                <strong>{{ $errors->first('kolicina') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
            <label for="napomena">Napomena:</label>
            <textarea id="napomena" name="napomena"
                      class="form-control">{{ old('napomena') }}</textarea>
            @if ($errors->has('napomena'))
            <span class="help-block">
                <strong>{{ $errors->first('napomena') }}</strong>
            </span>
            @endif
        </div>
        <div class="row dugmici">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-6 snimi">
                        <button type="submit" class="btn btn-success btn-block ono">
                            <i class="fa fa-plus-circle"></i> Dodaj
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block ono" href="{{ route('otpremnice.detalj', $otpremnica->id) }}">
                            <i class="fa fa-ban"></i> Otkaži
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <hr style="border-top: 1px solid #18BC9C">
    <h3>Dodavanje slike</h3>
    <form action="{{route('otpremnice.dodavanje.slike', $otpremnica->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" disabled="disabled">
            <span class="input-group-btn">
                <button type="button" class="btn btn-danger image-preview-clear" style="display:none;">
                    <span class="glyphicon glyphicon-remove"></span> Poništi
                </button>
                <div class="btn btn-warning image-preview-input">
                    <span>
                        <i class="fa fa-upload" aria-hidden="true"></i>
                    </span>
                    <span class="image-preview-input-title">Odaberi</span>
                    <input type="file" accept="image/png, image/jpeg, image/gif" name="slika" id="slika" required/>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-floppy-o"></i> Sačuvaj
                </button>
            </span>
        </div>
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
    $(document).ready(function () {
        $('#slikaModal').on('show.bs.modal', function (e) {
            var image = $(e.relatedTarget).attr('src');
            $('#slikaOtpremnice').attr('src', image);
        });

        $("#jedinica_mere").change(function() {
        var vrednost = $(this).val();
        if (vrednost != "komad") {
            $('#kolicina').prop('step', "0.01");
        }else{
            $('#kolicina').prop('step', "1");
        }
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

        jQuery(window).on('resize', resizeChosen);

        $('.chosen-select').chosen({
            allow_single_deselect: true
        });

        function resizeChosen() {
            $(".chosen-container").each(function () {
                $(this).attr('style', 'width: 100%');
            });
        }

        $(document).on('click', '#close-preview', function () {
            $('.image-preview').popover('hide');

            $('.image-preview').hover(
                    function () {
                        $('.image-preview').popover('show');
                    },
                    function () {
                        $('.image-preview').popover('hide');
                    }
            );
        });

        $(function () {

            var closebtn = $('<button/>', {
                type: "button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;'
            });
            closebtn.attr("class", "close pull-right");

            $('.image-preview').popover({
                trigger: 'manual',
                html: true,
                title: "<strong>Преглед</strong>" + $(closebtn)[0].outerHTML,
                content: "Фотографија није одабрана",
                placement: 'bottom'
            });

            $('.image-preview-clear').click(function () {
                $('.image-preview').attr("data-content", "").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("Одабери");
            });

            $(".image-preview-input input:file").change(function () {
                var img = $('<img/>', {
                    id: 'dynamic',
                    height: 200
                });
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(".image-preview-input-title").text("Измени");
                    $(".image-preview-clear").show();
                    $(".image-preview-filename").val(file.name);
                    img.attr('src', e.target.result);
                    $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                }
                reader.readAsDataURL(file);
            });
        });
    });
</script>
@endsection
