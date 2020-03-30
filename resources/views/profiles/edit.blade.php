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
        <a href="#" class="navbarItem"> Calendario </a>
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
                        Mi Perfil
                    </div>
                    <div class="card-body shadow-lg" style="background-color: whitesmoke">
                    </div>
                    <div class="card-footer bg-dark d-flex justify-content-center">
                    </div>
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