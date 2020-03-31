@extends('layouts.appLayout')

@section('head')
    <title> Estudioso | Agregar Curso </title>
@endsection

@section('nav')
    <li class="mx-2 nav-item">
        <a href="{{ route('home') }}" class="navbarItem"> Menú Principal </a>
    </li>
    <span class="navbarItem d-none d-xl-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="{{ route('viewCourses') }}" class="navbarItem"> Ver Cursos </a>
    </li>
    <span class="navbarItem d-none d-xl-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="{{ route('addCourse') }}" class="navbarItemActive"> Agregar Curso </a>
    </li>
    <span class="navbarItem d-none d-xl-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="{{ route('viewCalendar', ['page' => 0]) }}" class="navbarItem"> Calendario </a>
    </li>
    <span class="navbarItem d-none d-xl-block"> | </span>
    <li class="mx-2 nav-item">
        <a href="{{ route('viewSchedule') }}" class="navbarItem"> Horario </a>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-sm-9 col-md-7 col-lg-5 col-xl-4">
                <div class="card">
                <form action="/courses/add/store" method="POST">
                    @csrf
                    <div class="card-header bg-dark text-light text-center h4">
                        Agregar Curso
                    </div>
                    <div class="card-body shadow-lg" style="background-color: whitesmoke">
                            <div class="form-group row mx-2">
                                <label for="name" class="col-form-label text-md-right" style="font-size: 14px; font-weight: bold">{{ __('Nombre del Curso') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
            
                            <div class="form-group row mx-2">
                                <label for="teacher" class="col-form-label text-md-right" style="font-size: 14px; font-weight: bold">  Nombre del Profesor </label>
                                <input id="teacher" type="text" class="form-control @error('teacher') is-invalid @enderror" name="teacher" required value="{{ old('teacher') }}" autocomplete="name">
                                @error('teacher')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
            
                            <div class="form-group row">
                                <label for="color" class="col-form-label text-md-right ml-4 mr-2" style="font-size: 14px; font-weight: bold">  Color del Curso </label>
                                <input id="color" type="color" class="form-control col-2 col-sm-1 p-0 @error('color') is-invalid @enderror" name="color" required autocomplete="current-color">
                                @error('color')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    <div class="card-footer bg-dark d-flex justify-content-center">
                        <button type="submit" class="btn btn-success btn-lg">
                            Crear Curso
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div> 
@endsection

@section('mobileFooter')
    <div class="row d-flex justify-content-center">
        <a href="{{ route('home') }}" class="btn btn-secondary"> Regresar al Menú Principal</a>
    </div>
    <div class="row d-flex justify-content-center mt-4">
        ESTUDIOSO
    </div>
@endsection

@section('desktopFooter')
    <div class="d-flex flex-row-reverse fixed-bottom mb-4 mr-4">
        <div class="flex-row"> <a href="{{ route('login') }}" class="btn btn-secondary"> Regresar al Menú Principal </a></div>
    </div>
@endsection
