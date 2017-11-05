@extends('sabloni.app')

@section('naziv', 'Sifarnici | Zaposleni izmena')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <img class="slicica_animirana" alt="Zaposleni"
                  src="{{url('/images/korisnik_edit.png')}}" style="height:64px;">
            &emsp;Izmena podataka o zaposlenom
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
            <a class="btn btn-primary" href="{{ route('zaposleni') }}"
               title="Povratak na listu zaposlenih">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
        
<div class="row ceo_dva">
    <div class="col-md-12 boxic">

        <form action="{{ route('zaposleni.izmena.post', $zaposleni->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
            {{ csrf_field() }}

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('ime') ? ' has-error' : '' }}">
                        <label for="ime">Ime:</label>
                        <input type="text" name="ime" id="ime" class="form-control" value="{{ old('ime', $zaposleni->ime) }}" maxlength="50"> @if ($errors->has('ime'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ime') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('prezime') ? ' has-error' : '' }}">
                        <label for="prezime">Prezime:</label>
                        <input type="text" name="prezime" id="prezime" class="form-control" value="{{ old('prezime', $zaposleni->prezime) }}" maxlength="100"
                            required> @if ($errors->has('prezime'))
                        <span class="help-block">
                            <strong>{{ $errors->first('prezime') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <hr> {{-- Red sa upravom --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('uprava_id') ? ' has-error' : '' }}">
                        <label for="uprava_id">Uprava:</label>
                        <select name="uprava_id" id="uprava_id" class="chosen-select form-control" data-placeholder="uprava ..." required>
                            <option value=""></option>
                            @foreach($uprave as $uprava)
                            <option value="{{ $uprava->id }}" {{ $uprava->id == old('uprava_id') ? ' selected' : '' }} {{ $zaposleni->uprava_id == $uprava->id ? ' selected'
                                : '' }}> {{ $uprava->naziv }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('uprava_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('uprava_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('kancelarija_id') ? ' has-error' : '' }}">
                        <label for="kancelarija_id">Kancelarija:</label>
                        <select name="kancelarija_id" id="kancelarija_id" class="chosen-select form-control" data-placeholder="kancelarija ..." required>
                            <option value=""></option>
                            @foreach($kancelarije as $kancelarija)
                            <option value="{{ $kancelarija->id }}" {{ old( 'kancelarija_id')==$kancelarija->id ? ' selected' : '' }} {{ $zaposleni->kancelarija_id == $kancelarija->id ? ' selected' : ''
                                }}> {{ $kancelarija->naziv }}, {{$kancelarija->lokacija->naziv}}, {{$kancelarija->sprat->naziv}}
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
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6 text-center">
                    <img src="{{asset('images/slike_zaposlenih/'.$zaposleni->src)}}" class="img-rounded" style="max-height: 120px" alt="Slika zaposlenog">
                    <hr>
                    <div class="input-group image-preview" style="margin-top: 30px;">
                        <input type="text" class="form-control image-preview-filename" disabled="disabled">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-danger image-preview-clear" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Poništi
                            </button>
                            <div class="btn btn-warning image-preview-input">
                                <span>
                                    <i class="fa fa-upload" aria-hidden="true"></i>
                                </span>
                                <span class="image-preview-input-title">Izmeni fotografiju zaposlenog</span>
                                <input type="file" accept="image/png, image/jpeg, image/gif" name="slika" id="slika" />
                            </div>
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                        <label for="napomena">Napomena:</label>
                        <textarea name="napomena" id="napomena" class="form-control">{{ old('napomena', $zaposleni->napomena) }}</textarea>
                        @if ($errors->has('napomena'))
                        <span class="help-block">
                            <strong>{{ $errors->first('napomena') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


            </div>
            <div class="row dugmici">
                <div class="col-md-6 col-md-offset-6">
                    <div class="form-group text-right">
                        <div class="col-md-6 snimi">
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-floppy-o"></i>&emsp;Snimi</button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-danger btn-block ono" href="{{route('zaposleni')}}">
                                <i class="fa fa-ban"></i>&emsp;Otkaži</a>
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

   // Petljanje sa slikom ou jeee :)

    $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');

    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {

    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");

    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Pregled</strong>"+$(closebtn)[0].outerHTML,
        content: "Fotografija nije odabrana",
        placement:'bottom'
    });

    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Odaberi fotografiju zaposlenog"); 
    }); 

    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:180,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Izmeni");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
   });
});
</script>
@endsection