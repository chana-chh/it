<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width: 10%;">#</th>
            <th style="width: 30%;">Model (naziv)</th>
            <th style="width: 25%;">Inventarski broj</th>
            <th style="width: 25%;">Serijski broj</th>
            <th style="width: 10%; text-align: right;">Akcije</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stavka->uredjaji() as $uredjaj)
        <tr>
            <td>{{ $uredjaj->id }}</td>
            <td>{{ $uredjaj->naziv }}</td>
            <td>{{ $uredjaj->inventarski_broj }}</td>
            <td>{{ $uredjaj->serijski_broj }}</td>
            <td class="text-right">
                <a href="{{-- route('projektori.detalj', $uredjaj->id) --}}" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
