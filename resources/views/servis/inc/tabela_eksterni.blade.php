<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width: 10%;">#</th>
            <th style="width: 40%;">Inventarski broj</th>
            <th style="width: 40%;">Serijski broj</th>
            <th style="width: 10%; text-align: right;">Akcije</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stavka->uredjaji() as $uredjaj)
        <tr>
            <td>{{ $uredjaj->id }}</td>
            <td>{{ $uredjaj->inventarski_broj }}</td>
            <td>{{ $uredjaj->serijski_broj }}</td>
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
