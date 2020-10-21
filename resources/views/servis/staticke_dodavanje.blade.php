@extends('sabloni.app')

@section('naziv', 'Servis | Vezivanje uređaja za datu IP adresu')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Statičke adrese"
                 src="{{ url('/images/ip.png') }}" style="height:64px;">
            &emsp;Vezivanje uređaja za IP adresu - {{ $ip->ip_adresa }}
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
            <a class="btn btn-primary" href="{{ route('staticke.slobodne') }}"
               title="Povratak na listu dostupnih IP adresa">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
<div class="row ceo_dva">
    <div class="col-md-12 boxic">
        <form id="forma" action="{{ route('staticke.dodavanje.post', $ip->id) }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('kancelarija_id') ? ' has-error' : '' }}">
                        <label for="kancelarija_id">Kancelarija:</label>
                        <select name="kancelarija_id" id="kancelarija_id" class="chosen-select form-control" data-placeholder="kancelarija ...">
                            <option value=""></option>
                            @foreach($kancelarije as $kancelarija)
                            <option value="{{ $kancelarija->id }}" {{ old( 'kancelarija_id')==$kancelarija->id ? ' selected' : '' }}> {{ $kancelarija->naziv }}, {{$kancelarija->lokacija->naziv}}, {{$kancelarija->sprat->naziv}}
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
                <div class="col-md-3">
                    <div class="form-group{{ $errors->has('uredjaj') ? ' has-error' : '' }}">
                        <label for="uredjaj">Vrsta uređaja:</label>
                        <select id="uredjaj" name="uredjaj"
                                class="chosen-select form-control"
                                data-placeholder="Vrsta uređaja ...">
                            <option value=""></option>
                            <option value="Switch"{{ old('uredjaj', $ip->uredjaj) == 'Switch' ? ' selected' : '' }}>Switch</option>
                            <option value="Hub"{{ old('uredjaj', $ip->uredjaj) == 'Hub' ? ' selected' : '' }}>Hub</option>
                            <option value="Router"{{ old('uredjaj', $ip->uredjaj) == 'Router' ? ' selected' : '' }}>Router</option>
                            <option value="Printer"{{ old('uredjaj', $ip->uredjaj) == 'Printer' ? ' selected' : '' }}>Printer</option>
                            <option value="Acces Point"{{ old('uredjaj', $ip->uredjaj) == 'Acces Point' ? ' selected' : '' }}>Acces Point</option>
                            <option value="IP Camera"{{ old('uredjaj', $ip->uredjaj) == 'IP Camera' ? ' selected' : '' }}>IP Camera</option>
                            <option value="Server"{{ old('uredjaj', $ip->uredjaj) == 'Server' ? ' selected' : '' }}>Server</option>
                            <option value="WorkStation"{{ old('uredjaj', $ip->uredjaj) == 'WorkStation' ? ' selected' : '' }}>WorkStation</option>
                            <option value="IP Phone"{{ old('uredjaj', $ip->uredjaj) == 'IP Phone' ? ' selected' : '' }}>IP Phone</option>
                            <option value="WIFI antena"{{ old('uredjaj', $ip->uredjaj) == 'IP Phone' ? ' selected' : '' }}>WIFI antena</option>
                            <option value="WIFI router"{{ old('uredjaj', $ip->uredjaj) == 'IP Phone' ? ' selected' : '' }}>WIFI router</option>
                            <option value="Firewall"{{ old('uredjaj', $ip->uredjaj) == 'IP Phone' ? ' selected' : '' }}>Firewall</option>
                        </select>
                        @if ($errors->has('uredjaj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('uredjaj') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group{{ $errors->has('ime') ? ' has-error' : '' }}">
                        <label for="ime">Ime:</label>
                        <input type="text" id="ime" name="ime"
                               class="form-control"
                               value="{{ old('ime') }}"
                               maxlength="50">
                        @if ($errors->has('ime'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ime') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group{{ $errors->has('vlan') ? ' has-error' : '' }}">
                        <label for="vlan">VLAN ID:</label>
                        <input type="number" id="vlan" name="vlan"
                               class="form-control"
                               value="{{ old('vlan', 0) }}"
                               min="0" step="1" >
                        @if ($errors->has('vlan'))
                        <span class="help-block">
                            <strong>{{ $errors->first('vlan') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group{{ $errors->has('uticnica') ? ' has-error' : '' }}">
                        <label for="uticnica">Utičnica:</label>
                        <input type="text" id="uticnica" name="uticnica"
                               class="form-control"
                               value="{{ old('uticnica') }}"
                               maxlength="50">
                        @if ($errors->has('uticnica'))
                        <span class="help-block">
                            <strong>{{ $errors->first('uticnica') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('model') ? ' has-error' : '' }}">
                        <label for="model">Model:</label>
                        <input type="text" id="model" name="model"
                               class="form-control"
                               value="{{ old('model') }}"
                               maxlength="150">
                        @if ($errors->has('model'))
                        <span class="help-block">
                            <strong>{{ $errors->first('model') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('sn') ? ' has-error' : '' }}">
                        <label for="sn">Serijski broj:</label>
                        <input type="text" id="sn" name="sn"
                               class="form-control"
                               value="{{ old('sn') }}"
                               maxlength="50">
                        @if ($errors->has('sn'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sn') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('inv_br') ? ' has-error' : '' }}">
                        <label for="inv_br">Inventarski broj:</label>
                        <input type="text" id="inv_br" name="inv_br"
                               class="form-control"
                               value="{{ old('inv_br') }}"
                               maxlength="50">
                        @if ($errors->has('inv_br'))
                        <span class="help-block">
                            <strong>{{ $errors->first('inv_br') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('prvi_nod') ? ' has-error' : '' }}">
                        <label for="prvi_nod">Prvo čvorište:</label>
                        <input type="text" id="prvi_nod" name="prvi_nod"
                               class="form-control"
                               value="{{ old('prvi_nod') }}"
                               maxlength="50">
                        @if ($errors->has('prvi_nod'))
                        <span class="help-block">
                            <strong>{{ $errors->first('prvi_nod') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group{{ $errors->has('opis') ? ' has-error' : '' }}">
                        <label for="opis">Opis:</label>
                        <textarea id="opis" name="opis"
                                  class="form-control">{{ old('opis') }}</textarea>
                        @if ($errors->has('opis'))
                        <span class="help-block">
                            <strong>{{ $errors->first('opis') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
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
                            <a class="btn btn-danger btn-block ono" href="{{route('staticke.slobodne')}}">
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
    });
</script>
@endsection
