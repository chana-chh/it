<!DOCTYPE html>
<html lang="sr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{!! csrf_token() !!}">

<title>{{ config('app.name') }} | Pretraga</title>


<link href="{{ url('/favicon.ico') }}" rel="icon">
<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
<link href='{{ asset('/css/fontovi.css') }}' rel='stylesheet' type='text/css'>
<link href='{{ asset('/css/pretraga.css') }}' rel='stylesheet' type='text/css'>

<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
</head>

<body>
    <div class="container">

    <div class="row">
        <div class="col-md-6 no-float" style="background: #2C3E50">

                    <img class="center-block" alt="imenik" src="{{url('/images/imenik.png')}}" style="height: 128px; margin-top: 200px;">

            <form class="form-inline text-center" action="{{ route('pretraga.rezultati') }}" method="POST" style="margin-top: 150px;">
                {{ csrf_field() }}
  <div class="form-group">
    <label class="sr-only" for="upit">Pretraži</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
      <input type="text" class="form-control" name="upit" id="upit" placeholder="Pretraži imenik">
      
    </div>
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
        </div>

        <div class="col-md-6 no-float" style="background: #18BC9C">
            <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
<a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
        </div>
    </div>
</div>
            
</body>
</html>