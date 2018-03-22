@extends('sabloni.app')

@section('naziv', 'Oprema | Dodavanje napajanja u računar')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Dodavanje napajanja u računar"
                 src="{{url('/images/mbd.png')}}" style="height:64px;">
            &emsp;Rad sa napajanjima na računaru {{$uredjaj->ime}}
        </h1>
    </div>
</div>
<hr>
<div class="row" style="margin-bottom: 16px;">
    <div class="col-md-12">
        <div class="btn-group">
            <a class="btn btn-primary" href="{{route('racunari.oprema.detalj', $uredjaj->id)}}"
               title="Povratak na prethodnu stranu">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('pocetna') }}"
               title="Povratak na početnu stranu">
                <i class="fa fa-home"></i>
            </a>
            <a class="btn btn-primary" href="{{ route('racunari.oprema') }}"
               title="Povratak na listu računara">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
@endsection

@section('sadrzaj')
<h3>Podaci o već ugrađenoj komponenti:</h3>
<div class="row">
    <div class="col-md-12">
        @if ($uredjaj->napajanja->count()>0)
        @foreach($uredjaj->napajanja as $napajanje)
        <h4><em class="text-success">Napajanje {{$loop->iteration}}</em></h4>
        <table class="table table-striped" style="table-layout: fixed;">
            <tbody>
                <tr>
                    <th style="width: 40%;">
                        Serijski broj:
                    </th>
                    <td style="width: 60%;">
                        {{$napajanje->serijski_broj}}
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%;">
                        Proizvođač:
                    </th>
                    <td style="width: 60%;">
                        {{$napajanje->napajanjeModel->proizvodjac->naziv}}
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%;">
                        Naziv:
                    </th>
                    <td style="width: 60%;">
                        {{$napajanje->napajanjeModel->naziv}}
                    </td>
                </tr>
                <tr>
                    <th style="width: 40%;">
                        Snaga:
                    </th>
                    <td style="width: 60%;">
                        {{$napajanje->napajanjeModel->snaga}} W
                    </td>
                </tr>
            </tbody>
        </table>
<div class="row" style="padding-top: 20px;">
            <div class="col-md-3">
        <a class="btn btn-primary ono btn-block" href="{{ route('racunari.oprema.napajanja.izvadi', $napajanje->id) }}">
            <i class="fa fa-minus-circle fa-fw"></i> Izvadi iz računara</a>
    </div>
    <div class="col-md-3 col-md-offset-6">
        <a class="btn btn-danger ono btn-block" href="{{ route('racunari.oprema.napajanja.izvadi.obrisi', $napajanje->id) }}">
            <i class="fa fa-trash fa-fw"></i> Izvadi i otpiši</a>
    </div>
</div>
<hr style="border-top: 1px solid #18BC9C">
    @endforeach
        @else
        <h4> Komponenta nije dodata ili nema podataka o njoj </h4>
        @endif
    </div>
</div>

@endsection

@section('traka')
<h4> Dodavanje već postojećih, neraspoređenih komponenti</h4>
<div class="row">
    <div class="col-md-12">
        <form action="{{route('racunari.oprema.napajanja.dodaj.postojecu',  $uredjaj->id)}}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <div class="row" style="margin-top: 1rem">

                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('napajanje_id') ? ' has-error' : '' }}">
                        <label for="napajanje_id">Napajanja:</label>
                        <select name="napajanje_id" id="napajanje_id" class="chosen-select form-control" data-placeholder="psu ..." required>
                            <option value=""></option>
                            @foreach($napajanja_uredjaji as $p)
                            <option value="{{ $p->id }}" {{ old( 'napajanje_id')== $p->id ? ' selected' : '' }}> sn: {{ $p->serijski_broj }}, {{ $p->napajanjeModel->proizvodjac->naziv }}, 
                                {{ $p->napajanjeModel->snaga }}
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('napajanje_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('napajanje_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <hr style="border-top: 1px solid #18BC9C">

            <div class="row dugmici">
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <div class="col-md-6 col-md-offset-6">
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-plus-circle"></i>&emsp;&emsp;Dodaj</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<hr>
<h4> Dodavanje novog napajanja u bazu i vezivanje za računar</h4>
    <div class="col-md-12 well" style="margin-top: 1rem">
        <form action="{{route('racunari.oprema.napajanja.dodaj.novu', $uredjaj->id)}}" method="POST" data-parsley-validate>
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('napajanje_model_id') ? ' has-error' : '' }}">
                        <label for="napajanje_model_id">Modeli napajanja:</label>
                        <select name="napajanje_model_id" id="napajanje_model_id" class="chosen-select form-control" data-placeholder="model ..."
                            required>
                            <option value=""></option>
                            @foreach($modeli as $m)
                            <option value="{{ $m->id }}" {{ old( 'napajanje_model_id')== $m->id ? ' selected' : '' }}> {{ $m->proizvodjac->naziv }}, {{ $m->naziv }} ({{ $m->snaga }} W)
                            </option>
                            @endforeach
                        </select>
                        @if ($errors->has('napajanje_model_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('napajanje_model_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group{{ $errors->has('serijski_broj') ? ' has-error' : '' }}">
                        <label for="serijski_broj">Serijski broj:</label>
                        <input type="text" name="serijski_broj" id="serijski_broj" class="form-control" value="{{ old('serijski_broj') }}" maxlength="50"
                            required> @if ($errors->has('serijski_broj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('serijski_broj') }}</strong>
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
            <hr style="border-top: 1px solid #18BC9C">

            <div class="row dugmici">
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <div class="col-md-6 col-md-offset-6">
                            <button type="submit" class="btn btn-success btn-block ono">
                                <i class="fa fa-plus-circle"></i>&emsp;&emsp;Dodaj</button>
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
    });

</script>
@endsection
