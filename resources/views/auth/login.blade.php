@extends('sabloni.app')

@section('naziv', 'Prijava')

@section('naslov')
<h1 class="page-header text-center">IKT oprema</h1>
<div class="container">
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
        <div class="row">
            <img    src="{{url('/images/grb.png')}}"
                    class="center-block" alt="Грб Града Крагујевца"
                    style="margin-bottom: 15px;">
        </div>
        <div class="panel panel-info noborder" >
            <div class="panel-heading">
                <div    class="panel-title text-center"
                        style="text-decoration: none; color: #2c3e50">
                    Dobrodošli, molimo vas da se prijavite
                </div>
            </div>
            <div class="panel-body" >
                <form   name="form" id="form"
                        method="POST" action="{{ route('login') }}"
                        class="form-horizontal">
                        {{ csrf_field() }}
                    <div class="input-group log">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input  id="username" type="text" name="username" class="form-control"
                                value="{{ old('username') }}"
                                placeholder="Korisničko ime" required autofocus>
                    </div>
                    <div class="input-group log">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input  id="password" type="password" name="password"
                                class="form-control"
                                placeholder="Lozinka" required>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12 controls">
                            <button type="submit"
                                    class="btn btn-primary pull-right">
                                    <i class="glyphicon glyphicon-log-in"></i> Prijavi se
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

