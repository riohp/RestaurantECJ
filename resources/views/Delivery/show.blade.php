@extends('layouts.landingClient')
@section('title', 'Inicio')
@section('content-landing-client')
@extends('layouts.partials.headerClient')
    <div class="flex flex-col flex-1 w-full pt-20">
        <main class="h-full overflow-y-auto p-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <h1 class="text-3xl font-semibold mb-4 text-center">Información de entrega</h1>
                <div class="flex justify-between">
                    <div class="w-1/2">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 h-full">
                            <h2 class="text-2xl font-semibold mb-4">Datos Personales</h2>
                            <div class="mb-4">
                                <p class="text-sm text-gray-500">Nombre: {{ $delivery->client->name }}</p>
                                <p class="text-sm text-gray-500">Correo: {{ $delivery->client->email }}</p>
                                <p class="text-sm text-gray-500">Dirección: {{ $delivery->address }}</p>
                                <p class="text-sm text-gray-500">Teléfono: {{ $delivery->cellphone }}</p>
                            </div>
                            <div class="mt-auto">
                                <p class="text-lg font-semibold mb-2">Información de la entrega</p>
                                <p class="text-sm text-gray-500">Se realizó el pedido: {{ $delivery->created_at }}</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="w-1/2 ml-4">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                            <h2 class="text-xl font-semibold mb-4">Detalle del pedido</h2>
                            @foreach ($items as $status => $statusItems )
                                <h3 class="text-lg font-semibold">{{ ucfirst($status) }}</h3>
                                <div class="flex flex-wrap gap-4 mt-2">
                                    @foreach ($statusItems as $item)
                                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-4 flex items-center">
                                            <img src="data:image/jpeg;base64,{{ $item['image'] }}" alt="Imagen del producto" class="h-24 w-24 object-cover mr-4">
                                            <div>
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $item['name'] }}</h3>
                                                <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Subtotal: {{ $item['subtotal'] }}</p>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $status === 'cooking' ? 'bg-orange-500' : ($status === 'process' ? 'bg-blue-500' : 'bg-green-500') }} text-white">{{ $item['status'] }}</span>
                                                <p> Cantidad: {{ $item['quantity'] }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
