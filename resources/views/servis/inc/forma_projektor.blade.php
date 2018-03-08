<form action="{{ route('stavke.projektori.dodavanje') }}" method="POST" data-parsley-validate>
    {{ csrf_field() }}

    @if($stavka->nabavka_id)
        <input type="hidden" name="stavka_nabavke_id" id="stavka_nabavke_id" value="{{ $stavka->id }}">
        <input type="hidden" name="stavka_otpremnice_id" id="stavka_otpremnice_id" value="">
    @elseif($stavka->otpremnica_id)
        <input type="hidden" name="stavka_nabavke_id" id="stavka_nabavke_id" value="">
        <input type="hidden" name="stavka_otpremnice_id" id="stavka_otpremnice_id" value="{{ $stavka->id }}">
    @endif
    <input type="hidden" name="vrsta_uredjaja_id" id="vrsta_uredjaja_id" value="{{ $stavka->vrstaUredjaja->id }}">
    
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
            <label for="naziv">Naziv:</label>
            <input type="text" name="naziv" id="naziv" class="form-control"
                   value="{{ old('naziv') }}" maxlength="100" required>
            @if($errors->has('naziv'))
            <span class="help-block">
                <strong>{{ $errors->first('naziv') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('proizvodjac_id') ? ' has-error' : '' }}">
            <label for="proizvodjac_id">Proizvođač:</label>
            <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control" data-placeholder="proizvođač ..."
                    required>
                <option value=""></option>
                @foreach($proizvodjaci as $proizvodjac)
                <option value="{{ $proizvodjac->id }}" {{ old('proizvodjac_id')==$proizvodjac->id ? ' selected' : '' }}> {{ $proizvodjac->naziv }}</option>
                @endforeach
            </select>
            @if ($errors->has('proizvodjac_id'))
            <span class="help-block">
                <strong>{{ $errors->first('proizvodjac_id') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('inventarski_broj') ? ' has-error' : '' }}">
            <label for="inventarski_broj">Inventarski broj:</label>
            <input type="text" name="inventarski_broj" id="inventarski_broj" class="form-control"
                   value="{{ old('inventarski_broj') }}" maxlength="10">
            @if($errors->has('inventarski_broj'))
            <span class="help-block">
                <strong>{{ $errors->first('inventarski_broj') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('serijski_broj') ? ' has-error' : '' }}">
            <label for="serijski_broj">Serijski broj:</label>
            <input type="text" name="serijski_broj" id="serijski_broj" class="form-control"
                   value="{{ old('serijski_broj') }}"
                   maxlength="50" required>
            @if($errors->has('serijski_broj'))
            <span class="help-block">
                <strong>{{ $errors->first('serijski_broj') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('tip_lampe') ? ' has-error' : '' }}">
            <label for="tip_lampe">Tip lampe:</label>
            <input type="text" name="tip_lampe" id="tip_lampe" class="form-control"
                   value="{{ old('tip_lampe') }}"
                   maxlength="50">
            @if($errors->has('tip_lampe'))
            <span class="help-block">
                <strong>{{ $errors->first('tip_lampe') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('rezolucija') ? ' has-error' : '' }}">
            <label for="rezolucija">Rezolucija:</label>
            <input type="text" name="rezolucija" id="rezolucija" class="form-control"
                   value="{{ old('rezolucija') }}"
                   maxlength="255">
            @if($errors->has('rezolucija'))
            <span class="help-block">
                <strong>{{ $errors->first('rezolucija') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('kontrast') ? ' has-error' : '' }}">
            <label for="kontrast">Kontrast:</label>
            <input type="text" name="kontrast" id="kontrast" class="form-control"
                   value="{{ old('kontrast') }}"
                   maxlength="255">
            @if($errors->has('kontrast'))
            <span class="help-block">
                <strong>{{ $errors->first('kontrast') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
            <label for="link">Link:</label>
            <textarea id="link" name="link"
                      class="form-control">{{ old('link') }}</textarea>
            @if ($errors->has('link'))
            <span class="help-block">
                <strong>{{ $errors->first('link') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="row dugmici">
        <div class="col-md-12">
            <div class="form-group text-right">
                <div class="col-md-6 snimi">
                    <button type="submit" class="btn btn-success btn-block ono">
                        <i class="fa fa-plus-circle"></i> Dodaj
                    </button>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-danger btn-block ono"
                       href="{{ route('nabavke.stavke.detalj', $stavka->id) }}">
                        <i class="fa fa-ban"></i> Otkaži
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
