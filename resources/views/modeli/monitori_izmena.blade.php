@extends('sabloni.app')

@section('naziv', 'Modeli | Izmena modela monitora')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
        
        <div class="row ceo_dva">
        <div class="col-md-10 col-md-offset-1 boxic">

        <h1 class="page-header"><span><img class="slicica_animirana" alt="Izmena modela monitora" src="{{url('/images/napajanje.png')}}" style="height:64px;"></span>&emsp;Izmena modela monitora</h1>

        <form action="{{ route('monitori.modeli.izmena.post', $model->id) }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="row">

            <div class="col-md-6">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
                    <label for="naziv">Naziv:</label>
                    <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv', $model->naziv) }}" maxlength="50">
                    @if ($errors->has('naziv'))
                        <span class="help-block">
                            <strong>{{ $errors->first('naziv') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

                <div class="col-md-6">
                   <div class="form-group{{ $errors->has('proizvodjac_id') ? ' has-error' : '' }}">
                    <label for="proizvodjac_id">Proizvođač:</label>
                    <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control" data-placeholder="proizvođač ..." required>
                        <option value=""></option>
                        @foreach($proizvodjaci as $proizvodjac)
                         <option value="{{ $proizvodjac->id }}"
                            {{ $proizvodjac->id == old('proizvodjac_id')   ? ' selected' : '' }}
                            {{ $model->proizvodjac_id == $proizvodjac->id ? ' selected' : '' }}>
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

        <hr>
        {{-- Red II --}}
        <div class="row">
            <div class="col-md-6">
                   <div class="form-group{{ $errors->has('dijagonala_id') ? ' has-error' : '' }}">
                    <label for="dijagonala_id">Dijagonala:</label>
                    <select name="dijagonala_id" id="dijagonala_id" class="chosen-select form-control" data-placeholder="proizvođač ..." required>
                        <option value=""></option>
                        @foreach($dijagonale as $d)
                         <option value="{{ $d->id }}"
                            {{ $d->id == old('dijagonala_id')   ? ' selected' : '' }}
                            {{ $model->dijagonala_id == $d->id ? ' selected' : '' }}>
                            {{ $d->naziv }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('dijagonala_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dijagonala_id') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

                            <div class="col-md-6">
                <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
            <label for="link">Link modela napajanja: </label>
            <input type="url" name="link" id="link" class="form-control" value="{{ old('link', $model->link) }}" maxlenght="255">
            @if ($errors->has('link'))
                <span class="help-block">
                    <strong>{{ $errors->first('link') }}</strong>
                </span>
            @endif
        </div>

            </div>

        </div>
        <hr>

        <div class="row">
        <div class="col-md-6">
        <div class="form-group roditelj">
        <div class="row naslovi">
        <div class="col-md-10">
        <p><strong>Vrsta povezivanja:</strong></p>
        <button class="btn btn-primary dodaj_polje" title="Moguće je dodati ukupno 4 polja za unos vrste povezivanja na ovoj formi."><i class="fa fa-plus-circle"></i>&emsp;Dodaj polje za unos vrste povezivanja</button>
        </div>

        <div class="col-md-2">
        <p hidden> A</p>
        </div>
        </div>
        @foreach ($model->povezivanja as $p)
        <div class="row checkboxoviforme">
        <div class="col-md-10">
                    <select name="povezivanja[]" class="form-control" >
                    <option value=""></option>
                    <option value="{{ $p->id }}"><strong>{{ $p->naziv }}</strong></option>
                    </select>
                </div>

        <div class="col-md-2">
        <p hidden> A</p>
        </div>
        </div>
        @endforeach
       
        </div>
        </div>

        <div class="col-md-6">
                <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                    <label for="napomena">Napomena:</label>
                    <textarea name="napomena" id="napomena" class="form-control">{{ old('napomena') }}</textarea>
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
                <a class="btn btn-danger btn-block ono" href="{{route('monitori.modeli')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
            </div>
            </div>
            </div>
            </div>
    </form>
            
</div>
    <div class="row dugmici">
        <div class="col-md-10 col-md-offset-1" style="margin-top: 20px">
            <div class="form-group">
            <div class="col-md-6 text-left">
                <a class="btn btn-info" href="{{route('monitori.modeli')}}" title="Povratak na listu modela monitora"><i class="fa fa-list" style="color:#2C3E50"></i></a>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-info" href="{{route('pocetna')}}" title="Povratak na početnu stranu"><i class="fa fa-home" style="color:#2C3E50"></i></a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {
    
    resizeChosen();
    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({allow_single_deselect: true});

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };
   });

</script>
@endsection