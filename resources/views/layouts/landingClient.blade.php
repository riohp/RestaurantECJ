<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/eb2aad7728.js" crossorigin="anonymous"></script>

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


    <body class="flex h-screen flex-col min-h-screen bg-yellow-50 dark:bg-gray-900">
        <div class="bg-yellow-50 dark:bg-darker h-full">

            <div class="h-full relative bg-yellow-50 dark:bg-gray-900">
                @yield('content-landing-client')
            </div>
        </div>
        <script src="{{asset('assets/js/changeTitle.js')}}"></script>
        <script src="{{asset('assets/js/hidden-password.js')}}"></script>
        <script src="{{asset('assets/js/registerFormScript.js')}}"></script>
        @yield('client_scripts_js')
    </body>
</html>
