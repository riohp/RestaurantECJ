@extends('layouts.landingClient')
@section('title', 'Inicio')
@section('content-landing-client')
    @extends('layouts.partials.headerClient')
    <h1 class="font-bold text-4xl text-yellow-900 dark:text-yellow-50 md:text-5xl text-center pt-20">Reserva la mesa de tu
        preferencia</h1>
    <div class="flex flex-col flex-1 w-full p-20">
        <main class="h-full overflow-y-auto p-4">
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 ">
                <!-- Card -->
                @forelse ($tables as $table)
                    <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        data-table-id="{{ encrypt($table->id) }}"
                        class="flex max-w-sm p-6 bg-white border border-gray-200 dark:border-gray-600 rounded-lg bg-yellow-100 shadow hover:bg-yellow-50 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <div class="flex flex-col justify-center">
                            <div class="inline-flex w-full gap-2 mb-2 justify-center bg-yellow-400 dark:bg-gray-700 px-4 py-1.5 rounded-xl">
                                <img src="{{ asset('assets/img/tableReserve.png') }}" alt="table" class="w-8 h-8">
                                <p class="text-2xl font-bold text-gray-700 dark:text-gray-400">{{ $table->nombre }}</p>
                            </div>

                            <div class="flex gap-1 mb-2">
                                <div
                                    class="px-0.5 w-fit bg-yellow-400 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                </div>
                                <p class="text-gray-800 dark:text-gray-400"><span>Capacidad de la mesa: </span> <span
                                        class="text-yellow-900 font-bold ">{{ $table->capaciodad }} personas</span>
                                </p>
                            </div>
                            <div class="flex gap-1">
                                <div
                                    class="px-0.5 w-fit bg-yellow-400  rounded-full dark:text-orange-100 dark:bg-orange-500">
                                </div>
                                <p class="text-gray-800 dark:text-gray-400">Ubicacion: <span class="text-yellow-900 font-bold ">{{ $table->location }}</span></p>
                            </div>
                        </div>
                    </button>
                @empty
                    <p class="mb-2 text-sm font-bold  text-gray-600 dark:text-gray-400">
                        >No hay mesas registradas.
                    </p>
                @endforelse
                @if ($message = Session::get('success'))
                    <div>
                        <p class="text-blue-600">{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                <div>
                    <p class="text-blue-600">{{ $message }}</p>
                </div>
            @endif
        </main>
    </div>


    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow bg-yellow-50 dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-yellow-900 dark:text-gray-400">
                        Crear reserva
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-yellow-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="formNuevareserva" action="{{ route('reservation.store') }}" method="post" class="p-4 md:p-5">
                    @csrf
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <input type="hidden" name="id_table" id="id_table" value="">
                        <div class="col-span-2 input-name">
                            <label for="name"
                                class="block mb-2 text-sm font-bold text-yellow-900 dark:text-gray-400">Nombre Completo</label>
                            <input type="text" name="full_name" id="full_name"
                                class="bg-gray-50 border border-gray-300 text-yellow-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-500 dark:placeholder-white  dark:text-gray-300  dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                placeholder="Escribe tu nombre completo" required="">
                            <span id="errortxtname" class="text-xs font-semibold text-red-600 hidden">Introduce un nombre
                                con al menos 3 caracteres</span>
                        </div>
                        <div class="col-span-2 input-name">
                            <label for="name"
                                class="block mb-2 text-sm font-bold  text-yellow-900 dark:text-gray-400">Numero
                                celular</label>
                            <input type="number" name="cellphone" id="cellphone"
                                class="bg-gray-50 border border-gray-300 text-yellow-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-500 dark:placeholder-white  dark:text-gray-300  dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                placeholder="Escribe tu numero de celular" required="">
                            <span id="errorRegistercellphone" class="text-xs font-semibold text-red-600 "></span>
                        </div>
                        <div class="col-span-2 input-name">
                            <label for="name"
                                class="block mb-2 text-sm font-bold  text-yellow-900 dark:text-gray-400">Dirección</label>
                            <input type="text" name="location" id="location"
                                class="bg-gray-50 border border-gray-300 text-yellow-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                placeholder="Ingresa la direccion del pedido" required="">
                            <span id="errortxtLocation" class="text-xs font-semibold text-red-600 hidden">Introduce una
                                dirreción
                                con al menos 3 caracteres</span>
                        </div>
                        <div class="col-span-2 input-name">
                            <label for="name"
                                class="block mb-2 text-sm font-bold  text-yellow-900 dark:text-gray-400">Fecha
                                de la reserva</label>
                            <input type="date" name="date_reservation" id="date_reservation"
                                class="bg-gray-50 border border-gray-300 text-yellow-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                placeholder="Escribe la fecha de la reserva" required="">
                            <span id="errortxtDate" class="text-xs font-semibold text-red-600 hidden">Introduce una fecha
                                valida</span>
                        </div>
                        <div class="col-span-2 input-name">
                            <label for="name" class="block mb-2 text-sm font-bold  text-yellow-900 dark:text-gray-400">hora
                                de la reserva</label>
                            <input type="time" name="time_reservation" id="time_reservation"
                                class="bg-gray-50 border border-gray-300 text-yellow-900 text-sm rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                placeholder="Escribe la hora de la reserva" required="">
                            <span id="errortxtTime" class="text-xs font-semibold text-red-600 hidden">Introduce una
                                hora valida</span>
                        </div>
                    </div>
                    <button id="btnCreateReservation" type="button"
                        class="w-full text-white inline-flex justify-center items-center bg-yellow-400 dark:bg-gray-900 dark:hover:bg-gray-900 hover:bg-yellow-500  focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold  rounded-lg text-sm px-5 py-2.5 text-center   dark:focus:ring-blue-800 transition-all">
                        <svg id="InitIcon" class="me-1 -ms-1 w-5 h-5 text-yellow-900" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg id="loadingIcon" aria-hidden="true" role="status"
                            class="inline w-4 h-4 me-3 text-yellow-900 animate-spin hidden" viewBox="0 0 100 101"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="#E5E7EB" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentColor" />
                        </svg>
                        <span id="btnText" class="text-yellow-900">Agregar reserva</span>
                    </button>
                </form>

            </div>
        </div>
    </div>
    @section('client_scripts_js')
        <script src="{{ asset('assets/js/reserveValidation.js') }}"></script>
    @endsection
@endsection
