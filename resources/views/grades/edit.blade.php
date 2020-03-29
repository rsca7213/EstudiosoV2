@extends('layouts.appLayout')

@section('head')
    <title> Estudioso | Ver Evaluaciones </title>
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
        <!-- Desktop View -->
        <div class="col-lg-8 col-xl-7 d-none d-lg-block">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-light text-center h4">
                    Calificaciones: {{ $course->name }}
                </div>
                <div class="card-body text-center" style="background-color: whitesmoke">
                    <hr>
                    <div class="h4 text-center"> Evaluaciones del Curso </div>   
                    <div class="row d-flex mx-4">
                        <div class="col">
                            <table class="table table-striped border border-dark shadow-lg">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col"> # </th>
                                        <th scope="col" class="test-left"> Nombre </th>
                                        <th scope="col"> Fecha </th>
                                        <th scope="col"> Porcentaje </th>
                                        <th scope="col"> Calificación </th>
                                    </tr>
                                </thead>
                            </table>    
                        </div>    
                    </div> 
                </div>
                <div class="card-footer bg-dark text-light"> 
                </div>
            </div>
        </div>
        <!--End Desktop View -->
        <!-- Mobile View -->
        <div class="col-12 col-sm-11 col-md-10 d-block d-lg-none">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-light text-center h5">
                    Calificaciones: {{ $course->name }}
                </div>
                <div class="card-body">
                </div>
                <div class="card-footer bg-dark text-light text-center">
                </div>
            </div>    
        </div>
        <!--End Mobile View -->
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