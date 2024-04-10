@extends('layouts.partials.header')
@section('title', 'Detalle del producto')

@section('content-main')
<div class="container mt-3">
    <div class="max-w-md mx-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="text-xl font-bold mb-4">Detalle del Producto</div>
            <div class="mb-4">
                <p><strong>Nombre:</strong> {{ $product->name }}</p>
                <p><strong>Precio:</strong> {{ $product->price }}</p>
                <p><strong>Costo:</strong> {{ $product->cost }}</p>
                <p><strong>Categoría:</strong> {{ $product->category->name }}</p>
                <p><strong>Estado:</strong> {{ $product->status ? 'Activo' : 'Inactivo' }}</p>
            </div>
            <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Volver al listado</a>
        </div>
    </div>
</div>
@endsection
