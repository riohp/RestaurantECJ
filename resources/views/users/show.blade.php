@extends('layouts.landing')

@section('title', 'Detalles del Usuario')

@section('content')
    <div class="container">
        <h1>Detalles del Usuario</h1>
        <div>
            <p><strong>Nombre:</strong> {{ $user->name }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $user->email }}</p>
            <strong>Rol:</strong> {{ $user->role == 'admin' ? 'Administrador' : ($user->role == 'cashier' ? 'Cajero' : 'Mesero') }}</p>
            <p><strong>Estado:</strong> {{ $user->status == 1 ? 'Activo' : 'Inactivo' }}</p>
            <p><strong>Creado:</strong> {{ $user->created_at->format('d/m/Y H:i') }}</p>
            @if ($user->updated_at)
                <p><strong>Actualizado:</strong> {{ $user->updated_at->format('d/m/Y H:i') }}</p>
            @else 
                <p><strong>Actualizado:</strong> No ha sido actualizado</p>
            @endif
            <p><a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a></p>
            <p><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a></p>
        </div>
    </div>
@endsection
