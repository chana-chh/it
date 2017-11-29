<form action="{{ route('nabavke.stavke.mrezni.dodavanje') }}" method="POST" data-parsley-validate>
    {{ csrf_field() }}
    <input type="hidden" name="stavka_nabavke_id" id="stavka_nabavke_id" value="{{ $stavka->id }}">
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
    <div class="col-md-6">
        <div class="form-group{{ $errors->has('broj_portova') ? ' has-error' : '' }}">
            <label for="broj_portova">Broj portova:</label>
            <input type="number" id="broj_portova" name="broj_portova"
                   class="form-control"
                   value="{{ old('broj_portova', 0) }}"
                   min="0" step="1" required>
            @if ($errors->has('broj_portova'))
            <span class="help-block">
                <strong>{{ $errors->first('broj_portova') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group" style="margin-top: 3rem;">
            <label>
                <input type="checkbox" name="upravljiv" id="upravljiv"> &emsp;Upravljiv
            </label>
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
        }
    });
</script>
