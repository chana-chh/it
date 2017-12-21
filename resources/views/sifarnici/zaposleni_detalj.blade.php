@extends('sabloni.app')

@section('naziv', 'Šifarnici | Zaposleni detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Zaposleni detalj" src="{{url('/images/korisnik_jedan.png')}}" style="height:50px;">
        Detaljni pregled zaposlenog &emsp;
         <em class="text-success">{{ $zaposleni->imePrezime() }}</em>
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
            <a class="btn btn-primary" href="{{route('zaposleni')}}"
               title="Povratak na listu zaposlenih">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('zaposleni.izmena.get', $zaposleni->id) }}"
               title="Izmena podataka o zaposlenom">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="brisanjeOtpremnice" class="btn btn-primary"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$zaposleni->id}}"
                    title="Brisanje zaposlenog">
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
                <th style="width: 20%;">Uprava:</th>
                <td style="width: 80%;">{{$zaposleni->uprava->naziv}}</td>
            </tr>
            <tr>
                <th style="width: 20%;">Kancelarija:</th>
                <td style="width: 80%;">{{$zaposleni->kancelarija->naziv}}, {{$zaposleni->kancelarija->lokacija->naziv}}, {{$zaposleni->kancelarija->sprat->naziv}}, 
                </td>
            </tr>
            @if ($zaposleni->kancelarija->telefoni)
            <tr>
                <th style="width: 20%;">Telefoni:</th>
                <td style="width: 80%;">@foreach ($zaposleni->kancelarija->telefoni as $lokal)
                            {{$lokal->broj}}, {{$lokal->vrsta}} &emsp;
                    @endforeach
                </td>
            </tr>
            @endif

            @if (count($zaposleni->racunar)>0)
             <tr>
                <th style="width: 20%;">Računar:</th>
                <td style="width: 80%;">
                    @php
                        $rezultat = array();
                        foreach ($zaposleni->racunar as $racunar){
                            $rezultat[] = $racunar->ime;
                        }
                        echo implode(", ",$rezultat);
                    @endphp
                </td>
            </tr>
            @else
            <tr>
                <th style="width: 20%;">Računar:</th>
                <td style="width: 80%;">
                   Zaposleni trenutno ne koristi nijednu radnu stanicu
                </td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
