<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rp Point') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/advertisements.js') }}"></script>
    <script type="application/javascript" src="https://a.exdynsrv.com/popunder1000.js"></script>

    <script src="{{ asset('js/detect-adblock.js') }}"></script>
    <script src="{{ asset('js/pdAb.min.js') }}"></script>
    <script>
        document.addEventListener("detectAdblock", function(event) {
            if (event.detail.status === true) {
                console.log("AdBlocker detected");

                document.getElementById("app").style.display = "none";
                document.getElementById("block2").style.display = "none";

                pdab(
                    true,
                    '#212121',
                    '#ffffff',
                    '#d96064',
                    '#96e272',
                    '#404040',
                    '33px',
                    '23px',
                    'Adblock Detectado',
                    'Solo podrá permanecer en línea si nos incluye en la lista blanca',
                    'Puedes hacerlo aquí en alguna parte',
                    '#ee9295',
                    '#d96065',
                    0.95,
                    true,
                    '#overlays',
                );
            } else
                console.log("AdBlocker not detected");
        });
    </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-118150984-8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-118150984-8');
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('server.request') }}">Request
                                </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            @if (Auth::user()->permissions == "administrator" || \Auth::user()->permissions == "editor")
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('server.create') }}">New
                                        Server</a>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('dashboard.data') }}">
                                        Dashboard
                                    </a>
                                    <a class="dropdown-item" href="{{ route('config') }}">
                                        Configuration
                                    </a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item">
                                <form action="search" method="post" class="form-inline ml-2 my-2 my-xl-0">
                                    <input class="form-control mr-sm-2" type="text" placeholder="Search"
                                        aria-label="Search" name="keyword">
                                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
