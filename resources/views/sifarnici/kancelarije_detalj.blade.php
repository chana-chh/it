@extends('sabloni.app')

@section('naziv', 'Šifarnici | Kancelarija detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Kancelarija detaljno"
         src="{{ url('/images/kancelarije.png') }}" style="height:64px;">
    &emsp;Kancelarija detaljno
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
            <a class="btn btn-primary" href="{{route('kancelarije')}}"
               title="Povratak na listu kancelarija">
                <i class="fa fa-list"></i>
            </a>
            <button class="btn btn-primary otvori-izmenu"
                        data-toggle="modal" data-target="#editModal"
                        value="{{ $kancelarija->id }}">
                    <i class="fa fa-pencil"></i>
            </button>
            <button id="idBrisanjeKancelarije" class="btn btn-warning"
                    title="Brisanje kancelarije"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$kancelarija->id}}">
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
                <td style="width: 20%;">Lokacija:</td>
                <td style="width: 70%;">{{$kancelarija->lokacija->naziv}}</td>
                <td style="width: 10%;"></td>
            </tr>
            <tr>
                <td style="width: 20%;">Naziv/broj:</td>
                <td style="width: 70%;">{{$kancelarija->naziv}}</td>
                <td style="width: 10%;"></td>
            </tr>

            <tr>
                <td style="width: 20%;">Sprat:</td>
                <td style="width: 70%;">{{$kancelarija->sprat->naziv}}
                <td style="width: 10%;"></td>
            </tr>

            <tr>
                <td style="width: 20%;">Telefoni:</td>
                <td style="width: 70%;">

                    @foreach ($kancelarija->telefoni as $t)
                        {{$t->broj}}, {{$t->vrsta}}<br>
                    @endforeach
                </td>

                <td style="width: 10%;" class="text-right"><button id="idKancelarije" class="btn btn-success btn-xs"
                    title="Dodaj telefon"
                    data-toggle="modal" data-target="#telefonModal"
                    value="{{$kancelarija->id}}">
                <i class="fa fa-plus"></i>
                </button>
                </td>
                
            </tr>
            <tr>
                <th style="width: 20%;">Napomena:</th>
                <td style="width: 70%;"><em>{{$kancelarija->napomena}}</em>
                <td style="width: 10%;"></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
    
<div class="row ceo_dva">
<div class="col-md-12 boxic">
<h4 class="text-primary">IKT oprema u kancelariji:</h4>
    @if($uredjaji->isEmpty())
    <p class="text-danger">U ovoj kancelariji nema IKT opreme</p>
    @else
    <table class="table table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th style="width: 15%;">Vrsta</th>
                <th style="width: 15%;">Naziv</th>
                <th style="width: 15%;">Serijski broj</th>
                <th style="width: 15%;">Inventarski broj</th>
                <th style="width: 40%;">Tehnički detalji</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uredjaji as $uredjaj)
            <tr>
                <td>{{ $uredjaj->vrsta_uredjaja }}</td>
                <td>{{ $uredjaj->naziv }}</td>
                <td>{{ $uredjaj->serijski_broj }}</td>
                <td>{{ $uredjaj->inventarski_broj }}</td>
                <td>{{ $uredjaj->tehnicki_detalji }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $uredjaji->render() }}
    @endif
</div>
</div>

<!--  POCETAK brisanjeModal  -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->

