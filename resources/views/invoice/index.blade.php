@extends('layouts.partials.header')
@section('title', 'Crear Mesa')
@section('content-main')
    <div class="flex flex-col flex-1 w-full">
        <main class="h-full overflow-y-auto p-4">
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 ">
                <!-- Card -->
                @forelse ($invoices as $invoice)
                    <div class="flex items-center p-3 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div
                            class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                               ID: {{ $invoice->id }}
                            </p>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Facturo {{ $invoice->responsible->name }} ID: {{ $invoice->responsible->id }}
                            </p>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                {{ $invoice->tipo }}
                            </p>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                {{ $invoice->status ? 'Activo' : 'Inactivo' }}
                            </p>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                {{ $invoice->total }}
                            </p>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            <form action="{{ route('invoice.show') }}" method="POST">
                                @csrf
                                <input type="hidden" name="invoice" value="{{ encrypt($invoice->id) }}">
                                <input type="hidden" name="category_id" value="{{ encrypt(-1) }}">
                                <button type="submit" class="btn btn-info btn-sm">Ver</button>
                            </form>
                            {{-- <form action="{{ route('invoice.destroy') }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="invoice" value="{{ encrypt($invoice->id) }}">
                                @if ($invoice->status)
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                @else
                                    <button type="submit" class="btn btn-danger btn-sm">Activar</button>
                                @endif
                            </form> --}}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        >No hay mesas registradas.
                    </p>
                @endforelse
            </main>
        </div>
    @endsection
