@extends('layouts.partials.header')
@section('title', 'Categorías')

@section('content-main')
    {{--    Table goes here --}}
    <div class="container grid p-6 mx-auto">
        <div class="flex items-center justify-between w-full mb-6">
            <h4 class="text-xl font-medium dark:text-gray-200">Lista Categorias</h4>
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="px-6 py-4 border-b border-b-default-200 dark:border-gray-600 dark:bg-gray-800">
                <div class="flex flex-wrap justify-between items-center gap-6">
                    <h4 class="text-xl font-medium fon text-default-900 dark:text-gray-200">Categorias</h4>
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="py-2.5 px-4 inline-block bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-all">
                        <i class="fa-solid fa-plus"></i>
                        Agregar Categoria
                    </button>
                </div>

                <!-- Main modal -->
                <div id="crud-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Crear Categoria
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form id="formNuevaCategoria" action="{{ route('category.store') }}" method="post"
                                class="p-4 md:p-5">
                                @csrf
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2 input-name">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                                        <input type="text" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-600 focus:border-purple-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
                                            placeholder="Escribe el nombre de la categoria" required="">
                                        <span id="errortxtname" class="text-xs font-semibold text-red-600 hidden">Introduce
                                            un nombre
                                            con al menos 3 caracteres</span>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="status"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                        <select name="status" id="status"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="description"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción
                                            Categoria</label>
                                        <textarea name="description" id="description" rows="4"
                                            class="block transition-all p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-500 focus:border-purple-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-gray-500 dark:focus:border-blue-500"
                                            placeholder="Escribe una descripcion sobre la categoria"></textarea>
                                        <span id="errortxtdesp" class="text-xs font-semibold text-red-600 hidden">Introduce
                                            una
                                            descripcion con al menos 3 caracteres</span>
                                    </div>
                                </div>
                                <button id="btnCrearCategoria" type="button" onclick="crearCategoria()"
                                    class="w-full text-white inline-flex justify-center items-center bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all">
                                    <svg id="InitIcon" class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <svg id="loadingIcon" aria-hidden="true" role="status"
                                        class="inline w-4 h-4 me-3 text-white animate-spin hidden" viewBox="0 0 100 101"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="#E5E7EB" />
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentColor" />
                                    </svg>
                                    <span id="btnText">Agregar Categoria</span>
                                </button>
                            </form>

                        </div>
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
                        <form method="GET" action="{{ route('category.index') }}">
                            <input type="text" name="search" id="searchInput"
                                class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-dark focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                                placeholder="Buscar usuarios..." aria-label="Search">
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
                            <th class="px-4 py-3">Descripción</th>
                            <th class="px-4 py-3">Estado</th>
                            <th class="px-4 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="usersTableBody" class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @isset($categories)
                            @foreach ($categories as $category)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">
                                        {{ $category->name }}</td>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $category->description }}</td>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        @if ($category->status)
                                            <span
                                                class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-semibold bg-green-500/20 text-green-500">Activo</span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1 py-0.5 px-2.5 rounded-full text-xs font-semibold bg-red-500/20 text-red-500">Inactivo</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex items-center space-x-4 text-sm">
                                            <form method="POST" action="{{ route('category.edit') }}">
                                                @csrf
                                                <input type="hidden" name="encrypted_category_id"
                                                    value="{{ encrypt($category->id) }}">
                                                <button type="submit" class="transition-all hover:text-purple-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        data-lucide="pencil" class="lucide lucide-pencil w-5 h-5">
                                                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z">
                                                        </path>
                                                        <path d="m15 5 4 4"></path>
                                                    </svg>
                                                </button>
                                            </form>

                                            <form method="POST" action="{{ route('category.show') }}">
                                                @csrf
                                                <input type="hidden" name="encrypted_category_id"
                                                    value="{{ encrypt($category->id) }}">
                                                <button type="submit" class="transition-all hover:text-purple-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        data-lucide="eye" class="lucide lucide-eye w-5 h-5">
                                                        <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                                                        </path>
                                                        <circle cx="12" cy="12" r="3"></circle>
                                                    </svg>
                                                </button>
                                            </form>


                                            @if ($category->status)
                                                        <form action="{{ route('category.destroy') }}" method="POST"
                                                            style="display: inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="hidden" name="encrypted_category_id"
                                                                value="{{ encrypt($category->id) }}">
                                                            <button type="submit"
                                                                class="transition-all hover:text-red-600">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    data-lucide="trash-2"
                                                                    class="lucide lucide-trash-2 w-5 h-5">
                                                                    <path d="M3 6h18"></path>
                                                                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                                    <line x1="10" x2="10" y1="11"
                                                                        y2="17"></line>
                                                                    <line x1="14" x2="14" y1="11"
                                                                        y2="17"></line>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('category.activate') }}" method="POST"
                                                            style="display: inline">
                                                            @csrf
                                                            <input type="hidden" name="encrypted_category_id"
                                                                value="{{ encrypt($category->id) }}">

                                                            <button type="submit"
                                                                class="transition-all hover:text-green-600">
                                                                <i class="fa-solid fa-play"></i>
                                                            </button>
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
                    Mostrando   {{ $categories->firstItem() }} - {{ $categories->lastItem() }} de {{ $categories->total() }}
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                    <nav aria-label="Table navigation">
                        <ul class="inline-flex items-center">
                            <li>
                                <button onclick=" window.location.href = '{{ $categories->previousPageUrl() }}' "
                                    class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                    aria-label="Previous">
                                    <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                        <path
                                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </li>
                            @for ($i = 1; $i <= $categories->lastPage(); $i++)
                                <li>
                                    <button onclick=" window.location.href = '{{ $categories->url($i) }}' "
                                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple {{ $categories->currentPage() == $i ? 'bg-purple-600 text-white' : '' }}">
                                        {{ $i }}
                                    </button>
                                </li>
                            @endfor
                            <li>
                                <button onclick=" window.location.href = '{{ $categories->nextPageUrl() }}' "
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


