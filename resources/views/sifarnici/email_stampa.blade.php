@extends('sabloni.app')

@section('naziv', 'Šifarnici | Štampanje podešavanja za mail klijente i webmail')

@section('meni')
    @include('sabloni.inc.meni')
@endsection

@section('naslov')
    <h1 class="page-header">
        Podešavanja mail naloga za KG.ORG.RS za korisnika <strong>{{ $mail->zaposleni->imePrezime() }}</strong>
    </h1>
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
    <h3>Lokalni mail klijent POP3 podesavanje:</h3>
    <p>POP3: mail.kg.org.rs, SSL/TLS Normal Password, port: <strong>995</strong></p> 
    <p>SMTP: mail.kg.org.rs, SSL/TLS, Normal Password, port: <strong>465</strong></p>
    <br>
    <p>username: {{ $mail->adresa }}</p>
    <p>password: {{ $mail->lozinka }}</p>
    <hr>
    <h3>Lokalni mail klijent IMAP podesavanje:</h3> 
    <p>IMAP: mail.kg.org.rs, SSL/TLS, Normal Password, port: <strong>993</strong></p> 
    <p>SMTP: mail.kg.org.rs, SSL/TLS, Normal Password, port: <strong>465</strong></p>
    <br>
    <p>username: {{ $mail->adresa }}</p>
    <p>password: {{ $mail->lozinka }}</p> 
    <hr>
    <h3>WebMail (pristup email-u preko internet pretrazivača) adresa:</h3>
    <h4>
    <a href="https://mail.kg.org.rs/webmail/">
        <strong class="text-info">
            https://mail.kg.org.rs/webmail/
        </strong>
    </a>
    </h4>
    <br>
    <p>username: {{ $mail->adresa }}</p>
    <p>password: {{ $mail->lozinka }}</p> 

    </div>
</div>
<div class="row">
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