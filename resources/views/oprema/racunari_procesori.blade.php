@extends('sabloni.app')

@section('naziv', 'Oprema | Dodavanje procesora u računar')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Dodavanje osnovne ploče u računar"
                 src="{{url('/images/mbd.png')}}" style="height:64px;">
            &emsp;Rad sa procesorima na računaru {{$uredjaj->ime}}
        </h1>
    </div>
</div>
<hr>
<div class="row" style="margin-bottom: 16px;">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" onclick="window.history.back();"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('racunari.oprema') }}"
               title="Povratak na listu računara">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
@endsection

@section('sadrzaj')
<h4>Podaci o već ugrađenoj komponenti:</h4>
<div class="row">
    <div class="col-md-12">
        @if ($uredjaj->procesori)
        @foreach($uredjaj->procesori as $procesor)
        <h3>Procesor {{$loop->iteration}}</h3>
        <table class="table table-striped" style="table-layout: fixed;">
            <tbody>
                <tr>
                    <th style="width: 40%;">

                        Serijski broj:
                    </th>
                    <td style="width: 60%;">
                        {{$procesor->serijski_broj}}
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%;">

                        Model:
                    </th>
                    <td style="width: 60%;">
                        {{$procesor->procesorModel->naziv}}
                    </td>
                </tr>

                <tr>
                    <th style="width: 40%;">

                        Proizvođač:
                    </th>
                    <td style="width: 60%;">
                        {{$procesor->procesorModel->proizvodjac->naziv}}
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%;">

                        Slot/Socket:
                    </th>
                    <td style="width: 60%;">
                        {{$procesor->procesorModel->soket->naziv}}
                    </td>
                </tr>

            </tbody>
        </table>
<div class="row" style="padding-top: 20px;">
            <div class="col-md-3">
        <a class="btn btn-primary ono btn-block" href="{{ route('racunari.oprema.procesori.izvadi', $procesor->id) }}">
            <i class="fa fa-minus-circle fa-fw"></i> Izvadi iz računara</a>
    </div>
    <div class="col-md-3 col-md-offset-6">
        <a class="btn btn-danger ono btn-block" href="{{ route('racunari.oprema.procesori.izvadi.obrisi', $procesor->id) }}">
            <i class="fa fa-trash fa-fw"></i> Izvadi i otpiši</a>
    </div>
</div>
<hr>
    @endforeach
        @else
        <h4> Komponenta nije dodata ili nema podataka o njoj </h4>
        @endif
    </div>
</div>

@endsection

@section('traka')
<h4> Dodavanje već postojećih, neraspoređenih komponenti</h4>
@endsection

@section('skripte')
<script>
    $(document).ready(function () {

        resizeChosen();
        jQuery(window).on('resize', resizeChosen);

        var chsn = $('.chosen-select').chosen({
            allow_single_deselect: true
        });

        function resizeChosen() {
            $(".chosen-container").each(function () {
                $(this).attr('style', 'width: 100%');
            });
        }
    });

</script>
@endsection
