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
                @if($uredjaj->vrstaUredjaja->id === 2)
                <a href="{{ route('monitori.oprema.detalj', $uredjaj->id) }}" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
                @endif
                @if($uredjaj->vrstaUredjaja->id === 3)
                <a href="{{ route('stampaci.oprema.detalj', $uredjaj->id) }}" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
                @endif
                @if($uredjaj->vrstaUredjaja->id === 4)
                <a href="{{ route('skeneri.oprema.detalj', $uredjaj->id) }}" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
                @endif
                @if($uredjaj->vrstaUredjaja->id === 5)
                <a href="{{ route('upsevi.oprema.detalj', $uredjaj->id) }}" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
