@extends('sabloni.appmin')

@section('naziv', 'Plan | Pozicija')


@section('naslov')
<div class="row">
    <div class="col-md-6">
    <h2>
    <img class="slicica_animirana" alt="Kancelarija tlocrt"
         src="{{ url('/images/kancelarije.png') }}" style="height:64px;">
    &emsp;{{$kancelarija->lokacija->naziv}}, {{$kancelarija->sprat->naziv}} - <strong class="text-success">{{$kancelarija->naziv}}</strong>
</h2>

    </div>

    <div class="col-md-6 text-right" style="padding-top: 50px;">
        <div class="btn-group">
            <a class="btn btn-primary" onclick="window.history.back();"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('imenik') }}"
                title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
        </div>
    </div>
</div>
<hr>

@if(is_null($slika))
<h3>Plan zgrade nije dostupan!</h3>
@else
<div class="canvas">
<canvas id="canvas" width="1400" height="703" style="padding: 0; margin: auto; display: block;">
</canvas>
</div>
@endif
@endsection

@section('skripte')
<script>
    $( document ).ready(function() {
        $('.prijava').popover({
            placement: 'top',
            trigger: 'hover'
        });
        
if (('#canvas').length) {
var canvas = document.getElementById("canvas"),
ctx = canvas.getContext("2d");

canvas.width = 1400;
canvas.height = 703;

document.getElementById('canvas').onclick = function getCursorPosition(event){
    var rect = canvas.getBoundingClientRect();
    var x_zaBazu = parseInt(event.clientX - rect.left);
    var y_zaBazu = parseInt(event.clientY - rect.top);

    $("#x_inputPolje").val(x_zaBazu);
    $("#y_inputPolje").val(y_zaBazu);
    //console.log("x: " + x_zaBazu + " y: " + y_zaBazu);
}

var background = new Image();
background.src = {!! json_encode($slika) !!};

background.onload = function(){
    ctx.drawImage(background,0,0); 

    var x_osa = {!! json_encode($kancelarija->x) !!};
    var y_osa = {!! json_encode($kancelarija->y) !!};
    
    if (x_osa === null) {
        x_osa = 15;
    } else {
        var x_osa = {!! json_encode($kancelarija->x) !!};
    }

    if (y_osa === null) {
        y_osa = 15;
    } else {
        var y_osa = {!! json_encode($kancelarija->y) !!};
    }
    
    var radius = 5;
    var period = 2000;
    var broj_kancelarije = {!! json_encode($kancelarija->naziv) !!};

        ctx.beginPath();
        ctx.arc(x_osa, y_osa, radius, 0, 2 * Math.PI, false);
        ctx.lineWidth = 2;
        ctx.strokeStyle = 'red';
        ctx.stroke();
        ctx.fillStyle = "red";
        ctx.fill();
        ctx.textAlign = "center";
        ctx.textBaseline="top";
        ctx.font = "20px Arial";
        ctx.fillText(broj_kancelarije, x_osa, y_osa + 2*radius);
}
}

});
</script>
@endsection