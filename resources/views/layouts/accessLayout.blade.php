<!DOCTYPE html>
<html lang="en">
    <head>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <script src="{{ asset('js/app.js') }}" defer></script>
            <link rel="dns-prefetch" href="//fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
            <link rel="icon" href=" {{ asset('img/favicon.png') }}">
            @yield('head')
        </head>
    </head>
    <body>
        <div class="container-fluid" id="app">
            @yield('content')
        </div>
    </body>
</html>
