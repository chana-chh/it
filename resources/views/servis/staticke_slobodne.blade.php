@extends('sabloni.app')

@section('naziv', 'Servis | Statičke')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-6">
        <h1>
    <img class="slicica_animirana" alt="Statičke IP adrese"
         src="{{ url('/images/ip.png') }}" style="height:128px;">
    &emsp;Statičke IP adrese <strong><small class="text-success">(dostupne)</small></strong>
</h1>
    </div>
    <div class="btn-group" style="padding-top: 100px;">
        <a class="btn btn-success btn-sm" href="{{ route('staticke.opseg.get') }}"
               title="Dodavanje opsega">
                <i class="fa fa-plus fa-fw"></i>&emsp;Dodaj RANGE
        </a>
        <a class="btn btn-primary btn-sm" href="{{ route('staticke.zauzete') }}"
               title="Pregled zauzetih IP adresa">
                <i class="fa fa-list"></i>&emsp;Zauzete adrese
        </a>
        <a class="btn btn-warning btn-sm" href="{{ route('opseg.obrisi.get') }}"
               title="Brisanje opsega">
                <i class="fa fa-recycle"></i>&emsp;Brisanje opsega
        </a>
        <button id="idBrisanjeModela" class="btn btn-danger btn-sm"
                    title="Brisanje svih statičkih IP adresa"
                    data-toggle="modal" data-target="#brisanjeModal">
                <i class="fa fa-trash"></i>&emsp;Brisanje svih statičkih IP adresa !!!
        </button>
    </div>
</div>
<hr>

@if($adrese->isEmpty())
<h3 class="text-danger">Trenutno nema slobodnih adresa</h3>
@else
<div class="alert alert-info" role="alert">
  <h3>Trenutno je dostupno: {{count($adrese)}} statičkih adresa.</h3>
</div>
    @foreach($adrese->chunk(6) as $sest)
        <div class="row justify-content-center" style="{{ $loop->index % 2 == 0 ? 'background-color: #d3d3d3' : '' }}">
            @foreach ($sest as $d)
                <div class="col-md-2" style="border-right:thin dashed black;">
                    <a href="{{ route('staticke.dodavanje.get', $d->id) }}"><h3><strong>{{$d->ip_adresa}}</strong></h3></a>
                </div>
            @endforeach
        </div>
    @endforeach
@endif

<div id = "brisanjeModal" class = "modal fade">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button class = "close" data-dismiss = "modal">&times;</button>
                <h1 class = "modal-title text-danger">Upozorenje!</h1>
            </div>
            <div class = "modal-body">
                <h3>Da li želite trajno da obrišete sve statičke IP adrese?</h3>
                <p class = "text-danger">* Ova akcija je nepovratna!</p>
                <form id="brisanje-forma" action="{{ route('staticke.brisanje') }}" method="POST">
                    {{ csrf_field() }}

                    <div class="row dugmici" style="margin-top: 30px;">
                        <div class="col-md-12" >
                            <div class="form-group">
                                <div class="col-md-6 snimi">
                                    <button id = "btn-brisanje-obrisi" type="submit" class="btn btn-danger btn-block ono">
                                        <i class="fa fa-recycle"></i>&emsp;Obriši
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

@endsection
