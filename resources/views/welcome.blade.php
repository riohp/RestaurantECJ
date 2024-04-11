@extends('layouts.partials.header')
@section('content-main')
    <div class="container px-6 mx-auto grid mb-6" xmlns="http://www.w3.org/1999/html">
        <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
            Dashboard
        </h2>
        <a
            class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
            href="https://github.com/estevanmaito/windmill-dashboard"
        >
            <div class="flex items-center">
                <svg
                    class="w-5 h-5 mr-2"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                    ></path>

                </svg>
                <span>Star this project on GitHub</span>
            </div>
            <span>View more &RightArrow;</span>
        </a>
        <!-- Cards -->


{{--        card version2--}}
{{--        <div class="grid lg:grid-cols-3 grid-cols-2 gap-6">--}}
{{--            <div class="border border-gray-200 rounded-lg p-4 overflow-hidden text-center hover:border-purple-600 transition-all duration-300 bg-white dark:bg-gray-800 dark:border-gray-700">--}}
{{--                <h4 class="text-2xl text-purple-600 font-semibold mb-2">1,2M</h4>--}}
{{--                <h6 class="text-lg font-medium text-black mb-4 dark:text-white">Ingresos Totales</h6>--}}
{{--                <p class="text-sm text-gray-600">Aumento un 10%</p>--}}
{{--            </div>--}}
{{--            <div class="border border-gray-200 rounded-lg p-4 overflow-hidden text-center hover:border-purple-600 transition-all duration-300 bg-white dark:bg-gray-800 dark:border-gray-700">--}}
{{--                <h4 class="text-2xl text-purple-600 font-semibold mb-2">100</h4>--}}
{{--                <h6 class="text-lg font-medium text-black mb-4 dark:text-white">Nuevos Pedidos</h6>--}}
{{--                <p class="text-sm text-gray-600">Aumento un 0,5%</p>--}}
{{--            </div>--}}
{{--            <div class="border border-gray-200 rounded-lg p-4 overflow-hidden text-center hover:border-purple-600 transition-all duration-300 bg-white dark:bg-gray-800 dark:border-gray-700">--}}
{{--                <h4 class="text-2xl text-purple-600 font-semibold mb-2">100</h4>--}}
{{--                <h6 class="text-lg font-medium text-black mb-4 dark:text-white">Nuevos Pedidos</h6>--}}
{{--                <p class="text-sm text-gray-600">Aumento un 0,5%</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--   end card version2 --}}

        <div class="grid lg:grid-cols-2 grid-cols-2 gap-4">
            <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mr-6 dark:bg-gray-800">
                <div class="flex flex-wrap justify-between items-center gap-4 p-6">
                    <div class="">
                        <h1 class="text-lg font-semibold dark:text-white">Ventas Diarias</h1>
                        <p class="text-3xl font-bold text-purple-600 mt-1">2.538</p>
                    </div>
                    <div>
                        <button class="bg-purple-600 text-white px-4 py-2 rounded-md">View More</button>
                    </div>
                </div>
                <div class="min-w-0 p-4">
                    <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                        <canvas id="line" width="700" height="250" style="display: block; width: 700px; height: 350px;" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-9">
                <div class="row-span-2 relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md dark:bg-gray-800">
                    <div class="flex flex-wrap justify-between items-center gap-4 p-6">
                        <div>
                            <h1 class="text-xl font-semibold dark:text-white">Total Ventas</h1>
                        </div>
                        <div class="min-w-0 dark:bg-gray-800">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="pie" width="50" height="50" style="display: block; width: 700px; height: 350px;" class="chartjs-render-monitor p-4"></canvas>
                            <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                                <!-- Chart legend -->
                                <div class="flex items-center">
                                    <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
                                    <span>Shirts</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
                                    <span>Shoes</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                                    <span>Bags</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md dark:bg-gray-800">
                    <div class="flex flex-wrap justify-between items-center gap-4 p-6">
                        <div>
                            <h1 class="text-lg font-bold dark:text-gray-200">Ordenes Totales</h1>
                            <p class="font-semibold text-amber-500">-2,3%</p>
                        </div>
                        <div class="p-1 px-2 rounded-md focus:outline-none focus:shadow-outline-amber  bg-amber-600 text-white ">
                            <i class="fa-solid fa-ticket"></i>
                        </div>
                    </div>
                    <div class="px-6">
                        <h1 class="text-5xl font-extrabold dark:text-gray-200">7.250</h1>
                        <hr class="w-100 h-1 mx-full my-4 bg-amber-500 border-0 rounded md:my-2">
                    </div>
                </div>
                <div class="col-start-2 relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md dark:bg-gray-800">
                    <div class="flex flex-wrap justify-between items-center gap-4 p-6">
                        <div>
                            <h1 class="text-lg font-bold dark:text-gray-200">Nuevos Pedidos</h1>
                            <p class="font-semibold text-green-400">+22,3%</p>
                        </div>
                        <div class="p-1 px-2 rounded-md focus:outline-none focus:shadow-outline-green  bg-green-400 text-white ">
                            <i class="fa-solid fa-user-ninja"></i>
                        </div>
                    </div>
                    <div class="px-6">
                        <h1 class="text-5xl font-extrabold dark:text-gray-200">150</h1>
                        <hr class="w-100 h-1 mx-full my-4 bg-green-400 border-0 rounded md:my-2">
                    </div>
                </div>
            </div>
        </div>