</div>
    
    {{--  POCETAK REDOVI MOB/Email  --}}
    <div class="row well" style="margin: 40px 0px 0px 5px">
        {{--  POCETAK MOBILNI  --}}
        <div class="col-md-6">
        <h3>Brojevi mobilnog telefona:</h3>
        <hr style="border-top: 1px solid #18BC9C">
        <table class="table table-striped table-responsive">
            
                @if (count($zaposleni->mobilni)>0)
                
                <tbody>
                @foreach ($zaposleni->mobilni as $mobilni_telefon)
                    <tr>
                        <td style="width: 10%;"><span title="Radi se o službenom telefonu"><b>{{ $mobilni_telefon->sluzbeni == 1 ? "s" : "" }}</b></span></td>
                        <td style="width: 35%;"><strong class="text-info">{{ $mobilni_telefon->broj }}</strong></td>
                        <td style="width: 40%;"><em>{{ str_limit($mobilni_telefon->napomena, 60) }}</em></td>
                        <td style="width: 15%;">
                            <button
                                class="btn btn-success btn-xs" id="dugmeMobilniIzmeni"
                                data-toggle="modal" data-target="#izmeniMobilniModal" value="{{$mobilni_telefon->id}}">
                                    <i class="fa fa-pencil"></i>
                            </button>
                            <button
                                class="btn btn-danger btn-xs" id="dugmeMobilniBrisanje"
                                value="{{$mobilni_telefon->id}}">
                                    <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach

                @else
                   <tr>
                        <td>Nema podataka o brojevima mobilnog telefona</td>
                    </tr>
                @endif
                </tbody>
                
        </table>

        <hr style="border-top: 1px solid #18BC9C">
        <button
            class="btn btn-success btn-sm" id="dugmeDodajMobilni"
            data-toggle="modal" data-target="#dodajMobilniModal" value="{{ $zaposleni->id }}">
                <i class="fa fa-plus-circle"></i> Dodaj broj mobilnog telefona
        </button>
    </div>

    {{--  pocetak modal_mobilni_dodavanje  --}}
    <div class="modal fade" id="dodajMobilniModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-success">Dodavanje broja mobilnog telefona</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('zaposleni.mobilni.dodavanje.post') }}" method="POST" id="frmMobilniDodavanje" data-parsley-validate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8">
                                  <div class="form-group{{ $errors->has('mobilni_dodavanje_broj') ? ' has-error' : '' }}">
                                    <label for="mobilni_dodavanje_broj">Broj:</label>
                                    <input type="text" name="mobilni_dodavanje_broj" id="mobilni_dodavanje_broj" class="form-control"
                                    value="{{ old('mobilni_dodavanje_broj') }}" required>
                                    @if ($errors->has('mobilni_dodavanje_broj'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobilni_dodavanje_broj') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 form-group checkboxoviforme">
                                        <label><input type="checkbox" name="mobilni_dodavanje_sluzbeni" id="mobilni_dodavanje_sluzbeni"> &emsp;Da li je telefon službeni?</label>
                            </div>
                        </div>
                        <hr style="border-top: 2px solid #18BC9C">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('mobilni_dodavanje_napomena') ? ' has-error' : '' }}">
                                    <label for="mobilni_dodavanje_napomena">Napomena:</label>
                                    <textarea name="mobilni_dodavanje_napomena" id="mobilni_dodavanje_napomena" class="form-control">{{old('mobilni_dodavanje_napomena') }}</textarea>
                                    @if ($errors->has('mobilni_dodavanje_napomena'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobilni_dodavanje_napomena') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="zaposleni_id" name="zaposleni_id" value="{{ $zaposleni->id }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="dugmeModalDodajMobilni">
                        <i class="fa fa-floppy-o"></i> Snimi
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-ban"></i> Otkaži
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--  kraj modal_mobilni_dodavanje  --}}

    {{--  pocetak modal_mobilni_brisanje  --}}
    <div class="modal fade" id="brisanjeMobilniModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-danger">Brisanje telefonskog broja</h3>
                </div>
                <div class="modal-body">
                    <h3>Da li želite trajno da obrišete broj?</h3>
                    <h4 id="brisanje_mobilni_poruka"></h4>
                    <p class="text-danger">Ova akcija je nepovratna!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="dugmeModalObrisiMobilniBrisi">
                        <i class="fa fa-trash"></i> Obriši
                    </button>
                    <button type="button" class="btn btn-danger" id="dugmeModalObrisiMobilniOtkazi">
                        <i class="fa fa-ban"></i> Otkaži
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--  kraj modal_mobilni_brisanje  --}}

    {{--  pocetak modal_mobilni_izmena  --}}
    <div class="modal fade" id="izmeniMobilniModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-warning">Izmena broja mobilnog telefona</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mobilni.zaposleni.izmena') }}" method="POST" id="frmMobilniIzmena" data-parsley-validate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="mobilni_izmena_broj">Broj:</label>
                                    <input type="text" class="form-control" id="mobilni_izmena_broj" name="mobilni_izmena_broj" required>
                                </div>
                            </div>
                            <div class="col-md-4 form-group checkboxoviforme">
                                        <label><input type="checkbox" name="mobilni_izmena_sluzbeni" id="mobilni_izmena_sluzbeni"> &emsp;Da li je telefon službeni?</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="mobilni_izmena_napomena">Napomena:</label>
                                    <textarea class="form-control" id="mobilni_izmena_napomena" name="mobilni_izmena_napomena"></textarea>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="zaposleni_id" name="zaposleni_id" value="{{ $zaposleni->id }}">
                        <input type="hidden" id="mobilni_id" name="mobilni_id" value="{{ isset($mobilni_telefon) ?  $mobilni_telefon->id : ' '}}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="dugmeModalIzmeniMobilni">
                        <i class="fa fa-floppy-o"></i> Snimi
                    </button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <i class="fa fa-ban"></i> Otkaži
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--  kraj modal_mobilni_izmena  --}}

    {{--  KRAJ MOBILNI  --}}

     {{--  POCETAK EMAILOVI  --}}
        <div class="col-md-6">
        <h3>Adrese elektronske pošte:</h3>
        <hr style="border-top: 1px solid #18BC9C">
        <table class="table table-striped table-responsive">
            <tbody>

                @if(count($zaposleni->emailovi)>0)

                @foreach ($zaposleni->emailovi as $email)
                    <tr>
                        
                        <td style="width: 10%;"><span title="Radi se o službenoj elektronskoj adresi"><b>{{ $email->sluzbena == 1 ? "s" : "" }}</b></span></td>
                        <td style="width: 35%;"><strong class="text-info"><a href="mailto:{{$email->adresa }}">{{$email->adresa }}</a></strong></td>
                        <td style="width: 40%;"><em>{{ str_limit($email->napomena, 60) }}</em></td>
                        <td style="width: 15%;">
                            <button
                                class="btn btn-success btn-xs" id="dugmeEmailIzmeni"
                                data-toggle="modal" data-target="#izmeniEmailModal" value="{{$email->id}}">
                                    <i class="fa fa-pencil"></i>
                            </button>
                            <button
                                class="btn btn-danger btn-xs" id="dugmeEmailBrisanje"
                                value="{{$email->id}}">
                                    <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                        <tr>
                            <td>Nema podataka o e-mail adresi</td>
                        </tr>
                    @endif
                
            </tbody>
        </table>
        <hr style="border-top: 1px solid #18BC9C">
        <button
            class="btn btn-success btn-sm" id="dugmeDodajEmail"
            data-toggle="modal" data-target="#dodajEmailModal" value="{{ $zaposleni->id }}" style="float: right;">
                <i class="fa fa-plus-circle"></i> Dodaj e-mail adresu
        </button>
    </div>

    {{--  pocetak modal_emailovi_dodavanje  --}}
    <div class="modal fade" id="dodajEmailModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-success">Dodavanje elektronske adrese</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('zaposleni.email.dodavanje.post') }}" method="POST" id="frmEmailDodavanje" data-parsley-validate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8">
                                  <div class="form-group{{ $errors->has('email_dodavanje_adresa') ? ' has-error' : '' }}">
                                    <label for="email_dodavanje_adresa">Adresa:</label>
                                    <input type="email" name="email_dodavanje_adresa" id="email_dodavanje_adresa" class="form-control"
                                    value="{{ old('email_dodavanje_adresa') }}" required>
                                    @if ($errors->has('email_dodavanje_adresa'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email_dodavanje_adresa') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4 form-group checkboxoviforme">
                                        <label><input type="checkbox" name="email_dodavanje_sluzbeni" id="email_dodavanje_sluzbeni"> &emsp;Da li je elektronska adresa službena?</label>
                            </div>
                        </div>
                        <hr style="border-top: 2px solid #18BC9C">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group{{ $errors->has('email_dodavanje_napomena') ? ' has-error' : '' }}">
                                    <label for="email_dodavanje_napomena">Napomena:</label>
                                    <textarea name="email_dodavanje_napomena" id="email_dodavanje_napomena" class="form-control">{{old('email_dodavanje_napomena') }}</textarea>
                                    @if ($errors->has('email_dodavanje_napomena'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email_dodavanje_napomena') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="zaposleni_id" name="zaposleni_id" value="{{ $zaposleni->id }}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="dugmeModalDodajEmail">
                        <i class="fa fa-floppy-o"></i> Snimi
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-ban"></i> Otkaži
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--  kraj modal_email_dodavanje  --}}

    {{--  pocetak modal_email_brisanje  --}}
    <div class="modal fade" id="brisanjeEmailModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-danger">Brisanje elektronske adrese</h3>
                </div>
                <div class="modal-body">
                    <h3>Da li želite trajno da obrišete elektronsku adresu?</h3>
                    <h4 id="brisanje_email_poruka"></h4>
                    <p class="text-danger">Ova akcija je nepovratna!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="dugmeModalObrisiEmailBrisi">
                        <i class="fa fa-trash"></i> Obriši
                    </button>
                    <button type="button" class="btn btn-danger" id="dugmeModalObrisiEmailOtkazi">
                        <i class="fa fa-ban"></i> Otkaži
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--  kraj modal_email_brisanje  --}}

    {{--  pocetak modal_email_izmena  --}}
    <div class="modal fade" id="izmeniEmailModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-warning">Izmena elektronske adrese</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('email.zaposleni.izmena') }}" method="POST" id="frmEmailIzmena" data-parsley-validate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="email_izmena_adresa">Adresa:</label>
                                    <input type="email" class="form-control" id="email_izmena_adresa" name="email_izmena_adresa" required>
                                </div>
                            </div>
                            <div class="col-md-4 form-group checkboxoviforme">
                                        <label><input type="checkbox" name="email_izmena_sluzbeni" id="email_izmena_sluzbeni"> &emsp;Da li je elektonska adresa službena?</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email_izmena_napomena">Napomena:</label>
                                    <textarea class="form-control" id="email_izmena_napomena" name="email_izmena_napomena"></textarea>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="zaposleni_id" name="zaposleni_id" value="{{ $zaposleni->id }}">
                        <input type="hidden" id="email_id" name="email_id" value="{{ isset($email) ?  $email->id : ' '}}">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="dugmeModalIzmeniEmail">
                        <i class="fa fa-floppy-o"></i> Snimi
                    </button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                        <i class="fa fa-ban"></i> Otkaži
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--  kraj modal_email_izmena  --}}
    {{--  KRAJ EMAILOVI  --}}

