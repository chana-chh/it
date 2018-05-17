<form action="{{ route('stavke.hdd.dodavanje') }}" method="POST" data-parsley-validate>
    {{ csrf_field() }}
    <input type="hidden" name="stavka_otpremnice_id" id="stavka_nabavke_id" value="{{ $stavka->id }}">
    <input type="hidden" name="vrsta_uredjaja_id" id="vrsta_uredjaja_id" value="{{ $stavka->vrstaUredjaja->id }}">
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
        <div class="form-group{{ $errors->has('hdd_model_id') ? ' has-error' : '' }}">
            <label for="hdd_model_id">Model HDD:</label>
            <select name="hdd_model_id" id="hdd_model_id" class="chosen-select form-control"
                    data-placeholder="Model HDD ..." required>
                <option value=""></option>
                @foreach($modeli_hdd as $mm)
                <option value="{{ $mm->id }}"
                        {{ old( 'hdd_model_id') == $mm->id ? ' selected' : '' }}>{{ $mm->proizvodjac->naziv }} {{ $mm->kapacitet }} GB</option>
                @endforeach
            </select>
            @if ($errors->has('hdd_model_id'))
            <span class="help-block">
                <strong>{{ $errors->first('hdd_model_id') }}</strong>
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
                    @if($stavka->otpremnica_id)
                    <a class="btn btn-danger btn-block ono"
                       href="{{ route('otpremnice.stavke.detalj', $stavka->id) }}">
                        <i class="fa fa-ban"></i> Otkaži
                    </a>
                    @elseif($stavka->nabavka_id)
                    <a class="btn btn-danger btn-block ono"
                       href="{{ route('nabavke.stavke.detalj', $stavka->id) }}">
                        <i class="fa fa-ban"></i> Otkaži
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>


