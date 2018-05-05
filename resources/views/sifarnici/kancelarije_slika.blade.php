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

@endsection

@section('skripte')
<script>
    $( document ).ready(function() {
var canvas = document.getElementById("canvas"),
    ctx = canvas.getContext("2d");

canvas.width = 800;
canvas.height = 480;



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