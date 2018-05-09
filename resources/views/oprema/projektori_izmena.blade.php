@extends('sabloni.app')

@section('naziv', 'Oprema | Izmena projektora')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Izmena projektora" src="{{url('/images/projektor.png')}}" style="height:64px;"> &emsp;Izmena podataka projektora
        </h1>
    </div>
</div>
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
            <a class="btn btn-primary" href="{{ route('projektori.oprema') }}" title="Povratak na listu projektora">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form action="{{ route('projektori.oprema.izmena.post', $uredjaj->id) }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group{{ $errors->has('serijski_broj') ? ' has-error' : '' }}">
                        <label for="serijski_broj">Serijski broj:</label>
                        <input type="text" name="serijski_broj" id="serijski_broj" class="form-control" value="{{ old('serijski_broj', $uredjaj->serijski_broj) }}"
                            maxlength="50"> @if ($errors->has('serijski_broj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serijski_broj') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group{{ $errors->has('inventarski_broj') ? ' has-error' : '' }}">
                        <label for="inventarski_broj">Inventarski broj:</label>
                        <input type="text" name="inventarski_broj" id="inventarski_broj" class="form-control" value="{{ old('inventarski_broj', $uredjaj->inventarski_broj) }}"
                            maxlength="10"> @if ($errors->has('inventarski_broj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('inventarski_broj') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('stavka_otpremnice_id') ? ' has-error' : '' }}">
                        <label for="stavka_otpremnice_id">Stavka otpremnice:</label>
                        <select name="stavka_otpremnice_id" id="stavka_otpremnice_id" class="chosen-select form-control" data-placeholder="otpremnice ...">
                            <option value=""></option>
                            @foreach($otpremnice as $o)
                            <optgroup label="{{ $o->dobavljac->naziv }}, {{ $o->broj }} od {{ $o->datum }}">
                                @foreach($o->stavke as $s)
                                <option value="{{ $s->id }}" {{ $s->id == old('stavka_otpremnice_id') ? ' selected' : '' }} {{ $uredjaj->stavka_otpremnice_id
                                    == $s->id ? ' selected' : '' }}> {{$s->naziv}} (popunjeno je {{$s->projektori->count()
                                    }} od {{$s->kolicina}} {{$s->jedinica_mere}})
                                </option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                        @if ($errors->has('stavka_otpremnice_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('stavka_otpremnice_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('stavka_nabavke_id') ? ' has-error' : '' }}">
                        <label for="stavka_nabavke_id">Stavka nabavke:</label>
                        <select name="stavka_nabavke_id" id="stavka_nabavke_id" class="chosen-select form-control" data-placeholder="nabavke ...">
                            <option value=""></option>
                            @foreach($nabavke as $o)
                            <optgroup label="{{ $o->dobavljac->naziv }} od {{ $o->datum }}">
                                @foreach($o->stavke as $s)
                                <option value="{{ $s->id }}" {{ $s->id == old('stavka_nabavke_id') ? ' selected' : '' }} {{ $uredjaj->stavka_nabavke_id == $s->id
                                    ? ' selected' : '' }}> {{$s->naziv}} (popunjeno je {{$s->projektori->count() }} od {{$s->kolicina}}
                                    {{$s->jedinica_mere}})
                                </option>
                                @endforeach
                            </optgroup>
                            @endforeach
                        </select>
                        @if ($errors->has('stavka_nabavke_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('stavka_nabavke_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


            </div>

            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('kancelarija_id') ? ' has-error' : '' }}">
                        <label for="kancelarija_id">Kancelarija:</label>
                        <select name="kancelarija_id" id="kancelarija_id" class="chosen-select form-control" data-placeholder="kancelarija ...">
                            <option value=""></option>
                            @foreach($kancelarije as $kancelarija)
                            <option value="{{ $kancelarija->id }}" {{ old( 'kancelarija_id')==$kancelarija->id ? ' selected' : '' }} {{ $uredjaj->kancelarija_id == $kancelarija->id ? ' selected' : '' }}>
                                {{ $kancelarija->sviPodaci() }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('kancelarija_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('kancelarija_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                        <label for="napomena">Napomena:</label>
                        <textarea name="napomena" id="napomena" class="form-control">{{ old('napomena', $uredjaj->napomena) }}</textarea>
                        @if ($errors->has('napomena'))
                        <span class="help-block">
                            <strong>{{ $errors->first('napomena') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p id="obavestenje" class="text-primary" style="font-size: 120%;"></p>
                </div>
            </div>
            {{-- Red III --}}
            <div class="row">
                        <div class="col-md-6">
        <div class="form-group roditelj">
        <div class="row naslovi">
        <div class="col-md-10">
        <p><strong>Vrsta povezivanja:</strong></p>
        <button type="button" class="btn btn-primary dodaj_polje" title="Moguće je dodati ukupno 4 polja za unos vrste povezivanja na ovoj formi."><i class="fa fa-plus-circle"></i>&emsp;Dodaj polje za unos vrste povezivanja</button>
        </div>

        <div class="col-md-2">
        <p hidden> A</p>
        </div>
        </div>
        @foreach ($uredjaj->povezivanja as $p)
        <div class="row checkboxoviforme">
        <div class="col-md-10">
                    <select name="povezivanja[]" class="form-control" >
                    <option value=""></option>
                    @foreach($povezivanje as $d)
                         <option value="{{ $d->id }}"
                            {{ $d->id == old('povezivanje_id')   ? ' selected' : '' }}
                            {{ $p->id == $d->id ? ' selected' : '' }}>
                            {{ $d->naziv }}
                        </option>
                        @endforeach
                    </select>
                </div>

        <div class="col-md-2">
        <a href="#" class="ukloni_polje"><i class="fa fa-times" style="vertical-align: bottom;"></i></a>
        </div>
        </div>
        @endforeach
       
        </div>
        </div>
                                    <div class="col-md-3">
        <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
            <label for="naziv">Naziv:</label>
            <input type="text" name="naziv" id="naziv" class="form-control"
                   value="{{ old('naziv', $uredjaj->naziv) }}"
                   maxlength="50">
            @if($errors->has('naziv'))
            <span class="help-block">
                <strong>{{ $errors->first('naziv') }}</strong>
            </span>
            @endif
        </div>
    </div>
                    <div class="col-md-3">
        <div class="form-group{{ $errors->has('tip_lampe') ? ' has-error' : '' }}">
            <label for="tip_lampe">Tip lampe:</label>
            <input type="text" name="tip_lampe" id="tip_lampe" class="form-control"
                   value="{{ old('tip_lampe', $uredjaj->tip_lampe) }}"
                   maxlength="50">
            @if($errors->has('tip_lampe'))
            <span class="help-block">
                <strong>{{ $errors->first('tip_lampe') }}</strong>
            </span>
            @endif
        </div>
    </div>
</div>
<hr>
{{-- Red IV --}}
    <div class="row">
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('rezolucija') ? ' has-error' : '' }}">
            <label for="rezolucija">Rezolucija:</label>
            <input type="text" name="rezolucija" id="rezolucija" class="form-control"
                   value="{{ old('rezolucija', $uredjaj->rezolucija) }}"
                   maxlength="255">
            @if($errors->has('rezolucija'))
            <span class="help-block">
                <strong>{{ $errors->first('rezolucija') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('kontrast') ? ' has-error' : '' }}">
            <label for="kontrast">Kontrast:</label>
            <input type="text" name="kontrast" id="kontrast" class="form-control"
                   value="{{ old('kontrast', $uredjaj->kontrast) }}"
                   maxlength="255">
            @if($errors->has('kontrast'))
            <span class="help-block">
                <strong>{{ $errors->first('kontrast') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
            <label for="link">Link:</label>
            <textarea id="link" name="link"
                      class="form-control">{{ old('link', $uredjaj->link) }}</textarea>
            @if ($errors->has('link'))
            <span class="help-block">
                <strong>{{ $errors->first('link') }}</strong>
            </span>
            @endif
        </div>
    </div>

            </div>


            <hr style="border-top: 1px solid #18BC9C">

            <div class="row dugmici">
                <div class="col-md-6 col-md-offset-6">
                    <div class="form-group text-right">
                        <div class="col-md-6 snimi">
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-floppy-o"></i>&emsp;&emsp;Snimi izmene</button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-danger btn-block ono" href="{{route('projektori.oprema')}}">
                                <i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection

@section('skripte')
<script>
    $(document).ready(function () {

        resizeChosen();
        jQuery(window).on('resize', resizeChosen);

        var chsn = $('.chosen-select').chosen({
            allow_single_deselect: true,
            search_contains: true
        });

        chsn.on('change', function (evt, params) {
            if (params == undefined && evt.currentTarget.id == 'racunar_id') {
                $('#obavestenje').hide();
            } else {
                $('#obavestenje').show();
            }
        });

        function resizeChosen() {
            $(".chosen-container").each(function () {
                $(this).attr('style', 'width: 100%');
            });
        }

        $("#racunar_id").on('change', function () {
            var ima_nema = $(this).find(":selected").data("procesor");
            $("#obavestenje").html(ima_nema);
        });

        var max_polja   = 4;
    var wrapper     = $(".roditelj");
    var dodaj       = $(".dodaj_polje");
    
    var x = 1;
    $(dodaj).click(function(e){
        e.preventDefault();
        if(x < max_polja){ 
            x++;
            $(wrapper).append('<div class="row checkboxoviforme"><div class="col-md-10"><select name="povezivanja[]" class="form-control"><option value=""><option value="" disabled selected>Odaberi odgovarajuću vrstu povezivanja</option></option>@foreach($povezivanje as $p)<option value="{{ $p->id }}"><strong>{{ $p->naziv }}</strong></option>@endforeach</select></div><div class="col-md-2"><a href="#" class="ukloni_polje"><i class="fa fa-times" style="vertical-align: bottom;"></i></a></div></div>');
        }
    });
    
    $(wrapper).on("click",".ukloni_polje", function(e){
        e.preventDefault();
        var $row    = $(this).parents('.checkboxoviforme'),
        $option = $row.find('[name="povezivanja[]"]');
        $row.remove(); x--;
    });
    });

</script>
@endsection
