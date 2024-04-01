@extends('layouts.partials.header')
@section('title', 'Editar Producto')
@section('content-main')
    <div class="p-6 page-content">
        <div class="flex items-center justify-between w-full mb-6">
            <h4 class="text-xl font-medium dark:text-gray-200">
                Editar Producto
            </h4>

            <ol aria-label="Breadcrumb" class="hidden md:flex items-center whitespace-nowrap min-w-0 gap-2">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle text-default-800 transition-all leading-none hover:text-purple-500 dark:text-gray-200"
                        href="javascript:void(0)">
                        Productos
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" data-lucide="chevron-right" class="lucide lucide-chevron-right w-4 h-4">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </a>
                </li>

                <li aria-current="page" class="text-sm font-semibold text-purple-600 leading-none hover:text-purple-500">
                    Editar Producto
                </li>
            </ol>
        </div>

        <form action="{{ route('products.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="product_encrypted_id" value="{{ encrypt($product->id) }}">
            <div class="grid lg:grid-cols-3 gap-6">
                <div class="p-6 rounded-lg border border-default-200 dark:border-gray-600">
                    <div class="h-86 p-6 flex flex-col items-center justify-center rounded-lg mb-4">
                        <label id="dropzone-file-all" for="dropzone-file"
                            class="flex flex-col items-center hidden justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 transition-all">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" data-lucide="image"
                                    class="w-10 h-10 stroke-primary fill-current/10 text-purple-600">
                                    <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                                    <circle cx="9" cy="9" r="2"></circle>
                                    <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"></path>
                                </svg>
                                <div class="mt-4"></div>
                                <h5 class="text-base text-purple-600 font-semibold mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" data-lucide="upload-cloud"
                                        class="lucide lucide-upload-cloud inline-flex ms-2">
                                        <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"></path>
                                        <path d="M12 12v9"></path>
                                        <path d="m16 16-4-4-4 4"></path>
                                    </svg>
                                    Cargar Imagen
                                </h5>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"> Cargue una imagen para su
                                    producto.</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Formato de archivo jpeg, png Tamaño
                                    recomendado 600x600</p>
                            </div>
                            <input id="dropzone-file" name="image" type="file" class="hidden"
                                onchange="previewImage(event)" accept="image/png, image/jpeg"  />
                        </label>
                        <img id="preview-image" class="h-56 mt-4" src="data:image/png;base64,{{ $product->image }}" />
                    </div>
                    @error('image')
                        <span class="invalid-feedback text-red-600" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="flex justify-end">
                        <button type="button" onclick="document.getElementById('dropzone-file').click()"
                            class="flex items-center gap-2 py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-purple-600 text-white transition-all hover:bg-primary-500">
                            Cambiar Imagen
                            <i class="fa-solid fa-repeat"> </i>
                        </button>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="p-6 rounded-lg border border-default-200 dark:border-gray-600">
                        <div class="grid lg:grid-cols-2 gap-6 mb-6">
                            <div class="space-y-6">
                                <div>
                                    <input name="name" name="name"  id="name" value="{{ $product->name }}"
                                        class="block w-full bg-transparent dark:border-gray-600 rounded-lg py-2.5 px-4 border border-gray-200 focus:ring-transparent focus:border-gray-400 dark:bg-default-50 dark:text-gray-100"
                                        type="text" placeholder="Nombre Del Producto">
                                </div>
                                @error('name')
                                    <span class="invalid-feedback text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div>
                                    <select name="category_id" class="block w-full bg-transparent dark:border-gray-600 rounded-lg py-2.5 px-4 border border-gray-200 focus:ring-transparent focus:border-gray-400 dark:bg-gray-900 dark:text-gray-100" type="text">
                                        <option selected disabled>Seleccionar Categoría Del Producto</option>
                                        @isset($categories)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                @error('category_id')
                                    <span class="invalid-feedback text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <div class="grid lg:grid-cols-2 gap-6">
                                    <div>
                                        <input name="price" value="{{ $product->price }}" class="block w-full bg-transparent dark:border-gray-600 rounded-lg py-2.5 px-4 border border-gray-200 focus:ring-transparent focus:border-gray-400 dark:bg-default-50 dark:text-gray-100" type="text" placeholder="Precio De Venta">
                                    </div>
                                    @error('price')
                                        <span class="invalid-feedback text-red-600" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <div>
                                        <input name="cost" value="{{ $product->cost }}" class="block w-full bg-transparent dark:border-gray-600 rounded-lg py-2.5 px-4 border border-gray-200 focus:ring-transparent focus:border-gray-400 dark:bg-default-50 dark:text-gray-100" type="text" placeholder="Precio De Coste">
                                    </div>
                                    @error('cost')
                                        <span class="invalid-feedback text-red-600" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div>
                                    <select name="status" class="block w-full bg-transparent dark:border-gray-600 rounded-lg py-2.5 px-4 border border-gray-200 focus:ring-transparent focus:border-gray-400 dark:bg-gray-900 dark:text-gray-100" type="text">
                                        <option selected disabled>Estado</option>
                                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Activo</option>
                                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactivo</option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="invalid-feedback text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <div class="flex justify-between">
                                    <h4 class="text-sm font-medium text-default-600 dark:text-gray-300">Descuento</h4>
                                    <div class="flex items-center gap-4">
                                        <label class="block text-sm text-default-600 dark:text-gray-300"
                                            for="addDiscount">Añadir Descuento</label>
                                        <input type="checkbox" id="addDiscount"
                                            class="relative w-[3.25rem] h-7 bg-purple-200 dark:bg-gray-700 focus:ring-0 checked:bg-none checked:!bg-purple-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 appearance-none focus:ring-transparent before:inline-block before:w-6 before:h-6 before:bg-white before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:transition before:ease-in-out before:duration-200">
                                    </div>
                                </div>

                                <div class="flex justify-between">
                                    <h4 class="text-sm font-medium text-default-600 dark:text-gray-300">Fecha De Expiración
                                    </h4>
                                    <div class="flex items-center gap-4">
                                        <label class="block text-sm text-default-600 dark:text-gray-300"
                                            for="addExpiryDate">Agregar Fecha De Expiración</label>
                                        <input type="checkbox" id="addExpiryDate"
                                            class="relative w-[3.25rem] h-7 bg-purple-200  dark:bg-gray-700 focus:ring-0 checked:bg-none checked:!bg-purple-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 appearance-none focus:ring-transparent before:inline-block before:w-6 before:h-6 before:bg-white before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:transition before:ease-in-out before:duration-200">
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <textarea
                                        class="block w-full bg-transparent rounded-lg py-2.5 px-4 border dark:border-gray-600 dark:text-gray-200 border-gray-200 focus:ring-transparent focus:border-gray-400 dark:bg-default-50"
                                        rows="10" placeholder="Descripcion Corta"></textarea>
                                </div>

                                <div>
                                    <p class="text-xs text-default-500 mb-3 dark:text-gray-300">Fecha De Adición</p>
                                    <div class="grid lg:grid-cols-1 gap-6">
                                        <div>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                    </svg>
                                                </div>
                                                <input datepicker type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-gray-500 focus:border-gray-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-gray-500"
                                                    placeholder="Seleccione La Fecha">
                                            </div><!-- end relative -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <div class="lg:col-span-3">
                <div class="flex flex-wrap justify-end items-center gap-4">
                    <div class="flex flex-wrap items-center gap-4">
                        <button type="button"
                            class="flex items-center gap-2 font-medium text-gray-700 text-sm py-2.5 px-4 rounded-md bg-gray-200 transition-all">
                            Guardar Como Borrado <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-down"
                                class="lucide lucide-chevron-down h-4 w-4">
                                <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </button>
                        <button type="submit"
                            class="py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-purple-600 text-white transition-all hover:bg-purple-500">
                            Actualizar
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        var btn = document.getElementById('btn-switch');
        btn.style.display = 'none';
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function(){
                var img = document.getElementById('preview-image');

                img.src = reader.result;
                img.classList.remove('hidden');
                document.getElementById('dropzone-file-all').style.display = 'none';
                btn.style.display  = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection
