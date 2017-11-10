<h3>{{ $uredjaji[0]->nazivModelaMnozina }}</h3>
<hr style="border-top: 1px solid #18BC9C">

<table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th style="width: 10%;">#</th>
            <th style="width: 20%;">Serijski broj</th>
            <th style="width: 15%;">Računar</th>
            <th style="width: 40%;">Napomena</th>
            <th style="width: 15%; text-align: right;">Akcije</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($uredjaji as $uredjaj)
            <td>
                <!--{{-- route($uredjaj->vezaNaPogled'.detalj', {{ $uredjaj->id }}) --}}-->
                <a href="">{{ $uredjaj->id }}</a>
            </td>
            <td>{{ $uredjaj->serijski_broj }}</td>
            <td>
                @if($uredjaj->racunar)
                <!--{{-- route('racunar.detalj', {{ $uredjaj->racunar->id }}) --}}-->
                <a href="">{{ $uredjaj->racunar->ime }}</a>
                @endif
            </td>
            <td>{{ $uredjaj->napomena }}</td>
            <td class="text-right">
                <a href="" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
            @endforeach
        </tr>
    </tbody>
</table>
