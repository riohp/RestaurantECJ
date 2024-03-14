@extends('layouts.partials.header')
@section('title', 'Mesa')
@section('content-main')
    <div class="flex flex-col flex-1 w-full">
        <main class="h-full overflow-y-auto p-4">
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
                <!-- Primera sección -->
                <div class="col-span-1 bg-gray-600">
                    <!-- Subsección 1 -->
                    <div class="bg-gray-800 p-4 mb-4">
                        <!-- Contenido de la subsección 1 -->
                        <p>Subsección 1</p>
                    </div>
                    <!-- Subsección 2 -->
                    <div class="bg-gray-700 p-4 mb-4">
                        <!-- Contenido de la subsección 2 -->
                        <p>Subsección 2</p>
                    </div>
                    <!-- Subsección 3 -->
                    <div class="bg-gray-600 p-4">
                        <!-- Contenido de la subsección 3 -->
                        <p>Subsección 3</p>
                    </div>
                </div>

                <!-- Segunda sección -->
                <div class="col-span-1 bg-gray-400">
                    <!-- Contenido de la segunda sección -->
                    <p>Contenido de la segunda sección</p>
                </div>

                <!-- Tercera sección -->
                <div class="col-span-1 bg-gray-200">
                    <section>
                        <div class="py-1">
                            <div class="mx-auto px-6 max-w-6xl text-gray-500">
                                <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-2 gap-2">

                                    <div
                                        class="relative group overflow-hidden p-8 rounded-xl bg-white border border-gray-200 dark:border-gray-800 dark:bg-gray-900">
                                        <div aria-hidden="true"
                                            class="inset-0 absolute aspect-video border rounded-full -translate-y-1/2 group-hover:-translate-y-1/4 duration-300 bg-gradient-to-b from-blue-500 to-white dark:from-white dark:to-white blur-2xl opacity-25 dark:opacity-5 dark:group-hover:opacity-10">
                                        </div>
                                        <div class="relative">
                                            <div
                                                class="border border-blue-500/10 flex relative *:relative *:size-6 *:m-auto size-12 rounded-lg dark:bg-gray-900 dark:border-white/15 before:rounded-[7px] before:absolute before:inset-0 before:border-t before:border-white before:from-blue-100 dark:before:border-white/20 before:bg-gradient-to-b dark:before:from-white/10 dark:before:to-transparent before:shadow dark:before:shadow-gray-950">
                                                <svg class="text-[#000014] dark:text-white"
                                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    viewBox="0 0 128 128">
                                                    <defs>
                                                        <linearGradient id="deviconAstro0" x1="882.997" x2="638.955"
                                                            y1="27.113" y2="866.902" gradientTransform="scale(.1)"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop offset="0" stop-color="currentColor"></stop>
                                                            <stop offset="1" stop-color="currentColor"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="deviconAstro1" x1="1001.68" x2="790.326"
                                                            y1="652.45" y2="1094.91" gradientTransform="scale(.1)"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop offset="0" stop-color="#ff1639"></stop>
                                                            <stop offset="1" stop-color="#ff1639" stop-opacity="0">
                                                            </stop>
                                                        </linearGradient>
                                                    </defs>
                                                    <path fill="url(#deviconAstro0)"
                                                        d="M81.504 9.465c.973 1.207 1.469 2.836 2.457 6.09l21.656 71.136a90.079 90.079 0 0 0-25.89-8.765L65.629 30.28a1.833 1.833 0 0 0-3.52.004L48.18 77.902a90.104 90.104 0 0 0-26.003 8.778l21.758-71.14c.996-3.25 1.492-4.876 2.464-6.083a8.023 8.023 0 0 1 3.243-2.398c1.433-.575 3.136-.575 6.535-.575H71.72c3.402 0 5.105 0 6.543.579a7.988 7.988 0 0 1 3.242 2.402Zm0 0">
                                                    </path>
                                                    <path fill="#ff5d01"
                                                        d="M84.094 90.074c-3.57 3.055-10.696 5.137-18.903 5.137c-10.07 0-18.515-3.137-20.754-7.356c-.8 2.418-.98 5.184-.98 6.954c0 0-.527 8.675 5.508 14.71a5.671 5.671 0 0 1 5.672-5.671c5.37 0 5.367 4.683 5.363 8.488v.336c0 5.773 3.527 10.719 8.543 12.805a11.62 11.62 0 0 1-1.172-5.098c0-5.508 3.23-7.555 6.988-9.938c2.989-1.894 6.309-4 8.594-8.222a15.513 15.513 0 0 0 1.875-7.41a15.55 15.55 0 0 0-.734-4.735m0 0">
                                                    </path>
                                                    <path fill="url(#deviconAstro1)"
                                                        d="M84.094 90.074c-3.57 3.055-10.696 5.137-18.903 5.137c-10.07 0-18.515-3.137-20.754-7.356c-.8 2.418-.98 5.184-.98 6.954c0 0-.527 8.675 5.508 14.71a5.671 5.671 0 0 1 5.672-5.671c5.37 0 5.367 4.683 5.363 8.488v.336c0 5.773 3.527 10.719 8.543 12.805a11.62 11.62 0 0 1-1.172-5.098c0-5.508 3.23-7.555 6.988-9.938c2.989-1.894 6.309-4 8.594-8.222a15.513 15.513 0 0 0 1.875-7.41a15.55 15.55 0 0 0-.734-4.735m0 0">
                                                    </path>
                                                </svg>
                                            </div>

                                            <div class="mt-6 pb-6 rounded-b-[--card-border-radius]">
                                                <p class="text-gray-700 dark:text-gray-300">Amet praesentium deserunt ex
                                                    commodi tempore fuga voluptatem. Sit, sapiente.</p>
                                            </div>

                                            <div
                                                class="flex gap-3 -mb-8 py-4 border-t border-gray-200 dark:border-gray-800">
                                                <a href="#" download="/"
                                                    class="group rounded-xl disabled:border *:select-none [&>*:not(.sr-only)]:relative *:disabled:opacity-20 disabled:text-gray-950 disabled:border-gray-200 disabled:bg-gray-100 dark:disabled:border-gray-800/50 disabled:dark:bg-gray-900 dark:*:disabled:!text-white text-gray-950 bg-gray-100 hover:bg-gray-200/75 active:bg-gray-100 dark:text-white dark:bg-gray-500/10 dark:hover:bg-gray-500/15 dark:active:bg-gray-500/10 flex gap-1.5 items-center text-sm h-8 px-3.5 justify-center">
                                                    <span>Download</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m17 13l-5 5m0 0l-5-5m5 5V6"></path>
                                                    </svg>
                                                </a>
                                                <a href="#"
                                                    class="group flex items-center rounded-xl disabled:border *:select-none [&>*:not(.sr-only)]:relative *:disabled:opacity-20 disabled:text-gray-950 disabled:border-gray-200 disabled:bg-gray-100 dark:disabled:border-gray-800/50 disabled:dark:bg-gray-900 dark:*:disabled:!text-white text-gray-950 bg-gray-100 hover:bg-gray-200/75 active:bg-gray-100 dark:text-white dark:bg-gray-500/10 dark:hover:bg-gray-500/15 dark:active:bg-gray-500/10 size-8 justify-center">
                                                    <span class="sr-only">Source Code</span>
                                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                        height="1em" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33c.85 0 1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                     <div
                                        class="relative group overflow-hidden p-8 rounded-xl bg-white border border-gray-200 dark:border-gray-800 dark:bg-gray-900">
                                        <div aria-hidden="true"
                                            class="inset-0 absolute aspect-video border rounded-full -translate-y-1/2 group-hover:-translate-y-1/4 duration-300 bg-gradient-to-b from-blue-500 to-white dark:from-white dark:to-white blur-2xl opacity-25 dark:opacity-5 dark:group-hover:opacity-10">
                                        </div>
                                        <div class="relative">
                                            <div
                                                class="border border-blue-500/10 flex relative *:relative *:size-6 *:m-auto size-12 rounded-lg dark:bg-gray-900 dark:border-white/15 before:rounded-[7px] before:absolute before:inset-0 before:border-t before:border-white before:from-blue-100 dark:before:border-white/20 before:bg-gradient-to-b dark:before:from-white/10 dark:before:to-transparent before:shadow dark:before:shadow-gray-950">
                                                <svg class="text-[#000014] dark:text-white"
                                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    viewBox="0 0 128 128">
                                                    <defs>
                                                        <linearGradient id="deviconAstro0" x1="882.997" x2="638.955"
                                                            y1="27.113" y2="866.902" gradientTransform="scale(.1)"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop offset="0" stop-color="currentColor"></stop>
                                                            <stop offset="1" stop-color="currentColor"></stop>
                                                        </linearGradient>
                                                        <linearGradient id="deviconAstro1" x1="1001.68" x2="790.326"
                                                            y1="652.45" y2="1094.91" gradientTransform="scale(.1)"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop offset="0" stop-color="#ff1639"></stop>
                                                            <stop offset="1" stop-color="#ff1639" stop-opacity="0">
                                                            </stop>
                                                        </linearGradient>
                                                    </defs>
                                                    <path fill="url(#deviconAstro0)"
                                                        d="M81.504 9.465c.973 1.207 1.469 2.836 2.457 6.09l21.656 71.136a90.079 90.079 0 0 0-25.89-8.765L65.629 30.28a1.833 1.833 0 0 0-3.52.004L48.18 77.902a90.104 90.104 0 0 0-26.003 8.778l21.758-71.14c.996-3.25 1.492-4.876 2.464-6.083a8.023 8.023 0 0 1 3.243-2.398c1.433-.575 3.136-.575 6.535-.575H71.72c3.402 0 5.105 0 6.543.579a7.988 7.988 0 0 1 3.242 2.402Zm0 0">
                                                    </path>
                                                    <path fill="#ff5d01"
                                                        d="M84.094 90.074c-3.57 3.055-10.696 5.137-18.903 5.137c-10.07 0-18.515-3.137-20.754-7.356c-.8 2.418-.98 5.184-.98 6.954c0 0-.527 8.675 5.508 14.71a5.671 5.671 0 0 1 5.672-5.671c5.37 0 5.367 4.683 5.363 8.488v.336c0 5.773 3.527 10.719 8.543 12.805a11.62 11.62 0 0 1-1.172-5.098c0-5.508 3.23-7.555 6.988-9.938c2.989-1.894 6.309-4 8.594-8.222a15.513 15.513 0 0 0 1.875-7.41a15.55 15.55 0 0 0-.734-4.735m0 0">
                                                    </path>
                                                    <path fill="url(#deviconAstro1)"
                                                        d="M84.094 90.074c-3.57 3.055-10.696 5.137-18.903 5.137c-10.07 0-18.515-3.137-20.754-7.356c-.8 2.418-.98 5.184-.98 6.954c0 0-.527 8.675 5.508 14.71a5.671 5.671 0 0 1 5.672-5.671c5.37 0 5.367 4.683 5.363 8.488v.336c0 5.773 3.527 10.719 8.543 12.805a11.62 11.62 0 0 1-1.172-5.098c0-5.508 3.23-7.555 6.988-9.938c2.989-1.894 6.309-4 8.594-8.222a15.513 15.513 0 0 0 1.875-7.41a15.55 15.55 0 0 0-.734-4.735m0 0">
                                                    </path>
                                                </svg>
                                            </div>

                                            <div class="mt-6 pb-6 rounded-b-[--card-border-radius]">
                                                <p class="text-gray-700 dark:text-gray-300">Amet praesentium deserunt ex
                                                    commodi tempore fuga voluptatem. Sit, sapiente.</p>
                                            </div>

                                            <div
                                                class="flex gap-3 -mb-8 py-4 border-t border-gray-200 dark:border-gray-800">
                                                <a href="#" download="/"
                                                    class="group rounded-xl disabled:border *:select-none [&>*:not(.sr-only)]:relative *:disabled:opacity-20 disabled:text-gray-950 disabled:border-gray-200 disabled:bg-gray-100 dark:disabled:border-gray-800/50 disabled:dark:bg-gray-900 dark:*:disabled:!text-white text-gray-950 bg-gray-100 hover:bg-gray-200/75 active:bg-gray-100 dark:text-white dark:bg-gray-500/10 dark:hover:bg-gray-500/15 dark:active:bg-gray-500/10 flex gap-1.5 items-center text-sm h-8 px-3.5 justify-center">
                                                    <span>Download</span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        viewBox="0 0 24 24">
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m17 13l-5 5m0 0l-5-5m5 5V6"></path>
                                                    </svg>
                                                </a>
                                                <a href="#"
                                                    class="group flex items-center rounded-xl disabled:border *:select-none [&>*:not(.sr-only)]:relative *:disabled:opacity-20 disabled:text-gray-950 disabled:border-gray-200 disabled:bg-gray-100 dark:disabled:border-gray-800/50 disabled:dark:bg-gray-900 dark:*:disabled:!text-white text-gray-950 bg-gray-100 hover:bg-gray-200/75 active:bg-gray-100 dark:text-white dark:bg-gray-500/10 dark:hover:bg-gray-500/15 dark:active:bg-gray-500/10 size-8 justify-center">
                                                    <span class="sr-only">Source Code</span>
                                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="1em"
                                                        height="1em" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M12 2A10 10 0 0 0 2 12c0 4.42 2.87 8.17 6.84 9.5c.5.08.66-.23.66-.5v-1.69c-2.77.6-3.36-1.34-3.36-1.34c-.46-1.16-1.11-1.47-1.11-1.47c-.91-.62.07-.6.07-.6c1 .07 1.53 1.03 1.53 1.03c.87 1.52 2.34 1.07 2.91.83c.09-.65.35-1.09.63-1.34c-2.22-.25-4.55-1.11-4.55-4.92c0-1.11.38-2 1.03-2.71c-.1-.25-.45-1.29.1-2.64c0 0 .84-.27 2.75 1.02c.79-.22 1.65-.33 2.5-.33c.85 0 1.71.11 2.5.33c1.91-1.29 2.75-1.02 2.75-1.02c.55 1.35.2 2.39.1 2.64c.65.71 1.03 1.6 1.03 2.71c0 3.82-2.34 4.66-4.57 4.91c.36.31.69.92.69 1.85V21c0 .27.16.59.67.5C19.14 20.16 22 16.42 22 12A10 10 0 0 0 12 2">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </main>
    </div>



    {{-- <div class="container">
        <div class="row">
            <a href="{{ route('table.index') }}" class="btn btn-primary">Volver</a>
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Mesa</div>
                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $table->nombre }}</p>
                        <p><strong>Capacidad:</strong> {{ $table->capaciodad }}</p>
                        <p><strong>Ubicación:</strong> {{ $table->location }}</p>
                        <p><strong>Estado:</strong> {{ $table->status ? 'Activo' : 'Inactivo' }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($products as $product)
                <div class="card">
                    <div class="card-header">Producto</div>
                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $product->name }}</p>
                        <p><strong>Capacidad:</strong> {{ $product->price }}</p>
                        <img src="data:image/jpeg;base64,{{ $product->image }}" alt="imagen del producto" width="100">
                        <form action="{{ route('tablesProduct.store') }}" method="post">
                            @csrf
                            <input value="{{ $table->id }}" type="hidden" name="table_id">
                            <input value="{{ $product->id }}" type="hidden" name="product_id">
                            <input type="submit" value="create">
                        </form>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="4">No hay productos registrados.</td>
                </tr>
            @endforelse
            <form action="{{ route('table.show') }}" method="POST">
                @csrf
                <input type="hidden" name="table" value="{{ $table->id }}">
                <label>Seleccione la categoría:</label>
                <select name="category_id">
                    <option value="-1">Todas</option>
                    @isset($categories)
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @endisset
                </select>
                <button type="submit" class="btn btn-info btn-sm">Ver</button>
            </form>
        </div>
        <div class="row">
            <h2>Productos de la comanda</h2>
            @forelse ($items as $item)
                <div class="card">
                    <div class="card-header">Producto</div>
                    <div class="card-body">
                        <p><strong>Nombre:</strong> {{ $item['name'] }}</p>
                        <p><strong>Precio:</strong> {{ $item['price'] }}</p>
                        <p><strong>Cantidad:</strong> {{ $item['quantity'] }}</p>
                        <p><strong>Subtotal:</strong> {{ $item['subtotal'] }}</p>
                        <img src="data:image/jpeg;base64,{{ $item['image'] }}" alt="Imagen del producto" width="100">
                    </div>
                </div>
            @empty
                <div class="card">
                    <div class="card-body">
                        <p>No hay productos registrados.</p>
                    </div>
                </div>
            @endforelse

            @if (count($items) > 0)
                <form action="{{ route('invoiceBill') }}" method="post">
                    @csrf
                    <input type="hidden" name="type_invoice" value="site">
                    <input type="hidden" name="table_id" value="{{ $table->id }}">
                    <input type="hidden" name="items[]" value="{{ json_encode($items) }}">
                    <p><b>Total:</b>{{ $total }}</p>
                    <button type="submit">Facturar</button>
                </form>
            @endif
            @if (count($items) > 0)
                <form action="{{ route('tablesProduct.updateStatusItems') }}" method="post">
                    @csrf
                    <input type="hidden" name="table_id" value="{{ $table->id }}">
                    <input type="hidden" name="status" value="cooking">
                    <button type="submit">Enviar Comanda</button>
                </form>
            @endif
          
        </div>

    </div> --}}
@endsection
