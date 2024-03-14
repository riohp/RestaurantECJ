@extends('layouts.partials.header')
@section('title', 'Crear Reservación')
@section('content-main')
<div class="container grid p-6 mx-auto">
    <div class="flex items-center justify-between w-full mb-6">
        <h1 class="text-2xl font-semibold text-gray-700">Reservación</h1>
    </div>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="px-6 py-4 border-b border-b-default-200 dark:border-gray-600">
            <div class="flex flex-wrap justify-between items-center gap-6">
                <h4 class="text-xl font-medium font text-default-900 dark:text-gray-200">Crear Reservación</h4>
            </div>
        </div>
        <div class="p-6 dark:bg-gray-800 border-b border-b-default-200 dark:border-gray-600">
            <form action="{{ route('reservation.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="full_name">Nombre</label>
                        <input type="text" name="full_name" id="full_name" class="w-full mt-2 form-input dark:bg-gray-700 dark:text-gray-200" placeholder="Nombre" required>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="cellphone">Teléfono</label>
                        <input type="text" name="cellphone" id="cellphone" class="w-full mt-2 form-input dark:bg-gray-700 dark:text-gray-200" placeholder="Teléfono" required>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="id_table">ID Mesa</label>
                        <select name="id_table" id="id_table" class="w-full mt-2 form-select dark:bg-gray-700 dark:text-gray-200" required>
                            <option value="">Selecciona una mesa</option>
                            @foreach($tables as $table)
                                @if($table->status == 1)
                                    <option value="{{ $table->id }}">{{ $table->nombre }} - capacidad: {{$table->capaciodad}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="start_time">Fecha y hora de inicio</label>
                        <input type="datetime-local" name="start_time" id="start_time" class="w-full mt-2 form-input dark:bg-gray-700 dark:text-gray-200" placeholder="Fecha y hora de inicio" required>
                    </div>
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="end_time">Hora de fin</label>
                        <input type="time" name="end_time" id="end_time" class="w-full mt-2 form-input dark:bg-gray-700 dark:text-gray-200" placeholder="Hora de fin" required>
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit" class="px-6 py-3 text-white bg-purple-600 rounded-md hover:bg-purple-500">Guardar</button>
                </div>
            </form>
            @if ($errors->any())
            <div class="mt-4 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </div>
    </div>
</div>
@endsection
