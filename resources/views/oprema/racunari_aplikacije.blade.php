@extends('sabloni.app')

@section('naziv', 'Oprema | Aplikacije na računaru')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Aplikacije na računaru"
         src="{{ url('/images/aplikacije.png') }}" style="height:64px;">
    &emsp;Aplikacije instalirane na računaru <em class="text-success">{{$uredjaj->ime}}</em>
</h1>
@endsection

@section('sadrzaj')
<div class="row" style="margin-bottom: 16px;">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" href="{{ route('racunari.oprema.detalj', $uredjaj->id) }}"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{route('racunari.oprema')}}"
               title="Povratak na listu računara">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

@if($aplikacije->isEmpty())
<h3 class="text-danger">Trenutno nema instaliranih aplikacija</h3>
@else
<table id="tabela" class="table table-striped" cellspacing="0" width="100%">
    <thead>
        <th style="width: 10%">#</th>
        <th style="width: 25%">Naziv aplikacije</th>
        <th style="width: 25%">Proizvođač</th>
        <th style="width: 30%">Opis</th>
        <th style="text-align:right; width: 10%"><i class="fa fa-cogs"></i></th>
    </thead>
    <tbody>
        @foreach ($aplikacije as $d)
        <tr>
            <td>{{$d->id}}</td>
            <td><strong>{{$d->naziv}}</strong></td>
            <td>{{$d->proizvodjac->naziv}}</td>
            <td>{{$d->opis}}</td>
            <td style="text-align:right;">
                <button class="btn btn-danger btn-sm otvori-brisanje"
                        data-toggle="modal" data-target="#brisanjeModal"
                        value="{{ $d->id }}">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
    @endforeach
</tbody>
</table>

@endif
 
 <!--  POCETAK brisanjeModal  -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
<h4>Dodavanje aplikacije na računar</h4>
<hr>
<div class="well">
    <form action="{{ route('racunari.oprema.aplikacije.post', $uredjaj->id) }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('aplikacija_id') ? ' has-error' : '' }}">
            <label for="aplikacija_id">Aplikacija:</label>
            <select name="aplikacija_id[]" id="aplikacija_id" multiple="true" class="chosen-select form-control" data-placeholder="aplikacija ..." required>
                <option value=""></option>
                @foreach($sve_aplikacije as $app)
                <option value="{{ $app->id }}" {{ old( 'aplikacija_id')==$app->id ? ' selected' : '' }}>
                   {{ $app->naziv }} - {{ $app->proizvodjac->naziv }}
                </option>
                @endforeach
            </select>
            @if ($errors->has('aplikacija_id'))
            <span class="help-block">
                <strong>{{ $errors->first('aplikacija_id') }}</strong>
            </span>
            @endif
        </div>

        <div class="row dugmici">
            <div class="col-md-12" style="margin-top: 20px;">
                <div class="form-group">
                    <div class="col-md-6 snimi">
                        <button type="submit" class="btn btn-success btn-block ono">
                            <i class="fa fa-plus-circle"></i>&emsp;Dodaj
                        </button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block ono" href="{{route('racunari.oprema.aplikacije', $uredjaj->id)}}">
                            <i class="fa fa-ban"></i>&emsp;Otkaži
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

        var tabela = $('#tabela').DataTable({

        responsive: true,
        columnDefs: [
                {
                    orderable: false,
                    searchable: false,
                    "targets": -1
                }
            ],
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

        if ( $( "#tabela" ).length ) {
        new $.fn.dataTable.FixedHeader( tabela );

        $(document).on('click', '.otvori-brisanje', function () {
            var data = {!! $uredjaj->id !!};
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var rutam = "{{ route('racunari.oprema.aplikacije.bisanje', 'menjaj')}}";
            var ruta = rutam.replace("menjaj", data);
            $('#brisanje-forma').attr('action', ruta);
        });
    };

    resizeChosen();
    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({allow_single_deselect: true, search_contains: true});

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };

   

});
</script>
@endsection