{{--        mas informacion darsh--}}
        <div class="grid lg:grid-cols-2 grid-cols-2 gap-4 mt-8">
            <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md mr-6 dark:bg-gray-800">
                <div class="flex flex-wrap justify-between items-center gap-4 px-6 pt-6 pb-4">
                    <div class="">
                        <h1 class="text-lg font-semibold dark:text-white">Ventas Diarias</h1>
                    </div>
                    <div>
                        <div>
                            <button id="dropdownActionButton1" data-dropdown-toggle="dropdownAction1" class="inline-flex items-center text-purple-700 bg-purple-200 transition-all duration-300 border border-gray-200 focus:outline-none  focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                <span class="sr-only">Action button</span>
                                Hoy
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownAction1" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton1">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-100">15 Dias</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-100 dark:hover:text-white">7 DIas</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">30 Dias</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="min-w-0">
                    <div class="relative overflow-x-auto pb-2">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Platos
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right">
                                        Ordenes
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600">
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                                        <div class="ps-3">
                                            <a class="px-3 py-0.5 text-xs font-semibold leading-tight text-white bg-amber-400 rounded-full">Platos Fuertes</a>
                                            <div class="font-bold text-lg mt-1">Hamburguesa de la casa</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4 text-right">
                                        <h1 class="font-semibold text-black text-xl dark:text-white">543</h1>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600">
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                                        <div class="ps-3">
                                            <a class="px-3 py-0.5 text-xs font-semibold leading-tight text-white bg-blue-400 rounded-full">Bebidas</a>
                                            <div class="font-bold text-lg mt-1">Coca-Cola 300ml</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4 text-right">
                                        <h1 class="font-semibold text-black text-xl dark:text-white">487</h1>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600">
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                                        <div class="ps-3">
                                            <a class="px-3 py-0.5 text-xs font-semibold leading-tight text-white bg-amber-400 rounded-full">Platos Fuertes</a>
                                            <div class="font-bold text-lg mt-1">Crepe de pollo</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4 text-right">
                                        <h1 class="font-semibold text-black text-xl dark:text-white">443</h1>
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600">
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                        <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                                        <div class="ps-3">
                                            <a class="px-3 py-0.5 text-xs font-semibold leading-tight text-white bg-orange-400 rounded-full">Entradas</a>
                                            <div class="font-bold text-lg mt-1">Papas de la casa</div>
                                        </div>
                                    </th>
                                    <td class="px-6 py-4 text-right">
                                        <h1 class="font-semibold text-black text-xl dark:text-white">243</h1>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md dark:bg-gray-800">
                <div class="flex flex-wrap justify-between items-center gap-4 px-6 pt-6 pb-4">
                    <div class="">
                        <h1 class="text-lg font-semibold dark:text-white">Mejores Empleados</h1>
                    </div>
                    <div>
                        <div>
                            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-purple-700 bg-purple-200 transition-all duration-300 border border-gray-200 focus:outline-none hover:bg-purple-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                                <span class="sr-only">Action button</span>
                                Hoy
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">15 Dias</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">7 DIas</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">30 Dias</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="min-w-0">
                    <div class="relative overflow-x-auto pb-2">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Empleado
                                </th>
                                <th scope="col" class="px-6 py-3 text-right">
                                    Propinas
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600">
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                                    <div class="ps-3">
                                        <p class="font-bold text-lg">Esteban Mesa</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            Mesero
                                        </p>
                                    </div>
                                </th>
                                <td class="px-6 py-4 text-right">
                                    <h1 class="font-semibold text-black text-xl dark:text-white">$ 27,087</h1>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600">
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                                    <div class="ps-3">
                                        <p class="font-bold text-lg">Diego Diaz</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            Mesero
                                        </p>
                                    </div>
                                </th>
                                <td class="px-6 py-4 text-right">
                                    <h1 class="font-semibold text-black text-xl dark:text-white">$ 25,078</h1>
                                </td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600">
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                                    <div class="ps-3">
                                        <p class="font-bold text-lg">Santiago Ramirez</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            Mesero
                                        </p>
                                    </div>
                                </th>
                                <td class="px-6 py-4 text-right">
                                    <h1 class="font-semibold text-black text-xl dark:text-white">$ 23,998</h1>
                                </td>
                            </tr>
                            <tr class="bg-white dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-600">
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Jese image">
                                    <div class="ps-3">
                                        <p class="font-bold text-lg">Suad Ballesteros</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            Mesero
                                        </p>
                                    </div>
                                </th>
                                <td class="px-6 py-4 text-right">
                                    <h1 class="font-semibold text-black text-xl dark:text-white">$ 21,032</h1>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Table -->
    </div>
    <footer class="p-6 border-t dark:border-gray-600 w-full dark:bg-gray-800">
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
        </div>
    </footer>
@endsection
