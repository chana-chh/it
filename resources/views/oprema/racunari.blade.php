@extends('sabloni.appmin')

@section('naziv', 'Oprema | Računari')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-6">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Računari" src="{{url('/images/kompjuterici.png')}}" style="height:64px;">
            </span>&emsp;Računari <small>(aktivni)</small></h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-warning btn-block ono" title="Ova akcija preračunava ocene svih aktivnih računara i može da potraje, Bajo!" href="{{route('racunari.osveziocene')}}">
            <i class="fa fa-refresh fa-fw"></i> Osveži ocene</a>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <a class="btn btn-primary btn-block ono"  href="{{route('racunari.oprema.dodavanje.get')}}">
            <i class="fa fa-plus-circle fa-fw"></i> Dodaj računar</a>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <button id="pretragaDugme" class="btn btn-success btn-block ono">
            <i class="fa fa-search fa-fw"></i> Napredna pretraga
        </button>
    </div>
</div>
<hr>

<div class="row well" id="pretraga" style="display: none;">
<div class="row">
    <div class="col-md-2">
        <a id="pretragaDugme" href="{{route('racunari.oprema.otpisani')}}" class="btn btn-warning btn-sm btn-block">
            <i class="fa fa-recycle fa-fw"></i> Otpisani
        </a>
    </div>
        <div class="col-md-2">
        <a id="serijski" href="{{route('racunari.oprema.ikt')}}" class="btn btn-warning btn-sm btn-block">
            <i class="fa fa-filter fa-fw"></i> Bez IKT broja
        </a>
    </div>
    <div class="col-md-2">
        <a id="inventarski" href="{{route('racunari.oprema.inventarski')}}" class="btn btn-warning btn-sm btn-block">
            <i class="fa fa-filter fa-fw"></i> Bez inventarskog
        </a>
    </div>
    <div class="col-md-6">

    </div>
    
