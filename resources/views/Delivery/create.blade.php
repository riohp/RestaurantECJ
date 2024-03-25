@extends('layouts.partials.header')
@section('title', 'Crear domicilio')
@section('content-main')
    <div class="flex flex-col flex-1 w-full">
        <main class="h-full overflow-y-auto">
            <div class="flex items-center  p-6 bg-gray-50 dark:bg-gray-900">
                <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
                    <div class="flex flex-col overflow-y-auto md:flex-row">
                        <div class="h-32 md:h-auto md:w-1/2">
                            <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                                src="../assets/img/table.jpg" alt="Office" />
                            <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                                src="../assets/img/table.jpg" alt="Office" />
                        </div>
                        <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                            <div class="w-full">
                                <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                    Crear mesa
                                </h1>
                                <form action="{{ route('delivery.store') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
