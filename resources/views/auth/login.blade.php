@extends('layouts.landing')
@section('title', 'Login')

@section('content-landing')
    <div class="relative h-full sm:py-5 lg:py-36 py-5 flex items-center bg-gradient-to-b from-purple-600/5 via-purple-600/5 to-purple-600/10 dark:bg-gray-900">
        <div class="container">
            <div class="flex justify-center items-center lg:max-w-lg">
                <div class="flex px-5 flex-col h-full">
                    <div class="shrink">
                        <div>
                            <a href="#" class="flex items-center">
                                <img src="https://coderthemes.com/yum/assets/logo-dark-6dbab3e1.png" class="h-12 flex dark:hidden">
                                <img src="https://coderthemes.com/yum/assets/logo-light-35c89c2c.png" class="h-12 hidden dark:flex">
                            </a>
                        </div>
                        <div class="py-5">
                            <h1 class="text-3xl font-semibold text-gray-800 mb-2 dark:text-gray-100">Login</h1>
                            <p class="text-sm text-gray-500 max-w-md">Ingresa con tus credenciales para acceder a tu cuenta personal y disfrutar de todas las funcionalidades y servicios disponibles.</p>
                        </div>
                        @if ($errors->any())
                            <div class="py-3 px-2.5 mb-5 bg-red-600/20 text-center rounded-lg">
                                <p class="text-red-600">{{ $errors->first() }}</p>
                            </div>
                        @endif
                        <form method="POST" id="formLogin" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-900 mb-2 dark:text-gray-100" id="loginEmailLabel">
                                    Email
                                </label>
                                <input name="email" id="loginEmail" class="dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700 block w-full rounded-full py-2.5 px-4 bg-white border border-gray-200 focus:ring-transparent focus:border-purple-400" type="email" value="{{ old('email') }}" placeholder="Introduce tu email" autocomplete="username">
                                <span id="errorInputEmail" class="text-red-600 text-xs"></span>
                                @if ($errors->has('email'))
                                    <span class="text-red-600 text-xs">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-6">
                                <div class="flex justify-between">
                                    <label class="block text-sm font-medium text-gray-900 mb-2 dark:text-gray-100" id="loginPasswordLabel">
                                        Contraseña
                                    </label>
                                    <a href="./forgot-password.html" class="text-xs text-gray-700 hover:text-black transition-all dark:text-gray-400">Contraseña olvidada?</a>
                                </div>
                                <div class="flex">
                                    <input id="loginPassword" type="password" name="password" class="dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700 passTypeSwitch w-full rounded-s-full py-2.5 px-4 bg-white border border-gray-200 focus:ring-transparent focus:border-purple-400" placeholder="Intruduce tu contraseña">
                                    <button type="button" id="password-switch" class="dark:bg-gray-900 dark:border-gray-700 dark:text-white inline-flex items-center justify-center py-2.5 px-4 border rounded-e-full bg-white -ms-px border-gray-200 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="eye" class="lucide lucide-eye password-eye-on h-5 w-5 text-default-600"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="eye-off" class="lucide lucide-eye-off password-eye-off h-5 w-5 text-default-600 hidden"><path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path><path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path><path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path><line x1="2" x2="22" y1="2" y2="22"></line></svg>
                                    </button>
                                </div>
                                <span id="errorInputPassword" class="text-red-600 text-xs"></span>
                                @if ($errors->has('password'))
                                    <span class="text-red-600 text-xs">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="flex justify-center mb-16">
                                <button type="button" onclick="validateLogin()" class="relative inline-flex items-center justify-center px-6 py-3 rounded-full text-base bg-purple-600 text-white capitalize transition-all hover:bg-purple-700 w-full">
                                    Iniciar sesión
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="grow flex items-end justify-center">
                        <p class="text-gray-950 text-center mt-auto dark:text-gray-100">No tienes una cuenta ? <a href="{{ route('register-user') }}" class="text-purple-600 ms-1"><span class="font-medium">Registrate!</span></a></p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="absolute top-1/2 -translate-y-1/3 start-0 end-0 w-full -z-10">
                <img src="data:image/png;base64,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" class="w-full opacity-50 flex">
            </div>
            <div class="absolute top-0 end-0 hidden xl:flex h-5/6">

                <img src="https://coderthemes.com/yum/assets/auth-bg-d79436e2.png" class="w-full z-0" alt="hero">
            </div>
        </div>
    </div>
    <div class="fixed lg:bottom-5 end-5 bottom-18 flex flex-col items-center bg-purple-600 rounded-full z-10">
        <button class="rounded-md p-2 text-white focus:outline-none focus:shadow-outline-purple" @click="toggleTheme" aria-label="Toggle color mode">
            <template x-if="!dark">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
            </template>
            <template x-if="dark">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                </svg>
            </template>
        </button>
    </div>
@endsection
