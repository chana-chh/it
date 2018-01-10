<form action="{{ route('nabavke.stavke.racunari.dodavanje') }}" method="POST" data-parsley-validate>
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>
                    <input type="checkbox" name="laptop" id="laptop"> Laptop
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>
                    <input type="checkbox" name="brend" id="brend"> Brend
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>
                    <input type="checkbox" name="serverf" id="server"> Server
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('proizvodjac_id') ? ' has-error' : '' }}">
                <label for="proizvodjac_id">Proizvođač:</label>
                <select name="proizvodjac_id" id="proizvodjac_id" class="chosen-select form-control"
                        data-placeholder="proizvođač ...">
                    <option value=""></option>
                    @foreach($proizvodjaci as $proizvodjac)
                    <option value="{{ $proizvodjac->id }}"
                            {{ old( 'proizvodjac_id') == $proizvodjac->id ? ' selected' : '' }}> {{ $proizvodjac->naziv }}</option>
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
    <div class="row">
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('serijski_broj') ? ' has-error' : '' }}">
                <label for="serijski_broj">Serijski broj:</label>
                <input type="text" name="serijski_broj" id="serijski_broj" class="form-control"
                       value="{{ old('serijski_broj') }}" maxlength="50">
                @if($errors->has('serijski_broj'))
                <span class="help-block">
                    <strong>{{ $errors->first('serijski_broj') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
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
    </div>
    <input type="hidden" name="stavka_nabavke_id" id="stavka_nabavke_id" value="{{ $stavka->id }}">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('ime') ? ' has-error' : '' }}">
                <label for="ime">Ime računara (Aktivni direktorijum):</label>
                <input type="text" name="ime" id="ime" class="form-control"
                       value="{{ old('ime') }}"
                       maxlength="100" required>
                @if ($errors->has('ime'))
                <span class="help-block">
                    <strong>{{ $errors->first('ime') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group{{ $errors->has('erc_broj') ? ' has-error' : '' }}">
                <label for="erc_broj">Broj IKT odeljenja:</label>
                <input type="text" name="erc_broj" id="erc_broj" class="form-control"
                       value="{{ old('erc_broj') }}"
                       maxlength="100" required>
                @if($errors->has('erc_broj'))
                <span class="help-block">
                    <strong>{{ $errors->first('erc_broj') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
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
