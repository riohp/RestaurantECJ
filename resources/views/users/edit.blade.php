@extends('layouts.partials.header')
@section('title', 'Editar Usuario')

@section('content-main')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4 m-1">Editar Usuario</h1>

        <form method="POST" action="{{ route('users.update') }}" class="max-w-md mx-auto">
            @csrf
            @method('PUT')
            <input type="hidden" name="encrypted_id" value="{{ encrypt($user->id) }}">

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input id="name" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="name" value="{{ $user->name }}" required autofocus>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input id="email" type="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="email" value="{{ $user->email }}" required>
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="cellphone" class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input id="cellphone" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="cellphone" value="{{ $user->cellphone }}" required>
                @error('cellphone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-700">Dirección</label>
                <input id="address" type="text" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="address" value="{{ $user->address }}" required>
                @error('address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Rol</label>
                <select id="role" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="role" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="cashier" {{ $user->role == 'cashier' ? 'selected' : '' }}>Cajero</option>
                    <option value="waiter" {{ $user->role == 'waiter' ? 'selected' : '' }}>Mesero</option>
                </select>
                @error('role')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Estado</label>
                <select id="status" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="status" required>
                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactivo</option>
                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Activo</option>
                </select>
                @error('status')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:bg-indigo-700">Actualizar Usuario</button>
        </form>
    </div>
@endsection
