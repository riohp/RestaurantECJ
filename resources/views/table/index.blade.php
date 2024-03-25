@extends('layouts.partials.header')
@section('title', 'Crear Mesa')
@section('content-main')
    <div class="flex flex-col flex-1 w-full">
        <main class="h-full overflow-y-auto p-4">
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 ">
                @if ($message = Session::get('success'))
                    <div>
                        <p class="text-blue-600">{{ $message }}</p>
                    </div>
                @endif
                <!-- Card -->
                @forelse ($tables as $table)
                    <form action="{{ route('table.show') }}" method="POST">
                        @csrf
                        <input type="hidden" name="encrypted_table_id" value="{{ encrypt($table->id) }}">
                        <input type="hidden" name="category_id" value="{{ encrypt(-1) }}">
                        <button type="submit" class="flex max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <div class="flex flex-col justify-center">
                                <div class="inline-flex w-full gap-2 mb-2 justify-center bg-purple-600/20 px-4 py-1.5 rounded-xl">
                                    <svg class="fill-purple-600" width="34" height="34" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         viewBox="0 0 494.446 494.446" xml:space="preserve">
                                        <g>
                                            <path d="M469.869,276.062h-97.34l-24.014-37.719c-0.687,0.016-1.325,0.104-2.016,0.104h-56.204l23.966,37.614H180.185
                                                l23.954-37.614h-56.176c-0.687,0-1.341-0.089-2.031-0.104l-24.014,37.719H24.576C10.995,276.062,0,287.061,0,300.636
                                                s10.995,24.574,24.576,24.574h66.046l-15.806,24.815c-7.297,11.448-3.924,26.64,7.517,33.927c4.096,2.608,8.674,3.85,13.183,3.85
                                                c8.128,0,16.063-4.017,20.754-11.377l32.619-51.215h196.665l32.607,51.215c4.686,7.36,12.637,11.377,20.765,11.377
                                                c4.514,0,9.071-1.241,13.167-3.85c11.441-7.287,14.834-22.47,7.538-33.927l-15.806-24.815h66.042
                                                c13.57,0,24.577-10.999,24.577-24.574S483.439,276.062,469.869,276.062z"/>
                                            <path d="M147.962,189.297h198.537c22.833,0,41.326-18.496,41.326-41.317c0-22.832-18.508-41.336-41.342-41.336H147.962
                                                c-22.813,0-41.326,18.504-41.326,41.336C106.637,170.801,125.133,189.297,147.962,189.297z"/>
                                        </g>
                                    </svg>
                                    <p class="text-2xl font-bold text-gray-700 dark:text-white">{{$table->nombre}}</p>
                                </div>

                                <div class="flex gap-1 mb-2">
                                    <div class="px-0.5 w-fit bg-purple-500 rounded-full dark:text-orange-100 dark:bg-orange-500"></div>
                                    <p><span>Capacidad de la mesa: </span><strong>{{ $table->capaciodad }} personas</strong></p>
                                </div>
                                <div class="flex gap-1">
                                    <div class="px-0.5 w-fit bg-purple-500 rounded-full dark:text-orange-100 dark:bg-orange-500"></div>
                                    <p>Ubicacion: <strong>{{$table->location}}</strong></p>
                                </div>
                            </div>
                        </button>
                    </form> 
                    {{-- <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        <form action="{{ route('table.show') }}" method="POST">
                            @csrf
                            <input type="hidden" name="table" value="{{ $table->id }}">
                            <input type="hidden" name="category_id" value="-1">
                            <button type="submit" class="btn btn-info btn-sm">Ver</button>
                        </form>
                        <form action="{{ route('table.edit') }}" method="POST" style="display: inline">
                            @csrf
                            <input type="hidden" name="encrypted_table_id" value="{{ encrypt($table->id) }}">
                            <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                        </form>

                        @if ($table->status)
                            <form action="{{ route('table.destroy') }}" method="POST" style="display: inline">
                                @csrf

                                @method('DELETE')
                                <input type="hidden" name="encrypted_table_id" value="{{ encrypt($table->id) }}">
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>

                            </form>
                        @else
                            <form action="{{ route('table.activate') }}" method="POST" style="display: inline">
                                @csrf
                                <input type="hidden" name="encrypted_table_id" value="{{ encrypt($table->id) }}">
                                <button type="submit" class="btn btn-success btn-sm">Activar</button>
                            </form>
                        @endif
                        </p> --}}


                @empty
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        >No hay mesas registradas.
                    </p>
                @endforelse
        </main>
    </div>
@endsection