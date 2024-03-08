<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('archivos-css')
</head>
<body>

    {{-- @include('layouts.partials.menu') --}}
    

    @yield('content')
    @yield('archivos-js')
</body>
</html>

