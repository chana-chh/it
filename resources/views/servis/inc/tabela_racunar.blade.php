<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
    <th style="width: 5%;">#</th>
    <th style="width: 10%;">Laptop</th>
    <th style="width: 10%;">Server</th>
    <th style="width: 10%;">Brend</th>
    <th style="width: 20%;">Inventarski broj</th>
    <th style="width: 20%;">Serijski broj</th>
    <th style="width: 15%;">IKT broj</th>
    <th style="width: 10%;text-align:right">
        <i class="fa fa-cogs"></i>&emsp;Akcije</th>
</thead>
<tbody>
    @foreach($stavka->uredjaji() as $uredjaj)
    <tr> 
        <td>{{ $uredjaj->id }}</td>

        <td>
            @if($uredjaj->laptop == 1)
            <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
            @endif
        </td>
        <td>
            @if($uredjaj->server == 1)
            <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
            @endif
        </td>
        <td>
            @if($uredjaj->brend == 1)
            <i class="fa fa-check" aria-hidden="true" style="color: #18bc9c"></i>
            @endif
        </td>
        <td>{{ $uredjaj->inventarski_broj }}</td>
        <td>{{ $uredjaj->serijski_broj }}</td>
        <td>{{ $uredjaj->erc_broj }}</td>
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
