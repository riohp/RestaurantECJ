@extends('layouts.partials.header')

@section('title', 'Detalles del Usuario')

@section('content-main')
    <div class="p-6 font-sans">
{{--  contenedor inforamtivo--}}
        <div class="flex items-center justify-between w-full mb-6">
            <h4 class="text-xl font-medium dark:text-white">Detalles Empleado</h4>
        </div>
{{--        contendor de informacion--}}
        <div class="grid lg:grid-cols-3 grid-cols-1 gap-6">
{{--            informacion del usuario--}}
            <div class="lg:col-span-1">
                <div class="p-6 rounded-lg border dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <img src="https://coderthemes.com/yum/assets/avatar4-8547565a2.png" alt="" class="w-24 h-24 rounded-full p-1 border border-gray-200 bg-gray-100 dark:bg-gray-700 dark:border-gray-600">
                        <button
                            onclick="window.location='{{ route('users.edit', $user->id) }}'"
                            class="flex items-center justify-center gap-2 rounded-full bg-purple-700 px-6 py-2.5 text-center text-sm transition-all duration-200 hover:bg-purple-400 text-white">
                            <i class="fa-regular fa-pen-to-square"></i>
                            Editar
                        </button>
                    </div>
                    <h4 class="mb-1 mt-3 text-lg dark:text-white">{{$user->name}}</h4>
                    <div class="text-start mt-6">
                        <p class="text-zinc-400 mb-3">
                            <strong>Nombre Completo: </strong>
                            <span class="ms-2">{{$user->name}}</span>
                        </p>
                        <p class="text-zinc-400 mb-3">
                            <strong>Email: </strong>
                            <span class="ms-2 ">{{$user->email}}</span>
                        </p>
                        <p class="text-zinc-400 mb-3">
                            <strong>Rol Empleado: </strong>
                            <span class="ms-2">{{ $user->role == 'admin' ? 'Administrador' : ($user->role == 'cashier' ? 'Cajero' : 'Mesero') }}</span>
                        </p>
                    </div>

                </div>
            </div>
{{--            informacion de las ultimas ordenes--}}
            <div class="lg:col-span-2">
                <div class="border rounded-lg dark:border-gray-700">
                    <div class="px-6 py-4">
                        <div class="flex flex-wrap justify-between items-center gap-6">
                            <h4 class="text-xl font-medium text-default-900 dark:text-white">Hostorial De Ordenes</h4>
                        </div>
                    </div>
{{--                    tabla del historial de ordenes--}}
                    <div class="overflow-x-auto">
                        <div class="min-w-full inline-block align-middle">
                            <div class="rounded-lg divide-y divide-default-200">
                                <div class="overflow-hidden">
                                    <table class="min-w-full divide-y dark:divide-gray-700">
                                        <thead class="bg-gray-100 dark:bg-gray-800">
                                        <tr class="text-start dark:text-white">
                                            <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Fecha</th>
                                            <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Orden ID</th>
                                            <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800">Total</th>
                                            <th class="px-6 py-3 text-start text-sm whitespace-nowrap font-medium text-default-800 min-w-[10rem]">Estado</th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y dark:divide-gray-700">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">01/Sep/22</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">#4357</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">$45.240</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-yellow-500/20 text-yellow-500">Pendiente</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">01/Sep/22</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">#4358</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">$50.340</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-green-500/20 text-green-500">Pago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">04/Sep/22</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">#4360</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">$34.210</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-red-500/20 text-red-500">Cencelado</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">04/Sep/22</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">#4359</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">$25.000</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-green-500/20 text-green-500">Pago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">07/Sep/22</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">#4361</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">$49.200</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-amber-500/20 text-amber-500">Pendiente</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">10/Sep/22</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">#4362</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">$24.190</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-amber-500/20 text-amber-500">Pendiente</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">12/Sep/22</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">#4363</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">$15.430</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-green-500/20 text-green-500">Pago</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">31/Ago/22</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">#4356</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">$28.990</td>
                                            <td class="px-6 py-4">
                                                <span class="inline-flex items-center gap-1 py-1 px-4 rounded-full text-sm font-medium bg-green-500/20 text-green-500">Pago</span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
