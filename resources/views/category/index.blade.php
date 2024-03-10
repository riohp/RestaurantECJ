@extends('layouts.landing')
@section('title', 'Categorías')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Categorías</div>
                <div class="card-body">
                    <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Crear Categoría</a>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->status ? 'Activo' : 'Inactivo' }}</td>
                                <td>
                                    <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    @if ($category->status)
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                    @else
                                    <form action="{{ route('category.activate', $category->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Activar</button>
                                    </form>
                                    @endif
                                    
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">No hay categorías registradas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
