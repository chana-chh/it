@extends('sabloni.app')

@section('naziv', 'Servis | Detaljni pregled servisiranja uređaja')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="servis detaljno" src="{{url('/images/kvar.png')}}" style="height:64px;">&emsp;
        Detaljni pregled servisiranja uređaja
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
            <a class="btn btn-primary" href="{{route('servis')}}"
               title="Povratak na listu servisa">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('servis.izmena.get', $data->id)}}"
               title="Izmena podataka servisiranja">
                <i class="fa fa-pencil"></i>
            </a>
        </div>
    </div>
</div>
        <div class="row">
    <div class="col-md-12">
<h4>Status:</h4>
        @if($data->status_id)
        <h3 class="text-success">{{$data->status->naziv}}</h3>
        <hr style="border-top: 1px solid #18BC9C">
        @endif
        </div>
    </div>
<div class="row" style="margin-top: 1rem;">
    <div class="col-md-12">
        
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 2rem;">
            <tr>
                <th style="width: 40%;">Broj prijave:</th>
                <td style="width: 60%;">{{$data->broj_prijave}}</td>
            </tr>

            <tr>
                <th style="width: 40%;">Datum prijave:</th>
                <td style="width: 60%;">{{$data->datum_prijave}}</td>
            </tr>

            <tr>
                <th style="width: 40%;">Naziv računara sa koga je izvršena prijava:</th>
                <td style="width: 60%;">@if($data->ime_racunara_prijave){{$data->ime_racunara_prijave}}@endif
                </td>
            </tr>

            <tr>
                <th style="width: 40%;">IP adresa sa koga je izvršena prijava:</th>
                <td style="width: 60%;">@if($data->ip_prijave){{$data->ip_prijave}}@endif
                </td>
            </tr>

            <tr>
                <th style="width: 40%;">Korisnik koji je prijavio problem:</th>
                <td style="width: 60%;"><a href="{{ route('zaposleni.detalj', $data->zaposleni->id) }}">{{$data->zaposleni->imePrezime()}}</a></td>
            </tr>

            <tr>
                <th style="width: 40%;">Lokacija:</th>
                <td style="width: 60%;"><a href="{{route('kancelarije.detalj.get', $data->kancelarija->id)}}">{{$data->kancelarija->sviPodaci()}}</a>
                </td>
            </tr>

            <tr>
                <th style="width: 40%;">Opis kvara korisnika:</th>
                <td style="width: 60%;">{{$data->opis_kvara_zaposleni}}</td>
            </tr>

            <tr>
                <th style="width: 40%;">Napomena:</th>
                <td style="width: 60%;"><em>{{$data->napomena}}</em></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
    
<div class="row ceo_dva">
<div class="col-md-12 boxic">
    <h3>Podaci o problemu servisera:</h3>
    <hr>
<table class="table" style="table-layout: fixed;">
        <tbody>
            @if($data->datum_prijema)
            <tr>
                <th style="width: 40%;">Datum prijema:</th>
                <td style="width: 60%;">{{$data->datum_prijema}}</td>
            </tr>
            @endif
            @if($data->datum_popravke)
            <tr>
                <th style="width: 40%;">Datum popravke:</th>
                <td style="width: 60%;">{{$data->datum_popravke}}</td>
            </tr>
            @endif
            @if($data->datum_isporuke)
            <tr>
                <th style="width: 40%;">Datum isporuke:</th>
                <td style="width: 60%;">{{$data->datum_isporuke}}
                </td>
            </tr>
            @endif
            @if($data->opis_kvara_servis)
            <tr>
                <th style="width: 40%;">Opis kvara servisera:</th>
                <td style="width: 60%;">{{$data->opis_kvara_servis}}</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
</div>

