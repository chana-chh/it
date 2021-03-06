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
                    <span>
                        <img alt="IT oprema" src="{{url('/images/c.png')}}" style="height:32px;  width:32px">
                    </span>&emsp;{{ config('app.name') }}</a>
            </div>

            <div class="collapse navbar-collapse" id="kolaps">
                <ul class="nav navbar-nav navbar-right">
                    @can('korisnik')
                    <li><a href="{{ route('statistika') }}"> <i class="fa fa-bar-chart fa-fw" style="color: #18BC9C"></i> Statistika</a></li>
                    @endcan
                    <li><a href="{{route('imenik')}}"> <i class="fa fa-search fa-fw" style="color: #18BC9C"></i> Imenik</a></li>
                    @can('admin')
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-cog fa-fw" style="color: #18BC9C"></i> Servis <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('servis') }}">Servis</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('staticke.zauzete') }}">Statičke IP adrese <span class="text-danger"><strong>NOVO!</strong></span></a></li>
                        </ul>
                    </li>
                    @endcan
                    @can('korisnik')
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-shopping-cart fa-fw" style="color: #18BC9C"></i> Nabavke <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('nabavke') }}">Nabavke</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('otpremnice') }}">Otpremnice</a></li>
                            <li><a href="{{ route('racuni') }}">Računi</a></li>
                            <li><a href="{{ route('ugovori') }}">Ugovori o održavanju</a></li>
                        </ul>
                    </li>
                    @endcan
                    @can('korisnik')
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-server fa-fw" style="color: #18BC9C"></i> Oprema <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('racunari.oprema')}}">Računari</a></li>
                            <li><a href="{{route('serveri.oprema')}}">Serveri <span class="text-danger"><strong>NOVO!</strong></span></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('osnovne_ploce.oprema')}}">Osnovne ploče</a></li>
                            <li><a href="{{route('procesori.oprema')}}">Procesori</a></li>
                            <li><a href="{{route('memorije.oprema')}}">Memorije</a></li>
                            <li><a href="{{route('hddovi.oprema')}}">Hard diskovi</a></li>
                            <li><a href="{{route('vga.oprema')}}">Grafički adapteri</a></li>
                            <li><a href="{{route('napajanja.oprema')}}">Napajanja</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('monitori.oprema')}}">Monitori</a></li>
                            <li><a href="{{route('stampaci.oprema')}}">Štampači</a></li>
                            <li><a href="{{route('skeneri.oprema')}}">Skeneri</a></li>
                            <li><a href="{{route('upsevi.oprema')}}">UPS-evi</a></li>
                            <li><a href="{{route('projektori.oprema')}}">Projektori</a></li>
                            <li><a href="{{route('mrezni.oprema')}}">Mrežna oprema</a></li>
                        </ul>
                    </li>
                    @endcan
                    @can('admin')
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-server fa-fw" style="color: #18BC9C"></i> Modeli <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('osnovne_ploce.modeli')}}">Osnovne ploče</a></li>
                            <li><a href="{{route('procesori.modeli')}}">Procesori</a></li>
                            <li><a href="{{route('memorije.modeli')}}">Memorije</a></li>
                            <li><a href="{{route('hddovi.modeli')}}">Hard diskovi</a></li>
                            <li><a href="{{route('vga.modeli')}}">Grafički adapteri</a></li>
                            <li><a href="{{route('napajanja.modeli')}}">Napajanja</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('monitori.modeli')}}">Monitori</a></li>
                            <li><a href="{{route('stampaci.modeli')}}">Štampači</a></li>
                            <li><a href="{{route('skeneri.modeli')}}">Skeneri</a></li>
                            <li><a href="{{route('upsevi.modeli')}}">UPS-evi</a></li>
                        </ul>
                    </li>
                    @endcan
                    @can('korisnik')
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-wrench fa-fw" style="color: #18BC9C"></i> Šifarnici <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @can('admin')
                            <li><a href="{{ route('proizvodjaci') }}">Proizvođači</a></li>
                            @endcan
                            <li><a href="{{ route('dobavljaci') }}">Dobavljači</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('lokacije') }}">Lokacije</a></li>
                            <li><a href="{{ route('povezivanje') }}">Povezivanje</a></li>
                            <li><a href="{{ route('spratovi') }}">Spratovi</a></li>
                            <li><a href="{{ route('kancelarije') }}">Kancelarije</a></li>
                            <li><a href="{{ route('uprave') }}">Uprave</a></li>
                            <li><a href="{{ route('zaposleni') }}">Zaposleni</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('telefoni') }}">Telefoni</a></li>
                            <li><a href="{{route('mobilni')}}">Mobilni</a></li>
                            <li><a href="{{route('email')}}">Email-ovi</a></li>
                            @can('admin')
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('dijagonale') }}">Dijagonale (mon)</a></li>
                            <li><a href="{{ route('povezivanje_vga') }}">Povezivanje (video)</a></li>
                            <li><a href="{{ route('povezivanje_hdd') }}">Povezivanje (hdd)</a></li>
                            <li><a href="{{ route('soketi') }}">Soketi (cpu, mbd)</a></li>
                            <li><a href="{{ route('tipovi_memorije') }}">Tipovi memorije (ram, mbd, vga)</a></li>
                            <li><a href="{{ route('vga_slotovi') }}">VGA slotovi (mbd, vga)</a></li>
                            <li><a href="{{ route('tipovi_stampaca') }}">Tipovi štampača</a></li>
                            @endcan
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('toneri') }}">Toneri</a></li>
                            <li><a href="{{ route('baterije') }}">Baterije</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('operativni_sistemi') }}">Operativni sistemi</a></li>
                            <li><a href="{{route('aplikacije')}}">Aplikacije</a></li>
                            <li><a href="{{route('reciklaze')}}">Reciklaže</a></li>
                            @can('admin')
                            <li><a href="{{route('licence')}}">Licence</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('korisnici')}}">Korisnici</a></li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    @if(Auth::user()->imaUlogu('centrala'))
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-phone fa-fw" style="color: #18BC9C"></i> Telefonska centrala <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('lokacije') }}">Lokacije</a></li>
                            <li><a href="{{ route('spratovi') }}">Spratovi</a></li>
                            <li><a href="{{ route('kancelarije') }}">Kancelarije</a></li>
                            <li><a href="{{ route('uprave') }}">Uprave</a></li>
                            <li><a href="{{ route('zaposleni') }}">Zaposleni</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('telefoni') }}">Telefoni</a></li>
                        </ul>
                    </li>
                    @endif
                    @if(Auth::user()->imaUlogu('kadrovi'))
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="fa fa-users fa-fw" style="color: #18BC9C"></i> Ljudski resursi <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('lokacije') }}">Lokacije</a></li>
                            <li><a href="{{ route('spratovi') }}">Spratovi</a></li>
                            <li><a href="{{ route('kancelarije') }}">Kancelarije</a></li>
                            <li><a href="{{ route('uprave') }}">Uprave</a></li>
                            <li><a href="{{ route('zaposleni') }}">Zaposleni</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('telefoni') }}">Telefoni</a></li>
                        </ul>
                    </li>
                    @endif
                    <li style="margin-left: 40px; opacity: 0.7;">
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
