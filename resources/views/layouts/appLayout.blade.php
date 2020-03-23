<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/appLayout.css') }}">
    <link rel="icon" href=" {{ asset('img/favicon.png') }}">
    @yield('head')
</head>
<body>
    <div id="app">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <nav class="navbar navbar-expand-lg navbar-light shadow navbarBack">
            <a href="{{ url('/') }}" class="navbar-brand mx-4 pr-4 d-none d-md-block">
                <img src="{{ asset('img/iconWithText.png') }}" alt="icono" style="width: 13rem; height: 3.25rem;">
            </a>
            <a href="{{ url('/') }}" class="navbar-brand d-block d-md-none">
                <img src="{{ asset('img/iconWithText.png') }}" alt="icono" style="width: 9rem; height: 2.25rem;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID" aria-controls="navbarID" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <ul class="navbar-nav ml-auto mr-auto pl-4"> 
                    @yield('nav')
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown mr-4 pl-4 ml-1">
                        <a id="navbarList" class="dropdown-toggle dropdownTitle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ auth()->user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarList">
                            <a href="#" class="dropdown-item listItem"> Editar Perfil </a>
                            <a class="dropdown-item listItem" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <footer>
            <div class="d-block d-md-none mt-4">
                @yield('mobileFooter')
            </div>
            <div class="d-none d-md-block mt-4">
                @yield('desktopFooter')
            </div>     
        </footer>
    </div>
</body>
</html>
