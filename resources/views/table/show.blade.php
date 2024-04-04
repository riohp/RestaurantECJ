@extends('layouts.partials.header')
@section('title', 'Mesa')
@section('content-main')
    <div class="p-6">
        <div class="flex items-center justify-start w-full mb-6">
            <h4 class="text-2xl font-bold">Ordenar</h4>
        </div>
        <div class="grid xl:grid-cols-12 gap-6">
            <div class="xl:col-span-8">
                <div class="space-y-6">
                    <div class="grid-cols-1">
                        <div class="rounded-lg bg-gray-100/50 border border-gray-100">
                            @isset($categories)
                            <div class="px-6 pt-6 overflow-hidden">
                                <div class="flex flex-wrap md:flex-nowrap items-center justify-start">
                                    <h2 class="text-xl text-gray-900 font-semibold bg-orange-400 px-5 py-1.5 rounded-full">Categorias</h2>
                                </div>
                            </div>
                            <div class="relative overflow-x-auto">
                                <div class="min-w-full inline-block align-middle">
                                    <div class="p-6 overflow-hidden">
                                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                            @foreach ($categories as $category)
                                                <form action="{{ route('table.show', ['id_table' => encrypt($table->id), 'id_category' => encrypt($category->id)]) }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="bg-white p-11 shadow-md rounded-lg hover:bg-orange-100 transition-all border hover:border-orange-500 w-full h-full">
                                                        <img src="https://coderthemes.com/yum/assets/burger-ac2b9f02.svg" alt="Categoria"
                                                             class=" mb-6 w-full object-cover">
                                                        <span class="border-t pt-2 border-orange-500 text-sm font-semibold text-gray-900">{{$category->name}}</span>
                                                    </button>
                                                </form>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endisset

                            @isset($products)
                                <div class="px-6 pt-6 overflow-hidden">
                                    <div class="flex flex-wrap md:flex-nowrap items-center justify-start">
                                        <h2 class="text-xl text-white font-semibold bg-orange-600 px-5 py-1.5 rounded-full">{{$categoryName}}</h2>
                                    </div>
                                </div>
                                <div class="relative overflow-x-auto">
                                    <div class="min-w-full inline-block align-middle">
                                        <div class="p-6 overflow-hidden">
                                            <div class="grid grid-cols-2 md:grid-cols-6 gap-3">
                                                @foreach($products as $product)
                                                    <form action="{{ route('tablesProduct.store') }}" method="post">
                                                        @csrf
                                                        <input value="{{ encrypt($table->id) }}" type="hidden" name="table_id">
                                                        <input value="{{ encrypt($product->id) }}" type="hidden" name="product_id">
                                                        <input value="{{ encrypt($product->category_id) }}" type="hidden" name="category_id">
                                                        <button type="submit" class="bg-white p-6 border-none shadow-sm rounded-3xl hover:bg-orange-100 transition-all border hover:border-orange-500 w-full h-full">
                                                            <img src="data:image/jpeg;base64,{{ $product->image }}" alt="{{$product->name}}.img"
                                                                 class="object-cover">
                                                            <span class="text-sm font-semibold text-gray-900">{{$product->name}} <br></span>
                                                            <span class="text-sm font-semibold text-purple-600">$ {{$product->price}}</span>
                                                        </button>
                                                    </form>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
            <div class="xl:col-span-4">
                <div class="border border-gray-200 rounded-lg bg-white">
                    <div class="p-6">
                        <div class="bg-purple-600 px-5 py-1.5 rounded-lg mb-4">
                            <h2 class="text-xl text-white font-semibold">Mesa No.</h2>
                        </div>
                        <div class="bg-green-500/90 px-5 py-1.5 rounded-md inline-block mb-6">
                            <p class="text-sm text-white font-semibold">Cenar</p>
                        </div>
                        <div class="max-h-80 h-80 overflow-y-auto">
                            <table class="min-w-full">
                                <thead>
                                    <tr class="text-start">
                                        <th class="text-left text-xm font-bold text-gray-900">Producto</th>
                                        <th class="text-left text-xm font-bold text-gray-900">Cant.</th>
                                        <th class="text-left text-xm font-bold text-gray-900">Precio</th>
                                        <th class="text-left text-xm font-bold text-gray-900"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $status => $statusItems)
                                    <h3 class="text-2xl font-semibold mt-4 dark:text-gray-200">{{ ucfirst($status) }}</h3>
                                    @foreach($statusItems as $item)
                                        <tr>
                                            <td class="pt-4">
                                                <div class="flex items-center">
                                                    <div>
                                                        <p class="font-medium text">{{$item['name']}}</p>
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
                                                        <span class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium {{ $statusClass }} text-white">{{ $item['status'] }}</span>
{{--                                                        <p class="text-xs font-medium text-purple-600 dark:text-gray-400">Importe ${{$item['price']}}</p>--}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pt-4">
                                                <div class="bg-purple-600  gap-4 px-2 py-1 inline-block rounded-md">
                                                    <div class="flex justify-items-center gap-3">
                                                        <form method="POST" action="{{ route('tablesProduct.destroy') }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" value=" {{ encrypt( $item['id']) }}"
                                                                   name="product_id">
                                                            <input type="hidden" value="{{ encrypt( $table->id) }}"
                                                                   name="table_id">
                                                            <input type="hidden" name="category_id"
                                                                   value="{{ encrypt( $item['category_id']) }}">
                                                            <button class="text-white hover:text-red-500 focus:outline-none transition-all">
                                                                -
                                                            </button>
                                                        </form>

                                                        <p class="font-medium text-white">{{$item['quantity']}}</p>
                                                        <button class="text-white hover:text-green-400 focus:outline-none transition-all">
                                                            +
                                                        </button>
                                                    </div>
                                                </div>
                                            </td >
                                            <td class="pt-4">
                                                <p class="font-semibold text">${{$item['subtotal']}}</p>
                                            </td>
                                            <td class="pt-4">
                                                <div class="flex items-center space-x-3 text-xl">
                                                    <button class="text-green-400 hover:text-green-500 focus:outline-none transition-all">
                                                        <i class="fa-solid fa-percent"></i>
                                                    </button>
                                                    <form method="POST" action="{{ route('tablesProduct.destroy') }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" value=" {{ encrypt( $item['id']) }}"
                                                               name="product_id">
                                                        <input type="hidden" value="{{ encrypt( $table->id) }}"
                                                               name="table_id">
                                                        <input type="hidden" name="category_id"
                                                               value="{{ encrypt( $item['category_id']) }}">
                                                        <button id="deleteButton" class="text-red-500 hover:text-red-700 focus:outline-none transition-all">
                                                            <i class="fa-regular fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <input class="text-sm block w-full border-b-2 border-gray-200 focus:outline-none" placeholder="Añadir intrucciones de cocina(Nota)">
                        </div>
                    </div>
                    <div class="bg-purple-100/50 h-auto p-6 rounded-b-lg">
                        <div class="flex justify-between">
                            <p class="font-medium">Sub Total</p>
                            <p class="font-medium">${{$total}}</p>
                        </div>
                        <div class="flex justify-between">
                            <p class="font-medium">Descuento</p>
                            <p class="font-medium">$0</p>
                        </div>
                        <div class="flex items-center mb-4 mt-2">
                            <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 rounded focus:ring-purple-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Todo esta correcto</label>
                        </div>
                        <div class="flex justify-between mb-6">
                            <p class="font-bold text-xl">Total a pagar</p>
                            <p class="font-bold text-xl">${{$total}}</p>
                        </div>
                        <div class="flex justify-center gap-3">
                            <form action="{{ route('invoiceBill') }}" method="post">
                                @csrf
                                <input type="hidden" name="table_id" value="{{ encrypt($table->id) }}">
                                <div @if (count($items) <= 0)class=" hidden "@endif>
                                    <button @if (count($items) <= 0) type="submit" disabled @endif disabled  id="btn_pay"  class="flex items-center justify-center gap-2 rounded-md bg-gray-500 px-6 py-2.5 text-center text-2xl font-semibold text-white shadow-sm transition-all duration-200 hover:bg-gray-500">
                                        Pagar
                                    </button>
                                </div>
                            </form>
                            <form action="{{ route('tablesProduct.updateStatusItems') }}" method="post">
                                @csrf
                                <input type="hidden" name="table_id" value="{{ encrypt($table->id) }}">
                                <input type="hidden" name="status" value="cooking">
                                <button  @if (count($items) <= 0) type="submit" disabled @endif class="flex items-center justify-center gap-2 rounded-md bg-purple-600 px-6 py-2.5 text-center text-2xl font-semibold text-white shadow-sm transition-all duration-200 hover:bg-purple-500">
                                    Enviar a cocinas
                                </button>
                            </form>
                        </div>
                        @if ($message = Session::get('error'))
                            <div>
                                <p class="text-blue-600">{{ $message }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const btn_pay = document.getElementById('btn_pay');
        const default_checkbox = document.getElementById('default-checkbox');
        default_checkbox.addEventListener('change', () => {
            if (default_checkbox.checked) {
                btn_pay.disabled = false;
                btn_pay.classList.remove('bg-gray-500');
                btn_pay.classList.add('bg-purple-600');
                btn_pay.classList.remove('hover:bg-gray-500');
                btn_pay.classList.add('hover:bg-purple-500');
            } else {
                btn_pay.disabled = true;
                btn_pay.classList.remove('bg-purple-600');
                btn_pay.classList.add('bg-gray-500');
                btn_pay.classList.remove('hover:bg-purple-500');
                btn_pay.classList.add('hover:bg-gray-500');
            }
        });
    </script>
@endsection
