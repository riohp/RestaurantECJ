@extends('layouts.partials.header')
@section('title', 'Crear domicilio')
@section('content-main')


    <div class="container grid p-6 mx-auto">
        <div class="flex items-center justify-between w-full mb-6">
            <h4 class="text-xl font-semibold">
                Cosina
            </h4>
            <ol aria-label="Breadcrumb" class="hidden md:flex items-center whitespace-nowrap min-w-0 gap-2">
                <li class="text-sm">
                    <a href="#" class="flex items-center gap-2 align-middle text-default-800 transition-all leading-none hover:text-purple-500">
                        Cosina
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-right" class="lucide lucide-chevron-right w-4 h-4"><path d="m9 18 6-6-6-6"></path></svg>
                    </a>
                </li>

                <li aria-current="page" class="text-sm font-medium text-purple-600 truncate leading-none hover:text-primary-500">
                    Cosina
                </li>
            </ol>
        </div>
        <div class="grid xl:grid-cols-12 gap-6">
            <div class="xl:col-span-12">
                <div class="space-y-6">
                    <div class="grid lg:grid-cols-2 sm:grid-cols-2 gap-6">
                        <div class="rounded-lg p-6 bg-white overflow-hidden shadow-xl">
                            <div class="flex items-center gap-4">
                                <div class="inline-flex items-center justify-center rounded-full bg-purple-600/20 text-purple-600 h-16 w-16 hover:p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="banknote" class="lucide lucide-banknote h-8 w-8"><rect width="20" height="12" x="2" y="6" rx="2"></rect><circle cx="12" cy="12" r="2"></circle><path d="M6 12h.01M18 12h.01"></path></svg>
                                </div>
                                <div class="">
                                    <p class="text-base text-gray-500 font-medium mb-1">Cocina</p>
                                    <h4 class="text-2xl text-gray-950 font-semibold mb-2">Cocina general</h4>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-lg p-6 bg-white overflow-hidden shadow-xl hover:bg-yellow-100 transition-all">
                            <div class="flex items-center gap-4">
                                <div class="inline-flex items-center justify-center rounded-full bg-green-500/20 text-green-500 h-16 w-16 p-2">
                                    <img src="https://media.tenor.com/A6UvTmALahUAAAAi/star-wink.gif">
                                </div>
                                <div class="">
                                    <p class="text-base text-gray-500 font-medium mb-1">Estado</p>
                                    <h4 class="text-2xl text-gray-950 font-semibold mb-2">Funcionado</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1">
                        <div class="border rounded-lg border-default-200 bg-white">
                            <div class="p-6 overflow-hidden ">
                                <div class="flex flex-wrap md:flex-nowrap items-center justify-between gap-4">
                                    <h2 class="text-xl text-default-800 font-semibold">Pedidos</h2>
                                </div>
                            </div>

                            <div class="relative overflow-x-auto">
                                <div class="min-w-full inline-block align-middle">
                                    <div class="grid grid-cols-4 p-4">
                                        <div class="border border-gray-100 shadow-md rounded-lg">
                                            <div class="p-6">
                                                <div class="mb-6">
                                                    <h2 class="text-xl text-default-800 font-semibold mb-4">Mesa 1</h2>
                                                </div>
                                                <div class="mb-6">
                                                    <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
                                                        <div>
                                                            <h2 class="text-xl text-default-800 font-semibold mb-0.5">Plato chino</h2>
                                                            <p class="text-xs text-default-400 font-medium">6.25 PM</p>
                                                        </div>
                                                        <a href="#" class="inline-flex items-center justify-center group gap-2 border border-green-500 text-green-500 text-sm font-medium rounded-full py-1.5 px-3 transition-all duration-300 hover:bg-green-500 hover:text-white">YA ESTA LISTO!</a>
                                                    </div><!-- end flex -->
                                                    <div class="flex flex-col gap-4">
                                                        <div class="flex items-center gap-4 bg-primary/10 p-2 rounded-lg">
                                                            <div class="h-16 w-16">
                                                                <img src="https://coderthemes.com/yum/assets/rice-fc6759e0.png">
                                                            </div>
                                                            <div class="">
                                                                <h6 class="text-base font-medium text-default-900 mb-1">Arroz Naranja</h6>
                                                                <p class="text-default-600 font-medium">x1</p>
                                                            </div>
                                                        </div><!-- end offer-item -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <a href="{{ route('cooking.index') }}" class="btn btn-primary">Volver</a>--}}
{{--            <div class="col-md-8 offset-md-2">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Cocina</div>--}}
{{--                    <div class="card-body">--}}
{{--                        <p><strong>Nombre:</strong> {{ $cooking->name }}</p>--}}
{{--                        <p><strong>Ubicación:</strong> {{ $cooking->location }}</p>--}}
{{--                        <p><strong>Estado:</strong> {{ $cooking->status ? 'Activo' : 'Inactivo' }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            @if ($products->isNotEmpty())--}}
{{--                <table>--}}
{{--                    <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Nombre del Producto</th>--}}
{{--                            <th>Imagen del Producto</th>--}}
{{--                            <th>Nombre de la Mesa</th>--}}
{{--                            <th>boton</th>--}}
{{--                        </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                        @foreach ($products as $product)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $product->product->name }}</td>--}}
{{--                                <td>--}}
{{--                                    <img src="data:image/jpeg;base64,{{$product->product->image}}" alt="imagen del producto" width="100">               --}}
{{--                                </td>--}}
{{--                                <td>{{ $product->table->nombre }}</td>--}}
{{--                                <td>--}}
{{--                                    <form action="{{ route('tablesProduct.updateStatus') }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="table_id" value="{{ encrypt($product->table->id) }}">--}}
{{--                                        <input type="hidden" name="product_id" value="{{ encrypt($product->product->id) }}">--}}
{{--                                        <input type="hidden" name="cooking_id" value="{{ encrypt($cooking->id) }}">--}}
{{--                                        <input type="hidden" name="status" value="table">--}}
{{--                                        <button type="submit" class="btn btn-primary">Cambiar Estado</button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            @else--}}
{{--                <p>No hay productos registrados.</p>--}}
{{--            @endif--}}

{{--        </div>--}}
{{--        <div class="row">--}}
{{--            @if ($products_delivery->isNotEmpty())--}}
{{--                <table>--}}
{{--                    <thead>--}}
{{--                        <tr>--}}
{{--                            <th>Nombre del Producto</th>--}}
{{--                            <th>Imagen del Producto</th>--}}
{{--                            <th>id del pedido</th>--}}
{{--                            <th>boton</th>--}}
{{--                        </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                        @foreach ($products_delivery as $product_delivery)--}}
{{--                            <tr>--}}
{{--                                <td>{{ $product_delivery->product->name }}</td>--}}
{{--                                <td>--}}
{{--                                    <img src="data:image/jpeg;base64,{{$product_delivery->product->image}}" alt="imagen del producto" width="100">               --}}
{{--                                </td>--}}
{{--                                <td>{{ $product_delivery->delivery->id }}</td>--}}
{{--                                <td>--}}
{{--                                    <form action="{{ route('deliverysProduct.updateStatus') }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="deliveries_id" value="{{ $product_delivery->delivery->id }}">--}}
{{--                                        <input type="hidden" name="product_id" value="{{ $product_delivery->product->id }}">--}}
{{--                                        <input type="hidden" name="cooking_id" value="{{ $cooking->id }}">--}}
{{--                                        <input type="hidden" name="status" value="prepared">--}}
{{--                                        <button type="submit" class="btn btn-primary">Cambiar Estado</button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            @else--}}
{{--                <p>No hay productos registrados.</p>--}}
{{--            @endif--}}

{{--        </div>--}}
{{--    </div>--}}
@endsection
