@extends('sabloni.app')

@section('naziv', 'Šifarnici | Reciklirani uređaji')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1>
    <img class="slicica_animirana" alt="Reciklirani uređaji"
         src="{{ url('/images/reciklaze.png') }}" style="height:64px;">
    &emsp;Lista uređaja koji su reciklirani dana <em class="text-success">{{$datum}}</em>
</h1>
<hr>
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
            <a class="btn btn-primary" href="{{route('reciklaze')}}"
               title="Povratak na listu reciklaža">
                <i class="fa fa-list"></i>
            </a>
        </div>
        </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
    <h4>Reciklirani uređaji:</h4>
    @if($uredjaji_rec->isEmpty())
    <p class="text-danger">Nema recikliranih uređaja</p>
    @else
    <table class="table table-striped table-responsive" id="tabela" cellspacing="0" width="100%" style="table-layout: fixed; font-size: 0.9375em;">
        <thead>
            <tr>
                <th style="width: 15%;">Vrsta uređaja</th>
                <th style="width: 10%;">Serijski broj</th>
                <th style="width: 10%;">Inventarski broj</th>
                <th style="width: 15%;">Model</th>
                <th style="width: 15%;">Lokacija</th>
                <th style="width: 15%;">Datum otpisa</th>
                <th style="width: 20%;">Napomena</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uredjaji_rec as $uredjaj)
            <tr>
                <td>{{ $uredjaj->vrsta_uredjaja }}</td>
                <td>{{ $uredjaj->serijski_broj }}</td>
                <td>{{ $uredjaj->inventarski_broj }}</td>
                <td>{{ $uredjaj->tehnicki_detalji }}</td>
                <td>{{ $uredjaj->lokacija }}</td>
                <td>{{ $uredjaj->otpis }}</td>
                <td>{{ $uredjaj->napomena }}</td>
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

        $('#tabela').DataTable({
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
                    first: "Prva",
                    previous: "Prethodna",
                    next: "Sledeća",
                    last: "Poslednja"
                },
                processing: "Procesiranje u toku ...",
                lengthMenu: "Prikaži _MENU_ elemenata",
                zeroRecords: "Nije pronađen nijedan zapis za zadati kriterijum",
                info: "Prikazano _START_ do _END_ od ukupno _TOTAL_ elemenata",
                infoFiltered: "(filtrirano od _MAX_ elemenata)"
            }
        });

    });
</script>
@endsection