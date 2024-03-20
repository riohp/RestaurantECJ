<form id="form-ver" action="{{ route('table.show') }}" method="POST">
    @csrf
    <input type="hidden" name="table" value="{{ $table->id }}">
    <input type="hidden" name="category_id" value="{{ $id_category }}">
    <button type="submit" class="btn btn-info btn-sm" hidden></button>
</form>

@if ($reload)
    <script>
        window.onload = function() {
            document.getElementById('form-ver').submit();
        };
    </script>
@endif

@extends('layouts.partials.header')
@section('title', 'Mesa')
@section('content-main')
    <div class="flex flex-col flex-1 w-full">
        <main class="h-full overflow-y-auto p-4">
            <h2 class="text-3xl font-bold tracking-tight dark:text-gray-200 sm:text-4xl m-7 text-center">Nombre mesa</h2>
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3 ">
                <div class="lg:col-span-2 md:col-span-2 sm:col-span-3 min-h-[600px] max-h-[600px] overflow-y-auto border dark:border-gray-700"
                    style="scrollbar-width: none; -ms-overflow-style: none; scrollbar-height: none;">
                    <h3 class="text-3xl font-bold tracking-tight dark:text-gray-200 sm:text-4xl m-5 text-center">Comanda
                    </h3>

                    <div class="p-4 mb-4">
                     
                        @foreach ($items as $status => $statusItems)
                            <h3 class="text-2xl font-semibold mt-4">{{ ucfirst($status) }}</h3>
                            <ul>
                                @foreach ($statusItems as $item)
                                    <li
                                        class="sm:col-span-4 md:col-span-4 lg:col-span-4 xl:col-span-4  divide-y divide-gray-200 rounded-lg bg-white shadow dark:bg-gray-700">
                                        <div class="flex w-full items-center justify-between space-x-6 p-6">
                                            <div class="flex-1 truncate">
                                                <div class="flex items-center space-x-3">
                                                    <h3
                                                        class="truncate text-sm font-medium text-gray-900 text-4xl dark:text-gray-300">
                                                        {{ $item['name'] }}</h3>
                                                </div>
                                                <p class="mt-1 truncate text-sm text-gray-500 text-xl dark:text-gray-300">
                                                    <strong>SubTotal:</strong> {{ $item['subtotal'] }}
                                                </p>
                                                <span
                                                    class="inline-flex flex-shrink-0 text-xl items-center rounded-full bg-green-50 px-1.5 py-0.5   font-medium text-green-600 ring-1 ring-inset ring-green-500">
                                                    {{ $item['quantity'] }}
                                                </span>
                                            </div>
                                            @php
                                                $statusClass = '';

                                                switch ($item['status']) {
                                                    case 'cooking':
                                                        $statusClass = 'bg-orange-500';
                                                        break;
                                                    case 'process':
                                                        $statusClass = 'bg-blue-500';
                                                        break;
                                                    case 'table':
                                                        $statusClass = 'bg-green-500';
                                                        break;
                                                    
                                                }
                                            @endphp

                                            <span
                                                class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium {{ $statusClass }} text-white">{{ $item['status'] }}</span>
                                            <img src="data:image/jpeg;base64,{{ $item['image'] }}" alt="Imagen del producto"
                                                class="mx-auto h-28 w-28 object-cover">
                                        </div>
                                        <div>
                                            <div class="-mt-px flex divide-x divide-gray-200">
                                                <div class="flex w-0 flex-1">
                                                    <a
                                                        class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                                        <form method="POST" action="{{ route('tablesProduct.destroy') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" value="{{ $item['id'] }}"
                                                                name="product_id">
                                                            <input type="hidden" value="{{ $table->id }}"
                                                                name="table_id">
                                                            <input type="hidden" name="category_id"
                                                                value="{{ $item['category_id'] }}">
                                                            <button class="dark:text-gray-300" type="submit">
                                                                <img src="{{ asset('assets/img/ic_basura.png') }}"
                                                                    width="50px" alt="">
                                                            </button>
                                                        </form>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endforeach
                    </div>
                </div>

                <div class="xl:col-span-1 lg:col-span-2 md:col-span-3 sm:col-span-3 dark:text-white min-h-[600px] max-h-[600px] overflow-y-auto  border dark:border-gray-700"
                    style="scrollbar-width: none; -ms-overflow-style: none; scrollbar-height: none; ">
                    @isset($categories)
                        <h3 class="text-3xl font-bold tracking-tight dark:text-gray-200 sm:text-4xl m-5 text-center">Categorias
                        </h3>
                    @endisset
                    @isset($products)
                        <div class="relative">
                            <form class="absolute top-0" action="{{ route('table.show') }}" method="POST">
                                @csrf
                                <input type="hidden" name="table" value="{{ $table->id }}">
                                <input type="hidden" name="category_id" value="-1">
                                <button type="submit">Volver</button>
                            </form>

                        </div>
                        <h3 class="text-3xl font-bold tracking-tight dark:text-gray-200 sm:text-4xl m-5 text-center">Productos
                        </h3>
                    @endisset

                    @isset($categories)
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-1 gap-6 p-4">
                            @foreach ($categories as $category)
                                <div
                                    class="relative group  overflow-hidden p-8 rounded-xl bg-white border border-gray-200 dark:border-gray-800 dark:bg-gray-900">
                                    <div aria-hidden="true"
                                        class="inset-0 absolute aspect-video border rounded-full -translate-y-1/2 group-hover:-translate-y-1/4 duration-300 bg-gradient-to-b from-blue-500 to-white dark:from-white dark:to-white blur-2xl opacity-25 dark:opacity-5 dark:group-hover:opacity-10">
                                    </div>
                                    <div class="relative">
                                        <div
                                            class="border border-blue-500/10 flex relative *:relative *:size-20 *:m-auto size-20 rounded-lg dark:bg-gray-900 dark:border-white/15 before:rounded-[7px] before:absolute before:inset-0 before:border-t before:border-white before:from-blue-100 dark:before:border-white/20 before:bg-gradient-to-b dark:before:from-white/10 dark:before:to-transparent before:shadow dark:before:shadow-gray-950 mx-auto">
                                            <img src="{{ asset('assets/img/ic_category.png') }}" alt="">
                                        </div>
                                        <p class="text-3xl text-center text-gray-700 dark:text-gray-300">{{ $category->name }}
                                        </p>

                                        <div
                                            class="flex gap-3 -mb-8 py-4 border-t border-gray-200 dark:border-gray-600 mx-auto">
                                            <a
                                                class="group rounded-xl disabled:border *:select-none [&>*:not(.sr-only)]:relative *:disabled:opacity-20 disabled:text-gray-950 disabled:border-gray-200 disabled:bg-gray-100 dark:disabled:border-gray-800/50 disabled:dark:bg-gray-900 dark:*:disabled:!text-white text-gray-950 bg-gray-100 hover:bg-gray-200/75 active:bg-gray-100 dark:bg-gray-500/15 dark:bg-gray-500/10 dark:hover:bg-gray-500/15 dark:active:bg-gray-500/10 flex gap-1.5 items-center text-sm h-8 px-3.5 justify-center">
                                                <form action="{{ route('table.show') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="table" value="{{ $table->id }}">
                                                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                                                    <button type="submit">Ver Productos</button>
                                                </form>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endisset
                    @isset($products)
                        <div class="flex flex-wrap -mx-4 p-4 ">
                            @foreach ($products as $product)
                                <div class="w-full  sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-full px-4 ">
                                    <div class="relative">
                                        <form class="absolute top-0" action="{{ route('tablesProduct.store') }}"
                                            method="post">
                                            @csrf
                                            <input value="{{ $table->id }}" type="hidden" name="table_id">
                                            <input value="{{ $product->id }}" type="hidden" name="product_id">
                                            <input value="{{ $product->category_id }}" type="hidden" name="category_id">
                                            <button type="submit"><img src="{{ asset('assets/img/ic_add.png') }}"
                                                    alt=""></button>
                                        </form>
                                    </div>
                                    <div class="bg-white dark:bg-gray-700  rounded-lg overflow-hidden mb-10 h-72">
                                        <img src="data:image/jpeg;base64,{{ $product->image }}" alt="imagen del producto"
                                            class="mx-auto h-28 w-28 object-cover">
                                        <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                                            <h3>
                                                <p class="dark:text-gray-300"><strong>Nombre:</strong> {{ $product->name }}
                                                </p>
                                            </h3>
                                            <p class="text-base text-body-color leading-relaxed mb-2 dark:text-gray-300">
                                            <p class="dark:text-gray-300"><strong>Precio:</strong> {{ $product->price }}</p>
                                            </p>

                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endisset
                </div>
            </div>
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3 flex justify-center">
                <div class="col-span-3 grid grid-cols-1">
                    <div class="flex justify-start">
                        <div class="px-4 py-2 mt-4 text-sm font-medium dark:text-gray-200 justify-center">
                            <b>Total:</b>{{ $total }}
                        </div>
                        @if (count($items) > 0)
                            <form action="{{ route('tablesProduct.updateStatusItems') }}" method="post">
                                @csrf
                                <input type="hidden" name="table_id" value="{{ $table->id }}">
                                <input type="hidden" name="status" value="cooking">
                                <button type="submit"
                                    class="px-4 py-2 mt-4 ml-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Enviar
                                    Comanda</button>
                            </form>
                        @endif
                        @if (count($items) > 0)
                            <form action="{{ route('invoiceBill') }}" method="post">
                                @csrf
                                <input type="hidden" name="type_invoice" value="site">
                                <input type="hidden" name="table_id" value="{{ $table->id }}">
                                <input type="hidden" name="items[]" value="{{ json_encode($items) }}">
                                <button type="submit"
                                    class="px-4 py-2 mt-4 ml-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Facturar</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
