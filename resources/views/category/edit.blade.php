@extends('layouts.partials.header')
@section('title', 'Editar categoría')

@section('content-main')
<div class="container mt-3">
    <div class="max-w-md mx-auto">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="text-xl font-bold mb-4">Editar Categoría</div>
            <form action="{{ route('category.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="encrypted_category_id" value="{{ encrypt($category->id) }}">

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                    <input type="text" name="name" id="name" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name', $category->name) }}" required>
                    @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                    <textarea name="description" id="description" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('description', $category->description) }}</textarea>
                    @error('description')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                    <select name="status" id="status" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>Inactivo</option>
                    </select>
                    @error('status')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar Categoría</button>
            </form>
        </div>
    </div>
</div>
@endsection