</div>
<hr class="linija" style="display: none;">
    <form id="pretraga" action="{{ route('racunari.pretraga.post') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <h2>Filter</h2>
            <hr>
            <div class="col-md-3">
                <div class="form-group{{ $errors->has('inventarski_broj') ? ' has-error' : '' }}">
                    <label for="inventarski_broj">Inventarski broj:</label>
                    <input type="text" name="inventarski_broj" id="inventarski_broj" class="form-control" value="{{ old('inventarski_broj') }}" maxlength="10"> @if ($errors->has('inventarski_broj'))
                    <span class="help-block">
                        <strong>{{ $errors->first('inventarski_broj') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

        <div class="col-md-3">
        <div class="form-group{{ $errors->has('ime') ? ' has-error' : '' }}">
            <label for="ime">Ime računara (Aktivni direktorijum):</label>
            <input type="text" name="ime" id="ime" class="form-control" value="{{ old('ime') }}" maxlength="100"> @if ($errors->has('ime'))
            <span class="help-block">
                <strong>{{ $errors->first('ime') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group{{ $errors->has('erc_broj') ? ' has-error' : '' }}">
            <label for="erc_broj">Broj IKT odeljenja:</label>
            <input type="text" name="erc_broj" id="erc_broj" class="form-control" value="{{ old('erc_broj') }}" maxlength="100"> @if ($errors->has('erc_broj'))
            <span class="help-block">
                <strong>{{ $errors->first('erc_broj') }}</strong>
            </span>
            @endif
        </div>
    </div>

        <div class="col-md-3">
        <div class="form-group{{ $errors->has('os_id') ? ' has-error' : '' }}">
            <label for="os_id">Operativni sistem:</label>
            <select name="os_id" id="os_id" class="chosen-select form-control" data-placeholder="os ...">
                <option value=""></option>
                @foreach($os as $si)
                <option value="{{ $si->id }}" {{ old( 'os_id') == $si->id ? ' selected' : '' }}> {{$si->naziv}}
            </option>

            @endforeach
        </select>
        @if ($errors->has('os_id'))
        <span class="help-block">
            <strong>{{ $errors->first('os_id') }}</strong>
        </span>
        @endif
    </div>
</div>
        </div>

        <div class="row">
    <div class="col-md-3">
        <div class="form-group{{ $errors->has('ime_zaposlenog') ? ' has-error' : '' }}">
            <label for="ime_zaposlenog">Ime korisnika:</label>
            <input type="text" name="ime_zaposlenog" id="ime_zaposlenog" class="form-control" value="{{ old('ime_zaposlenog') }}" maxlength="100" > @if ($errors->has('ime_zaposlenog'))
            <span class="help-block">
                <strong>{{ $errors->first('ime_zaposlenog') }}</strong>
            </span>
            @endif
        </div>
    </div>
        <div class="col-md-3">
        <div class="form-group{{ $errors->has('prezime') ? ' has-error' : '' }}">
            <label for="prezime">Prezime korisnika:</label>
            <input type="text" name="prezime" id="prezime" class="form-control" value="{{ old('prezime') }}" maxlength="100"> @if ($errors->has('prezime'))
            <span class="help-block">
                <strong>{{ $errors->first('prezime') }}</strong>
            </span>
            @endif
        </div>
    </div>
            <div class="col-md-3">
                <label for="operator_ocena">Ocena računara je:</label>
                <select name="operator_ocena" id="operator_ocena" class="chosen-select form-control"
                        data-placeholder="Odaberite kriterijum ...">
                    <option value=""></option>
                    <option value=">=">veća ili jednaka</option>
                    <option value="<=">manja ili jednaka</option>
                    <option value="=">jednaka</option>
                    <option value=">">veća</option>
                    <option value="<">manja</option>
                </select>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ocena">Ocena:</label>
                    <input type="number" id="ocena" name="ocena" class="form-control"
                           value="0" min="0" step="1">
                </div>
            </div>
        </div>

        <div class="row">
        <div class="col-md-1">
        <div class="form-group{{ $errors->has('broj_k') ? ' has-error' : '' }}">
            <label for="broj_k">Kancelarija:</label>
            <input type="text" name="broj_k" id="broj_k" class="form-control" value="{{ old('broj_k') }}"> @if ($errors->has('broj_k'))
            <span class="help-block">
                <strong>{{ $errors->first('broj_k') }}</strong>
            </span>
            @endif
        </div>
        </div>
            <div class="form-group{{ $errors->has('sprat_id') ? ' has-error' : '' }} col-md-2">
            <label for="sprat_id">Sprat:</label>
            <select name="sprat_id" id="sprat_id" class="chosen-select form-control" data-placeholder="sprat ...">
                <option value=""></option>
                @foreach($spratovi as $sprat)
                <option value="{{ $sprat->id }}" {{ old( 'sprat_id')==$sprat->id ? ' selected' : '' }}>
                    <strong>{{ $sprat->naziv }}</strong>
                </option>
                @endforeach
            </select>
            @if ($errors->has('sprat_id'))
            <span class="help-block">
                <strong>{{ $errors->first('sprat_id') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('lokacija_id') ? ' has-error' : '' }} col-md-3">
            <label for="lokacija_id">Lokacija:</label>
            <select name="lokacija_id" id="lokacija_id" class="chosen-select form-control" data-placeholder="lokacija  ...">
                <option value=""></option>
                @foreach($lokacije as $lokacija)
                <option value="{{ $lokacija->id }}" {{ old( 'lokacija_id')==$lokacija->id ? ' selected' : '' }}>
                    <strong>{{ $lokacija->naziv }}</strong>
                </option>
                @endforeach
            </select>
            @if ($errors->has('lokacija_id'))
            <span class="help-block">
                <strong>{{ $errors->first('lokacija_id') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('uprava_id') ? ' has-error' : '' }} col-md-3">
            <label for="uprava_id">Uprava:</label>
            <select name="uprava_id" id="uprava_id" class="chosen-select form-control" data-placeholder="uprava ...">
                <option value=""></option>
                @foreach($uprave as $uprava)
                <option value="{{ $uprava->id }}" {{ old( 'uprava_id')==$uprava->id ? ' selected' : '' }}>
                    <strong>{{ $uprava->naziv }}</strong>
                </option>
                @endforeach
            </select>
            @if ($errors->has('uprava_id'))
            <span class="help-block">
                <strong>{{ $errors->first('uprava_id') }}</strong>
            </span>
            @endif
        </div>
            <div class="form-group col-md-3">
                <label for="napomena">Napomena</label>
                <textarea
                    name="napomena" id="napomena"
                    class="form-control"></textarea>
            </div>
        </div>
                    <hr>
        <div class="row dugmici">
            <div class="col-md-6 col-md-offset-6">
                <div class="form-group text-right ceo_dva">
                    <div class="col-md-6 snimi">
                        <button type="submit" id="dugme_pretrazi" class="btn btn-success btn-block">
                            <i class="fa fa-search"></i>&emsp;Pretraži
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block" href="{{ route('racunari.oprema') }}">
                            <i class="fa fa-ban"></i>&emsp;Otkaži
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<hr class="linija" style="display: none;">

<div class="row" style="margin-top: 1rem; margin-bottom: 1rem;">
    <div class="col-md-9">
        <span>Prikaži </span>
<select name="postrani" onchange="window.location.href=this.value;">
    <option value="">{{$paginacija}} *</option>
  <option value="{{ route('racunari.oprema', 10) }}">10</option>
  <option value="{{ route('racunari.oprema', 25) }}">25</option>
  <option value="{{ route('racunari.oprema', 50) }}">50</option>
  <option value="{{ route('racunari.oprema', 100) }}">100</option>
</select>
<span> elemenata na strani </span>
</div>
<div class="col-md-3">
    <h4>Trenutno u bazu pohranjeno {{$broj_elemenata}} računara</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%" style="table-layout: fixed; font-size: 0.9375em;">
    <thead>
        <th style="width: 5%;"># <a href="{{ route('racunari.oprema', [$paginacija, 'desc', 'id']) }}">
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </a> <a href="{{ route('racunari.oprema', [$paginacija, 'asc', 'id']) }}">
                            <i class="fa fa-sort-asc" aria-hidden="true"></i>
                        </a></th>
        <th style="width: 10%;">Ime (AD) <a href="{{ route('racunari.oprema', [$paginacija, 'desc', 'ime_racunara']) }}">
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </a> <a href="{{ route('racunari.oprema', [$paginacija, 'asc', 'ime_racunara']) }}">
                            <i class="fa fa-sort-asc" aria-hidden="true"></i>
                        </a></th>
        <th style="width: 8%;">Inventarski<a href="{{ route('racunari.oprema', [$paginacija, 'desc', 'inventarski_broj']) }}">
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </a> <a href="{{ route('racunari.oprema', [$paginacija, 'asc', 'inventarski_broj']) }}">
                            <i class="fa fa-sort-asc" aria-hidden="true"></i>
                        </a></th>
        <th style="width: 5%;">IKT<a href="{{ route('racunari.oprema', [$paginacija, 'desc', 'erc_broj']) }}">
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </a> <a href="{{ route('racunari.oprema', [$paginacija, 'asc', 'erc_broj']) }}">
                            <i class="fa fa-sort-asc" aria-hidden="true"></i>
                        </a></th>
        <th style="width: 17%;">Kancelarija <a href="{{ route('racunari.oprema', [$paginacija, 'desc', 'broj_kancelarije']) }}">
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </a> <a href="{{ route('racunari.oprema', [$paginacija, 'asc', 'broj_kancelarije']) }}">
                            <i class="fa fa-sort-asc" aria-hidden="true"></i>
                        </a></th>
        <th style="width: 5%;">Ocena <a href="{{ route('racunari.oprema', [$paginacija, 'desc', 'ocena']) }}">
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </a> <a href="{{ route('racunari.oprema', [$paginacija, 'asc', 'ocena']) }}">
                            <i class="fa fa-sort-asc" aria-hidden="true"></i>
                        </a></th>
        <th style="width: 17%;">Korisnik računara <a href="{{ route('racunari.oprema', [$paginacija, 'desc', 'ime_zaposlenog']) }}">
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </a> <a href="{{ route('racunari.oprema', [$paginacija, 'asc', 'ime_zaposlenog']) }}">
                            <i class="fa fa-sort-asc" aria-hidden="true"></i>
                        </a></th>
        <th style="width: 15%;">Uprava <a href="{{ route('racunari.oprema', [$paginacija, 'desc', 'uprava']) }}">
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </a> <a href="{{ route('racunari.oprema', [$paginacija, 'asc', 'uprava']) }}">
                            <i class="fa fa-sort-asc" aria-hidden="true"></i>
                        </a></th>
        <th style="width: 11%;">Napomena <a href="{{ route('racunari.oprema', [$paginacija, 'desc', 'napomena']) }}">
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                        </a> <a href="{{ route('racunari.oprema', [$paginacija, 'asc', 'napomena']) }}">
                            <i class="fa fa-sort-asc" aria-hidden="true"></i>
                        </a></th>
        <th style="width: 7%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tbody>
        @foreach ($uredjaji as $o)
        <tr>
            <td>{{$o->id}}</td>
            <td>
                <strong>{{$o->ime_racunara}} @if($o->operativni)<small><em class="text-success">({{$o->operativni}})</em></small>@endif</strong>
            </td>
            <td>{{$o->inventarski_broj}}</td>
            <td>{{$o->erc_broj}}</td>
            <td> 
                @if($o->broj_kancelarije)
                {{$o->broj_kancelarije}}, {{$o->sprat}} - {{$o->lokacija}}
                @endif
            </td>
            <td>{{$o->ocena}}</td>
            <td>
                @if($o->ime_zaposlenog)
                {{$o->ime_zaposlenog}} {{$o->prezime_zaposlenog}}
                @endif
            </td>
            <td>
                @if($o->uprava)
                <em>{{$o->uprava}}</em>
                @endif
            </td>
            <td>
                <small>{{$o->napomena}}</small>
            </td>
            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                <a class="btn btn-success btn-sm" id="dugmeDetalj" href="{{route('racunari.oprema.detalj', $o->id)}}">
                    <i class="fa fa-eye"></i>
                </a>
                <a class="btn btn-info btn-sm" id="dugmeIzmena" href="{{route('racunari.oprema.izmena.get', $o->id)}}">
                    <i class="fa fa-pencil"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
    {{ $uredjaji->links() }}
</div>

@endsection

@section('skripte')
<script>
$( document ).ready(function() {

        $('#pretragaDugme').click(function () {
            $('#pretraga').toggle();
            $('.linija').toggle();
            resizeChosen();
        });


    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({
            allow_single_deselect: true,
            search_contains: true
            });

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };

});
</script>
@endsection