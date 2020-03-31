@extends('layouts.appLayout')

@section('head')
    <title> Estudioso | Calendario </title>
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
        <a href="{{ route('viewCalendar', ['page' => 0]) }}" class="navbarItemActive"> Calendario </a>
    </li>
    <span class="navbarItem d-none d-lg-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="{{ route('viewSchedule') }}" class="navbarItem"> Horario </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <!-- Desktop View -->
            <div class="col-lg-10 col-xl-9 d-none d-lg-block">
                <table class="table">
                    <thead class="thead-dark border border-secondary">
                        <tr>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[0]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[0]['date'])) }} </th>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[1]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[1]['date'])) }} </th>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[2]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[2]['date'])) }} </th>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[3]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[3]['date'])) }} </th>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[4]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[4]['date'])) }} </th>
                        </tr>
                    </thead>
                    <tbody class="border border-secondary">
                        <tr style="background-color: whitesmoke; height: 200px">
                            @for ($i = 0; $i < 5; $i++)
                                @if (!$days[$i]['evs'])
                                    <td class="text-center align-middle border border-secondary h6 text-muted" style="min-width: 150px"> <b> No hay <br> Evaluaciones </b> </td>
                                @else
                                    <td class="align-middle  border border-secondary text-left mx-0 px-0 h6" style="min-width: 200px; max-width: 225px; color: #0358a8">
                                        <ul>
                                            @foreach ($days[$i]['evs'] as $ev)
                                                <li> <a href="{{ route('viewGrades', ['c_id' => $ev['c_id']]) }}" style="color: #0358a8"> <b> {{ $ev['name'] }} <br> {{ $ev['c_name'] }} </b> </a> </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                @endif 
                            @endfor
                        </tr>
                    </tbody>
                    <thead class="thead-dark border border-secondary">
                        <tr>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[5]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[5]['date'])) }} </th>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[6]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[6]['date'])) }} </th>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[7]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[7]['date'])) }} </th>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[8]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[8]['date'])) }} </th>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[9]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[9]['date'])) }} </th>
                        </tr>
                    </thead>
                    <tbody class="border border-secondary">
                        <tr style="background-color: whitesmoke; height: 200px">
                            @for ($i = 5; $i < 10; $i++)
                                @if (!$days[$i]['evs'])
                                    <td class="text-center align-middle border border-secondary h6 text-muted" style="min-width: 150px"> <b> No hay <br> Evaluaciones </b> </td>
                                @else
                                    <td class="align-middle  border border-secondary text-left mx-0 px-0 h6 text-primary" style="min-width: 200px; max-width: 225px; color: #0358a8">
                                        <ul>
                                            @foreach ($days[$i]['evs'] as $ev)
                                                <li> <a href="{{ route('viewGrades', ['c_id' => $ev['c_id']]) }}" style="color: #0358a8"> <b> {{ $ev['name'] }} <br> {{ $ev['c_name'] }} </b> </a> </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                @endif 
                            @endfor
                        </tr>
                    </tbody>
                </table>
                <div class="row d-flex justify-content-center">
                    <a class="btn mx-1 btn-primary" href="{{ route('viewCalendar', ['page' => $page-1]) }}"> <b> Anterior </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page-5]) }}"> <b> {{ $page-5 }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page-4]) }}"> <b> {{ $page-4 }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page-3]) }}"> <b> {{ $page-3 }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page-2]) }}"> <b> {{ $page-2 }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page-1]) }}"> <b> {{ $page-1 }} </b> </a>
                    <a class="btn mx-1 btn-info text-light" href="#"> <b> {{ $page }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page+1]) }}"> <b> {{ $page+1 }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page+2]) }}"> <b> {{ $page+2 }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page+3]) }}"> <b> {{ $page+3 }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page+4]) }}"> <b> {{ $page+4 }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page+5]) }}"> <b> {{ $page+5 }} </b> </a>
                    <a class="btn mx-1 btn-primary" href="{{ route('viewCalendar', ['page' => $page+1]) }}"> <b> Siguiente </b> </a>
                </div>
            </div>
            <!-- End Desktop View -->
            <!-- Tablet View -->
            <div class="col-sm-11 col-md-9 d-none d-sm-block d-lg-none">
                <table class="table">
                    @for ($i = 0; $i < 10; $i+=2)
                    <thead class="thead-dark border border-secondary">
                        <tr>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[$i]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[$i]['date'])) }} </th>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[$i+1]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[$i+1]['date'])) }} </th>
                        </tr>
                    </thead>
                    <tbody class="border border-secondary">
                        <tr style="background-color: whitesmoke; height: 200px">
                            @for ($j = $i; $j < $i+2; $j++)
                                @if (!$days[$j]['evs'])
                                    <td class="text-center align-middle border border-secondary h6 text-muted" style="min-width: 150px"> <b> No hay <br> Evaluaciones </b> </td>
                                @else
                                    <td class="align-middle  border border-secondary text-left mx-0 px-0 h6" style="min-width: 200px; max-width: 225px; color: #0358a8">
                                        <ul>
                                            @foreach ($days[$j]['evs'] as $ev)
                                                <li> <a href="{{ route('viewGrades', ['c_id' => $ev['c_id']]) }}" style="color: #0358a8"> <b> {{ $ev['name'] }} <br> {{ $ev['c_name'] }} </b> </a> </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                @endif 
                            @endfor
                        </tr>
                    </tbody>
                    @endfor
                </table>
                <div class="row d-flex justify-content-center">
                    <a class="btn mx-1 btn-primary" href="{{ route('viewCalendar', ['page' => $page-1]) }}"> <b> Anterior </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page-3]) }}"> <b> {{ $page-3 }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page-2]) }}"> <b> {{ $page-2 }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page-1]) }}"> <b> {{ $page-1 }} </b> </a>
                    <a class="btn mx-1 btn-info text-light" href="#"> <b> {{ $page }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page+1]) }}"> <b> {{ $page+1 }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page+2]) }}"> <b> {{ $page+2 }} </b> </a>
                    <a class="btn mx-1 btn-outline-primary" href="{{ route('viewCalendar', ['page' => $page+3]) }}"> <b> {{ $page+3 }} </b> </a>
                    <a class="btn mx-1 btn-primary" href="{{ route('viewCalendar', ['page' => $page+1]) }}"> <b> Siguiente </b> </a>
                </div>
            </div>
            <!-- End Tablet View -->
            <!-- Mobile View -->
            <div class="col-10 d-block d-sm-none">
                <table class="table">
                    @for($i=0; $i<10; $i++)
                    <thead class="thead-dark border border-secondary">
                        <tr>
                            <th scope="col" class="text-center border border-secondary"> {{ $days[$i]['dayOfWeek'] }} <br> {{ date('d/m/Y', strtotime($days[$i]['date'])) }} </th>
                        </tr>
                    </thead>
                    <tbody class="border border-secondary">
                        <tr style="background-color: whitesmoke; height: 200px">
                            @if (!$days[$i]['evs'])
                                <td class="text-center align-middle border border-secondary h6 text-muted" style="min-width: 150px"> <b> No hay <br> Evaluaciones </b> </td>
                            @else
                                <td class="align-middle  border border-secondary text-left mx-0 px-0 h6" style="min-width: 200px; max-width: 225px; color: #0358a8">
                                    <ul>
                                        @foreach ($days[$i]['evs'] as $ev)
                                            <li> <a href="{{ route('viewGrades', ['c_id' => $ev['c_id']]) }}" style="color: #0358a8"> <b> {{ $ev['name'] }} <br> {{ $ev['c_name'] }} </b> </a> </li>
                                        @endforeach
                                    </ul>
                                </td>
                            @endif 
                        </tr>
                    </tbody>
                    @endfor
                </table>
                <div class="row d-flex justify-content-center">
                    <a class="btn mx-1 btn-primary" href="{{ route('viewCalendar', ['page' => $page-1]) }}"> <b> Anterior </b> </a>
                    <a class="btn mx-1 btn-info text-light" href="#"> <b> {{ $page }} </b> </a>
                    <a class="btn mx-1 btn-primary" href="{{ route('viewCalendar', ['page' => $page+1]) }}"> <b> Siguiente </b> </a>
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