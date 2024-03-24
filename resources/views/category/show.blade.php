@extends('layouts.partials.header')
@section('title', 'Detalles de Categoría')

@section('content-main')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Detalles de Categoría</div>
                <div class="card-body">
                    <h3>Nombre de la categoria</h3>
                    <h5 class="card-title">{{ $category->name }}</h5>
                    <h3>Descripcion</h3>
                    <p class="card-text">{{ $category->description }}</p>
                    <h3>Estado Actual</h3>
                    <p class="card-text">Estado: {{ $category->status ? 'Activo' : 'Inactivo' }}</p>
                    <a href="{{ route('category.index') }}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
