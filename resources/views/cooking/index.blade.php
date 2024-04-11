@extends('layouts.partials.header')
@section('title', 'Crear domicilio')
@section('content-main')
    <div class="flex flex-col flex-1 w-full">
        <main class="h-full overflow-y-auto p-4">
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 ">

                <!-- Card -->
                @forelse ($cookings as $cooking)
                    <div class="p-6 bg-orange-600/10 bg-[url(http://www.transparenttextures.com/patterns/food.png)] rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="">
                            <div class="flex items-center justify-between">
                                <div class="w-1/2 mb-2">
                                    <h4 class="text-xl text-orange-400 font-bold">{{$cooking->name}}</h4>
                                </div>
                                <p class="text-sm {{ $cooking->status ? 'bg-green-200' : 'bg-red-200' }} inline-block px-4 py-0.5 rounded-full items-center font-medium text-gray-800 dark:text-gray-400">
                                    {{ $cooking->status ? 'Operativo' : 'Fuera de servicio' }}
                                </p>
                            </div>
                            <div class="w-full">
                                <h4 class="text-md text-gray-800 font-semibold">{{$cooking->location}}</h4>
                            </div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                            <form action="{{ route('cooking.show') }}" method="POST">
                                @csrf
                                <input type="hidden" name="encrypted_cooking_id" value="{{ encrypt($cooking->id) }}">
                                <input type="hidden" name="category_id" value="{{ encrypt(-1) }}">
                                <button type="submit" class="w-full items-center justify-center gap-2 rounded-full border border-bg-orange-400 bg-orange-400 px-10 py-3 text-center text-base font-semibold text-white shadow-sm transition-all duration-200 hover:border-primary-700 hover:bg-orange-500">Detalles de {{$cooking->name}}</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        >No hay Cocinas registradas.
                    </p>
                @endforelse
        </main>
    </div>
@endsection
