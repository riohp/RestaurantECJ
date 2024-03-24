@extends('layouts.partials.header')
@section('title', 'Lista de Productos')

@section('content-main')
    <div class="p-6" xmlns="http://www.w3.org/1999/html">
        <div class="flex items-center justify-between w-full mb-6">
            <h4 class="text-xl font-medium text-gray-800 dark:text-gray-200">Productos</h4>
        </div>
        <div class="grid grid-cols-1">
            <div class="border border-gray-200 dark:border-gray-600 rounded-lg">
                <div class="px-6 py-4 overflow-hidden">
                    <div class="flex flex-wrap md:flex-nowrap items-center justify-between gap-4">
                        <h2 class="text-xl text-gray-800 font-semibold dark:text-gray-200">Lista Productos</h2>
                        <div class="flex flex-wrap items-center gap-4">
                            <a href="{{ route('products.create') }}" class="py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-purple-600 text-white transition-all hover:bg-purple-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="plus" class="lucide lucide-plus w-5 h-5 inline-flex align-middle me-2"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>
                                Agregar Producto
                            </a>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-400 dark:divide-gray-700">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr class="text-start">
                                        <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-gray-800 dark:text-gray-200">Producto</th>
                                        <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-gray-800 dark:text-gray-200">Categoria</th>
                                        <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-gray-800 dark:text-gray-200">Precio</th>
                                        <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-gray-800 dark:text-gray-200">Costo</th>
                                        <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-gray-800 dark:text-gray-200">Producto Creado</th>
                                        <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-gray-800 dark:text-gray-200">Estado</th>
                                        <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-gray-800 dark:text-gray-200">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y dark:divide-gray-700 divide-gray-400">
                                @foreach($products as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            <div class="flex items-center gap-3">
                                                <div class="shrink">
                                                    <img src="data:image/jpeg;base64,{{$product->image}}" class="h-12 w-12" alt="Img producto">
                                                </div>
                                                <p class="text-base text-gray-500">{{$product->name}}</p>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium bg-orange-500 text-white">{{$product->category->name}}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-400">$ {{$product->price}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-400">$ {{$product->cost}}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-400">{{$product->created_at}}</td>
                                        <td class="px-6 py-4">
                                            @if($product->status == 0)
                                                <span class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-semibold bg-red-500/20 text-red-500">No Disponible</span>
                                            @else
                                                <span class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-semibold bg-green-500/20 text-green-500">Disponible</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex gap-3">
                            
                                                @if($product)
                                                    <form method="POST" id="editForm" action="{{ route('products.show') }}">
                                                        @csrf
                                                        <input type="hidden" name="product_encrypted_id" value="{{ encrypt($product->id)}}">
                                                        <button type="submit" class="transition-all hover:text-purple-600 dark:text-gray-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="eye" class="lucide lucide-eye w-5 h-5"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                                                        </button>
                                                    </form>
                                                    <form method="POST" action="{{ route('products.edit')}}" id="deleteForm">
                                                        @csrf
                                                        <input type="hidden" name="product_encrypted_id" value="{{ encrypt($product->id)}}">
                                                        <button type="submit" class="transition-all hover:text-red-600 dark:text-gray-400">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="pencil" class="lucide lucide-pencil w-5 h-5"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path><path d="m15 5 4 4"></path></svg>
                                                        </button>  
                                                    </form>
                                                @endif

                                                {{-- <a href="{{ route('products.edit', $product->id) }}" class="transition-all hover:text-purple-600 dark:text-gray-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="pencil" class="lucide lucide-pencil w-5 h-5"><path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path><path d="m15 5 4 4"></path></svg>
                                                </a> --}}

                                               


                                                @if($product->status == 1)
                                                    <form method="POST" action="{{ route('products.destroy') }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="product_encrypted_id" value="{{ encrypt($product->id)}}">
                                                        <button type="submit" class="transition-all hover:text-red-600 dark:text-gray-400"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="trash-2" class="lucide lucide-trash-2 w-5 h-5"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg></button>
                                                    </form>
                                                @else
                                                    <form method="POST" action="{{ route('products.activate') }}">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="product_encrypted_id" value="{{ encrypt($product->id)}}">
                                                        <button type="submit" class="transition-all hover:text-green-500 dark:text-gray-400"><i class="fa-solid fa-play"></i></button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
