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
            <div class="col-12 col-sm-11 col-md-10 col-lg-9 col-xl-7">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-light text-center h4">
                        Mis Cursos
                    </div>
                    <div class="card-body" style="background-color: whitesmoke">
                        <hr class="bg-light">
                        @foreach ($courses as $course)
                            <div class="row d-flex justify-content-between">
                                <div class="col-12 col-lg-6">
                                    <span class="h5" style="color: {{$course->color}}"> &#10687; </span>
                                    <span class="h5"> <b> {{$course->name }} </b> <br> </span>
                                    <span> <b> Profesor: </b> {{$course->teacher }}</span>
                                </div>
                                <div class="col-12 col-lg-6 text-right">
                                    <div class="d-none d-md-block">
                                        <a href="#" class="btn btn-primary btn-lg mx-1"> Ver Evaluaciones </a>
                                        <delete-course-lg c_id="{{ $course->id }}" c_n="{{ $course->name }}" csrf="{{ csrf_token() }}"> </delete-course-lg>
                                    </div>
                                    <div class="d-block d-md-none text-left mt-1">
                                        <a href="#" class="btn btn-primary mx-1"> Ver Evaluaciones </a>
                                        <delete-course  c_id="{{ $course->id }}" c_n="{{ $course->name }}" csrf="{{ csrf_token() }}"> </delete-course>
                                    </div>
                                </div>
                            </div>
                            <hr class="bg-light">
                        @endforeach
                    </div>
                    <div class="card-footer bg-dark d-flex text-center"> 
                        <div class="col d-none d-lg-block"> <a href="{{ route('addCourse') }}" class="btn btn-secondary float-right"> Agregar Curso </a> </div>
                        <div class="col d-block d-lg-none"> <a href="{{ route('addCourse') }}" class="btn btn-secondary"> Agregar Curso </a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection

@section('mobileFooter')
    <div class="row d-flex justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-secondary"> Regresar al Menú Principal </a>
    </div>
    <div class="row d-flex justify-content-center mt-4">
        ESTUDIOSO
    </div>
@endsection

