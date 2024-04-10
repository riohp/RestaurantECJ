@extends('layouts.partials.header')
@section('title', 'Editar Mesa')
@section('content-main')
<div class="container mt-3">
    <div class="max-w-md mx-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="text-xl font-bold mb-4">Editar Mesa</div>
            <form action="{{ route('table.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="encrypted_table_id" value="{{ encrypt($table->id) }}">

                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nombre', $table->nombre) }}">
                    @error('nombre')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="capaciodad" class="block text-gray-700 text-sm font-bold mb-2">Capacidad</label>
                    <input type="number" name="capaciodad" id="capaciodad" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('capaciodad', $table->capaciodad) }}">
                    @error('capaciodad')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="location" class="block text-gray-700 text-sm font-bold mb-2">Ubicación</label>
                    <input type="text" name="location" id="location" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('location', $table->location) }}">
                    @error('location')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                    <select name="status" id="status" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="1" {{ $table->status ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ !$table->status ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('status')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
