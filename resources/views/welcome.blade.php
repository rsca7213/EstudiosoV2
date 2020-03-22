<!DOCTYPE html>
<html lang="en">
    <head>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title> Estudioso | Página de Inicio </title>
            <script src="{{ asset('js/app.js') }}" defer></script>
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="{{ asset('css/welcome/welcome.css') }}">
            <link rel="icon" href=" {{ asset('img/favicon.png') }}">
        </head>
    </head>
    <body>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div class="container-fluid" id="app">
            <nav class="navbar navbar-expand-md navbar-light">
                <a href="{{ url('/') }}" class="navbar-brand d-none d-sm-block"> 
                    <img src="{{ asset('img/iconWithText.png') }}" alt="icono" style="width: 20rem; height: 5rem;">
                </a>     
                <a href="{{ url('/') }}" class="navbar-brand d-sm-none d-block"> 
                    <img src="{{ asset('img/iconWithText.png') }}" alt="icono" style="width: 11.5rem; height: 3rem;">
                </a>     
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarDropdown" aria-controls="navbarDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button> 
                <div class="collapse navbar-collapse" id="navbarDropdown">
                    <ul class="navbar-nav ml-auto d-none d-sm-block">
                        @auth
                            <li class="nav-item ml-auto">
                                <a class="btn btn-link text-primary" style="font-size: 16px; font-weight: bold" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"> {{ auth()->user()->name }}, Cerrar Sesión  </a>
                                <a href="{{ route('home') }}" class="btn btn-primary btn-lg" type="button"> Ir al Menú Principal </a>
                            </li>
                        @else
                            <li class="nav-item ml-auto"> 
                                <a href="{{ route('login') }}" class="btn btn-secondary btn-lg mx-2"> Iniciar Sesión </a>
                                <a href="{{ route('register') }}" class="btn btn-primary btn-lg mx-2"> Registrarse </a>
                            </li>
                        @endauth
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto d-sm-none d-block">
                        @auth
                            <li class="nav-item ml-auto">
                                <a class="btn btn-link text-primary" style="font-size: 14px; font-weight: bold" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"> {{ auth()->user()->name }}, Cerrar Sesión  </a>
                                <a href="{{ route('home') }}" class="btn btn-primary btn-lg"> Ir al Menú Principal </a>
                            </li>
                        @else
                            <li class="nav-item ml-auto text-center"> 
                                <a href="{{ route('login') }}" class="btn btn-secondary mx-2"> Iniciar Sesión </a>
                                <a href="{{ route('register') }}" class="btn btn-primary mx-2"> Registrarse </a>
                            </li>
                        @endauth
                        </li>
                    </ul>
                </div>          
            </nav>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 col-md-10 col-11 text-center title my-3"> ¡Estudioso es una aplicación web en la que podrás gestionar tus planes de evaluación adadémicos de una manera rápida y sencilla! </div>
            </div>
            <div class="row d-flex justify-content-center my-4">
                <img src="{{ asset('img/welcome/image1.svg') }}" alt="imagen 1" class="col-lg-3 col-md-3 col-xs-9 my-3" style="width: 17em; height: 17em; opacity: 0.95">
                <img src="{{ asset('img/welcome/image2.svg') }}" alt="imagen 2" class="col-lg-3 col-md-3 col-xs-9 my-3" style="width: 17em; height: 17em; opacity: 0.95">
                <img src="{{ asset('img/welcome/image3.svg') }}" alt="imagen 3" class="col-lg-3 col-md-3 col-xs-9 my-3" style="width: 17em; height: 17em; opacity: 0.95">
            </div>
            <div class="row d-flex justify-content-center my-4">
                @auth
                    <a class="btn btn-success btn-lg my-4" href="{{ route('home') }}"> Ir al Menú Principal </a>
                @else
                    <a class="btn btn-success btn-lg my-4" href="{{ route('register') }}"> ¡Registrarse Ahora! </a>
                @endauth
            </div>
            <div class="row d-flex mt-4">
                <div class="col">
                    <div class="text-center text-dark" style="font-weight: 300; font-size: 24px;"> ESTUDIOSO </span> 
                </div>
            </div>
        </div>
    </body>
</html>
