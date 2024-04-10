@extends('layouts.partials.header')
@section('title', 'Detalles de Categoría')

@section('content-main')
<div class="container mt-3">
    <div class="max-w-md mx-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="text-xl font-bold mb-4">Detalles de Categoría</div>
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Nombre de la categoría</h3>
                <p class="text-gray-700">{{ $category->name }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Descripción</h3>
                <p class="text-gray-700">{{ $category->description }}</p>
            </div>
            <div class="mb-4">
                <h3 class="text-lg font-semibold">Estado Actual</h3>
                <p class="text-gray-700">Estado: {{ $category->status ? 'Activo' : 'Inactivo' }}</p>
            </div>
            <a href="{{ route('category.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Volver</a>
        </div>
    </div>
</div>
@endsection
