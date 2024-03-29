@extends('layouts.partials.header')
@section('title-page', 'Editar entrega')
@section('content-main')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Editar entrega</h1>
    <form action="{{ route('delivery.update')}}" method="POST" class="max-w-lg mx-auto">
        @csrf
        @method('PUT')
        <input type="hidden" name="delivery_id" value="{{ encrypt($delivery->id) }}"> 
        
        <div class="mb-4">
            <label for="full_name" class="block text-gray-700">Nombre</label>
            <input type="text" name="full_name" id="full_name" class="form-input mt-1 block w-full" value="{{ $delivery->client->name }}" disabled>
        </div>
        <div class="mb-4">
            <label for="cellphone" class="block text-gray-700">Celular</label>
            <input type="text" name="cellphone" id="cellphone" class="form-input mt-1 block w-full" value="{{ $delivery->cellphone }}">
        </div >
        <div class="mb-4">
            <label for="address" class="block text-gray-700">Dirección</label>
            <input type="text" name="address" id="address" class="form-input mt-1 block w-full" value="{{ $delivery->address }}">
        </div>
        <div class="mb-4">
            <label for="status" class="block text-gray-700">Estado</label>
            <select name="status" id="status" class="form-select mt-1 block w-full">
                <option value="1" {{ $delivery->status == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $delivery->status == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
        </div>
    </form>
</div>

@endsection
