@extends('sabloni.app')

@section('naziv', 'Početna centrala')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="text-center page-header">{{config('app.name')}} - telefonisti</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="{{route('lokacije')}}" style="text-decoration: none; color: #2c3e50">Lokacije</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="{{route('lokacije')}}">
                    <img class="grow center-block responsive" alt="Lokacije" src="{{url('/images/map.png')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Pregled dostupnih lokacija
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="{{route('spratovi')}}" style="text-decoration: none; color: #2c3e50">Spatovi</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="{{route('spratovi')}}">
                    <img class="grow center-block responsive" alt="Spatovi" src="{{url('/images/spratovi.jpg')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Pregled spratnosti
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="{{route('kancelarije')}}" style="text-decoration: none; color: #2c3e50">Kancelarije</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="{{route('kancelarije')}}">
                    <img class="grow center-block responsive" alt="Kancelarije" src="{{url('/images/kancelarije.png')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Pregled postojećih kancelarija
                    </h4>
                </div>
            </div>
        </div>
    </div>

     <div class="row">
        <div class="col-md-4">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="{{route('uprave')}}" style="text-decoration: none; color: #2c3e50">Uprave</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="{{route('uprave')}}">
                    <img class="grow center-block responsive" alt="Uprave" src="{{url('/images/uprava.png')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Trenutno dostupne organizacione celine
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="{{route('zaposleni')}}" style="text-decoration: none; color: #2c3e50">Zaposleni</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="{{route('zaposleni')}}">
                    <img class="grow center-block responsive" alt="Zaposleni" src="{{url('/images/korisnik.png')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Zaposleni GU Kragujevac
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="{{route('telefoni')}}" style="text-decoration: none; color: #2c3e50">Telefoni</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="{{route('telefoni')}}">
                    <img class="grow center-block responsive" alt="Telefoni" src="{{url('/images/telefon.png')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Fiksna telefonija i rad sa dostupnim brojevima
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endsection