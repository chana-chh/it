@extends('sabloni.app')

@section('naziv', 'Nabavka dodavanje')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Nabavke"
                 src="{{ url('/images/nabavke.png') }}" style="height:64px;">
            &emsp;Dodavanje nabavke
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
            <a class="btn btn-primary" href="{{ route('nabavke') }}"
               title="Povratak na listu nabavki">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form id="forma" action="{{ route('nabavke.dodavanje.post') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('dobavljac_id') ? ' has-error' : '' }}">
                        <label for="dobavljac_id">Dobavljač:</label>
                        <!--&emsp;<a href="{{-- route('dobavljaci.dodavanje.get') --}}">+</a>-->
                        <select id="dobavljac_id" name="dobavljac_id"
                                class="chosen-select form-control"
                                data-placeholder="dobavljač ..." required>
                            <option value=""></option>
                            @foreach($dobavljaci as $dobavljac)
                            <option value="{{ $dobavljac->id }}"
                                    {{ old('dobavljac_id') == $dobavljac->id ? ' selected' : '' }}>
                                    {{ $dobavljac->naziv }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('dobavljac_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dobavljac_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                   <div class="form-group{{ $errors->has('datum') ? ' has-error' : '' }}">
                        <label for="datum">Datum:</label>
                        <input type="text" name="datum" id="datum" class="form-control datepicker" placeholder="dd.mm.yyyy"
                               value="{{ old('datum') }}">
                        @if ($errors->has('datum'))
                        <span class="help-block">
                            <strong>{{ $errors->first('datum') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('garancija') ? ' has-error' : '' }}">
                        <label for="garancija">Garancija (meseci):</label>
                        <input type="number" id="garancija" name="garancija"
                               class="form-control"
                               value="{{ old('garancija', 0) }}"
                               min="0" step="1" required>
                        @if ($errors->has('garancija'))
                        <span class="help-block">
                            <strong>{{ $errors->first('garancija') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('napomena') ? ' has-error' : '' }}">
                        <label for="napomena">Napomena:</label>
                        <textarea id="napomena" name="napomena"
                                  class="form-control">{{ old('napomena') }}</textarea>
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
                    <div class="form-group">
                        <div class="col-md-6 snimi">
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-plus-circle"></i> Dodaj
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-danger btn-block ono" href="{{route('nabavke')}}">
                                <i class="fa fa-ban"></i> Otkaži
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('skripte')
<script src="{{ asset('/js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $(document).ready(function () {
        jQuery(window).on('resize', resizeChosen);

        $('.chosen-select').chosen({
            allow_single_deselect: true,
            search_contains: true
        });

        function resizeChosen() {
            $(".chosen-container").each(function () {
                $(this).attr('style', 'width: 100%');
            });
        }

        $('.datepicker').datepicker({
            format: 'dd.mm.yyyy',
            autoclose: true,
            endDate: '+1y'
        });
    });
</script>
@endsection
