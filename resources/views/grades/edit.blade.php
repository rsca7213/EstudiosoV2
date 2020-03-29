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
                                        <th scope="col" class="text-left"> Nombre </th>
                                        <th scope="col"> Fecha </th>
                                        <th scope="col"> Porcentaje </th>
                                        <th scope="col"> Calificación </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evs as $ev)
                                    <tr>
                                        <th scope="row"> {{ $loop->iteration }} </th>
                                        <td class="text-left"> {{ $ev->name }} </td>
                                        <td> {{ date('d/m/Y', strtotime($ev->date)) }} </td>
                                        <td> {{ $ev->value }} % </td>
                                        <td>
                                            @if (!isset($ev->grade))
                                                <create-grade image="{{ asset('/img/icons/add.svg') }}" type="lg" pr="" ev_id="{{ $ev->id }}" ev_name="{{ $ev->name }}" c_id="{{ $course->id }}"> </create-grade>
                                            @else
                                                <span> {{ $ev->grade }} de 20 </span>
                                                <edit-grade image="{{ asset('/img/icons/edit.svg') }}" type="lg" pr="" ev_id="{{ $ev->id }}" ev_name="{{ $ev->name }}" ev_grade="{{ $ev->grade }}" c_id="{{ $course->id }}"> </edit-grade>
                                                <delete-grade image="{{ asset('/img/icons/trash.svg') }}" type="lg" pr="" ev_id="{{ $ev->id }}" ev_name="{{ $ev->name }}" c_id="{{ $course->id }}"> </delete-grade>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>    
                        </div>    
                    </div> 
                    <hr>
                </div>
                <div class="card-footer bg-dark" style="color: #555555"> 
                    <div class="row d-flex justify-content-between">
                        <div class="col text-left">
                            <delete-course-lg c_id="{{ $course->id }}" c_n="{{ $course->name }}" csrf="{{ csrf_token() }}"> Curso </delete-course-lg>
                            <a class="ml-1 btn btn-secondary btn-lg" href="{{ route('viewEvaluations', ['c_id' => $course->id]) }}"> Editar Curso </a> 
                        </div>
                        <div class="col text-right">
                            <button class="mx-1 btn btn-primary btn-lg"> Información del Curso </button> 
                        </div>
                    </div>
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