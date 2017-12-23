<table id="tabela" class="table table-striped display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width: 15%;">#</th>
            <th style="width: 75%;">Serijski broj</th>
            <th style="width: 10%; text-align: right;">Akcije</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stavka->uredjaji() as $uredjaj)
        <tr>
            <td>{{ $uredjaj->id }}</td>
            <td>{{ $uredjaj->serijski_broj }}</td>
            <td class="text-right">
                @if($uredjaj->vrstaUredjaja->id === 6)
                <a href="{{ route('osnovne_ploce.oprema.detalj', $uredjaj->id) }}" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
                @endif
                @if($uredjaj->vrstaUredjaja->id === 7)
                <a href="{{ route('procesori.oprema.detalj', $uredjaj->id) }}" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
                @endif
                @if($uredjaj->vrstaUredjaja->id === 8)
                <a href="{{ route('vga.oprema.detalj', $uredjaj->id) }}" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
                @endif
                @if($uredjaj->vrstaUredjaja->id === 9)
                <a href="{{ route('memorije.oprema.detalj', $uredjaj->id) }}" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
                @endif
                @if($uredjaj->vrstaUredjaja->id === 10)
                <a href="{{ route('hddovi.oprema.detalj', $uredjaj->id) }}" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
                @endif
                @if($uredjaj->vrstaUredjaja->id === 11)
                <a href="{{ route('napajanja.oprema.detalj', $uredjaj->id) }}" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
