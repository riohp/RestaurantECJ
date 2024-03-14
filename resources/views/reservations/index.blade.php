@extends('layouts.partials.header')
@section('title', 'Reservations')
@section('content-main')

<div class="container grid p-6 mx-auto">
    <div class="flex items-center justify-between w-full mb-6">
        <h1 class="text-2xl font-semibold text-gray-700">Reservacion</h1>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="px-6 py-4 border-b border-b-default-200 dark:border-gray-600 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center gap-6">
                <h4 class="text-xl font-medium fon text-default-900 dark:text-gray-200">Lista de reservas</h4>
                <a href="{{ route('reservation.create') }}" class="px-6 py-3 inline-flex text-white text-sm rounded-md bg-purple-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="plus" class="lucide lucide-plus w-5 h-5 inline-flex align-middle me-2"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>Agregar Reserva</a>
            </div>
        </div>
        <div class="p-6 dark:bg-gray-800 border-b border-b-default-200 dark:border-gray-600">
            <div class="flex flex-wrap justify-between items-center gap-4">
                <div class="relative focus-within:text-purple-500">
                    <div class="absolute inset-y-0 flex items-center dark:text-blue-100 pl-2">
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="search" class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" placeholder="Search..." aria-label="Search">
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">nombre</th>
                        <th class="px-4 py-3">contacto</th>
                        <th class="px-4 py-3">mesa</th>
                        <th class="px-4 py-3">hora de llegada</th>
                        <th class="px-4 py-3">hora de salida</th>
                        <th class="px-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($reservations as $reservation)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">{{ $reservation->id }}</td>
                        <td class="px-4 py-3">{{ $reservation->full_name }}</td>
                        <td class="px-4 py-3">{{ $reservation->cellphone }}</td>
                        <td class="px-4 py-3">{{ $reservation->table->nombre }}</td>
                        <td class="px-4 py-3">{{ $reservation->start_time }}</td>
                        <td class="px-4 py-3">{{ $reservation->end_time }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center space-x-4 text-sm">
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
                    @endforeach
                    
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection

