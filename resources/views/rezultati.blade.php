@extends('sabloni.app')

@section('naziv', 'Rezultati')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <div class="row">
    <div class="col-md-6">
        <h1>
            <i class="fa fa-search fa-lg" aria-hidden="true"></i>&emsp;Rezultati pretrage</h1>
    </div>
    <div class="col-md-6 text-right">
    <form class="form-inline" action="{{ route('pretraga.rezultati') }}" method="POST" style="margin-top: 25px;">
                {{ csrf_field() }}
  <div class="form-group">
    <label class="sr-only" for="upit">Pretraži</label>
    <div class="input-group">
        <div class="input-group-addon"><i class="fa fa-refresh" aria-hidden="true"></i></div>
      <input type="text" class="form-control" name="upit" id="upit" placeholder="Ponovna pretraga">
      
    </div>
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
</div>

</div>
<hr>
@if($rezultat)
    @foreach($rezultat as $zaposleni)
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
            <div class="col-md-6">
        <h3>{{$zaposleni->zaposleni_ime}}, i treba da dodam upravu</h3>
        <h4>Kancelarija: {{$zaposleni->lokacija}}</h4>
        <p><i class="fa fa-phone" aria-hidden="true"></i>&emsp;{{$zaposleni->fiksni_telefoni}}</p>
        <p><i class="fa fa-mobile" aria-hidden="true"></i>&emsp;{{$zaposleni->mobilni_telefoni}}</p>
        <p><i class="fa fa-envelope" aria-hidden="true"></i>&emsp;{{$zaposleni->email_adrese}}</p>
    </div>
    <div class="col-md-6 text-right">
        <img src="{{url('/images/sara.jpg')}}" alt="sara" class="img-circle" style="height:128px;">
    </div>
</div>
        <hr style="border:none;  border-top:1px dotted #18BC9C;  color:#18BC9C;  height:1px;">
    </div>
</div>

    @endforeach
    {{ $rezultat->render() }}
@endif
@endsection