@extends('sabloni.app')

@section('naziv', 'Sifarnici | Zaposleni')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <div class="row">
        <div class="col-md-10">
            <h1>Zaposleni&emsp;<span><img alt="korisnici" src="{{url('/images/korisnik.png')}}" style="height:80px;  width:80px"></span></h1>
        </div>

         <div class="col-md-2 text-right" style="padding-top: 50px;">
            <a class="btn btn-primary" href="{{ route('zaposleni.dodavanje.get') }}"><i class="fa fa-plus-circle fa-fw"></i> Dodaj zaposlenog</a>
        </div>
        </div>
        <hr>
<div class="row">
    <div class="col-md-12">
@if($zaposleni->isEmpty())
            <h3 class="text-danger">Trenutno nema stavki u šifarniku</h3>
        @else
            <table class="table table-striped tabelaZaposleni" name="tabelaZaposleni" id="tabelaZaposleni">
                <thead>
                        <th style="width: 5%;">#</th>
                        <th style="width: 22%;">Prezime i ime</th>
                        <th style="width: 23%;">Uprava</th>
                        <th style="width: 10%;">Kancelarija</th>
                        <th style="width: 10%;">Mobilni</th>
                        <th style="width: 15%;">E-mail</th>
                        <th style="width: 15%;text-align:center"><i class="fa fa-cogs"></i></th>
                </thead>
                <tbody id="zaposleni_lista" name="zaposleni_lista">
                @foreach ($zaposleni as $zaposleni)
                        <tr>
                            <td style="vertical-align: middle; line-height: normal;">{{$zaposleni->id}}</td>
                            <td style="vertical-align: middle; line-height: normal;"><strong>{{$zaposleni->imePrezime()}}</strong></td>
                            <td style="vertical-align: middle; line-height: normal;">{{$zaposleni->uprava->naziv}}</td>
                            <td style="vertical-align: middle; line-height: normal;">{{$zaposleni->kancelarija->naziv}}</td>   
                            <td class="vertikalno">
                                <ul class="liste_bez">
                                    @foreach ($zaposleni->mobilni as $mobilni)
                                    <li>
                                        {{ $mobilni->broj }}
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td style="vertical-align: middle; line-height: normal;">
                                <ul class="liste_bez">
                                    @foreach ($zaposleni->emailovi as $email)
                                    <li>
                                        {{ $email->adresa }}
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td style="text-align:center; vertical-align: middle; line-height: normal;">
                    <a class="btn btn-success btn-sm" id="dugmeDetalj"  href="{{ route('zaposleni.detalj', $zaposleni->id) }}"><i class="fa fa-info-circle"></i></a>
                    <button id="dugmeBrisanje" class="btn btn-danger btn-sm otvori_modal"  value="{{$zaposleni->id}}"><i class="fa fa-trash"></i></button>
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
$( document ).ready(function() {

        $('#tabelaZaposleni').DataTable({

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

    $('.chosen-select').chosen({allow_single_deselect: true});

    $(document).on('click','.otvori_modal',function(){

        var id = $(this).val();
        
        var ruta = "{{ route('zaposleni.brisanje') }}";


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
});
</script>
@endsection