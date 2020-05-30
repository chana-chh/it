@extends('sabloni.app')

@section('naziv', 'Oprema | Server detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        <img class="slicica_animirana" alt="Server detaljno" src="{{url('/images/server.png')}}" style="height:64px;">
        Detaljni pregled servera <strong class="text-success">{{$server->ime}}</strong>
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
            <a class="btn btn-primary" href="{{route('serveri.oprema')}}"
                title="Povratak na listu servera">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{route('serveri.izmena.get', $server->id) }}"
                title="Izmena osnovnih podataka o serveru">
                <i class="fa fa-pencil"></i>
            </a>
            <button id="idBrisanjeModela" class="btn btn-primary"
                    title="Brisanje servera"
                    data-toggle="modal" data-target="#brisanjeModal"
                    value="{{$server->id}}">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </div>
</div>
<div class="row text-right" style="margin-bottom: 4px;">
    <div class="col-md-12">
<button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="NALOG ({{$server->nalog}}) LOZINKA ({{$server->lozinka}})"><i class="fa fa-user-secret"></i></button>
</div>
</div>
<div class="row">
    <div class="col-md-12">
<table class="table table-striped" style="table-layout: fixed;">
        <tbody style="font-size: 2rem;">

            <tr>
                <th style="width: 20%;">Domen:</th>
                <td style="width: 80%;">{{$server->domen}}</td>
            </tr>
            <tr>
                <th style="width: 20%;">HOST:</th>
                <td style="width: 80%;">{{$server->host}}</td>
            </tr>

            <tr>
                <th style="width: 20%;">Rola:</th>
                <td style="width: 80%;">{{$server->rola}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Rola - detaljno:</th>
                <td style="width: 80%;">{{$server->rola_opis}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Hypervisor (VHOST):</th>
                <td style="width: 80%;">{{$server->hypervisor}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Licenca:</th>
                <td style="width: 80%;">{{$server->licenca}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">Model:</th>
                <td style="width: 80%;">{{$server->model}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">CPU:</th>
                <td style="width: 80%;">{{$server->cpu}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">RAM:</th>
                <td style="width: 80%;">{{$server->ram}} GB
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">RACK:</th>
                <td style="width: 80%;">{{$server->rack}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;">UPS:</th>
                <td style="width: 80%;">{{$server->ups}}
                </td>
            </tr>

            <tr>
                <th style="width: 20%;"><strong>Lokacija:</strong></th>
                <td style="width: 80%;">
                    @if($server->kancelarija)<a href="{{route('kancelarije.detalj.get', $server->kancelarija->id)}}">{{$server->kancelarija->lokacija->naziv}}, kancelarija {{$server->kancelarija->naziv}}</a>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>

<div class="row" style="margin-top: 5rem;">
@if(count($server->bu)>0)
<div class="col-md-6">
<div class="jumbotron">
  <h3>Poslednja rezervna kopija:</h3>
  <h4 class="text-success">{{$server->poslednji_bu()->formatiran_datum}}</h4>
  <h5>{{$server->poslednji_bu()->tip}}</h5>
  <h5>Lokacija: {{$server->poslednji_bu()->bu_path}}</h5>
  <hr>
  <h5>
    <a class="btn btn-success btn-sm" href="{{route('serveri.backupovi', $server->id)}}" role="button">
        <i class="fa fa-table fa-fw"></i> Ostale rezervne kopije ovog servera
    </a> 
    <a class="btn btn-primary btn-sm" href="{{route('serveri.dodavanje.bu.get', $server->id)}}" role="button">
        <i class="fa fa-plus-circle fa-fw"></i> Dodaj
    </a>
</h5>
</div>
</div>
@endif
@if(count($server->up)>0)
<div class="col-md-6">
<div class="jumbotron">
  <h3>Poslednje ažuriranje:</h3>
  <h4 class="text-success">{{$server->poslednji_up()->formatiran_datum}}</h4>
  <h5>{{$server->poslednji_up()->opis}}</h5>
  <hr>
  <h5>
    <a class="btn btn-success btn-sm" href="{{route('serveri.updateovi', $server->id)}}" role="button">
        <i class="fa fa-table fa-fw"></i> Ostala ažuriranja ovog servera
    </a> 
    <a class="btn btn-primary btn-sm" href="{{route('serveri.dodavanje.up.get', $server->id)}}" role="button">
        <i class="fa fa-plus-circle fa-fw"></i> Dodaj
    </a>
</h5>
</div>
</div>
@endif
</div>
<!--  POCETAK brisanjeModal -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
@if($server->operativniSistem)
<div class="row" style="margin-top: 50px">
<div class="col-md-12 text-center">
    <h3 class="text-success">{{$server->operativniSistem->naziv}}</h3>
</div>
</div>
@endif
<div class="row" style="margin-top: 5rem;">
<div class="col-md-6">
    <h4>Da li je pokrenut firewall:
    @if($server->firewall == 1)
        <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
    @endif
    </h4>
</div>
<div class="col-md-6">
    <h4>Da li je server virtualni:
    @if($server->virtuelni == 1)
        <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
    @endif
    </h4>
</div>
</div>
<hr>
<div class="row">
<div class="col-md-6 col-md-offset-4">
<p class="tankoza krug_mali">{{$server->prioritet}}</p>
</div>
</div>

<div class="row">
<div class="col-md-10 col-md-offset-3">
    <h4>PRIORITET SERVERA (on)</h4>
</div>
</div>

<div class="row">
    <div class="col-md-12">
    <table class="table" style="table-layout: fixed;">
        <tbody>
            <tr>
                <th style="width: 50%;"><h3>IP adresa:</h3></th>
                <td style="width: 50%;"><h3><a href="http://{{$server->ip_adresa}}" title="IP adresa"> {{$server->ip_adresa}} </a></h3></td>
            </tr>
             <tr>
                <th style="width: 50%;"><h3>Default gateway:</h3></th>
                <td style="width: 50%;"><h3><a href="http://{{$server->default_gw}}" title="Default gateway"> {{$server->default_gw}} </a></h3></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
<div class="row ceo_dva">
<div class="col-md-12 boxic">
<h5>Napomena: 
    <br>
    <hr>
    <em>{{$server->napomena}}</em>
</h5>
</div>
</div>
@endsection

@section('skripte')
<script>
    $(document).on('click', '#idBrisanjeModela', function () {
        var id = $(this).val();
        $('#idBrisanje').val(id);
        var ruta = "{{ route('serveri.brisanje') }}";
        $('#brisanje-forma').attr('action', ruta);
    });

    $('[data-toggle="tooltip"]').tooltip()
</script>
@endsection