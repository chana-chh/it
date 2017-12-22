@extends('sabloni.app')

@section('naziv', 'Oprema | Računar detaljno')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1>
    <img class="slicica_animirana" alt="Računar detaljno" src="{{url('/images/kompaS.png')}}" style="height:64px;">&emsp; Otpis računara
    <span style="color: #18bc9c">{{$racunar->ime}}</span>
</h1>
<hr>
<div class="row" style="margin-bottom: 16px;">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" onclick="window.history.back();" title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}" title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{route('racunari.oprema')}}" title="Povratak na listu računara">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h4>Pre nego što otpišete računar odaberite komponente koje želite da ostavite:</h4>

        <div class="row ceo_dva">
            <div class="col-md-12 boxic">

                <form action="{{ route('racunari.oprema.otpis.post') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="idOtpis" name="idOtpis" value="{{$racunar->id}}">
                    <div class="row">
                    <div class="col-md-6 snimi">
                    <h4>Osnovna ploča</h4>
                    @if ($racunar->osnovnaPloca)
                    <div class="row">
                        <div class="col-md-6">
                             {{$racunar->osnovnaPloca->osnovnaPlocaModel->naziv}}
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="osnovnaPloca" id="osnovnaPloca" value="{{$racunar->osnovnaPloca->id}}"> Ostavi osnovnu ploču
                                </label>
                            </div>
                        </div>
                    </div>
                     @else
                     <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-danger">Nema komponente</h4>
                    </div>
                </div>
                     @endif                     

                    <h4>Procesori</h4>
                    @if (!$racunar->procesori->isEmpty()) @foreach($racunar->procesori as $p)
                    <div class="row">
                        <div class="col-md-6">
                            {{$p->procesorModel->proizvodjac->naziv}}, {{$p->procesorModel->naziv}}
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="procesor[]" id="procesor" value="{{$p->id}}"> Ostavi procesor
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach @else
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-danger">Nema komponente</h4>
                        </div>
                    </div>
                    @endif

                    <h4>Memorija</h4>
                    @if (!$racunar->memorije->isEmpty()) @foreach($racunar->memorije as $m)
                    <div class="row">
                        <div class="col-md-6">
                            {{$m->memorijaModel->proizvodjac->naziv}}, {{$m->memorijaModel->kapacitet}}
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="memorija[]" id="memorija" value="{{$m->id}}"> Ostavi memoriju
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach @else
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-danger">Nema komponente</h4>
                        </div>
                    </div>
                    @endif
                    </div>
                    <div class="col-md-6">
                    <h4>Čvrsti diskovi</h4>
                    @if (!$racunar->hddovi->isEmpty()) @foreach($racunar->hddovi as $h)
                    <div class="row">
                        <div class="col-md-6">
                            {{$h->hddModel->proizvodjac->naziv}}, {{$h->hddModel->kapacitet}}
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="hdd[]" id="hdd" value="{{$h->id}}"> Ostavi čvrsti disk
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach @else
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-danger">Nema komponente</h4>
                        </div>
                    </div>
                    @endif

                    <h4>Grafički adapteri</h4>
                    @if (!$racunar->grafickiAdapteri->isEmpty()) @foreach($racunar->grafickiAdapteri as $g)
                    <div class="row">
                        <div class="col-md-6">
                            {{$g->grafickiAdapterModel->proizvodjac->naziv}}, {{$g->grafickiAdapterModel->cip}}
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="vga[]" id="vga" value="{{$g->id}}"> Ostavi grafički adapter
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach @else
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-danger">Nema komponente</h4>
                        </div>
                    </div>
                    @endif

                    <h4>Napajanja</h4>
                    @if (!$racunar->napajanja->isEmpty()) @foreach($racunar->napajanja as $n)
                    <div class="row">
                        <div class="col-md-6">
                            {{$n->napajanjeModel->proizvodjac->naziv}}, {{$n->napajanjeModel->snaga}} W
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="napajanja[]" id="napajanja" value="{{$n->id}}"> Ostavi napajanje
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach @else
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-danger">Nema komponente</h4>
                        </div>
                    </div>
                    @endif
                    </div>
                    </div>

                    <hr style="border-top: 1px solid #18BC9C">

                    <div class="row dugmici">
                        <div class="col-md-6 col-md-offset-6">
                            <div class="form-group text-right">
                                <div class="col-md-6 snimi">
                                    <button type="submit" class="btn btn-danger btn-block ono">
                                        <i class="fa fa-recycle"></i>&emsp;&emsp;Otpiši</button>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-default btn-block ono" href="{{route('racunari.oprema')}}">
                                        <i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

});
</script>
@endsection