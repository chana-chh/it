<h3>{{ ucfirst($uredjaji[0]->nazivModelaMnozina) }}</h3>
<hr style="border-top: 1px solid #18BC9C">

<table class="table table-striped table-responsive">
    <thead>
        <tr>
            <th style="width: 15%;">Inv. broj</th>
            <th style="width: 15%;">Serijski broj</th>
            <th style="width: 15%;">Računar</th>
            <th style="width: 30%;">Kancelarija</th>
            <th style="width: 10%; text-align: right;">Akcije</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @foreach($uredjaji as $uredjaj)
            <td>{{ $uredjaj->inventarski_broj }}</td>
            <td>{{ $uredjaj->serijski_broj }}</td>
            <td>
                @if($uredjaj->racunar)
                <!--{{-- route('racunar.detalj', {{ $uredjaj->racunar->id }}) --}}-->
                <a href="">{{ $uredjaj->racunar->ime }}</a>
                @endif
            </td>
            <td>
                @if($uredjaj->kancelarija)
                <!--{{-- route('kancelarije.detalj.get', {{ $uredjaj->kancelarija->id }}) --}}-->
                <a href="">{{ $uredjaj->kancelarija->lokacija->naziv }},
                    {{ $uredjaj->kancelarija->sprat->naziv }},
                    {{ $uredjaj->kancelarija->naziv }}</a>
                @endif
            </td>
            <!--  NABAVKA NE POSTOJI JER AKO JE VEC U OTPREMNICI NE MOZE BITI I U NABAVCI :)  -->
            <!--{{-- route($uredjaj->vezaNaPogled'.detalj', {{ $uredjaj->id }}) --}}-->
            <td class="text-right">
                <a href="" class="btn btn-success btn-xs">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
            @endforeach
        </tr>
    </tbody>
</table>
