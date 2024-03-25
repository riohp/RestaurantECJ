@extends('layouts.partials.header')
@section('title', 'Factura')
@section('content-main')
<h2 class="text-3xl font-bold tracking-tight dark:text-gray-200 sm:text-4xl m-7 text-center">Factura</h2>
    <div class="flex mt-20 w-full items-center justify-center dark:bg-gray-600">

        <div class="w-96 rounded bg-gray-50 px-6 pt-8 shadow-lg border border-gray-200 dark:border-gray-400">

            <a href="{{ route('invoice.index') }}" class="btn btn-primary">Volver</a>
            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="chippz"
                class="mx-auto w-16 py-4" />
            <div class="flex flex-col justify-center items-center gap-2">
                <h4 class="font-semibold text-2xl">Restaurante ecj</h4>
                <p class="text-lg">Calle 19</p>
            </div>
            <div class="flex flex-col gap-3 border-b py-6 text-xs">
                <p class="flex justify-between">
                    <span class="text-gray-400 font-semibold text-lg">ID factura:</span>
                    <span class="text-lg">{{ $invoice->id }}</span>
                </p>
                <p class="flex justify-between">
                    <span class="text-gray-400 font-semibold text-lg">Tipo Pedido:</span>
                    <span class="text-lg"> {{ $invoice->tipo }}</span>
                </p>
                <p class="flex justify-between">
                    <span class="text-gray-400 font-semibold text-lg">Facturo:</span>
                    <span class="text-lg">{{ $invoice->responsible->name }}</span>
                </p>
                <p class="flex justify-between">
                    <span class="text-gray-400 font-semibold text-lg">Fecha :</span>
                    <span class="text-lg">{{ $invoice->created_at }}</span>
                </p>
            </div>
            <div class="flex flex-col gap-3 pb-6 pt-2 text-xs">
                <table class="w-full text-left">
                    <thead>
                        <tr class="flex">
                            <th class="w-52 py-2 font-semibold text-lg">Product</th>
                            <th class="min-w-[50px] py-2 font-semibold text-lg">cant</th>
                            <th class="min-w-[44px] py-2 font-semibold text-lg">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($invoice->items as $item)
                            <tr class="flex ">
                                <td class="flex-1 py-1 text-base"> {{ $item->product->name }}</td>
                                <td class="min-w-[53px] text-base">{{ $item->cant }}</td>
                                <td class="min-w-[60px] text-base">{{ $item->subTotal }}</td>
                            </tr>
                        @empty
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                >No hay items registrados a la factura.
                            </p>
                        @endforelse

                    </tbody>

                </table>
                <p class="text-lg"><strong>Total:</strong > {{ $invoice->total }}</p>
                <div class=" border-b border border-dashed"></div>
                <div class="py-4 justify-center items-center flex flex-col gap-2">
                    <p class="flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            viewBox="0 0 24 24" fill="none">
                            <path
                                d="M21.3 12.23h-3.48c-.98 0-1.85.54-2.29 1.42l-.84 1.66c-.2.4-.6.65-1.04.65h-3.28c-.31 0-.75-.07-1.04-.65l-.84-1.65a2.567 2.567 0 0 0-2.29-1.42H2.7c-.39 0-.7.31-.7.7v3.26C2 19.83 4.18 22 7.82 22h8.38c3.43 0 5.54-1.88 5.8-5.22v-3.85c0-.38-.31-.7-.7-.7ZM12.75 2c0-.41-.34-.75-.75-.75s-.75.34-.75.75v2h1.5V2Z"
                                fill="#000"></path>
                            <path
                                d="M22 9.81v1.04a2.06 2.06 0 0 0-.7-.12h-3.48c-1.55 0-2.94.86-3.63 2.24l-.75 1.48h-2.86l-.75-1.47a4.026 4.026 0 0 0-3.63-2.25H2.7c-.24 0-.48.04-.7.12V9.81C2 6.17 4.17 4 7.81 4h3.44v3.19l-.72-.72a.754.754 0 0 0-1.06 0c-.29.29-.29.77 0 1.06l2 2c.01.01.02.01.02.02a.753.753 0 0 0 .51.2c.1 0 .19-.02.28-.06.09-.03.18-.09.25-.16l2-2c.29-.29.29-.77 0-1.06a.754.754 0 0 0-1.06 0l-.72.72V4h3.44C19.83 4 22 6.17 22 9.81Z"
                                fill="#000"></path>
                        </svg> restaurante@gmail.com</p>
                    <p class="flex gap-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            viewBox="0 0 24 24" fill="none">
                            <path fill="#000"
                                d="M11.05 14.95L9.2 16.8c-.39.39-1.01.39-1.41.01-.11-.11-.22-.21-.33-.32a28.414 28.414 0 01-2.79-3.27c-.82-1.14-1.48-2.28-1.96-3.41C2.24 8.67 2 7.58 2 6.54c0-.68.12-1.33.36-1.93.24-.61.62-1.17 1.15-1.67C4.15 2.31 4.85 2 5.59 2c.28 0 .56.06.81.18.26.12.49.3.67.56l2.32 3.27c.18.25.31.48.4.7.09.21.14.42.14.61 0 .24-.07.48-.21.71-.13.23-.32.47-.56.71l-.76.79c-.11.11-.16.24-.16.4 0 .08.01.15.03.23.03.08.06.14.08.2.18.33.49.76.93 1.28.45.52.93 1.05 1.45 1.58.1.1.21.2.31.3.4.39.41 1.03.01 1.43zM21.97 18.33a2.54 2.54 0 01-.25 1.09c-.17.36-.39.7-.68 1.02-.49.54-1.03.93-1.64 1.18-.01 0-.02.01-.03.01-.59.24-1.23.37-1.92.37-1.02 0-2.11-.24-3.26-.73s-2.3-1.15-3.44-1.98c-.39-.29-.78-.58-1.15-.89l3.27-3.27c.28.21.53.37.74.48.05.02.11.05.18.08.08.03.16.04.25.04.17 0 .3-.06.41-.17l.76-.75c.25-.25.49-.44.72-.56.23-.14.46-.21.71-.21.19 0 .39.04.61.13.22.09.45.22.7.39l3.31 2.35c.26.18.44.39.55.64.1.25.16.5.16.78z">
                            </path>
                        </svg> +573004327658</p>
                </div>
                <form action="{{ route('invoice.generate') }}" method="POST">
                    @csrf
                    <input type="hidden" name="invoice" value="{{ $invoice->id }}">
                    <button type="submit"
                        class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Generar
                        Imprimir PDF</button>
                </form>
            </div>
        </div>
    </div>
@endsection
