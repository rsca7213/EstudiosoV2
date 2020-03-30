@extends('layouts.appLayout')

@section('head')
    <title> Estudioso | Menú Principal </title>
@endsection

@section('nav')
    <li class="mx-2 nav-item">
        <a href="{{ route('home') }}" class="navbarItemActive"> Menú Principal </a>
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
            <div class="col-lg-9 col-xl-8 d-none d-lg-block">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-light text-center h4">
                        Menú Principal
                    </div>
                    <div class="card-body text-center" style="background-color: whitesmoke">
                        <hr>
                        <div class="h4 text-center"> Evaluaciones Próximas </div>
                        <div class="row d-flex mx-4">
                            <div class="col">
                                <table class="table table-striped border border-dark shadow-lg">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col"> # </th>
                                            <th scope="col" class="text-left"> Curso </th>
                                            <th scope="col" class="text-left"> Evalución </th>
                                            <th scope="col"> Fecha </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!$evs)
                                            <tr> 
                                                <td colspan="4"> <b>
                                                    ¡En estos momentos no tiene evaluaciones próximas! <br> 
                                                    Para agregar evaluaciones puede crear un nuevo curso <br>
                                                    ó editar un curso ya existente.
                                                </b> </td>
                                            </tr>
                                        @endif
                                        @foreach ($evs as $ev)
                                            <tr>
                                                <th scope="row" class="align-middle"> {{ $loop->iteration }} </th>
                                                <td class="text-left align-middle"> {{ $ev['course_name'] }}</td>
                                                <td class="text-left align-middle"> {{ $ev['name'] }}</td>
                                                <td class="align-middle"> {{ date('d/m/Y', strtotime($ev['date'])) }} (en {{ $ev['days'] }} días) </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-dark" style="color: #555555"> 
                        <div class="col text-right"> 
                            <a href="{{ route('addCourse') }}" class="btn btn-secondary btn-lg mx-2"> Agregar Curso </a>
                            <a href="{{ route('viewCourses') }}" class="btn btn-primary btn-lg mx-2"> Ver Cursos </a>    
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Desktop View -->
            <!-- Mobile View -->
            <div class="col-12 col-sm-11 col-md-10 d-block d-lg-none">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-light text-center h5">
                        Menú Principal
                    </div>
                    <div class="card-body" style="background-color: whitesmoke">
                        <div class="h5 text-center">
                            Evaluaciones Próximas
                            <hr style="background-color: #a0a0a0; height: 0.01rem">
                            @if(!$evs)
                                <div class="h6 text-center"> <b>
                                    ¡En estos momentos no tiene evaluaciones próximas! 
                                    Para agregar evaluaciones puede crear un nuevo curso 
                                    ó editar un curso ya existente.
                                </b> </div>
                                <hr style="background-color: #a0a0a0; height: 0.01rem">
                            @endif
                            @foreach ($evs as $ev)
                                <div class="h6 text-left"> <b> Curso: </b>  {{ $ev['course_name'] }} </div>
                                <div class="h6 text-left"> <b> Evaluación: </b> {{ $ev['name'] }} </div>
                                <div class="h6 text-left"> <b> Fecha: </b> {{ $ev['date'] }} <b> (en {{ $ev['days']}} días) </b> </div>
                                <div class="text-left"> <button class="btn btn-info text-light"> Ir al Curso </button> </div>
                                <hr style="background-color: #a0a0a0; height: 0.01rem">
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer bg-dark text-light text-center">
                        <a href="{{ route('addCourse') }}" class="btn btn-secondary mx-1"> Agregar Curso </a>
                        <a href="{{ route('viewCourses') }}" class="btn btn-primary mx-1"> Ver Cursos </a>    
                    </div>
                </div>    
            </div>
            <!-- End Mobile View -->
        </div>        
    </div>
@endsection

@section('mobileFooter')
    <div class="row d-flex justify-content-center">
        <a href="#" class="btn btn-secondary"> Regresar Arriba </a>
    </div>
    <div class="row d-flex justify-content-center mt-4">
        ESTUDIOSO
    </div>
@endsection