@extends('sabloni.app') 
@section('naziv', 'Modeli | Izmena modela grafičkog adaptera') 
@section('meni') 
@include('sabloni.inc.meni')
@endsection @section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Modeli grafičkih adaptera - izmena"
                src="{{url('/images/vga.png')}}" style="height:64px;">
            &emsp;Izmena modela grafičkog adaptera
        </h1>
    </div>
</div>
<hr>
<div class="row" style="margin-bottom: 16px;">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" onclick="window.history.back();"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('vga.modeli') }}"
               title="Povratak na listu modela grafičkih adaptera">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

        <div class="row ceo_dva">
            <div class="col-md-12 boxic">

                <form action="{{ route('vga.modeli.izmena.post', $vga->id) }}" method="POST" data-parsley-validate>
                    {{ csrf_field() }}

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
                                <label for="naziv">Naziv: </label>
                                <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv', $vga->naziv) }}" required> @if ($errors->has('naziv'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('naziv') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('proizvodjac_id') ? ' has-error' : '' }}">
                                <label for="proizvodjac_id">Proizvođač:</label>
                                <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control" data-placeholder="proizvođači ..."
                                    required>
                                    <option value=""></option>
                                    @foreach($proizvodjaci as $proizvodjac)
                                    <option value="{{ $proizvodjac->id }}"
                                        {{ $proizvodjac->id == old('proizvodjac_id')   ? ' selected' : '' }}
                                        {{ $vga->proizvodjac_id == $proizvodjac->id ? ' selected' : '' }}>
                                        {{ $proizvodjac->naziv }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('proizvodjac_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('proizvodjac_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <hr> {{-- Red II --}}
                    <div class="row">
                        
                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('cip') ? ' has-error' : '' }}">
                                <label for="cip">Čip: </label>
                                <input type="text" name="cip" id="cip" class="form-control" value="{{ old('cip', $vga->cip) }}" required> @if ($errors->has('cip'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('cip') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('tip_memorije_id') ? ' has-error' : '' }}">
                                <label for="tip_memorije_id">Tip memorije:</label>
                                <select name="tip_memorije_id" id="tip_memorije_id" class="chosen-select form-control" data-placeholder="tipovi ..." required>
                                    <option value=""></option>
                                    @foreach($tip as $t)
                                    <option value="{{ $t->id }}"
                                        {{ $t->id == old('tip_memorije_id')   ? ' selected' : '' }}
                                        {{ $vga->tip_memorije_id == $t->id ? ' selected' : '' }}>
                                        {{ $t->naziv }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tip_memorije_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tip_memorije_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('kapacitet_memorije') ? ' has-error' : '' }}">
                                <label for="kapacitet_memorije">Kapacitet memorije MB: </label>
                                <input type="number" name="kapacitet_memorije" id="kapacitet_memorije" class="form-control" value="{{ old('kapacitet_memorije', $vga->kapacitet_memorije) }}" required> @if ($errors->has('kapacitet_memorije'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kapacitet_memorije') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group{{ $errors->has('vga_slot_id') ? ' has-error' : '' }}">
                                <label for="vga_slot_id">Slot (VGA):</label>
                                <select name="vga_slot_id" id="vga_slot_id" class="chosen-select form-control" data-placeholder="slotovi ..." required>
                                    <option value=""></option>
                                    @foreach($slotovi as $t)
                                    <option value="{{ $t->id }}"
                                        {{ $t->id == old('vga_slot_id')   ? ' selected' : '' }}
                                        {{ $vga->vga_slot_id == $t->id ? ' selected' : '' }}>
                                        {{ $t->naziv }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('vga_slot_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('vga_slot_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    <hr> {{-- Red III --}}
                    <div class="row">
                                <div class="col-md-3">
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
        @foreach ($vga->povezivanja as $p)
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
                            <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                                <label for="link">Link modela grafičkog adaptera: </label>
                                <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $vga->link) }}" maxlenght="255"> @if ($errors->has('link'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('link') }}</strong>
                                </span>
                                @endif
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                                <label for="napomena">Napomena:</label>
                                <textarea name="napomena" id="napomena" class="form-control">{{ old('napomena', $vga->napomena) }}</textarea>
                                @if ($errors->has('napomena'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('napomena') }}</strong>
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
                <button type="submit" class="btn btn-success btn-block ono"><i class="fa fa-floppy-o"></i>&emsp;&emsp;Snimi izmene</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger btn-block ono" href="{{route('vga.modeli')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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

    $('.chosen-select').chosen({
        allow_single_deselect: true
    });

    function resizeChosen() {
        $(".chosen-container").each(function () {
            $(this).attr('style', 'width: 100%');

        });
    };
});
</script>
@endsection