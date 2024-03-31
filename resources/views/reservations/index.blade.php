@extends('layouts.partials.header')
@section('title', 'Reservations')
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
                    <a href="{{ route('reservation.create') }}"
                        class="px-6 py-3 inline-flex text-white text-sm rounded-md bg-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" data-lucide="plus"
                            class="lucide lucide-plus w-5 h-5 inline-flex align-middle me-2">
                            <path d="M5 12h14"></path>
                            <path d="M12 5v14"></path>
                        </svg>
                        <span>Crear Reserva</span>
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
                        <form action="{{ route('reservation.index') }}" method="GET">
                            @csrf
                            <input type="text" name="search" id="search"
                                class="w-full py-2 pl-8 pr-3 text-sm text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50"
                                placeholder="Buscar cocina" />
                        </form>
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
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        nombre
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        contacto
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        hora de llegada
                                    <th scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                                        hora de salida
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">

                                @forelse ($reservations as $reservation)
                                    <tr class="px-4 py-3 text-sm">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                            <div class="flex items-center text-sm">
                                                <div>
                                                    <p class="font-semibold">{{ $reservation->id }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-500 max-w-0.5 truncate">
                                            {{ $reservation->full_name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-500 max-w-0.5 truncate">
                                            {{ $reservation->cellphone }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-500 max-w-0.5 truncate">
                                            {{ $reservation->table->nombre }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-500 max-w-0.5 truncate">
                                            {{ $reservation->start_time }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-500 max-w-0.5 truncate">
                                            {{ $reservation->end_time }}
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <div class="flex items-center">
                                                <a href="{{ route('reservation.show', $reservation->id) }}" class="text-purple-600 hover:text-purple-900">ver</a>
                                                <a href="{{ route('reservation.edit', $reservation->id) }}" class="text-blue-600 hover:text-blue-900">editar</a>
                                                <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">eliminar</button>
                                                </form> 

                                            </div>
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
                    Mostrando {{ $reservations->firstItem() }}-{{ $reservations->lastItem() }} de {{ $reservations->total() }}
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                             <li>
                                <button onclick="window.location='{{ $reservations->previousPageUrl() }}'"
                                    class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Previous">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                            </li>
                            @for ($i = 1; $i <= $reservations->lastPage(); $i++)
                                <li>
                                    <button onclick="window.location='{{ $reservations->url($i) }}'"
                                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple {{ $reservations->currentPage() == $i ? 'bg-purple-600 text-white' : '' }}">
                                        {{ $i }}
                                    </button>
                                </li>
                            @endfor
                            <li>
                                <button onclick="window.location='{{ $reservations->nextPageUrl() }}'"
                                    class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Next">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
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




