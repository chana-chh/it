@extends('sabloni.app')

@section('naziv', 'Modeli | Memorije')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <div class="row">
        <div class="col-md-10">
            <h1><span><img class="slicica_animirana" alt="Memorije ..." src="{{url('/images/memorija.png')}}" style="height:64px;"></span>&emsp;Memorije čiji je model <span style="color: #18bc9c">{{$model->proizvodjac->naziv}} {{$model->kapacitet}}, {{$model->brzina}} MHz</span>  </h1>
        </div>

         <div class="col-md-2 text-right" style="padding-top: 50px;">
            <a class="btn btn-primary ono" href=""><i class="fa fa-plus-circle fa-fw"></i> Dodaj memoriju</a>
        </div>
        </div>
        <hr>
<div class="row">
    <div class="col-md-12">
@if($memorije->isEmpty())
            <h3 class="text-danger">Trenutno nema ovakvih uređaja</h3>
        @else
            <table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
                <thead>
                        <th style="width: 5%;">#</th>
                        <th style="width: 15%;">Serijski broj</th>
                        <th style="width: 15%;">Racunar</th>
                        <th style="width: 25%;">Broj otpremnice</th>
                        <th style="width: 25%;">Napomena</th>
                        <th style="width: 15%;text-align:right"><i class="fa fa-cogs"></i>&emsp;Akcije</th>
                </thead>
                <tbody>
                @foreach ($memorije as $memorija)
                        <tr>
                            <td>{{$memorija['id']}}</td>
                            <td><strong>{{$memorija['serijski_broj']}}</strong></td>
                            <td>{{$memorija['racunar']['ime']}}</td>
                            <td>{{$memorija['stavkaOtpremnice']['otpremnica']['broj']}}</td>
                            <td>{{$memorija['napomena']}}</td>
                            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                    <a class="btn btn-success btn-sm" id="dugmeDetalj"  href=" "><i class="fa fa-eye"></i></a>
                    <a class="btn btn-info btn-sm" id="dugmeIzmena"  href=" "><i class="fa fa-pencil"></i></a>
                    <button id="dugmeBrisanje" class="btn btn-danger btn-sm otvori_modal"  value="{{$memorija['id']}}"><i class="fa fa-trash"></i></button>

                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<div class="row dugmici">
        <div class="col-md-10 col-md-offset-1" style="margin-top: 20px">

            <div class="col-md-6 text-left">
                <a class="btn btn-info" href="{{route('memorije.modeli.detalj', $model->id)}}" title="Povratak na detaljni pregled modela memorije {{$model->proizvodjac->naziv}} {{$model->kapacitet}}, {{$model->brzina}} MHz"><i class="fa fa-arrow-left" style="color:#2C3E50"></i></a>
            </div>

            <div class="col-md-6 text-right">
                <a class="btn btn-info" href="{{route('pocetna')}}" title="Povratak na početnu stranu"><i class="fa fa-home" style="color:#2C3E50"></i></a>
            </div>

        </div>
    </div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

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

});
</script>
@endsection