<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#kolaps">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('pocetna') }}">
                    <span><img alt="IT oprema" src="{{url('/images/c.png')}}" style="height:32px;  width:32px"></span> {{ config('app.name') }}</a>
            </div>

            <div class="collapse navbar-collapse" id="kolaps">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href=""> <i class="fa fa-bar-chart fa-fw" style="color: #18BC9C"></i> Statistika</a></li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="fa fa-cog fa-spin fa-fw" style="color: #18BC9C"></i>  Servis<span class="caret">
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="">Servis</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="">Ugovori o održavanju</a></li>
                            <li><a href="">Otpremnice</a></li>
                            <li><a href="">Računi</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="fa fa-server fa-fw" style="color: #18BC9C"></i>  Oprema<span class="caret">
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="">Računari</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="">Procesori</a></li>
                            <li><a href="">Memorije</a></li>
                            <li><a href="">Matične ploče</a></li>
                            <li><a href="">Hard diskovi</a></li>
                            <li><a href="">Grafički adapteri</a></li>
                            <li><a href="">Napajanja</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="">Monitori</a></li>
                            <li><a href="">Štampači</a></li>
                            <li><a href="">Skeneri</a></li>
                            <li><a href="">UPS-evi</a></li>
                            <li><a href="">Projektori</a></li>
                            <li><a href="">Mrežna oprema</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="fa fa-server fa-fw" style="color: #18BC9C"></i>  Modeli<span class="caret">
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('procesori.modeli')}}">Procesori</a></li>
                            <li><a href="">Memorije</a></li>
                            <li><a href="">Matične ploče</a></li>
                            <li><a href="">Hard diskovi</a></li>
                            <li><a href="">Grafički adapteri</a></li>
                            <li><a href="">Napajanja</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="">Monitori</a></li>
                            <li><a href="">Štampači</a></li>
                            <li><a href="">Skeneri</a></li>
                            <li><a href="">UPS-evi</a></li>
                            <li><a href="">Projektori</a></li>
                            <li><a href="">Mrežna oprema</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="fa fa-wrench fa-fw" style="color: #18BC9C"></i>
                            Šifarnici <span class="caret">
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('proizvodjaci') }}">Proizvođači</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('lokacije') }}">Lokacije</a></li>
                            <li><a href="{{ route('spratovi') }}">Spratovi</a></li>
                            <li><a href="{{ route('kancelarije') }}">Kancelarije</a></li>
                            <li><a href="{{ route('uprave') }}">Uprave</a></li>
                            <li><a href="{{ route('zaposleni') }}">Zaposleni</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('telefoni') }}">Telefoni</a></li>
                            <li><a href="{{route('mobilni')}}">Mobilni</a></li>
                            <li><a href="{{route('email')}}">Email-ovi</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('dijagonale') }}">Dijagonale (mon)</a></li>
                            <li><a href="{{ route('povezivanje_vga') }}">Povezivanje (video)</a></li>
                            <li><a href="{{ route('povezivanje_hdd') }}">Povezivanje (hdd)</a></li>
                            <li><a href="{{ route('soketi') }}">Soketi (cpu, mbd)</a></li>
                            <li><a href="">Tipovi memorije (ram, mbd, vga)</a></li>
                            <li><a href="">VGA slotovi (mbd, vga)</a></li>
                            <li><a href="">Tipovi štampača</a></li>
                            <li><a href="">Toneri</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="">Operativni sistemi</a></li>
                            <li><a href="">Aplikacije</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw" style="color: #18BC9C"></i> Odjava
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>