<!--  POCETAK brisanjeModal -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
        <div class="row well" style="margin-top: 5rem;">
    <div class="col-md-12">
        <h4>Dodavanje uređaja na kome je detektovan kvar</h4>
        <hr>
        <form action="{{ route('servis.pokvaren.post', $data->id) }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('vrsta_uredjaja_id') ? ' has-error' : '' }}">
                        <label for="vrsta_uredjaja_id">Vrsta uređaja:</label>
                        <select name="vrsta_uredjaja_id" id="vrsta_uredjaja_id" class="chosen-select form-control" data-placeholder="vrste uređaja ..." required>
                            <option value=""></option>
                            @foreach($vrste_uredjaja as $u)
                                <option value="{{ $u->id }}"
                                    {{ $u->id == old('vrsta_uredjaja_id') ? ' selected' : '' }}>
                                    {{$u->naziv}}
                            </option>
                            @endforeach
                    </select>
                    @if ($errors->has('vrsta_uredjaja_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('vrsta_uredjaja_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('uredjaj_id') ? ' has-error' : '' }}">
                        <label for="uredjaj_id">Uređaj:</label>
                        <select name="uredjaj_id" id="uredjaj_id" class="chosen-select form-control" data-placeholder="uređaji ..." required>
                            <option value=""></option>
                            @if($uredjaji)
                            @foreach($uredjaji as $d)
                                <option value="{{ $d->id }}"
                                    {{ $d->id == old('uredjaj_id') ? ' selected' : '' }}>
                                    {{$d->id}}
                            </option>
                            @endforeach
                            @endif
                    </select>
                    @if ($errors->has('uredjaj_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('uredjaj_id') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
    </div>

<hr style="border-top: 1px solid #18BC9C">

<div class="row dugmici">
    <div class="col-md-12">
        <div class="form-group text-right">
            <div class="col-md-6 snimi">
                <button type="submit" class="btn btn-success btn-block ono"><i class="fa fa-plus"></i>&emsp;&emsp;Dodaj</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger btn-block ono" href="{{route('servis.detalj', $data->id)}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
            </div>
        </div>
    </div>
</div>
</form>
        </div>
    </div>
<div class="row" style="margin-top: 2rem;">
    <div class="col-md-12">
        
@if($kolekcija->isNotEmpty())
@foreach($kolekcija as $uredjaj)
@if($uredjaj->tip() == 1)
<div class="panel panel-info noborder">
  <div class="panel-heading">
    <h4 class="panel-title" style="color: #2c3e50">Podaci o pokvarenom uređaju {{$loop->iteration}} :</h4>
  </div>
  <div class="panel-body">
    <table class="table">
        <tbody>
            <tr>
                <th style="width: 30%;">Vrsta uređaja:</th>
                <td style="width: 70%;">{{$uredjaj->vrstaUredjaja->naziv}}</td>
            </tr>
            @if($uredjaj->vrstaUredjaja->id == 1)
            <tr>
                <th style="width: 30%;">Da li se radi o <strong>BRAND</strong> računaru:</th>
                <td style="width: 70%;">
                        @if($uredjaj->brend == 1)
                        <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
                        @endif
                </td>
            </tr>

            @if ($uredjaj->brend == 1)
            <tr>
                <th style="width: 30%;"><strong>Proizvođač:</strong></th>
                <td style="width: 70%;">{{$uredjaj->proizvodjac->naziv}}</td>
            </tr>
            @endif

             <tr>
                <th style="width: 30%;">Da li se radi o <strong>LAPTOP</strong> računaru:</th>
                <td style="width: 70%;">
                     @if($uredjaj->laptop == 1)
                        <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
                        @endif
                </td>
            </tr>

                 <tr>
                <th style="width: 30%;">Da li se radi o <strong>SERVERU</strong> :</th>
                <td style="width: 70%;">
                     @if($uredjaj->server == 1)
                        <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
                        @endif
                </td>
            </tr>

            <tr>
                <th style="width: 30%;"><strong>Naziv računara (Aktivni direktorijum):</strong></th>
                <td style="width: 70%;">{{$uredjaj->ime}}</td>
            </tr>

            <tr>
                <th style="width: 30%;"><strong>Broj odeljenja za IKT:</strong></th>
                <td style="width: 70%;">{{$uredjaj->erc_broj}}
                </td>
            </tr>
            @endif
            @if($uredjaj->racunar)
            <tr>
                <th style="width: 30%;">Računar:</th>
                <td style="width: 70%;">{{$uredjaj->racunar->ime}}</td>
            </tr>
            @endif
             <tr>
                <th style="width: 30%;">Serijski broj:</th>
                <td style="width: 70%;">{{$uredjaj->serijski_broj}}</td>
            </tr>
            <tr>
                <th style="width: 30%;">Inventarski broj:</th>
                <td style="width: 70%;">{{$uredjaj->inventarski_broj}}</td>
            </tr>
        </tbody>
    </table>
    <div class="row">
    <div class="col-md-12 text-right">
                <a class="btn btn-primary btn-sm" id="dugmeDetalj" href="{{route('servis.redirekt', [$uredjaj->id, $uredjaj->vrsta_uredjaja_id])}}">
                    <i class="fa fa-eye"></i>
                </a>
                <button class="btn btn-danger btn-sm otvori-brisanje" data-toggle="modal" data-target="#brisanjeModal" data-uredjaj="{{$uredjaj->id}}" data-vrsta="{{$uredjaj->vrstaUredjaja->id}}" value="{{ $data->id }}">
                        <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
  </div>
</div>
<div class="row well" style="margin-right: 1px; margin-left: 1px">
    <div class="col-md-12">
<h4>Broj kvarova: {{$uredjaj->brojKvarova()}}</h4>
</div>
</div>
@elseif($uredjaj->tip() == 2)
<div class="panel panel-info noborder">
  <div class="panel-heading">
    <h4 class="panel-title" style="color: #2c3e50">Podaci o pokvarenom uređaju {{$loop->iteration}} :</h4>
  </div>
  <div class="panel-body">
    <table class="table">
        <tbody>
            <tr>
                <th style="width: 30%;">Vrsta uređaja:</th>
                <td style="width: 70%;">{{$uredjaj->vrstaUredjaja->naziv}}</td>
            </tr>
             <tr>
                <th style="width: 30%;">Serijski broj:</th>
                <td style="width: 70%;">{{$uredjaj->serijski_broj}}</td>
            </tr>
            @if($uredjaj->racunar)
            <tr>
                <th style="width: 30%;">Računar:</th>
                <td style="width: 70%;">{{$uredjaj->racunar->ime}}</td>
            </tr>
            @endif
            <tr>
                <th style="width: 30%;">Model:</th>
                <td style="width: 70%;">{{$uredjaj->dajModel()}}</td>
            </tr>
        </tbody>
    </table>
    <div class="row">
    <div class="col-md-12 text-right">
                <a class="btn btn-primary btn-sm" id="dugmeDetalj" href="{{route('servis.redirekt', [$uredjaj->id, $uredjaj->vrsta_uredjaja_id])}}">
                    <i class="fa fa-eye"></i>
                </a>
                <button class="btn btn-danger btn-sm otvori-brisanje" data-toggle="modal" data-target="#brisanjeModal" data-uredjaj="{{$uredjaj->id}}" data-vrsta="{{$uredjaj->vrstaUredjaja->id}}" value="{{ $data->id }}">
                        <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
  </div>
</div>
<div class="row well" style="margin-right: 1px; margin-left: 1px">
    <div class="col-md-12">
<h4>Broj kvarova: {{$uredjaj->brojKvarova()}}</h4>
</div>
</div>
@endif
@endforeach
@else
<div class="row">
    <div class="col-md-12">
<h3 class="text-warning">Nije utvrđeno koji je uređaj neispravan</h3>
</div>
</div>

@endif
</div>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

    $(document).on('click', '.otvori-brisanje', function () {
        var id_servis = $(this).val();
        var id = $(this).data('uredjaj');
        var vrsta = $(this).data('vrsta');
        console.log("id_servis: " + id_servis + " id uredjaja"+ id + " vrsta uredjaja"+ vrsta);
        $('#idBrisanje').val(id);
        $('#idVrstaUredjaja').val(vrsta);
        var ruta_brisanje = "{{ route('servis.brisanje.pokvaren', ':menjaj') }}";
        ruta_brisanje = ruta_brisanje.replace(':menjaj', id_servis);
        $('#brisanje-forma').attr('action', ruta_brisanje);
    });

    $("#vrsta_uredjaja_id").on('change', function () {
            
            var id = $(this).val();
            var ruta = "{{ route('servis.ajax.post') }}";

            $.ajax({
            url: ruta,
            type:"POST", 
            data: {"id":id, _token: "{!! csrf_token() !!}"}, 
            success: function(data){
                $('#uredjaj_id').empty();
                if(data.tip == "1"){
                    $.each(data.uredj, function(index, element){
                    var serijski = (element.serijski_broj != null) ? element.serijski_broj : "Bez serijskog broja";
                    switch (element.vrsta_uredjaja_id) {
                        case 1: ime = (element.ime != null) ? element.ime : " ";
                                inventarski = (element.inventarski_broj != null) ? element.inventarski_broj : " ";
                                model = ime +' inventarski:' + inventarski;
                        break;
                        case 2: model = (element.monitor_model.naziv != null) ? element.monitor_model.naziv : " "; break;
                        case 3: model = (element.stampac_model.naziv != null) ? element.stampac_model.naziv : " "; break;
                        case 4: model = (element.skener_model.naziv != null) ? element.skener_model.naziv : " "; break;
                        case 5: model = (element.ups_model.naziv != null) ? element.ups_model.naziv : " "; break;
                        case 12:model = (element.naziv != null) ? element.naziv : " "; break;
                        case 13:model = (element.naziv != null) ? element.naziv : " "; break;
                        default : null;
                    }
                    $('#uredjaj_id').append('<option value="'+element.id+'">'+serijski+', model: '+model+'</option>');
                });
                    $('#uredjaj_id').trigger("chosen:updated");
                }else{
                    $.each(data.uredj, function(index, element){
                        switch (element.vrsta_uredjaja_id) {
                        case 6: model = (element.osnovna_ploca_model.naziv != null) ? element.osnovna_ploca_model.naziv : " "; break;
                        case 7: model = (element.procesor_model.naziv != null) ? element.procesor_model.naziv : " "; break;
                        case 8: model = (element.graficki_adapter_model.naziv != null) ? element.graficki_adapter_model.naziv : " "; break;
                        case 9: model = (element.memorija_model.naziv != null) ? element.memorija_model.naziv : " "; break;
                        case 10:model = (element.hdd_model.naziv != null) ? element.hdd_model.naziv : " "; break;
                        case 11:model = (element.napajanje_model.naziv != null) ? element.napajanje_model.naziv : " "; break;
                        default : null;
                    }
                    var serijski = (element.serijski_broj != null) ? element.serijski_broj : "Bez serijskog broja";
                    var racunar = (element.racunar != null) ? element.racunar.ime : " ";
                    $('#uredjaj_id').append('<option value="'+element.id+'">'+serijski+', model: '+model+', računar: '+racunar+'</option>');
                });
                    $('#uredjaj_id').trigger("chosen:updated");
                }

          }
        });
        });

});
</script>
@endsection