{{--  pocetak modal_mobilni_dodavanje  --}}
    <div class="modal fade" id="telefonModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-success">Dodavanje broja telefona</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kancelarija.telefon.dodavanje.post') }}" method="POST" id="frmTelefonDodavanje" data-parsley-validate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                  <div class="form-group{{ $errors->has('broj_telefona') ? ' has-error' : '' }}">
                                    <label for="broj_telefona">Broj:</label>
                                    <input type="text" name="broj_telefona" id="broj_telefona" class="form-control"
                                    value="{{ old('broj_telefona') }}" required>
                                    @if ($errors->has('broj_telefona'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('broj_telefona') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                        <label for="vrstaModal">Vrsta:</label>
                            <select class="form-control" name="vrstaModal" id="vrstaModal" data-placeholder="vrsta ..." required>
                                <option value="1">Direktni</option>
                                <option value="2">Lokal</option>
                                <option value="3">Fax</option>
                            </select>
                    </div>
                </div>
                        </div>

                        <input type="hidden" id="kancelarija_id" name="kancelarija_id" value="{{$kancelarija->id}}">
                        <hr>
                                                        <div class="row dugmici" style="margin-top: 30px;">
            <div class="col-md-10 col-md-offset-1" >
                <div class="form-group">
                    <div class="col-md-6 snimi">
                        <button id = "btn-dodaj-telefon" type="submit" class="btn btn-success btn-block ono">
                            <i class="fa fa-plus"></i>&emsp;Dodaj
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-warning btn-block ono" data-dismiss="modal">
                            <i class="fa fa-ban"></i>&emsp;Otkaži
                        </a>
                    </div>
                </div>
            </div>
        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  kraj modal_telefon_dodavanje  --}}

    {{-- Pocetak Modala za dijalog izmena--}}
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-primary">Izmeni stavku</h4>
          </div>
          <div class="modal-body">
            <form action="{{ route('kancelarije.izmena') }}" method="post">
              {{ csrf_field() }}
              
                <div class="form-group">
                  <label for="nazivModal">Naziv/broj:</label>
                  <input type="text" class="form-control" id="nazivModal" name="nazivModal">
                </div>

                <div class="form-group">
                    <label for="lokacija_idModal">Lokacija</label>
                    <select class="form-control" name="lokacija_idModal" id="lokacija_idModal" data-placeholder="lokacija ...">
                    </select>
                </div>

                <div class="form-group">
                  <label for="sprat_idModal">Sprat:</label>
                  <select class="form-control" name="sprat_idModal" id="sprat_idModal" data-placeholder="sprat ...">
                    </select>
                </div>

                <div class="form-group">
                  <label for="napomenaModal">Napomena:</label>
                  <textarea class="form-control" id="napomenaModal" name="napomenaModal"></textarea>
                </div>

              <input type="hidden" id="idModal" name="idModal">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Snimi izmene
                    </button>
            </form>
          </div>
         <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-ban"></i> Otkaži
                </button>
            </div> 
        </div>
        
      </div>
    </div>
    {{-- Kraj Modala za dijalog izmena--}}

@endsection

@section('traka')
<div class="row well" style="margin-top: 5rem;">
    <div class="col-md-12">
<h4 style="margin-bottom: 2rem">Činovnici u kancelariji:</h4>

    @foreach ($kancelarija->zaposleni as $z)
            
                <div class="row" style="margin-top: 10px">

                    <div class="col-md-1">
                <strong>{{ $loop->iteration }}.</strong>
                    </div>
                    <div class="col-md-8">
                    <a href="{{ route('zaposleni.detalj', $z->id) }}">{{$z->imePrezime()}}</a>
                    </div>
                    <div class="col-md-3">
                    <a href="" title="Ukloni zaposlenog iz kancelarije" id="zaposleniUkljanjanje" 
                    data-toggle="modal" data-target="#zaposleniUkljanjanjeModal" data-zaposleniid="{{$z->id}}"
                    ><i class="fa fa-close text-danger"></i></a>
                    </div>
                </div>

    @endforeach

</div>

<div class="row">
    <div class="col-md-12 text-right">
        <hr style="border-top: 1px dashed; color: #18BC9C;">
        <button id="idZaposleni" class="btn btn-success btn-xs"
                    title="Dodaj zaposlenog"
                    data-toggle="modal" data-target="#zaposleniModal"
                    value="{{$kancelarija->id}}">
                <i class="fa fa-plus"></i></button>
    </div>
    
