@extends('layouts.appLayout')

@section('head')
    <title> Estudioso | Horario </title>
    <style>
        table.table-bordered > tbody > tr > td{
            border:1px solid #A0A0A0;
        }
        tr {
            line-height: 12px;
            min-height: 12px;
            height: 12px;
        }
    </style>
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
           <!-- Desktop View -->
           <div class="col-lg-12 col-xl-11 d-none d-lg-block">
               <div class="card shadow-lg">
                   <div class="card-header bg-dark text-light text-center h4">
                       Horario
                   </div>
                   <div class="card-body py-0 px-3 border border-dark m-0" style="background-color: whitesmoke">
                        <div class="row d-flex">
                            <div class="col-3 text-center" style="background-color: #E5E5E5"> 
                                <div class="h5 mt-4"> <b> Cursos </b> </div>
                                <hr>
                                <div class="text-left ml-1">
                                @foreach ($courses as $course)
                                    <button class="btn" style="background-color: {{ $course->color }}; cursor: default"> </button>
                                    <span> {{ $course->name }}</span>
                                    <br>
                                @endforeach
                                </div>
                                <hr>
                                <a href="{{ route('editSchedules', ['success' => 0 ]) }}" class="btn btn-primary btn-lg mb-4"> Editar Horario </a>
                            </div>
                            <div class="col-9"> 
                                <div class="m-4 row d-flex justify-content-center">
                                    <table class="table shadow-lg table-striped border border-info">
                                        <thead class="bg-info text-center text-light">
                                            <tr>
                                                <th scope="col"> Hora </th>
                                                <th scope="col"> Lunes </th>
                                                <th scope="col"> Martes </th>
                                                <th scope="col"> Miercoles </th>
                                                <th scope="col"> Jueves </th>
                                                <th scope="col"> Viernes </th>
                                                <th scope="col"> Sabado </th>
                                                <th scope="col"> Domingo </th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center" style="background-color: #E5E5E5"> 
                                            @foreach ($map as $hours)
                                                <tr class="text-light text-truncate">
                                                    <th class="bg-info text-light"> 
                                                        @if($loop->index+7 <= 12) {{ $loop->index+7 }} @endif
                                                        @if($loop->index+7 > 12) {{ $loop->index-5 }} @endif
                                                        a
                                                        @if($loop->index+8 <= 12) {{ $loop->index+8 }} @endif
                                                        @if($loop->index+8 > 12) {{ $loop->index-4 }} @endif
                                                    </th>
                                                    @foreach ($hours as $day)
                                                        <td style="background-color: {{ $day['color'] }}; max-width: 110px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden"> 
                                                            {{ $day['name'] }}
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="card-footer bg-dark text-right">
                       <a href="{{ route('home') }}" class="btn btn-secondary btn-lg"> Regresar al Menú Principal </a>
                   </div>
               </div>
           </div>
           <!-- End Desktop View -->
           <!-- Mobile View -->
           <div class="mx-0 px-0 col-12 col-sm-11 col-md-10 d-block d-lg-none">
               <div class="card shadow">
                   <div class="card-header bg-dark text-light text-center h5">
                       Horario
                   </div>
                   <div class="card-body py-0 px-3 border border-dark m-0" style="background-color: whitesmoke">
                       <div class="row d-flex justify-content-center">
                           <div class="col text-center px-1">
                               <div class="h5 my-4"> Cursos </div>
                               <hr>
                               <div class="text-left mx-4"> 
                                   @foreach ($courses as $course)
                                        <span class="btn" style="background-color: {{ $course->color }}; cursor: default"> </span>
                                        <span> {{ $course->name }}</span>
                                        <br>
                                   @endforeach
                               <hr>
                               </div>
                               <a href="{{ route('editSchedules', ['success' => 0 ]) }}" class="btn btn-primary my-4"> Editar Horario </a> 
                               <hr>
                               <table class="table table-striped shadow border border-info px-0 mx-0">
                                    <thead class="bg-info text-light text-center">
                                        <tr>
                                            <th scope="col"> Hora </th>
                                            <th scope="col"> <span class="d-block d-sm-none"> L </span> <span class="d-none d-sm-block"> Lun </span> </th>
                                            <th scope="col"> <span class="d-block d-sm-none"> M </span> <span class="d-none d-sm-block"> Mar </span> </th>
                                            <th scope="col"> <span class="d-block d-sm-none"> M </span> <span class="d-none d-sm-block"> Mie </span> </th>
                                            <th scope="col"> <span class="d-block d-sm-none"> J </span> <span class="d-none d-sm-block"> Jue </span> </th>
                                            <th scope="col"> <span class="d-block d-sm-none"> V </span> <span class="d-none d-sm-block"> Vie </span> </th>
                                            <th scope="col"> <span class="d-block d-sm-none"> S </span> <span class="d-none d-sm-block"> Sab </span> </th>
                                            <th scope="col"> <span class="d-block d-sm-none"> D </span> <span class="d-none d-sm-block"> Dom </span> </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center" style="background-color: #E5E5E5">
                                        @foreach ($map as $hours)
                                            <tr class="text-light text-truncate">
                                                <th class="bg-info text-light"> 
                                                    @if($loop->index+7 <= 12) {{ $loop->index+7 }} @endif
                                                    @if($loop->index+7 > 12) {{ $loop->index-5 }} @endif
                                                    a
                                                    @if($loop->index+8 <= 12) {{ $loop->index+8 }} @endif
                                                    @if($loop->index+8 > 12) {{ $loop->index-4 }} @endif
                                                </th>
                                                @foreach ($hours as $day)
                                                    <td style="background-color: {{ $day['color'] }}; max-width: 110px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden">
                                                        @if($day['name'] != null) <span class="d-block d-sm-none"> {{ $day['name'][0] }} </span>  @endif
                                                        @if($day['name'] != null) <span class="d-none d-sm-block"> {{ $day['name'][0].$day['name'][1].$day['name'][2] }} </span> @endif
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                               </table>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- End Mobile View -->
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