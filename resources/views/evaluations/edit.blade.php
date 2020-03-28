@extends('layouts.appLayout')

@section('head')
    <title> Estudioso | Evaluaciones </title>
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
            <div class="col-lg-8 col-xl-7 d-none d-lg-block">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-light text-center h4">
                        Evaluaciones: {{ $course->name }}
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
                                            <th scope="col"> Acción </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"> 1 </th>
                                            <td class="text-left"> Actividad por Competencias </td>
                                            <td> 25/05/2020 </td>
                                            <td> 35% </td>
                                            <td> 
                                                <img src="{{ asset('img/icons/edit.svg') }}" alt="editar" style="width: 1.4rem">
                                                <img src="{{ asset('img/icons/trash.svg') }}" alt="borrar" style="width: 1.4rem">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"> 2 </th>
                                            <td class="text-left"> Parcial #1 </td>
                                            <td> 31/07/2021 </td>
                                            <td> 15% </td>
                                            <td> 
                                                <img src="{{ asset('img/icons/edit.svg') }}" alt="editar" style="width: 1.4rem">
                                                <img src="{{ asset('img/icons/trash.svg') }}" alt="borrar" style="width: 1.4rem">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"> 3 </th>
                                            <td class="text-left"> Proyecto </td>
                                            <td> 12/02/2022 </td>
                                            <td> 25% </td>
                                            <td> 
                                                <img src="{{ asset('img/icons/edit.svg') }}" alt="editar" style="width: 1.4rem">
                                                <img src="{{ asset('img/icons/trash.svg') }}" alt="borrar" style="width: 1.4rem">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="col"> <create-evaluation type="btn-lg float-right mr-4" modaltype="Lg" pr="" csrf="{{ csrf_token() }}" valueSum="60" c_id="{{ $course->id }}"> </create-evaluation> </div>
                    </div>
                    <div class="card-footer bg-dark text-light"> 
                        <div class="col text-center"> 
                            <button class="btn btn-success btn-lg"> Finalizar </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-11 col-md-10 d-block d-lg-none">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-light text-center h5">
                        Evaluaciones: {{ $course->name }}
                    </div>
                    <div class="card-body">
                        <div class="h5 text-center"> Evaluaciones del Curso </div>
                        <hr style="background-color: #a0a0a0; height: 0.01rem">

                        <div class="h6"> <b> Evaluación: </b> Actividad por Competencias </div>
                        <div class="h6"> <b> Fecha: </b> 25/05/2020 </div>
                        <div class="h6"> <b> Porcentaje: </b> 35% </div>
                        <button class="btn btn-secondary"> Editar </button>
                        <button class="btn btn-danger"> Borrar </button>
                        <hr style="background-color: #a0a0a0; height: 0.01rem">

                        <div class="h6"> <b> Evaluación: </b> Parcial #1 </div>
                        <div class="h6"> <b> Fecha: </b> 31/07/2021 </div>
                        <div class="h6"> <b> Porcentaje: </b> 15% </div>
                        <button class="btn btn-secondary"> Editar </button>
                        <button class="btn btn-danger"> Borrar </button>
                        <hr style="background-color: #a0a0a0; height: 0.01rem">

                        <div class="h6"> <b> Evaluación: </b> Proyecto </div>
                        <div class="h6"> <b> Fecha: </b> 12/02/2022 </div>
                        <div class="h6"> <b> Porcentaje: </b> 25% </div>
                        <button class="btn btn-secondary"> Editar </button>
                        <button class="btn btn-danger"> Borrar </button>
                        <hr style="background-color: #a0a0a0; height: 0.01rem">

                        <div class="col text-center"> <create-evaluation type="" modaltype="" pr="pr-3" csrf="{{ csrf_token() }}" valueSum="60" c_id="{{ $course->id }}"> </create-evaluation> </div>
                    </div>
                    <div class="card-footer bg-dark text-light text-center">
                        <button class="btn btn-success"> Finalizar </button>
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

