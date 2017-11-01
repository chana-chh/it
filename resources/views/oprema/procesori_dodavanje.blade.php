@extends('sabloni.app')

@section('naziv', 'Oprema | Dodavanje procesora')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
        
        <div class="row ceo_dva">
        <div class="col-md-10 col-md-offset-1 boxic">

        <h1 class="page-header"><span><img class="slicica_animirana" alt="Dodavanje procesora" src="{{url('/images/cpu.png')}}" style="height:64px;"></span>&emsp;Dodavanje procesora</h1>

        <form action="{{ route('procesori.oprema.dodavanje.post') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="row">

            <div class="col-md-4">
                    <div class="form-group{{ $errors->has('serijski_broj') ? ' has-error' : '' }}">
                    <label for="serijski_broj">Serijski broj:</label>
                    <input type="text" name="serijski_broj" id="serijski_broj" class="form-control" value="{{ old('serijski_broj') }}" maxlength="50">
                    @if ($errors->has('serijski_broj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serijski_broj') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

                <div class="col-md-4">
                   <div class="form-group{{ $errors->has('otpremnica_id') ? ' has-error' : '' }}">
                    <label for="otpremnica_id">Otpremnica:</label>
                    <select name="otpremnica_id" id="otpremnica_id" class="chosen-select form-control" data-placeholder="otpremnice ..." >
                        <option value=""></option>
                        @foreach($otpremnice as $o)
                        <option value="{{ $o->id }}"{{ old('otpremnica_id') == $o->id ? ' selected' : '' }}>
                            {{ $o->dobavljac->naziv }}, {{ $o->broj }} od {{ $o->datum }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('otpremnica_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('otpremnica_id') }}</strong>
                        </span>
                    @endif
                </div>
                </div>

                <div class="col-md-4">
                   <div class="form-group{{ $errors->has('procesor_model_id') ? ' has-error' : '' }}">
                    <label for="procesor_model_id">Model procesora:</label>
                    <select name="procesor_model_id" id="procesor_model_id" class="chosen-select form-control" data-placeholder="model ..." required>
                        <option value=""></option>
                        @foreach($modeli as $m)
                        <option value="{{ $m->id }}"{{ old('procesor_model_id') == $m->id ? ' selected' : '' }}>
                            {{ $m->proizvodjac->naziv }}, {{ $m->naziv }} na {{ $m->takt }} MHz
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('procesor_model_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('procesor_model_id') }}</strong>
                        </span>
                    @endif
                </div>
                </div>
        </div>

        <hr>
        {{-- Red II --}}
        <div class="row">
            <div class="col-md-6">
                    <div class="form-group{{ $errors->has('racunar_id') ? ' has-error' : '' }}">
                    <label for="racunar_id">Računar:</label>
                    <select name="racunar_id" id="racunar_id" class="chosen-select form-control" data-placeholder="računar ..." >
                        <option value=""></option>
                        @foreach($racunari as $r)
                        <option value="{{ $r->id }}"{{ old('racunar_id') == $r->id ? ' selected' : '' }}>
                            {{ $r->ime }}
                        </option>
                        @endforeach
                    </select>
                    @if ($errors->has('racunar_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('racunar_id') }}</strong>
                        </span>
                    @endif
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
                <a class="btn btn-danger btn-block ono" href="{{route('procesori.oprema')}}"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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
                <a class="btn btn-info" href="{{route('procesori.oprema')}}" title="Povratak na listu modela procesora"><i class="fa fa-list" style="color:#2C3E50"></i></a>
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