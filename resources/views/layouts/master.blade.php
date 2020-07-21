<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- General and custom css/js --}}
    @include('layouts.partials.dependencies')

    <title>{{ config('app.name') }}</title>
</head>
<body class="bg-light">
    <div class="wrapper">

        @include('layouts.partials.header')
    
        <div class="container mt-4">
            @yield('content')
        </div>
        
    </div>
    <div id="alert-box">
        @include('layouts.partials.alerts')
    </div>
</body>
</html>