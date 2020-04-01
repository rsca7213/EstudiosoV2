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
        edit schedule
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