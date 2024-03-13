@extends('layouts.landing')
@section('title', 'Crear Mesa')
@section('content')
    @include('layouts.partials.menu')
    <div class="flex flex-col flex-1 w-full">
        @include('layouts.partials.header')
        <div class="flex items-center  p-6 bg-gray-50 dark:bg-gray-900">
            <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="flex flex-col overflow-y-auto md:flex-row">
                    <div class="h-32 md:h-auto md:w-1/2">
                        <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../assets/img/table.jpg"
                            alt="Office" />
                        <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                            src="../assets/img/table.jpg"" alt="Office" />
                    </div>
                    <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                        <div class="w-full">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                                Crear mesa
                            </h1>
                            <form action="{{ route('table.store') }}" method="POST">
                                @csrf
                                <label class="block text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">Nombre</span>
                                    <input type="text" name="nombre" id="name" value="{{ old('nombre') }}"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="Ingrese el nombre de la mesa" />
                                    @error('name')
                                        <span class="help-block
                        text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label class="block mt-4 text-sm">
                                    @error('capacity')
                                        has-error
                                    @enderror
                                    <span class="text-gray-700 dark:text-gray-400">Capacidad</span>
                                    <input type="number" name="capaciodad" id="capacity" value="{{ old('capaciodad') }}"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="Ingrese la capacidad de la mesa" />
                                    @error('capacity')
                                        <span class="help-block
                        text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                @error('location')
                                    has-error
                                @enderror
                                <label class="block mt-4 text-sm">
                                    <span class="text-gray-700 dark:text-gray-400">
                                        Ubicación
                                    </span>
                                    <input type="text" name="location" id="location" value="{{ old('location') }}"
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                        placeholder="Ingrese la Ubicación de la mesa" />
                                    @error('location')
                                        <span class="help-block
                        text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label class="block mt-4 text-sm">
                                    @error('status')
                                        has-error
                                    @enderror
                                    <span class="text-gray-700 dark:text-gray-400">
                                        estado
                                    </span>
                                    <select name="status" id="status"
                                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                    @error('status')
                                        <span
                                            class="help-block
                                        text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                                <button type="submit"
                                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
