@extends('sabloni.app')

@section('naziv', 'Oprema | Dodavanje rezervnih kopija za servere')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-8">
        <h1>
            <i class="fa fa fa-archive fa-fw text-primary"></i>&emsp;Dodavanje rezervnih kopija za servere
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
            <a class="btn btn-primary" href="{{ route('serveri.oprema') }}"
               title="Povratak na listu servera">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>

<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form action="{{ route('serveri.dodavanje.bu.post') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            {{-- Red I --}}
            <div class="row">
                @if($server != null)
        <input type="hidden" name="server_id" id="server_id" value="{{ $server->id }}">
        @else
        <div class="col-md-3">
                <div class="form-group{{ $errors->has('server_id') ? ' has-error' : '' }}">
                    <label for="server_id">Server:</label>
                    <select name="server_id" id="server_id" class="chosen-select form-control" data-placeholder="server ..." required>
                        <option value=""></option>
                        @foreach($serveri as $server)
                        <option value="{{ $server->id }}" {{ old( 'server_id') == $server->id ? ' selected' : '' }}>{{ $server->ime }}.{{$server->domen}}
                    </option>
                    @endforeach
                </select>
                @if ($errors->has('server_id'))
                <span class="help-block">
                    <strong>{{ $errors->first('server_id') }}</strong>
                </span>
                @endif
            </div>
        </div>
        @endif
                
                <div class="col-md-3">
<div class="form-group{{ $errors->has('datum') ? ' has-error' : '' }}">
                        <label for="datum">Datum:</label>
                        <input type="text" name="datum" id="datum" class="form-control datepicker" placeholder="dd.mm.yyyy"
                               value="{{ old('datum') }}" required>
                        @if ($errors->has('datum'))
                        <span class="help-block">
                            <strong>{{ $errors->first('datum') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('opis') ? ' has-error' : '' }}">
            <label for="opis">Opis:</label>
            <textarea name="opis" id="opis" class="form-control">{{ old('opis') }}</textarea>
            @if ($errors->has('opis'))
            <span class="help-block">
                <strong>{{ $errors->first('opis') }}</strong>
            </span>
            @endif
        </div>
    </div>
    </div>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group{{ $errors->has('bu_path') ? ' has-error' : '' }}">
                    <label for="bu_path">Path:</label>
                    <input type="text" name="bu_path" id="bu_path" class="form-control" value="{{ old('bu_path') }}" maxlength="50"> @if ($errors->has('bu_path'))
                    <span class="help-block">
                        <strong>{{ $errors->first('bu_path') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('tip') ? ' has-error' : '' }}">
                    <label for="tip">Tip:</label>
                    <select name="tip" id="tip" class="chosen-select form-control" data-placeholder="tip ...">
                        <option value=""></option>
                        <option value="Full(sistem)">Full(sistem)</option>
                        <option value="Full(baza)">Full(baza)</option>
                        <option value="Full(fajlovi)">Full(fajlovi)</option>
                        <option value="Snapshot">Snapshot</option>
                        <option value="Image">Image</option>
                        <option value="Incremental">Incremental</option>
                        <option value="Differential">Differential</option>
                        <option value="Mirror">Mirror</option>
                </select>
                @if ($errors->has('tip'))
                <span class="help-block">
                    <strong>{{ $errors->first('tip') }}</strong>
                </span>
                @endif
            </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('periodika') ? ' has-error' : '' }}">
                    <label for="periodika">Periodika:</label>
                    <select name="periodika" id="periodika" class="chosen-select form-control" data-placeholder="periodika ...">
                        <option value=""></option>
                        <option value="Dnevno">Dnevno</option>
                        <option value="Nedeljno">Nedeljno</option>
                        <option value="Mesečno">Mesečno</option>
                        <option value="Polugodišnje">Polugodišnje</option>
                        <option value="Godišnje">Godišnje</option>
                </select>
                @if ($errors->has('periodika'))
                <span class="help-block">
                    <strong>{{ $errors->first('periodika') }}</strong>
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
                <a class="btn btn-danger btn-block ono" href="#" onclick="window.history.back();"><i class="fa fa-ban"></i>&emsp;&emsp;Otkaži</a>
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

        resizeChosen();
        jQuery(window).on('resize', resizeChosen);

        var chsn = $('.chosen-select').chosen({
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
