@extends('sabloni.app')

@section('naziv', 'Oprema | Dodavanje osnovne ploče u računar')

@section('meni')
@include('sabloni.inc.meni')
@endsection

@section('naslov')
<div class="row">
    <div class="col-md-12">
        <h1>
            <img class="slicica_animirana" alt="Dodavanje osnovne ploče u računar"
                 src="{{url('/images/mbd.png')}}" style="height:64px;">
            &emsp;Dodavanje osnovne ploče u računar
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
            <a class="btn btn-primary" href="{{ route('racunari.oprema') }}"
               title="Povratak na listu računara">
                <i class="fa fa-list"></i>
            </a>
        </div>
    </div>
</div>
@endsection

@section('sadrzaj')
<h4>Podaci o već ugrađenoj komponenti:</h4>
<div class="row">
<div class="col-md-12">
@if ($uredjaj->osnovnaPloca)
 <table class="table table-striped" style="table-layout: fixed;">
        <tbody>
<tr>
    <th style="width: 40%;">  
                            
        Serijski broj:         
    </th>
    <td style="width: 60%;">
        {{$uredjaj->osnovnaPloca->serijski_broj}}
    </td>
</tr>
<tr>
    <th style="width: 40%;">  
                            
        Model:         
    </th>
    <td style="width: 60%;">
        {{$uredjaj->osnovnaPloca->osnovnaPlocaModel->naziv}}
    </td>
</tr>

<tr>
    <th style="width: 40%;">  
                            
        Čipset:         
    </th>
    <td style="width: 60%;">
        {{$uredjaj->osnovnaPloca->osnovnaPlocaModel->cipset}}
    </td>
</tr>
<tr>
    <th style="width: 40%;">  
                            
        Slot/Socket:         
    </th>
    <td style="width: 60%;">
        {{$uredjaj->osnovnaPloca->osnovnaPlocaModel->soket->naziv}}
    </td>
</tr>

</tbody>
</table>
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
 <form action="#" method="POST" data-parsley-validate>
                    {{ csrf_field() }}
     <div class="row">

                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('ploca_id') ? ' has-error' : '' }}">
                                <label for="ploca_id">Osnovne ploče:</label>
                                <select name="ploca_id" id="ploca_id" class="chosen-select form-control" data-placeholder="mbd ..."
                                    required>
                                    <option value=""></option>
                                    @foreach($ploce as $p)
                                    <option value="{{ $p->id }}" {{ old( 'ploca_id')==$p->id ? ' selected' : '' }}> sn: {{ $p->serijski_broj }}, {{ $p->osnovnaPlocaModel->proizvodjac->naziv }}, {{ $p->osnovnaPlocaModel->naziv }}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('ploca_id'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ploca_id') }}</strong>
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
<h4> Dodavanje novog urđaja i instaliranje u računar</h4>
<div class="row">

                        <div class="col-md-12 well">
                            <form action="#" method="POST" data-parsley-validate>
                    {{ csrf_field() }}
     <div class="row">

                        <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('naziv') ? ' has-error' : '' }}">
                    <label for="naziv">Naziv:</label>
                    <input type="text" name="naziv" id="naziv" class="form-control" value="{{ old('naziv') }}" maxlength="50" required>
                    @if ($errors->has('naziv'))
                        <span class="help-block">
                            <strong>{{ $errors->first('naziv') }}</strong>
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
            allow_single_deselect: true
        });

        chsn.on('change', function (evt, params) {
            if (params == undefined && evt.currentTarget.id == 'racunar_id') {
                $('#obavestenje').hide();
            } else {
                $('#obavestenje').show();
            }
        });

        function resizeChosen() {
            $(".chosen-container").each(function () {
                $(this).attr('style', 'width: 100%');
            });
        }

        $("#racunar_id").on('change', function () {
            var ima_nema = $(this).find(":selected").data("procesor");
            $("#obavestenje").html(ima_nema);
        });
    });

</script>
@endsection
