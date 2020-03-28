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
                                        @if($valueSum == 0) 
                                            <tr> <td colspan="5"> <b> ¡En estos momentos el curso no tiene evaluaciones! <br> Puedes agregarlas haciendo click en "Agregar Evaluación". </b> </td> </tr>
                                        @endif
                                        @foreach ($evs as $ev)
                                            <tr>
                                                <th scope="row"> {{ $loop->iteration }} </th>
                                                <td class="text-left"> {{ $ev->name }} </td>
                                                <td> {{ $ev->date }} </td>
                                                <td> {{ $ev->value }}% </td>
                                                <td> 
                                                    <edit-evaluation image="{{ asset('img/icons/edit.svg') }}" type="desktop"> </edit-evaluation>
                                                    <delete-evaluation image="{{ asset('img/icons/trash.svg') }}" type="desktop"> </delete-evaluation>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="col"> <create-evaluation type="btn-lg float-right mr-4" modaltype="Lg" pr="" csrf="{{ csrf_token() }}" valueSum="{{ $valueSum }}" c_id="{{ $course->id }}"> </create-evaluation> </div>
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

                        @if($valueSum == 0)
                            <div class="h6 text-center"> <b> ¡En estos momentos el curso no tiene evaluaciones! Puedes agregarlas haciendo click en "Agregar Evaluación". </b>  </div>
                            <hr style="background-color: #A0A0A0; height: 0.01rem">
                        @endif

                        @foreach($evs as $ev)
                            <div class="h6"> <b> Evaluación: </b> {{ $ev->name }} </div>
                            <div class="h6"> <b> Fecha: </b> {{ $ev->date }} </div>
                            <div class="h6"> <b> Porcentaje: </b> {{ $ev->value }} % </div>
                            <edit-evaluation image="" type="mobile"> </edit-evaluation>
                            <delete-evaluation image="" type="mobile"> </delete-evaluation>
                            
                            <hr style="background-color: #a0a0a0; height: 0.01rem">
                        @endforeach

                        <div class="col text-center"> <create-evaluation type="" modaltype="" pr="pr-3" csrf="{{ csrf_token() }}" valueSum="{{ $valueSum }}" c_id="{{ $course->id }}"> </create-evaluation> </div>
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

