@extends('layouts.landing')
@section('title', 'Mesas')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Mesas</div>
                <div class="card-body">
                    <a href="{{ route('table.create') }}" class="btn btn-primary mb-3">Crear Mesa</a>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Capacidad</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tables as $table)
                            <tr>
                                <td>{{ $table->nombre }}</td>
                                <td>{{ $table->capaciodad }}</td>
                                <td>{{ $table->status ? 'Activo' : 'Inactivo' }}</td>
                                <td>
                                    <a href="{{ route('table.show', $table->id) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('table.edit', $table->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    @if ($table->status)
                                    <form action="{{ route('table.destroy', $table->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                    @else
                                    <form action="{{ route('table.activate', $table->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Activar</button>
                                    </form>
                                    @endif
                                    
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">No hay mesas registradas.</td>
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