</div>
</div>
{{--  pocetak modal_zaposleni_uklanjanje  --}}
<div id = "zaposleniUkljanjanjeModal" class = "modal fade">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button class = "close" data-dismiss = "modal">&times;</button>
                <h1 class = "modal-title text-danger">Upozorenje!</h1>
            </div>
            <div class = "modal-body">
                <h3>Da li želite trajno da uklonite zaposlenog iz kancelarije? *</h3>
                <p class = "text-danger">* Ova akcija je nepovratna!</p>
                <form id="uklanjanje-forma" action="" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="idUklanjanjeZaposleni" name="idUklanjanjeZaposleni">
                    <hr style="margin-top: 30px;">

                    <div class="row dugmici" style="margin-top: 30px;">
                        <div class="col-md-12" >
                            <div class="form-group">
                                <div class="col-md-6 snimi">
                                    <button id = "btn-brisanje-obrisi" type="submit" class="btn btn-danger btn-block ono">
                                        <i class="fa fa-minus"></i>&emsp;Ukloni
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-block ono" data-dismiss="modal">
                                        <i class="fa fa-ban"></i>&emsp;Otkaži
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--  kraj modal_zaposleni_uklanjanje  --}}
{{--  pocetak modal_zaposleni_dodavanje  --}}
    <div class="modal fade" id="zaposleniModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title text-success">Dodavanje zaposlenog u kancelariju</h3>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kancelarija.zaposleni.dodavanje.post') }}" method="POST" id="frmZaposleniDodavanje" data-parsley-validate>
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group{{ $errors->has('zaposleni_id') ? ' has-error' : '' }}">
                    <label for="zaposleni_id">Zaposleni:</label>
                    <select name="zaposleni_id" id="zaposleni_id" class="chosen-select form-control" data-placeholder="zaposleni ..." required>
                        <option value=""></option>
                        @foreach($zaposleni as $radnik)
                        <option value="{{ $radnik->id }}"{{ old('zaposleni_id') == $radnik->id ? ' selected' : '' }}>
                            {{ $radnik->Imeprezime() }}, {{ $radnik->uprava ? $radnik->uprava->naziv : 'neraspoređen' }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('zaposleni_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('zaposleni_id') }}</strong>
                        </span>
                    @endif
        </div>
                        

                        <input type="hidden" id="kancelarija_id" name="kancelarija_id" value="{{$kancelarija->id}}">
                        </div>
                         </div>
                        <hr>
                       
            <div class="row dugmici" style="margin-top: 30px;">
            <div class="col-md-10 col-md-offset-1" >
                <div class="form-group">
                    <div class="col-md-6 snimi">
                        <button id = "btn-dodaj-zaposlenog" type="submit" class="btn btn-success btn-block ono">
                            <i class="fa fa-plus"></i>&emsp;Dodaj
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-warning btn-block ono" data-dismiss="modal">
                            <i class="fa fa-ban"></i>&emsp;Otkaži
                        </a>
                    </div>
                </div>
            </div>
        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--  kraj modal_zaposleni_dodavanje  --}}
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

    $('#zaposleniModal').on('shown.bs.modal', function () {
        $('.chosen-select', this).chosen({
            allow_single_deselect: true,
            search_contains: true
            });
            resizeChosen();
    });
    
    jQuery(window).on('resize', resizeChosen);

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };
   
   $(document).on('click', '#zaposleniUkljanjanje', function () {
            var id = $(this).data("zaposleniid");
            $('#idUklanjanjeZaposleni').val(id);
            var ruta = "{{ route('kancelarije.uklanjanje') }}";
            $('#uklanjanje-forma').attr('action', ruta); });

    $(document).on('click', '#idBrisanjeKancelarije', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('kancelarije.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta); });

    $(document).on('click','.otvori-izmenu',function(){

        var id = $(this).val();
        var ruta = "{{ route('kancelarije.detalj') }}";

        $.ajax({
        url: ruta,
        type:"POST", 
        data: {"id":id, _token: "{!! csrf_token() !!}"},
        success: function(result){

          $("#idModal").val(result.kancelarije.id);
          $("#nazivModal").val(result.kancelarije.naziv);
          $("#napomenaModal").val(result.kancelarije.napomena);
          
            $.each(result.lokacije, function(index, lokObjekat){
            $('#lokacija_idModal').append('<option value="'+lokObjekat.id+'">'+lokObjekat.naziv+'</option>');
            });
            $("#lokacija_idModal").val(result.kancelarije.lokacija_id);

             $.each(result.spratovi, function(i, lokObjekats){
            $('#sprat_idModal').append('<option value="'+lokObjekats.id+'">'+lokObjekats.naziv+'</option>');
            });
             $("#sprat_idModal").val(result.kancelarije.sprat_id);
        }
      });     

    });

});
</script>
@endsection