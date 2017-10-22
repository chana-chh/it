@extends('sabloni.app')

@section('naziv', 'Početna')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="text-center" style="font-size: 64px;">{{config('app.name')}}</h1>
    <hr>
    <div class="row" style="margin-top: 72px;">
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Računari</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="računari" src="{{url('/images/kompaS.png')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno računara:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $racunara }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Monitori</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="računari" src="{{url('/images/monitorS.png')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno monitora:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $monitora }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Štampači</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="računari" src="{{url('/images/stampac.png')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno štampača:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $stampaca }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Skeneri</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="računari" src="{{url('/images/scanner.png')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno skenera:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $skenera }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">UPS-evi</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="računari" src="{{url('/images/ups1.jpg')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno upseva:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $upseva }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Mrežni uređaji</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="Mrežni uređaji" src="{{url('/images/mrezniUredjaji.png')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno mrežnih uređaja:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $mreznih_uredjaja }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Projektori</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="Projektori" src="{{url('/images/projektor.png')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno projektora:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $projektora }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-info noborder">
                <div class="panel-heading">
                    <h3 class="text-center bez-margina">
                        <a href="" style="text-decoration: none; color: #2c3e50">Aplikacije</a>
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="">
                    <img class="grow center-block responsive" alt="Aplikacije" src="{{url('/images/aplikacije.png')}}" style="height: 128px;">
                    </a>
                </div>
                <div class="panel-footer text-center">
                    <h4>
                        Ukupno aplikacija:
                        <a href=""  style="text-decoration: none;">
                            <strong>{{ $aplikacija }}</strong>
                        </a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('skripte')
<script>

</script>
@endsection