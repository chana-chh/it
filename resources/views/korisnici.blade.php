@extends('sabloni.app')

@section('naziv', 'Korisnicii')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
<h1 class="page-header">
    <img class="slicica_animirana" alt="Korisnici"
         src="{{ url('/images/korisnik.png') }}" style="height:64px;">
    &emsp;Korisnici
</h1>
@endsection

@section('sadrzaj')
<h2 >Lista aktivnih korisnika</h2>
<hr>
  @if($korisnici->isEmpty())
            <h3 class="text-danger">Trenutno nema korisnika u bazi</h3>
        @else
            <table class="table table-striped tabelaKorisnici" name="tabelaKorisnici" id="tabelaKorisnici">
                <thead>
                      <th style="width: 10%">#</th>
                      <th style="width: 35%">Ime i prezime</th>
                      <th style="width: 30%">Korisničko ime</th>
                      <th style="width: 15%">Administrator</th>
                      <th style="text-align:centerč width: 10%"><i class="fa fa-cogs"></i></th>
                </thead>
                <tbody id="korisnici_lista" name="korisnici_lista">
                @foreach ($korisnici as $korisnik)
                        <tr>
                                <td>{{$korisnik->id}}</td>
                                <td><strong>{{$korisnik->name}}</strong></td>
                                <td>{{$korisnik->username}}</td>
                                <td style="text-align:center">{!! $korisnik->level == 0 ? '<i class="fa fa-check text-success">' : '' !!}</td>
                                 <td style="text-align:center">
                                 <a class="btn btn-success btn-sm otvori_izmenu" id="dugmeIzmena"  href="{{ route('korisnici.pregled', $korisnik->id) }}"><i class="fa fa-pencil"></i></a>
                    <button id="dugmeBrisanje" class="btn btn-danger btn-sm otvori_modal"  value="{{$korisnik->id}}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        @endif

 <!--  POCETAK brisanjeModal  -->
@include('sifarnici.inc.modal_brisanje')
<!--  KRAJ brisanjeModal  -->
@endsection

@section('traka')
<h3>Dodavanje korisnika</h3>
<hr>
<div class="well">
    <form action="{{ route('korisnici.dodavanje') }}" method="POST" data-parsley-validate>
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Ime i prezime: </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" maxlength="255" required>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <label for="username">Korisničko ime: </label>
            <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}" maxlength="190 " required>
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
        </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password">Lozinka:</label>
        <input type="password" name="password" id="password" class="form-control" minlength="4" required>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
        <label for="password-confirm">Potvrda lozinke:</label>
        <input type="password" name="password_confirmation" id="password-confirm" class="form-control" minlength="4" required>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group checkboxoviforme">
                <label><input type="checkbox" name="admin" id="admin"> &emsp;Da li je korisnik administrator?</label>
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
                        <a class="btn btn-danger btn-block ono" href="{{route('korisnici')}}">
                            <i class="fa fa-ban"></i> Otkaži
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('skripte')
<script>
$( document ).ready(function() {

        $('#tabelaKorisnici').DataTable({
        columnDefs: [{ orderable: false, searchable: false, "targets": -1 }],
        language: {
        search: "Пронађи у таблеи",
            paginate: {
            first:      "Прва",
            previous:   "Претходна",
            next:       "Следећа",
            last:       "Последња"
        },
        processing:   "Процесирање у току ...",
        lengthMenu:   "Прикажи _MENU_ елемената",
        zeroRecords:  "Није пронађен ниједан запис за задати критеријум",
        info:         "Приказ _START_ до _END_ од укупно _TOTAL_ елемената",
        infoFiltered: "(филтрирано од _MAX_ елемената)",
    },
    });

 $(document).on('click', '.otvori-brisanje', function () {
            var id = $(this).val();
            $('#idBrisanje').val(id);
            var ruta = "{{ route('korisnici.brisanje') }}";
            $('#brisanje-forma').attr('action', ruta);
        });
});
</script>
@endsection