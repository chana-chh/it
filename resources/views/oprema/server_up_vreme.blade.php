@extends('sabloni.app')

@section('naziv', 'Server | Ažuriranja')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <i class="fa fa-clock-o fa-fw text-primary"></i>&emsp;Hronološki - ažuriranja svih servera
        </h1>
    </div>
</div>
<div class="row" style="margin-bottom: 16px;">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" onclick="window.history.back();" title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}" title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{route('serveri.oprema')}}" title="Povratak na listu servera">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        @if($up->isEmpty())
        <h3 class="text-danger">Trenutno nema stavki u bazi podataka</h3>
        @else
        <table id="tabela" class="table table-striped">
            <thead>
                <th style="width: 15%;">Datum</th>
                <th style="width: 15%;">Server</th>
                <th style="width: 70%;">Opis</th>
            </thead>
            <tbody>
                @foreach ($up as $m)
                <tr>
                    <td>
                        @if($m->poslednji_up())
                        <strong class="{{($m->poslednji_up()->datum >= Carbon\Carbon::now()->subDays(30)) ? 'text-success' : 'text-danger'}}">
                            {{$m->poslednji_up()->formatiran_datum}}
                        </strong>
                        @else
                        <i class="fa fa-exclamation-circle" style="color: #FF0000"></i>
                        @endif
                    </td>
                    <td><strong class="text-success">{{$m->ime}}</strong></td>
                    <td>
                        @if($m->poslednji_up())
                        {{$m->poslednji_up()->opis}}
                        @endif
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
<script src="{{ asset('/js/moment.min.js') }}"></script>
<script src="{{ asset('/js/datetime-moment.js') }}"></script>
<script>
    $(document).ready(function () {
        $.fn.dataTable.moment('DD.MM.YYYY');

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

    });
</script>
@endsection