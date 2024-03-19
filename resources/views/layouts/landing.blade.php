<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <script src="https://kit.fontawesome.com/eb2aad7728.js" crossorigin="anonymous"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    />

    <link rel="stylesheet" href="{{asset('assets/css/tailwind.output.css')}}" />
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
        defer
    ></script>
    <script src="{{asset('assets/js/init-alpine.js')}}"></script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        defer
    ></script>
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="{{asset('assets/js/charts-lines.js')}}" defer></script>
    <script src="{{asset('assets/js/charts-pie.js')}}" defer></script>
</head>
  <body class="flex flex-col min-h-screen">
    @yield('content-landing')

    
    <footer class="p-6 border-t dark:border-gray-600 w-full absolute dark:bg-gray-800">
        <div class="grid lg:grid-cols-2 items-center gap-6 dark:text-white">
            <p class="text-default-600 lg:text-start text-center">
                <script>document.write(new Date().getFullYear())</script> Diseño  &amp; Hecho Con ❤️❤️ by <strong><a target="_blank" href="https://github.com/EstebanVfx1">MonolosCode</a></strong>
            </p>

            <div class="lg:flex hidden lg:justify-end text-center justify-center gap-6">
                <a href="javascript:void(0)" class="text-default-500 font-medium">
                    Términos
                </a>
                <a href="javascript:void(0)" class="text-default-500 font-medium">
                    Privacidad
                </a>
                <a href="javascript:void(0)" class="text-default-500 font-medium">
                    Cookies
                </a>
            </div>
        </div>1
    </footer>

    @yield('archivos-js')
  </body>
</html>
