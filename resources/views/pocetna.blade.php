@extends('sabloni.app')

@section('naziv', 'Početna')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="text-center page-header">{{config('app.name')}}</h1>
@endsection

@section('sadrzaj')
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Računari</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="{{route('racunari.oprema')}}">
                    <img class="grow center-block responsive" alt="računari" src="{{url('/images/kompaS.png')}}" style="height: 64px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno računara:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $racunara }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Monitori</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="računari" src="{{url('/images/monitorS.png')}}" style="height: 64px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno monitora:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $monitora }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Štampači</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="računari" src="{{url('/images/stampac.png')}}" style="height: 64px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno štampača:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $stampaca }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Skeneri</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="računari" src="{{url('/images/scanner.png')}}" style="height: 64px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno skenera:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $skenera }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">UPS-evi</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="računari" src="{{url('/images/ups1.jpg')}}" style="height: 64px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno upseva:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $upseva }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Mrežni uređaji</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="Mrežni uređaji" src="{{url('/images/mrezniUredjaji.png')}}" style="height: 64px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno uređaja:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $mreznih_uredjaja }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Projektori</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="Projektori" src="{{url('/images/projektor.png')}}" style="height: 64px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno projektora:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $projektora }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Aplikacije</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="Aplikacije" src="{{url('/images/aplikacije.png')}}" style="height: 64px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno aplikacija:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $aplikacija }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('traka')
@if($greske)
<div class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">Problemi/greške</h3>
  </div>
  <div class="panel-body">
    <table class="table" style="table-layout: fixed; margin-top: 2rem">
        <tbody>
            @foreach($greske as $greska)
            <tr>
                <th style="width: 25%;">Greška {{$loop->iteration}}:</th>
                <td style="width: 68%;"><em>{{$greska->greska}}</em></td>
                <td style="width: 7%;"> <button class="btn btn-danger btn-xs otvori-brisanje" data-toggle="modal" data-target="#brisanjeModal" value="{{ $greska->id }}">
                            <i class="fa fa-trash"></i>
                        </button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endif

@if(!$isticu->isEmpty())
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Licence koje uskoro ističu</h3>
  </div>
  <div class="panel-body">
    <table class="table" style="table-layout: fixed; margin-top: 2rem">
        <tbody>
            @foreach($isticu as $licenca)
            <tr>
                <th style="width: 20%;">{{$loop->iteration}}.</th>
                <td style="width: 80%;"><a href="{{route('licence.detalj', $licenca->id)}}" style="text-decoration: none;"> <strong>{{ $licenca->proizvod }}</strong> - {{ $licenca->tip_licence }}, <br>datum prestanka važenja:&emsp;<strong>{{ $licenca->datum_prestanka_vazenja }}</strong></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
</div>
@endif

<div id = "brisanjeModal" class = "modal fade">
    <div class = "modal-dialog">
        <div class = "modal-content">
            <div class = "modal-header">
                <button class = "close" data-dismiss = "modal">&times;</button>
                <h1 class = "modal-title text-danger">Upozorenje!</h1>
            </div>
            <div class = "modal-body">
                <h3>Da li želite trajno da obrišete grešku? </h3>
                <p class = "text-danger">* Ova akcija je nepovratna!</p>
                <form id="brisanje-forma" action="" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="idBrisanje" name="idBrisanje">
                    <button id = "btn-brisanje-obrisi" class = "btn btn-danger">
                        <i class = "fa fa-trash"></i> Obriši
                    </button>
                </form>
            </div>
            <div class = "modal-footer">
                <button class = "btn btn-primary" data-dismiss="modal">
                    <i class = "fa fa-ban"></i> Otkaži
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

   $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('greska.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });

});
</script>
@endsection