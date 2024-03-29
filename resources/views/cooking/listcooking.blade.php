@extends('layouts.partials.header')

@section('title-page', 'Lista de cocinas')

@section('content-main')
    <div class="container grid p-6 mx-auto">
        <div class="flex items-center justify-between w-full mb-6">
            <h4 class="text-xl font-medium dark:text-gray-200">Lista de cocinas</h4>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="px-6 py-4 border-b border-b-default-200 dark:border-gray-600 dark:bg-gray-800">
                <div class="flex flex-wrap justify-between items-center gap-6">
                    <h4 class="text-xl font-medium fon text-default-900 dark:text-gray-200">
                        <h4 class="text-xl font-medium dark:text-gray-200">Lista de cocinas</h4>
                    </h4>
                    <a href="{{ route('cooking.create') }}"
                        class="px-6 py-3 inline-flex text-white text-sm rounded-md bg-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" data-lucide="plus"
                            class="lucide lucide-plus w-5 h-5 inline-flex align-middle me-2">
                            <path d="M5 12h14"></path>
                            <path d="M12 5v14"></path>
                        </svg>
                        <span>Crear cocina</span>
                    </a>
                </div>
            </div>
            <div class="p-6 dark:bg-gray-800 border-b border-b-default-200 dark:border-gray-600">
                <div class="flex flex-wrap justify-between items-center gap-4">
                    <div class="relative focus-within:text-purple-500">
                        <div class="absolute inset-y-0 flex items-center dark:text-blue-100 pl-2">
                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="search"
                            class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                            placeholder="Search..." aria-label="Search">
                    </div>
                </div>
            </div>
            <div class="relative overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-200">
                                <tr class="text-start">
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Nombre
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        ubicacion
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        estado
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        categoria
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        Acciones
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">

                                @forelse ($cookings as $cooking)
                                    <tr class="">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                            <div class="flex items-center text-sm">
                                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                    <img class="object-cover w-full h-full rounded-full"
                                                        src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                        alt="" loading="lazy" />
                                                    <div class="absolute inset-0 rounded-full shadow-inner"
                                                        aria-hidden="true">
                                                    </div>
                                                </div>
                                                <div>
                                                    <p class="font-semibold">{{ $cooking->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-500 max-w-0.5 truncate">
                                            {{ $cooking->location }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-500 max-w-0.5 truncate">
                                            @if ($cooking->status)
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    Activo
                                                </span>
                                            @else
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                    Inactivo
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($cooking->categories->count() > 0)
                                                @foreach ($cooking->categories as $category)
                                                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{ $category->name }}</span>
                                                @endforeach
                                            @else
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                                    Sin categoria
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            <form action="{{ route('cooking.edit') }}" method="POST"
                                style="display: inline">
                                @csrf
                                <input type="hidden" name="encrypted_cooking_id" value="{{ encrypt($cooking->id) }}">
                                <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                            </form>

                            @if ($cooking->status)
                                <form action="{{ route('cooking.destroy') }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="encrypted_cooking_id" value="{{ encrypt($cooking->id) }}">

                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            @else
                                <form action="{{ route('cooking.activate') }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    <input type="hidden" name="encrypted_cooking_id" value="{{ encrypt($cooking->id) }}">
                                    <button type="submit" class="btn btn-success btn-sm">Activar</button>
                                </form>
                            @endif
                                        </td>

                                    </tr>
                                @empty
                                    <td colspan="4" class="text-white text-center">NO HAY INFORMACION QUE MOSTRAR</td>
                                @endforelse


                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Showing 21-30 of 100
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <button
                                    class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Previous">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>

                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    1
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    2
                                </button>
                            </li>
                            <li>
                                <button
                                    class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    3
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    4
                                </button>
                            </li>
                            <li>
                                <span class="px-3 py-1">...</span>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    8
                                </button>
                            </li>
                            <li>
                                <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    9
                                </button>
                            </li>
                            <li>
                                <button
                                    class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Next">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </nav>
                </span>
            </div>
        </div>
    </div>
@endsection
