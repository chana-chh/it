@extends('sabloni.app')

@section('naziv', 'Oprema | Otpisane memorije')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Otpisane memorije" src="{{url('/images/memorija.png')}}" style="height:64px;">
            </span>&emsp;Otpisane memorije</h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <button id="reciklazaDugme" class="btn btn-danger btn-block ono">
            <i class="fa fa-trash fa-fw"></i> Reciklaža
        </button>
    </div>
</div>
<div class="row" style="margin-bottom: 25px; margin-top: 20px;">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" onclick="window.history.back();"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('memorije.oprema') }}"
               title="Povratak na listu aktivnih memorijskih modula">
                <i class="fa fa-list"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
        </div>
    </div>
</div>

<div class="row well" id="reciklaza_div" style="display: none;">
    <div class="col-md-6">
    <h3 class="text-danger">Molimo, odaberite odgovarajući datum reciklaže !!!</h3>
    </div>
    <div class="col-md-6">
            
        <form class="form-inline" action="{{route('memorije.oprema.recikliranje.lista')}}" method="POST" data-parsley-validate style="margin-top: 1.4rem">
            {{ csrf_field() }}
  <div class="form-group">
    <div class="input-group" >
      <select name="reciklirano_id" id="reciklirano_id" class="form-control" data-placeholder="reciklaže ..."  required>
                            <option value=""></option>
                                @foreach($reciklaze as $s)
                                <option value="{{ $s->id }}"{{ old('reciklirano_id') == $s->id ? ' selected' : '' }}>
                                        Dana: {{$s->datum}}; &emsp;Sa napomenom: {{$s->napomena }}
                                </option>
                            @endforeach
                    </select>
                    @if ($errors->has('reciklirano_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('reciklirano_id') }}</strong>
                    </span>
                    @endif
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Formiraj lista za reciklažu <i class="fa fa-arrow-circle-o-right fa-fw"></i> </button>
</form>
    </div>
    
</div>

<hr>
<div class="row">
    <div class="col-md-12">
@if($uredjaj->isEmpty())
            <h3 class="text-danger">Trenutno nema stavki u bazi podataka</h3>
        @else
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <th style="width: 5%;">#</th>
        <th style="width: 10%;">Serijski broj</th>
        <th style="width: 20%;">Model</th>
        <th style="width: 15%;">Datum otpisa</th>
        <th style="width: 15%;">Datum reciklaže</th>
        <th style="width: 20%;">Napomena</th>
        <th style="width: 15%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tbody>
        @foreach ($uredjaj as $o)
        <tr>
            <td>{{$o->id}}</td>
            <td>
                <strong>{{$o->serijski_broj}}</strong>
            </td>
            <td><a href="{{route('memorije.modeli.detalj', $o->memorijaModel->id)}}">{{$o->memorijaModel->proizvodjac->naziv}} {{$o->memorijaModel->naziv}}, {{$o->memorijaModel->kapacitet}} MB</a></td>
            <td> 
                {{$o->deleted_at}}
            </td>
            <td>
                @if ($o->reciklirano)
                    <strong  class="text-danger">{{$o->reciklirano->datum}}</strong>
                @endif
            </td>
            <td>
                {{$o->napomena}}
            </td>

            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                @if (!$o->reciklirano)
                <button title="Vrati iz otpisa za ponovnu upotrebu" class="btn btn-warning btn-sm vracanje" data-toggle="modal" data-target="#vracanjeModal" value="{{$o->id}}">
                    <i class="fa fa-retweet"></i>
                </button>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
        @endif
    </div>
</div>

<!--  POCETAK brisanjeModal  -->
@include('sifarnici.inc.modal_vracanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

    $(document).on('click', '.vracanje', function () {
            var id = $(this).val();
            alert(id);
            $('#idVracanje').val(id);
            var ruta = " {{route('memorije.oprema.vracanje_otpis') }}";
            $('#vracanje-forma').attr('action', ruta); });

        var tabela = $('#tabela').DataTable({

        columnDefs: [
                {
                    orderable: false,
                    searchable: false,
                    "targets": -1
                }
            ],
        responsive: true,
        language: {
        search: "Pronađi u tabeli",
            paginate: {
            first:      "Prva",
            previous:   "Prethodna",
            next:       "Sledeća",
            last:       "Poslednja"
        },
        processing:   "Procesiranje u toku...",
        lengthMenu:   "Prikaži _MENU_ elemenata",
        zeroRecords:  "Nije pronađen nijedan rezultat",
        info:         "Prikaz _START_ do _END_ od ukupno _TOTAL_ elemenata",
        infoFiltered: "(filtrirano od ukupno _MAX_ elemenata)",
    },
    });

        new $.fn.dataTable.FixedHeader( tabela );

        $('#reciklazaDugme').click(function () {
            $('#reciklaza_div').toggle();
        });

});
</script>
@endsection