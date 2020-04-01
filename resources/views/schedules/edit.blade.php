@extends('layouts.appLayout')

@section('head')
    <title> Estudioso | Editar Horario </title>
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
        <a href="{{ route('viewSchedule') }}" class="navbarItemActive"> Horario </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-11 col-md-10 col-lg-9 col-xl-7">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-light text-center h4 d-none d-lg-block">
                        Editar Horario
                    </div>
                    <div class="card-header bg-dark text-light text-center h5 d-block d-lg-none">
                        Editar Horario
                    </div>
                    <div class="card-body text-center" style="background-color: whitesmoke">
                        <edit-schedule editimg="{{ asset('/img/icons/edit.svg') }}" deleteimg="{{ asset('/img/icons/trash.svg') }}"> </edit-schedule>
                    </div>
                    <div class="card-footer bg-dark" style="color: #555555"> 
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