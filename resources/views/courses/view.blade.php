@extends('layouts.appLayout')

@section('head')
    <title> Estudioso | Agregar Curso </title>
@endsection

@section('nav')
    <li class="mx-2 nav-item">
        <a href="{{ route('home') }}" class="navbarItem"> Menú Principal </a>
    </li>
    <span class="navbarItem d-none d-xl-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="{{ route('viewCourses') }}" class="navbarItemActive"> Ver Cursos </a>
    </li>
    <span class="navbarItem d-none d-xl-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="{{ route('addCourse') }}" class="navbarItem"> Agregar Curso </a>
    </li>
    <span class="navbarItem d-none d-xl-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="#" class="navbarItem"> Calendario </a>
    </li>
    <span class="navbarItem d-none d-xl-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="#" class="navbarItem"> Horario </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-light text-center h4">
                        Mis Cursos
                    </div>
                    <div class="card-body" style="background-color: whitesmoke">
                        <hr style="background-color: #999999">
                        @foreach ($courses as $course)
                            <div class="row d-flex justify-content-between align-items-baseline">
                                <div class="col">
                                    <span class="h5"> <b> {{$course->name }} </b> <br> </span>
                                    @if($course->profesor) <span class="h6"><b> Profesor: </b> {{$course->teacher }}</span> @endif
                                </div>
                                <div class="col text-right">
                                    <a href="" class="btn btn-primary btn-lg mx-1"> Ver Evaluaciones </a>
                                    <button class="btn btn-danger btn-lg mx-1"> Borrar </button>
                                </div>
                            </div>
                            <hr style="background-color: #999999">
                        @endforeach
                    </div>
                    <div class="card-footer bg-dark text-right"> 
                        <a href="" class="btn btn-secondary"> Agregar Curso </a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection

@section('mobileFooter')
    <div class="row d-flex justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-secondary"> Regresar al Menú Principal</a>
    </div>
    <div class="row d-flex justify-content-center mt-4">
        ESTUDIOSO
    </div>
@endsection

@section('desktopFooter')
    <div class="d-flex flex-row-reverse fixed-bottom mb-4 mr-4">
        <div class="flex-row"> <a href="{{ route('login') }}" class="btn btn-secondary"> Regresar al Menú Principal </a></div>
    </div>
@endsection
