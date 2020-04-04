@extends('layouts.accessLayout')

@section('head')
    <title> Estudioso | Olvidar Contraseña </title>
    <link rel="stylesheet" href="{{ asset('css/access/login.css') }}">
@endsection

@section('content')
<nav class="navbar navbar-light">
    <a href="{{ url('/') }}" class="navbar-brand d-none d-sm-block"> 
        <img src="{{ asset('img/iconWithText.png') }}" alt="icono" style="width: 20rem; height: 5rem;">
    </a>     
    <a href="{{ url('/') }}" class="navbar-brand d-sm-none d-block"> 
        <img src="{{ asset('img/iconWithText.png') }}" alt="icono" style="width: 11.5rem; height: 3rem;">
    </a>
    <div>
        <ul class="navbar-nav ml-auto d-none d-sm-block">
                <li class="nav-item ml-auto"> 
                    <span class="registrarseText"> ¿No tienes cuenta? </span>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg mx-2"> Registrarse </a>
                </li>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto d-sm-none d-block">
            <li class="nav-item ml-auto text-center"> 
                <span class="registrarseTextSmall"> ¿No tienes cuenta? </span>
                <a href="{{ route('register') }}" class="btn btn-primary mx-2"> Registrarse </a>
            </li>
        </ul>
    </div>          
</nav>
<div class="row d-flex justify-content-center my-4 py-4">
    <div class="col-lg-4 col-md-6 col-sm-10 col-12">
        <div class="card shadow-lg">
            <div class="card-body loginForm bg-light cardBodyImg">
                <div class="card-title text-center" style="font-size: 28px; font-weight: bold"> Olvidar Contraseña </div>
                <form method="GET" action="{{ route('resetPassword') }}">
                    @csrf
                    <h5 class="text-center"> <b> Por favor introduzca su correo electrónico. <br> Le enviaremos un correo con una contraseña nueva. </b> </h5>
                    <div class="form-group row mx-2">
                        <label for="email" class="col-form-label text-md-right" style="font-size: 14px; font-weight: bold">{{ __('Correo Electrónico') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg"> Enviar Correo </button>
                    </div>
                    <div class="form-group row d-flex justify-content-center">
                        @error('send')
                        <span class="text-success h5 text-center"> 
                            <strong> {{ $message }} <a class="btn btn-success" href="{{ route('login') }}"> Ir a Login </a> </strong>
                        </span>
                        @enderror
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
