<!-- resources/views/users/create.blade.php -->

@extends('layouts.partials.header')

@section('title', 'Create User')

@section('content-main')
    <div class="p-6 page-content">
        <div class="flex items-center justify-between w-full mb-6">
            <h4 class="text-xl font-bold dark:text-white">
                Agregar Empleado
            </h4>

            <ol aria-label="Breadcrumb" class="hidden md:flex items-center whitespace-nowrap min-w-0 gap-2">
                <li class="text-sm">
                    <a class="flex items-center dark:text-white gap-2 align-middle text-default-800 transition-all leading-none hover:text-purple-600" href="{{route('users.index')}}">
                        Empleados
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-right" class="lucide lucide-chevron-right w-4 h-4"><path d="m9 18 6-6-6-6"></path></svg>
                    </a>
                </li>

                <li aria-current="page" class="text-sm font-semibold text-purple-600 leading-none hover:text-purple-500">
                    Agregar Empleado
                </li>
            </ol>
        </div>
        <div class="border rounded-lg border-default-200 dark:border-gray-700">
            <div class="p-6">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="grid lg:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2 dark:text-gray-200" for="name">Nombre</label>
                            <input id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus class="dark:text-gray-200 dark:border-gray-700 form-control @error('name') is-invalid @enderror block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" placeholder="Ingrese Su Nombre Completo">
                            @error('name')
                                <span class="invalid-feedback text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2 dark:text-gray-200" for="phone">Telefono</label>
                            <input id="phone" required autocomplete="phone" class="dark:text-gray-200 dark:border-gray-700 block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50 form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" type="tel" placeholder="3113112232">
                            @error('phone')
                                <span class="invalid-feedback text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2 dark:text-gray-200" for="email">Email</label>
                            <input id="email" type="email" required autocomplete="email" class="dark:text-gray-200 dark:border-gray-700 block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }} " placeholder="demoexample@mail.com">
                            @error('email')
                                <span class="invalid-feedback text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2 dark:text-gray-200" for="password">Contraseña</label>
                            <input id="password" type="password" name="password" class="dark:text-gray-200 dark:border-gray-700 form-control @error('password') is-invalid @enderror block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" autocomplete="new-password" placeholder="Ingresa una sontraseña">
                            @error('password')
                                <span class="invalid-feedback text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-default-900 mb-2 dark:text-gray-200" for="address">Dirección</label>
                            <input id="address" name="address" value="{{ old('address') }}" required autofocus class="dark:text-gray-200 dark:border-gray-700 form-control @error('address') is-invalid @enderror block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50" type="text" autocomplete="address" placeholder="Ingrese Su Direccion">
                            @error('address')
                                <span class="invalid-feedback text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2 dark:text-gray-200" for="role">Rol del empleado</label>
                            <select id="role" name="role" class="dark:text-gray-200 dark:bg-gray-700 dark:border-gray-700 form-control @error('role') is-invalid @enderror block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50">
                                <option value="">-- Seleccionar Rol --</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                                <option value="cashier" {{ old('role') == 'cashier' ? 'selected' : '' }}>Cajero</option>
                                <option value="waiter" {{ old('role') == 'waiter' ? 'selected' : '' }}>Mesero</option>
                                <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Cliente</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2 dark:text-gray-200" for="state">Estado</label>
                            <select id="state" name="status" class="dark:text-gray-200 dark:bg-gray-700 dark:border-gray-700 form-control @error('status') is-invalid @enderror block w-full bg-transparent rounded-full py-2.5 px-4 border border-default-200 focus:ring-transparent focus:border-default-200 dark:bg-default-50">
                                <option value="">-- Seleccionar Estado --</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactivo</option>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Activo</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback text-red-600" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-end gap-4">
                        <a href="{{ route('users.index') }}" class="flex items-center justify-center gap-2 rounded-full bg-purple-600/10 px-6 py-2.5 text-center text-sm font-semibold text-purple-600 shadow-sm transition-all duration-200 hover:bg-purple-600 hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="x" class="lucide lucide-x w-5 h-5"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
                            Cancelar
                        </a>
                        <button type="submit" class="flex items-center justify-center gap-2 rounded-full bg-purple-600 px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-purple-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="save" class="lucide lucide-save w-5 h-5"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                            Crear Empleado
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container text-white">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Crear Usuario') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Teléfono') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="cellphone" value="{{ old('phone') }}" required autocomplete="phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>

                                <div class="col-md-6">
                                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                                        <option value="">Seleccionar Rol</option>
                                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                                        <option value="cashier" {{ old('role') == 'cashier' ? 'selected' : '' }}>Cajero</option>
                                        <option value="waiter" {{ old('role') == 'waiter' ? 'selected' : '' }}>Mesero</option>
                                        <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Cliente</option>
                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                                <div class="col-md-6">
                                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" required>
                                        <option value="">Seleccionar Estado</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactivo</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Activo</option>
                                    </select>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Crear
                                    </button>
                                </div>
                            </div>
                        </form>
                        @if($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

