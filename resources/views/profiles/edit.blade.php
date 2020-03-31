@extends('layouts.appLayout')

@section('head')
    <title> Estudioso | Editar Perfil </title>
@endsection

@section('nav')
    <li class="mx-2 nav-item">
        <a href="{{ route('home') }}" class="navbarItem"> Menú Principal </a>
    </li>
    <span class="navbarItem d-none d-lg-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="{{ route('viewCourses') }}" class="navbarItem"> Ver Cursos </a>
    </li>
    <span class="navbarItem d-none d-lg-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="{{ route('addCourse') }}" class="navbarItem"> Agregar Curso </a>
    </li>
    <span class="navbarItem d-none d-lg-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="{{ route('viewCalendar', ['page' => 0]) }}" class="navbarItem"> Calendario </a>
    </li>
    <span class="navbarItem d-none d-lg-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="#" class="navbarItem"> Horario </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
         <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                <div class="card">
                    <div class="card-header bg-dark text-light text-center h4">
                        Editar Perfil
                    </div>
                    <form action="/profile/update" method="POST">
                    @method('PATCH')    
                    @csrf 
                    <div class="card-body shadow-lg" style="background-color: whitesmoke">
                        <div class="form-group row mx-2">
                            <label for="name" class="col-form-label text-md-right" style="font-size: 14px; font-weight: bold"> Nombre y Apellido </label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mx-2">
                            <label for="email" class="col-form-label text-md-right" style="font-size: 14px; font-weight: bold"> Correo Electrónico </label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mx-2">
                            <label for="password" class="col-form-label text-md-right" style="font-size: 14px; font-weight: bold"> Contraseña Actual </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row mx-2">
                            <label for="new-password" class="col-form-label text-md-right" style="font-size: 14px; font-weight: bold"> Contraseña Nueva </label>
                            <input id="new-password" type="password" class="form-control @error('new-password') is-invalid @enderror" name="new-password" autocomplete="current-new-password">
                            <small class="form-text text-secondary"> <b> Si no desea actualizar la contraseña puede dejar este campo vacio. </b> </small>
                            @error('new-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer bg-dark d-flex justify-content-between">
                        <div class="col text-center d-none d-lg-block"> 
                            <delete-profile type="lg" pr=""> </delete-profile>
                            <input type="submit" value="Editar Perfil" class="btn btn-primary btn-lg ml-4"> 
                        </div>
                        <div class="col text-center d-block d-lg-none">
                            <delete-profile type="sm" pr="pr-3"> </delete-profile>
                            <input type="submit" value="Editar Perfil" class="btn btn-primary ml-1"> 
                        </div>
                    </div>
                    </form>
                </div>
            </div>
         </div>
    </div>
@endsection

@section('mobileFooter')
    <div class="row d-flex justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-secondary"> Regresar Al Menú Principal </a>
    </div>
    <div class="row d-flex justify-content-center mt-4">
        ESTUDIOSO
    </div>
@endsection