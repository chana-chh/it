@extends('sabloni.app')

@section('naziv', 'Modeli | Dodavanje modela monitora')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Dodavanje modela monitora"
                 src="{{url('/images/monitorS.png')}}" style="height:64px;">
            &emsp;Dodavanje modela monitora
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
            <a class="btn btn-primary" href="{{route('monitori.modeli')}}"
               title="Povratak na listu modela monitora">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
        
        <div class="row ceo_dva">
        <div class="col-md-12 boxic">
        <form action="{{ route('monitori.modeli.dodavanje.post') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="row">

            <div class="col-md-6">
                    <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
                    <label for="naziv">Naziv:</label>
                    <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv') }}" maxlength="50">
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
                        <option value="{{ $proizvodjac->id }}"{{ old('proizvodjac_id') == $proizvodjac->id ? ' selected' : '' }}>
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
                    <select name="dijagonala_id" id="dijagonala_id" class="chosen-select form-control" data-placeholder="dijagonale ..." required>
                        <option value=""></option>
                        @foreach($dijagonale as $d)
                        <option value="{{ $d->id }}"{{ old('dijagonala_id') == $d->id ? ' selected' : '' }}>
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
            <input type="url" name="link" id="link" class="form-control" value="{{ old('link') }}" maxlenght="255">
            @if ($errors->has('link'))
                <span class="help-block">
                    <strong>{{ $errors->first('link') }}</strong>
                </span>
            @endif
        </div>

            </div>

                            

        </div>

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

        <div class="row checkboxoviforme">
        <div class="col-md-10">
                    <select name="povezivanja[]" class="form-control" >
                    <option value=""></option>
                    <option value="" disabled selected>Odaberi odgovarajuću vrstu povezivanja</option>
                    @foreach($povezivanje as $p)
                    <option value="{{ $p->id }}"><strong>{{ $p->naziv }}</strong></option>
                    @endforeach
                    </select>
                </div>

        <div class="col-md-2">
        <p hidden> A</p>
        </div>

                </div>
       
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
                <button type="submit" class="btn btn-success btn-block ono"><i class="fa fa-plus-circle"></i>&emsp;&emsp;Dodaj</button>
            </div>
            <div class="col-md-6">
                <a class="btn btn-danger btn-block ono" href="{{route('monitori.modeli')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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
$( document ).ready(function() {
    
    resizeChosen();
    jQuery(window).on('resize', resizeChosen);

    $('.chosen-select').chosen({allow_single_deselect: true});

    function resizeChosen() {
   $(".chosen-container").each(function() {
       $(this).attr('style', 'width: 100%');

   });
   };

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
    })
   });

</script>
@endsection