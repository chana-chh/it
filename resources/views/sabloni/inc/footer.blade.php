<div class="chh-footer">
    <div class="container-fluid">
        <p class="pull-left">Copyright &copy; OfingerTim {{ date('Y', time()) }}</p>
        <p class="pull-right text-info">Korisnik: <strong>{{ Auth::user() ? Auth::user()->name : 'Gost' }}</strong></p>
    </div>
</div>
