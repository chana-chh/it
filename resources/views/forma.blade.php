@extends('sabloni.appmin')

@section('naziv', 'Imenik | Kontakt forma')


@section('naslov')
<div class="row">
    <div class="col-md-6">
    <h2>
    <img class="slicica_animirana" alt="Kontakt forma"
         src="{{ url('/images/email.png') }}" style="height:64px;">
    &emsp;Kontakt forma
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
<h2>Forma je u izradi !!!</h2>
@endsection

@section('skripte')

@endsection