@extends('sabloni.app')

@section('naziv', 'Šifarnici | Kancelarije')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Kancelarija tlocrt"
         src="{{ url('/images/kancelarije.png') }}" style="height:64px;">
    &emsp;Kancelarije - tlocrt sa pozicijom
</h1>
@endsection

@section('sadrzaj')

<canvas id="canvas" width="800" height="480">
</canvas>

@endsection

@section('traka')
<h3>O kancelariji</h3>
{{$kancelarija->sviPodaci()}}
<hr>
<div class="well">
    <form action="#" method="POST">
    {{ csrf_field() }}
    <div class="form-group{{ $errors->has('x_inputPolje') ? ' has-error' : '' }}">
        <label for="x_inputPolje">X koordinata: </label>
        <input type="text" name="x_inputPolje" id="x_inputPolje" class="form-control" value="{{ old('x_inputPolje') }}" >
        @if ($errors->has('x_inputPolje'))
        <span class="help-block">
            <strong>{{ $errors->first('x_inputPolje') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('y_inputPolje') ? ' has-error' : '' }}">
        <label for="y_inputPolje">Y koordinata: </label>
        <input type="text" name="y_inputPolje" id="y_inputPolje" class="form-control" value="{{ old('y_inputPolje') }}">
        @if ($errors->has('y_inputPolje'))
        <span class="help-block">
            <strong>{{ $errors->first('y_inputPolje') }}</strong>
        </span>
        @endif
    </div>
        <div class="row dugmici">
            <div class="col-md-12">
                <div class="form-group text-right">
                    <div class="col-md-6 snimi">
                        <button type="submit" class="btn btn-success btn-block ono"><i class="fa fa-plus-circle"></i> Dodaj</button>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-danger btn-block ono" href="{{route('kancelarije.tlocrt.get', $kancelarija->id)}}"><i class="fa fa-ban"></i> Otkaži</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('skripte')
<script>
    $( document ).ready(function() {

var canvas = document.getElementById("canvas"),
    ctx = canvas.getContext("2d");


canvas.width = 800;
canvas.height = 480;

document.getElementById('canvas').onclick = function getCursorPosition(event){
    var rect = canvas.getBoundingClientRect();
    var x_zaBazu = event.clientX - rect.left;
    var y_zaBazu = event.clientY - rect.top;

    $("#x_inputPolje").val(x_zaBazu);
    $("#y_inputPolje").val(y_zaBazu);
    //console.log("x: " + x_zaBazu + " y: " + y_zaBazu);
}

var background = new Image();
background.src = "../../images/tlocrt.png";

background.onload = function(){
    ctx.drawImage(background,0,0); 

    var x_osa = 155;
    var y_osa = 340;
    var radius = 15;
    var period = 2000;

      ctx.beginPath();
      ctx.arc(x_osa, y_osa, radius, 0, 2 * Math.PI, false);
      ctx.fillStyle = '#18BC9C';
      ctx.fill();
      ctx.lineWidth = 2;
      ctx.strokeStyle = '#2C3E50';
      ctx.stroke(); 
}


});
</script>
@endsection