</div> {{-- Kraj reda sa well-om --}}

<!--  POCETAK brisanjeModal  -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
<div class="panel panel-default" style="margin-top: 5rem;">
  <div class="panel-heading">
    <h3 class="panel-title">Fotografija zaposlenog:</h3>
  </div>
  <div class="panel-body">
    @if (!empty($zaposleni->src))
        <img id="{{ $zaposleni->id }}" data-toggle="modal" data-target="#slikaModal" src="{{asset('images/slike_zaposlenih/'.$zaposleni->src)}}" class="img-thumbnail center-block" style="height:150px; margin-top: 10px;" alt="Slika zaposlenog">
    @else
    Fotografija zaposlenog nije dostupna
    @endif
  </div>
</div>

<!-- Modal za pregled fotografije zaposlenog -->
<div id="slikaModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <img class="img-responsive center-block" src="" />
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
$( document ).ready(function() {

    var mobilni_brisanje_ruta = "{{ route('mobilni.zaposleni.brisanje') }}";
    var mobilni_detalj_ruta = "{{ route('mobilni.zaposleni.detalj') }}";
    var email_brisanje_ruta = "{{ route('email.zaposleni.brisanje') }}";
    var email_detalj_ruta = "{{ route('email.zaposleni.detalj') }}";

    $('#slikaModal').on('show.bs.modal', function (e) {
            var image = $(e.relatedTarget).attr('src');
            $(".img-responsive").attr("src", image);
        });

    // Modal mobilni dodavanje
    $("#dugmeModalDodajMobilni").on('click', function() {
            $('#frmMobilniDodavanje').submit();
    });

    // Modal mobilni brisanje
            $(document).on('click', '#dugmeMobilniBrisanje', function() {
                var id_brisanje = $(this).val();

                $('#brisanjeMobilniModal').modal('show');

                $('#dugmeModalObrisiMobilniBrisi').on('click', function() {

                    $.ajax({
                        url: mobilni_brisanje_ruta,
                        type:"POST",
                        data: {"id": id_brisanje, _token: "{!! csrf_token() !!}"},
                        success: function() {
                            location.reload();
                        }
                    });

                    $('#brisanjeMobilniModal').modal('hide');

                });

                $('#dugmeModalObrisiMobilniOtkazi').on('click', function() {
                    $('#brisanjeMobilniModal').modal('hide');
                });
            });

            // Modal uprave izmene
            $("#dugmeModalIzmeniMobilni").on('click', function() {
                $('#frmMobilniIzmena').submit();
            });

            $(document).on('click','#dugmeMobilniIzmeni', function() {
                var id_menjanje = $(this).val();

                $.ajax({
                    url: mobilni_detalj_ruta,
                    type:"POST",
                    data: {"id": id_menjanje, _token: "{!! csrf_token() !!}"},
                    success: function(result) {
                        $("#mobilni_izmena_broj").val(result.broj);
                        $("#mobilni_izmena_sluzbeni").prop('checked', result.sluzbeni);
                        $("#mobilni_izmena_napomena").val(result.napomena);
                    }
                });
            });


    // Modal email dodavanje
    $("#dugmeModalDodajEmail").on('click', function() {
            $('#frmEmailDodavanje').submit();
    });

    // Modal email brisanje
            $(document).on('click', '#dugmeEmailBrisanje', function() {
                var id_brisanje = $(this).val();

                $('#brisanjeEmailModal').modal('show');

                $('#dugmeModalObrisiEmailBrisi').on('click', function() {

                    $.ajax({
                        url: email_brisanje_ruta,
                        type:"POST",
                        data: {"id": id_brisanje, _token: "{!! csrf_token() !!}"},
                        success: function() {
                            location.reload();
                        }
                    });

                    $('#brisanjeEmailModal').modal('hide');

                });

                $('#dugmeModalObrisiEmailOtkazi').on('click', function() {
                    $('#brisanjeEmailModal').modal('hide');
                });
            });

            // Modal uprave izmene
            $("#dugmeModalIzmeniEmail").on('click', function() {
                $('#frmEmailIzmena').submit();
            });

            $(document).on('click','#dugmeEmailIzmeni', function() {
                var id_menjanje = $(this).val();

                $.ajax({
                    url: email_detalj_ruta,
                    type:"POST",
                    data: {"id": id_menjanje, _token: "{!! csrf_token() !!}"},
                    success: function(result) {
                        $("#email_izmena_adresa").val(result.adresa);
                        $("#email_izmena_sluzbeni").prop('checked', result.sluzbeni);
                        $("#email_izmena_napomena").val(result.napomena);
                    }
                });
            });

});
</script>
@endsection