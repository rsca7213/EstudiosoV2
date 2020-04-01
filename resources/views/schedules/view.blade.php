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
                                <a href="{{ route('editSchedule') }}" class="btn btn-primary btn-lg mb-4"> Editar Horario </a>
                            </div>
                            <div class="col-9"> 
                                <div class="m-4 row d-flex justify-content-center">
                                    <table class="table shadow-lg table-bordered">
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
                                            <tr>
                                                <th class="bg-info text-light"> 7 a 8 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light"> 8 a 9 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light"> 9 a 10 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light"> 10 a 11 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light"> 11 a 12 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light">12 a 1 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light">1 a 2 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light"> 2 a 3 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light"> 3 a 4 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light"> 4 a 5 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light"> 5 a 6 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light"> 6 a 7 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light"> 7 a 8 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th class="bg-info text-light"> 8 a 9 </th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                   </div>
                   <div class="card-footer bg-dark"></div>
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
                               <a href="{{ route('editSchedule') }}" class="btn btn-primary my-4"> Editar Horario </a> 
                               <hr>
                               <table class="table table-bordered shadow border border-dark px-0 mx-0">
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
                                        <tr>
                                            <th class="bg-info text-light"> 7-8 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 8-9 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 9-10 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 10-11 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 11-12 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 12-1 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 1-2 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 2-3 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 3-4 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 4-5 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 5-6 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 6-7 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 7-8 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th class="bg-info text-light"> 8-9 </th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
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