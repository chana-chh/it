<!DOCTYPE html>
<html lang="sr">
<head>
    @include('sabloni.inc.headmin')
</head>
<body>
    <header>
        @yield('meni')
    </header>
    <main class="container-fluid">
        <div class="col-md-10 col-md-offset-1">
            @include('sabloni.inc.flash')
            <div class="row" >
                <div class="col-md-12">
                @yield('naslov')
                    <div class="col-md-8">
                        @yield('sadrzaj')
                    </div>
                    <div class="col-md-4">
                        @yield('traka')
                    </div>
                </div>
        </div>
    </div>
    </main>
    <footer>
        @include('sabloni.inc.footer')
    </footer>
    @include('sabloni.inc.scriptsmin')
    @yield('skripte')
</body>
</html>
