@extends('layouts.landing')
@section('title', 'Detalle del producto')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Detalle del Producto
                </div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ $product->name }}</p>
                    <p><strong>Precio:</strong> {{ $product->price }}</p>
                    <p><strong>Costo:</strong> {{ $product->cost }}</p>
                    <p><strong>Categoría:</strong> {{ $product->categories->name }}</p>
                    <p><strong>Estado:</strong> {{ $product->status ? 'Activo' : 'Inactivo' }}</p>
                    <a href="{{ route('table_product.index') }}" class="btn btn-primary">Volver al listado</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
