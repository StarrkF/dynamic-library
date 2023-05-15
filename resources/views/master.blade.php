<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kütüphane</title>
    @vite('resources/js/app.js')
    @yield('css')
</head>
<body>
    <div class="px-4 mt-5">
        @include('includes.alerts')
        @yield('content')
    </div>
    @yield('js')
</body>
</html>
