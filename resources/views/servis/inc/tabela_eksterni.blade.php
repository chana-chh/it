<div class="row">
    <div class="col-md-12">
<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width: 10%;">#</th>
            <th style="width: 20%;">Inventarski broj</th>
            <th style="width: 20%;">Serijski broj</th>
            <th style="width: 20%;">Model</th>
            <th style="width: 20%;">Lokacija</th>
            <th style="width: 10%; text-align: right;">Akcije</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stavka->uredjaji() as $uredjaj)
        <tr>
            <td>{{ $uredjaj->id }}</td>
            <td>{{ $uredjaj->inventarski_broj }}</td>
            <td>{{ $uredjaj->serijski_broj }}</td>
            @if($uredjaj->vrsta_uredjaja_id == 3)
            <td>{{ $uredjaj->stampacModel->proizvodjac->naziv }}, {{ $uredjaj->stampacModel->naziv }}</td>
            @else
            <td>Nema, za sada!</td>
            @endif
            @if($uredjaj->kancelarija)
            <td>{{ $uredjaj->kancelarija->naziv }}</td>
            @else
            <td>/</td>
            @endif
            <td class="text-right">
                <a href="{{ route('stavke.uredjaji.pregled', [$stavka->vrstaUredjaja->id, $uredjaj->id]) }}"
                   class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
                <button id="brisanjeUredjaja" class="btn btn-danger btn-xs"
                        data-toggle="modal" data-target="#brisanjeModal"
                        value="{{ $uredjaj->id }}"
                        title="Brisanje uređaja stavke nabavke">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>
