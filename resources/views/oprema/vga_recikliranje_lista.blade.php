.@extends('sabloni.app')

@section('naziv', 'Oprema | Lista grafičkih adaptera za reciklažu')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row obavestenje">
    <div class="col-md-10 col-md-offset-1 text-center" style="font-size: 1rem;;">
        <div class="alert alert-info alert-dismissible ono" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Obavštenje: </strong>Čekirajte <input type="checkbox" onclick="return false;"/> uz grafičke adaptere koje želite da reciklirate u navedenoj reciklaži</a>.
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10">
        <h2>
            <span>
                <img class="slicica_animirana" alt="Otpisani grafički adapteri" src="{{url('/images/hdd.png')}}" style="height:64px;">
            </span>&emsp;Lista grafičkih adaptera za reciklažu koja je planirana za <span class="text-success">{{$reciklaza->datum}}</span></h2>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <form action="{{route('vga.oprema.recikliranje', $reciklaza->id)}}" method="POST" id="forma_reciklaza">
            {{ csrf_field() }}
        <button id="reciklazaDugme" type="submit" class="btn btn-danger btn-block ono">
            <i class="fa fa-trash fa-fw"></i> Reciklaža
        </button>
    </form>
    </div>
</div>

<div class="row" style="margin-bottom: 25px; margin-top: 25px">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" href="{{route('vga.oprema.otpisani')}}"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{route('vga.oprema')}}"
               title="Povratak na listu grafičkih adaptera">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
@if($uredjaj->isEmpty())
            <h3 class="text-danger">Trenutno nema grafičkih adaptera za reciklažu</h3>
        @else
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <th style="width: 5%;"><input type="checkbox" name="izaberi_sve" value="1" id="izaberi_sve"></th>
        <th style="width: 15%;">Serijski broj</th>
        <th style="width: 25%;">Model</th>
        <th style="width: 15%;">Datum otpisa</th>
        <th style="width: 40%;">Napomena</th>
    </thead>
    <tbody>
        @foreach ($uredjaj as $o)
        <tr>
            <td><input type="checkbox" name="id_uredjaji[]" value="{{$o->id}}"></td>
            <td>
                <strong>{{$o->serijski_broj}}</strong>
            </td>
            <td><a href="{{route('vga.modeli.detalj', $o->grafickiAdapterModel->id)}}">{{$o->grafickiAdapterModel->proizvodjac->naziv}}, {{$o->grafickiAdapterModel->cip}} -{{$o->grafickiAdapterModel->kapacitet_memorije}} (MB)</a></td>
            <td> 
                {{$o->deleted_at}}
            </td>
            <td>
                {{$o->napomena}}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
        @endif
    </div>
</div>
@endsection

@section('skripte')
<script>
$(document).ready(function () {

        setTimeout(function(){
            $('.obavestenje').hide();
            }, 4000);

    var tabela = $('#tabela').DataTable({
        language: {
            search: "Pronađi u tabeli",
            paginate: {
                first: "Prva",
                previous: "Prethodna",
                next: "Sledeća",
                last: "Poslednja"
            },
            processing: "Procesiranje u toku...",
            lengthMenu: "Prikaži _MENU_ elemenata",
            zeroRecords: "Nije pronađen nijedan rezultat",
            info: "Prikaz _START_ do _END_ od ukupno _TOTAL_ elemenata",
            infoFiltered: "(filtrirano od ukupno _MAX_ elemenata)",
        },
    });

    new $.fn.dataTable.FixedHeader(tabela);

    $('#izaberi_sve').on('click', function () {
        var rows = tabela.rows({
            'search': 'applied'
        }).nodes();
        $('input[type="checkbox"]', rows).prop('checked', this.checked);
    });

    $('#tabela tbody').on('change', 'input[type="checkbox"]', function () {
        if (!this.checked) {
            var el = $('#izaberi_sve').get(0);
            if (el && el.checked && ('indeterminate' in el)) {
                el.indeterminate = true;
            }
        }
    });

    $('#forma_reciklaza').on('submit', function (e) {

        var forma = this;
        tabela.$('input[type="checkbox"]').each(function () {
            if (this.checked) {
                $('<input>').attr({
                    type: 'hidden',
                    name: this.name,
                    value: this.value
                }).appendTo(forma);
            }
        });
    });


});
</script>
@endsection