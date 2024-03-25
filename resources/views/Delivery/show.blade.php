



@extends('layouts.partials.header')
@section('title', 'Mesa')
@section('content-main')
    <div class="flex flex-col flex-1 w-full">
        <main class="h-full overflow-y-auto p-4">
            <h1 class="text-3xl font-semibold">Informacion delivery</h1>
            <div class="flex items-center justify-between mt-4">
                <div class="flex items-center space-x-4">
                    
                    <div>
                        <p class="text-xl font-semibold">Nombre:{{ $delivery->client->name }}</h1>
                        <p class="text-sm text-gray-500">direccion {{ $delivery->address }}</p>
                        <p class="text-sm text-gray-500">telefono {{ $delivery->cellphone }}</p>
                    </div>
                </div>
                
            </div>



            @foreach ($items as $status => $statusItems )
                <h3 class="text-2xl font-semibold mt-4">{{ ucfirst($status) }}</h3>
                <ul>
                    @foreach ($statusItems as $item)
                        <li
                            class="sm:col-span-4 md:col-span-4 lg:col-span-4 xl:col-span-4  divide-y divide-gray-200 rounded-lg bg-white shadow dark:bg-gray-700">
                            <div class="flex w-full items-center justify-between space-x-6 p-6">
                                <div class="flex-1 truncate">
                                    <div class="flex items-center space-x-3">
                                        <h3 class="truncate text-sm font-medium text-gray-900 text-4xl dark:text-gray-300">
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
                                        case 'delivery':
                                            $statusClass = 'bg-green-500';
                                            break;
                                    }
                                @endphp

                                <span
                                    class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-medium {{ $statusClass }} text-white">{{ $item['status'] }}</span>
                                <img src="data:image/jpeg;base64,{{ $item['image'] }}" alt="Imagen del producto"
                                    class="mx-auto h-28 w-28 object-cover">
                            </div>

                        </li>
                    @endforeach
                </ul>
            @endforeach
        </main>
    </div>
@endsection
