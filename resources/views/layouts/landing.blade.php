<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/eb2aad7728.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="{{ asset('assets/js/init-alpine.js') }}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
        @vite('resources/css/app.css')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
        <script src="{{ asset('assets/js/charts-lines.js') }}" defer></script>
        <script src="{{ asset('assets/js/charts-pie.js') }}" defer></script>
        <script src="{{ asset('assets/js/init-validations.js')}}" defer></script>
        @yield('styles_css')
    </head>


    <body class="flex h-screen flex-col min-h-screen">
        @yield('content-landing')
        <script src="{{asset('assets/js/changeTitle.js')}}"></script>
        <script src="{{asset('assets/js/hidden-password.js')}}"></script>
        <script src="{{asset('assets/js/registerFormScript.js')}}"></script>
        @yield('scripts_js')
    </body>
</html>
