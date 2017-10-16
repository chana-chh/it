@extends('sabloni.app')

@section('naziv', 'Modeli | Procesori')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <div class="row">
        <div class="col-md-10">
            <h1><span><img class="slicica_animirana" alt="Modeli procesora" src="{{url('/images/cpu.png')}}" style="height:64px;"></span>&emsp;Modeli procesora (CPU)</h1>
        </div>

         <div class="col-md-2 text-right" style="padding-top: 50px;">
            <a class="btn btn-primary ono" href="{{route('procesori.modeli.dodavanje.get')}}"><i class="fa fa-plus-circle fa-fw"></i> Dodaj model procesora</a>
        </div>
        </div>
        <hr>
<div class="row">
    <div class="col-md-12">
@if($procesori->isEmpty())
            <h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
        @else
            <table class="table table-striped display" cellspacing="0" width="100%" name="tabelaProcesori" id="tabelaProcesori">
                <thead>
                        <th style="width: 5%;">#</th>
                        <th style="width: 10%;">Naziv</th>
                        <th style="width: 10%;">Proizvođač</th>
                        <th style="width: 10%;">Soket</th>
                        <th style="width: 10%;">Takt</th>
                        <th style="width: 5%;">Kes</th>
                        <th style="width: 10%;">Broj jezgara</th>
                        <th style="width: 10%;">Broj niti</th>
                        <th style="width: 10%;">Ocena</th>
                        <th style="width: 5%;">Link</th>
                        <th style="width: 15%;text-align:center"><i class="fa fa-cogs"></i></th>
                </thead>
                <tbody id="procesori_lista" name="procesori_lista">
                @foreach ($procesori as $procesor)
                        <tr>
                            <td>{{$procesor->id}}</td>
                            <td><strong>{{$procesor->naziv}}</strong></td>
                            <td>{{$procesor->proizvodjac->naziv}}</td>
                            <td>{{$procesor->soket->naziv}}</td>
                            <td>{{$procesor->takt}} MHz</td>
                            <td>{{$procesor->kes}} MB</td>
                            <td>{{$procesor->broj_jezgara}}</td>
                            <td>{{$procesor->broj_niti}}</td>
                            <td>{{$procesor->ocena}}</td>
                            <td><a href="{{$procesor->link}}" target="_blank"><i class="fa fa-link"></i></a></td>
                            <td style="text-align:center; vertical-align: middle; line-height: normal;">
                    <a class="btn btn-success btn-sm" id="dugmeDetalj"  href=""><i class="fa fa-eye"></i></a>
                    <a class="btn btn-info btn-sm" id="dugmeIzmena"  href=""><i class="fa fa-pencil"></i></a>
                    <button id="dugmeBrisanje" class="btn btn-danger btn-sm otvori_modal"  value="{{$procesor->id}}"><i class="fa fa-trash"></i></button>

                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

{{-- Modal za dijalog brisanje--}}
    <div class="modal fade" id="brisanjeModal" tabindex="-1" role="dialog" aria-labelledby="Modal za brisanje" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="brisanjeModalLabel">Upozorenje!</h4>
            </div>
            <div class="modal-body">
                <h4 class="text-primary">Da li želite trajno da obrišete stavku</strong></h4>
                <p ><strong>Ova akcija je nepovratna!</strong></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" id="btn-obrisi">Obriši</button>
            <button type="button" class="btn btn-success" id="btn-otkazi">Otkaži</button>
            </div>
        </div>
      </div>
  </div>
    {{-- Kraj Modala za dijalog brisanje--}}


@endsection

@section('skripte')
<script>
$( document ).ready(function() {

        $(document).on('click','.otvori_modal',function(){

        var id = $(this).val();

        {{-- var ruta = "{{ route('') }}"; --}}


        $('#brisanjeModal').modal('show');

        $('#btn-obrisi').click(function(){
            $.ajax({
            url: ruta,
            type:"POST",
            data: {"id":id, _token: "{!! csrf_token() !!}"},
            success: function(){
            location.reload();
          }
        });

        $('#brisanjeModal').modal('hide');
        });
        $('#btn-otkazi').click(function(){
            $('#brisanjeModal').modal('hide');
        });
        });

        var tabela = $('#tabelaProcesori').DataTable({

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