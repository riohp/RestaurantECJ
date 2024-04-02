@extends('layouts.partials.header')
@section('title', 'Lista de Productos')
@section('content-main')
    {{--    Table goes here --}}
    <div class="container grid p-6 mx-auto">
        <div class="flex items-center justify-between w-full mb-6">
            <h4 class="text-xl font-medium dark:text-gray-200">Lista Productos</h4>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="px-6 py-4 border-b border-b-default-200 dark:border-gray-600 dark:bg-gray-800">
                <div class="flex flex-wrap justify-between items-center gap-6">
                    <h4 class="text-xl font-medium fon text-default-900 dark:text-gray-200">Productos</h4>
                    <div class="flex flex-wrap items-center gap-4">
                        <a href="{{ route('products.create') }}"
                            class="py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-purple-600 text-white transition-all hover:bg-purple-800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" data-lucide="plus"
                                class="lucide lucide-plus w-5 h-5 inline-flex align-middle me-2">
                                <path d="M5 12h14"></path>
                                <path d="M12 5v14"></path>
                            </svg>
                            Agregar Producto
                        </a>
                    </div>
                </div>
            </div>
            <div class="p-6 dark:bg-gray-800 border-b border-b-default-200 dark:border-gray-600">
                <div class="flex flex-wrap justify-between items-center gap-4">
                    <div class="relative focus-within:text-purple-500">
                        <div class="absolute inset-y-0 flex items-center dark:text-blue-100 pl-2">
                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <form action="{{ route('products.index') }}" method="GET">
                            <input type="text" name="search" id="search" placeholder="Buscar Producto"
                                class="w-full py-2 pl-8 pr-3 text-sm text-gray-700 placeholder-gray-400 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-purple-500 focus:ring focus:ring-purple-200 focus:ring-opacity-50 dark:bg-gray-800 dark:text-gray-300 dark:placeholder-gray-600 dark:border-gray-600 dark:focus:ring-purple-900 dark:focus:ring-opacity-50">
                        </form>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="overflow-x-auto ">
                <table class="w-full table-auto">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Nombre</th>
                            <th class="px-4 py-3">Categoria</th>
                            <th class="px-4 py-3">Precio</th>
                            <th class="px-4 py-3">Costo</th>
                            <th class="px-4 py-3">Fecha Creacion</th>
                            <th class="px-4 py-3">Estado</th>
                            <th class="px-4 py-3">Acciones</th>

                        </tr>
                    </thead>
                    <tbody id="usersTableBody" class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @isset($products)
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                        <div class="flex items-center gap-3">
                                            <div class="shrink">
                                                <img src="data:image/jpeg;base64,{{ $product->image }}" class="h-12 w-12"
                                                    alt="Img producto">
                                            </div>
                                            <p class="text-base text-gray-500">{{ $product->name }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium bg-orange-500 text-white">{{ $product->category->name }}</span>
                                    </td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-400">
                                        $ {{ $product->price }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-400">
                                        $ {{ $product->cost }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-400">
                                        {{ $product->created_at }}</td>
                                    <td class="px-6 py-4">
                                        @if ($product->status == 0)
                                            <span
                                                class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-semibold bg-red-500/20 text-red-500">No
                                                Disponible</span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-semibold bg-green-500/20 text-green-500">Disponible</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-3">

                                            @if ($product)
                                                <form method="POST" id="editForm" action="{{ route('products.show') }}">
                                                    @csrf
                                                    <input type="hidden" name="product_encrypted_id"
                                                        value="{{ encrypt($product->id) }}">
                                                    <button type="submit"
                                                        class="transition-all hover:text-purple-600 dark:text-gray-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            data-lucide="eye" class="lucide lucide-eye w-5 h-5">
                                                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>

                                                    </button>
                                                </form>
                                                <form method="POST" action="{{ route('products.edit') }}" id="deleteForm">
                                                    @csrf
                                                    <input type="hidden" name="product_encrypted_id"
                                                        value="{{ encrypt($product->id) }}">
                                                    <button type="submit"
                                                        class="transition-all hover:text-red-600 dark:text-gray-400">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            data-lucide="pencil" class="lucide lucide-pencil w-5 h-5">
                                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                                                            <path d="m15 5 4 4"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endif
                                            @if ($product->status == 1)
                                                <form method="POST" action="{{ route('products.destroy') }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="product_encrypted_id"
                                                        value="{{ encrypt($product->id) }}">
                                                    <button type="submit"
                                                        class="transition-all hover:text-red-600 dark:text-gray-400"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            data-lucide="trash-2" class="lucide lucide-trash-2 w-5 h-5">
                                                            <path d="M3 6h18"></path>
                                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                            <line x1="10" x2="10" y1="11"
                                                                y2="17"></line>
                                                            <line x1="14" x2="14" y1="11"
                                                                y2="17"></line>
                                                        </svg></button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('products.activate') }}">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="product_encrypted_id"
                                                        value="{{ encrypt($product->id) }}">
                                                    <button type="submit"
                                                        class="transition-all hover:text-green-500 dark:text-gray-400"><i
                                                            class="fa-solid fa-play"></i></button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="4" class="text-white text-center">NO HAY INFORMACION QUE MOSTRAR</td>
                        @endisset

                    </tbody>
                    </tbody>
                </table>
            </div>
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Mostrando {{ $products->firstItem() }} - {{ $products->lastItem() }} de {{ $products->total() }}
                    Resultados
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <button onclick="window.location='{{ $products->previousPageUrl() }}'"
                                    :disabled="!products.prev_page_url"
                                    class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Previous">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>
                            @for ($i = 1; $i <= $products->lastPage(); $i++)
                                <li>
                                    <button onclick="window.location='{{ $products->url($i) }}'"
                                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple {{ $products->currentPage() == $i ? 'bg-purple-600 text-white' : '' }}">
                                        {{ $i }}
                                    </button>
                                </li>
                            @endfor
                            <li>
                                <button onclick="window.location='{{ $products->nextPageUrl() }}'"
                                    :disabled="!products.next_page_url"
                                    class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Next">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </nav>
                </span>

            </div>
        </div>
    </div>
@endsection
