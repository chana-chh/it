@extends('sabloni.app')

@section('naziv', 'Šifarnici | Reciklirani uređaji')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Kancelarija detaljno"
         src="{{ url('/images/reciklaze.png') }}" style="height:64px;">
    &emsp;Lista uređaja koji su reciklirani dana {{$datum}}
</h1>
@endsection

@section('sadrzaj')
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
            <a class="btn btn-primary" href="{{route('reciklaze')}}"
               title="Povratak na listu reciklaža">
                <i class="fa fa-list"></i>
            </a>
        </div>
        </div>
</div>
<hr>

<div class="row">
    <div class="col-md-12">
    <h4>Reciklirani uređaji:</h4>
    @if($uredjaji->isEmpty())
    <p class="text-danger">Nema recikliranih uređaja</p>
    @else
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>Vrsta</th>
                <th>Naziv</th>
                <th>Inventarski broj</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uredjaji as $uredjaj)
            <tr>
                <td>{{ $uredjaj->vrsta_uredjaja }}</td>
                <td>{{ $uredjaj->naziv }}</td>
                <td>{{ $uredjaj->inventarski_broj }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $uredjaji->render() }}
    @endif
</div>
</div>
    
@endsection