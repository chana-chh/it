<table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th style="width: 30%;">#</th>
            <th style="width: 70%; text-align: right;">Akcije</th>
        </tr>
    </thead>
    <tbody>
        @foreach($stavka->uredjaji() as $uredjaj)
        <tr>
            <td>{{ $uredjaj->vrstaUredjaja->naziv }}</td>
            <td class="text-right">
                <a href="" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
