<div class="chh-footer canvas">
    <div class="container-fluid">
        <p class="pull-left">Copyright &copy; OfingerTim {{ date('Y', time()) }}</p>
        <p class="pull-right text-info"><a class="btn btn-primary prijava" href="{{ route('forma') }}"
        data-content="Prijava nepotpunih ili neispravnih podataka">
        <i class="fa fa-envelope-o"></i>
    	</a> &emsp; Korisnik: <strong>{{ Auth::user() ? Auth::user()->name : 'Gost' }}</strong></p>
    </div>
</div>
