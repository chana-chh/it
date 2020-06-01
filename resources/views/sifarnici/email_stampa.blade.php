@extends('sabloni.app')

@section('naziv', 'Šifarnici | Štampanje podešavanja za mail klijente i webmail')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h2>
        Podešavanja mail naloga za KG.ORG.RS za korisnika <strong>{{ $mail->zaposleni->imePrezime() }}</strong>
    </h2>
@endsection

@section('sadrzaj')
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
            <a class="btn btn-primary" href="{{route('email')}}"
               title="Povratak na listu elektronskih adresa">
                <i class="fa fa-envelope-open"></i>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3>Korisničko ime (username, account):</h3>
            <h4>{{ $mail->adresa }} <small class="text-danger">(dakle, cela e-mail adresa korisnika)</small></h4>
            <h3>Lozinka (password):</h3>
            <h4>{{ $mail->lozinka }} <small class="text-danger">(molimo vas da je nikome ne saopštavate niti pokazujete)</small></h4>
        </div>
    </div>
    <br>
    <br>
    <h2>Parametri:</h2>
    <h3>Lokalni mail klijent POP3 podesavanje:</h3>
    <h4>POP3: mail.kg.org.rs, SSL/TLS Normal Password, port: <strong>995</strong></h4> 
    <h4>SMTP: mail.kg.org.rs, SSL/TLS, Normal Password, port: <strong>465</strong></h4>
    <br>
    <hr>
    <h3>Lokalni mail klijent IMAP podesavanje:</h3> 
    <h4>IMAP: mail.kg.org.rs, SSL/TLS, Normal Password, port: <strong>993</strong></h4> 
    <h4>SMTP: mail.kg.org.rs, SSL/TLS, Normal Password, port: <strong>465</strong></h4>
    <br>
    <hr>
    <h3>WebMail (pristup email-u preko internet pretrazivača) adresa:</h3>
    <h2>
    <a href="https://mail.kg.org.rs/webmail/">
        <strong class="text-info">
            https://mail.kg.org.rs/webmail/
        </strong>
    </a>
    </h2>
    </div>
</div>
<div class="row" style="margin-bottom: 16px;">
    <div class="col-md-6 col-md-offset-6 text-right">
        <button id="stampaj" class="btn btn-default" value="{{$mail->id}}">
            <i class="fa fa-print fa-fw"></i> Štampaj
        </button>
        </div>
    </div>

@endsection


@section('skripte')
<script>
    $(document).ready(function () {

        $('#stampaj').click(function() {
            window.print();
        });

    });
</script>
@endsection