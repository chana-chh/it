@extends('sabloni.app')

@section('naziv', 'Oprema | Lista procesora za reciklažu')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-10">
        <h1>
            <span>
                <img class="slicica_animirana" alt="Otpisani procesori" src="{{url('/images/cpu.png')}}" style="height:64px;">
            </span>&emsp;Lista procesora za reciklažu</h1>
    </div>
    <div class="col-md-2 text-right" style="padding-top: 50px;">
        <button id="reciklazaDugme" class="btn btn-danger btn-block ono" onclick="console.log(boxovi);">
            <i class="fa fa-trash fa-fw"></i> Reciklaža
        </button>
    </div>
</div>

<div class="row well" id="reciklaza_div" style="display: none;">
    <div class="col-md-6">
    Nesto
    <div class="col-md-6">
            
Nesto II
    </div>
    
</div>
</div>

<hr>
<div class="row">
    <div class="col-md-12">
@if($uredjaj->isEmpty())
            <h3 class="text-danger">Trenutno nema procesora za reciklažu</h3>
        @else
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <th style="width: 5%;"><input type="checkbox" name="izaberi_sve" value="1" id="izaberi_sve"></th>
        <th style="width: 15%;">Serijski broj</th>
        <th style="width: 25%;">Model</th>
        <th style="width: 15%;">Datum otpisa</th>
        <th style="width: 25%;">Napomena</th>
        <th style="width: 15%;text-align:right">
            <i class="fa fa-cogs"></i>&emsp;Akcije</th>
    </thead>
    <tbody>
        @foreach ($uredjaj as $o)
        <tr>
            <td></td>
            <td>
                <strong>{{$o->serijski_broj}}</strong>
            </td>
            <td><a href="{{route('procesori.modeli.detalj', $o->procesorModel->id)}}">{{$o->procesorModel->proizvodjac->naziv}} {{$o->procesorModel->naziv}}, {{$o->procesorModel->takt}} MHz</a></td>
            <td> 
                {{$o->deleted_at}}
            </td>
            <td>
                {{$o->napomena}}
            </td>

            <td style="text-align:right; vertical-align: middle; line-height: normal;">
                <button title="Vrati iz otpisa za ponovnu uppotrebu" class="btn btn-warning btn-sm vracanje" data-toggle="modal" data-target="#vracanjeModal" value="{{$o->id}}">
                    <i class="fa fa-retweet"></i>
                </button>
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

            var tabela = $('#tabela').DataTable({

                    columnDefs: [{
                            "targets": 0,
                            searchable: false,
                            orderable: false,
                            className: 'dt-body-center',
                            render: function (data, type, full, meta) {
                                return '<input type="checkbox" name="id[]" value="' + $('<div/>').text(data).html() + '">';
                            }
                        },
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
                            processing: "Procesiranje u toku...",
                            lengthMenu: "Prikaži _MENU_ elemenata",
                            zeroRecords: "Nije pronađen nijedan rezultat",
                            info: "Prikaz _START_ do _END_ od ukupno _TOTAL_ elemenata",
                            infoFiltered: "(filtrirano od ukupno _MAX_ elemenata)",
                        },
                    });

                new $.fn.dataTable.FixedHeader(tabela);

                $('#izaberi_sve').on('click', function(){
                var rows = tabela.rows({ 'search': 'applied' }).nodes();
                $('input[type="checkbox"]', rows).prop('checked', this.checked);
                });

                $('#tabela tbody').on('change', 'input[type="checkbox"]', function(){
                    if(!this.checked){
                    var el = $('#izaberi_sve').get(0);
                     if(el && el.checked && ('indeterminate' in el)){
                        el.indeterminate = true;
                        }
                    }
                });

                var boxovi = tabela.$('input[type="checkbox"]').serialize();

                $('#reciklazaDugme').click(function () {
                    $('#reciklaza_div').toggle();
                });

            });
</script>
@endsection