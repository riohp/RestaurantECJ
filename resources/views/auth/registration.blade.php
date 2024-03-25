@extends('layouts.landing')
@section('title', 'Login')

@section('content-landing')
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="../assets/img/login-office.jpeg" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="../assets/img/login-office-dark.jpeg" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-3xl text-center font-semibold text-gray-700 dark:text-gray-200">
                            Registrarse
                        </h1>
                        <form method="POST" action="{{ route('register.store') }}">
                            @csrf

                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Nombre Completo</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="name" value="{{ old('name') }}" placeholder="Pedro" required />
                                @error('name')
                                    <span class="invalid-feedback text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <label class="block text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">Numero Telefonico</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="cellphone" value="{{ old('phone') }}" type="number" placeholder="3113112232"
                                    required />
                                @error('cellphone')
                                    <span class="invalid-feedback text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <label class="block text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">Correo Electronico</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="email" value="{{ old('email') }}" placeholder="demoexample@mail.com"
                                    type="tel" required />
                                @error('email')
                                    <span class="invalid-feedback text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <label class="block text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">Contraseña</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="password" value="{{ old('password') }}" placeholder="***********" type="password"
                                    required />
                                @error('password')
                                    <span class="invalid-feedback text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <label class="block text-sm mt-4">
                                <span class="text-gray-700 dark:text-gray-400">Dirección</span>
                                <input
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                    name="address" value="{{ old('address') }}" placeholder="calle 13" type="text"
                                    required />
                                @error('address')
                                    <span class="invalid-feedback text-red-600" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                            <button
                            class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            type="submit" class="btn btn-dark btn-block">Registrarse</button>
                         
                           
                        </form>

                        <p class="mt-1">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="{{ route('login') }}">
                                ¿Ya tienes una cuenta? Inicia sesión
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
