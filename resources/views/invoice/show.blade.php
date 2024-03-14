@extends('layouts.partials.header')
@section('title', 'Factura')
@section('content-main')
    <div class="container">
        <div class="row">
            <a href="{{ route('invoice.index') }}" class="btn btn-primary">Volver</a>
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Factura</div>
                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $invoice->id }}</p>
                        <p><strong>Facturo id:</strong> {{ $invoice->responsible->id }} <strong>Nombre:</strong> {{ $invoice->responsible->name }}</p>
                        <p><strong>Tipo pedito:</strong> {{ $invoice->tipo }}</p>
                        <p><strong>Fecha de creacion:</strong> {{ $invoice->created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($invoice->items as $item)
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
                            {{ $item->product->name }}
                        </p>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            {{ $item->cant }}
                        </p>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            {{ $item->subTotal }}
                        </p>
                    </div>
                </div>
            @empty
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    >No hay items registrados a la factura.
                </p>
            @endforelse
            <p><strong>Total:</strong> {{ $invoice->total }}</p>
        </div>
    </div>
@endsection
