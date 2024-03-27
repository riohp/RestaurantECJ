@extends('layouts.landing')

@section('title', 'Crear Mesa')
@section('content-landing')

    <div class="bg-white dark:bg-darker h-full">
        <nav class="fixed z-10 w-full bg-white dark:bg-transparent md:absolute md:bg-transparent">
            <div class="container m-auto px-2 md:px-12 lg:px-7">
                <div class="flex flex-wrap items-center justify-between py-3 gap-6 md:py-4 md:gap-0">
                    <input type="checkbox" name="toggle_nav" id="toggle_nav" class="peer hidden">
                    <div class="w-full px-6 flex justify-between lg:w-max md:px-0 z-30">
                        <a href="https://tailus.io/blocks/hero-section" aria-label="logo"
                            class="flex space-x-2 items-center">
                            <img src="https://tailus.io/sources/blocks/food-delivery/preview/images/icon.png" class="w-12"
                                alt="tailus logo" width="144" height="133">
                            <span class="text-2xl font-bold text-yellow-900">Tailus <span
                                    class="text-yellow-700">Feedus</span></span>
                        </a>

                        <div class="flex items-center lg:hidden max-h-10">
                            <label role="button" for="toggle_nav" aria-label="humburger" id="hamburger"
                                class="relative w-10 h-auto p-2">
                                <div id="line"
                                    class="m-auto h-0.5 w-6 rounded bg-yellow-900 dark:bg-white transition duration-300">
                                </div>
                                <div id="line2"
                                    class="m-auto mt-2 h-0.5 w-6 rounded bg-yellow-900 dark:bg-white transition duration-300">
                                </div>
                            </label>

                        </div>
                    </div>

                    <label role="button" for="toggle_nav"
                        class="hidden peer-checked:block fixed w-full h-full left-0 top-0 z-10 bg-yellow-200 dark:bg-black dark:bg-opacity-80 bg-opacity-30 backdrop-blur backdrop-filter"></label>
                    <div
                        class="hidden peer-checked:flex w-full flex-col lg:flex lg:flex-row justify-end z-30 items-center gap-y-6 p-6 rounded-xl bg-white dark:bg-gray-900 lg:gap-y-0 lg:p-0 md:flex-nowrap lg:bg-transparent lg:w-7/12">
                        <button class="rounded-md focus:outline-none focus:shadow-outline-purple text-gray-700 dark:text-gray-300 text-center"
                            @click="toggleTheme" aria-label="Toggle color mode">
                            <template x-if="dark" >
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                    </path>
                                </svg>
                            </template>
                            <template x-if="!dark" >
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </template>
                        </button>
                        <div
                            class="w-full min-w-max space-y-2 
                    border-yellow-200 lg:space-y-0 sm:w-max ">
              
                        
                   
                            <button type="button" title="Start buying"
                                class="w-full py-3 px-6 text-center rounded-full transition active:bg-yellow-200 dark:active:bg-gray-700 dark:focus:bg-gray-800 focus:bg-yellow-100 sm:w-max">
                                <span class="block text-yellow-800 dark:text-white font-semibold text-sm">
                                    Sign up
                                </span>
                            </button>
                            <button type="button" title="Start buying"
                                class="w-full py-3 px-6 text-center rounded-full transition bg-yellow-300 hover:bg-yellow-100 active:bg-yellow-400 focus:bg-yellow-300 sm:w-max">
                                <span class="block text-yellow-900 font-semibold text-sm">
                                    Login
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="h-full relative bg-yellow-50 dark:bg-gray-900">
            <div class="container m-auto px-6 pt-32 md:px-12 lg:pt-[4.8rem] lg:px-7">
                <div class="flex items-center flex-wrap px-2 md:px-0">
                    <div class="relative lg:w-6/12 lg:py-24 xl:py-32">
                        <h1 class="font-bold text-4xl text-yellow-900 dark:text-yellow-50 md:text-5xl lg:w-10/12">Tus platos favoritos, directamente en tu puerta</h1>
                        <p class="mt-8 text-gray-700 dark:text-gray-200 lg:w-10/12">Sit amet consectetur adipisicing elit.
                                <a href="#" class="text-yellow-700 dark:text-yellow-300">conexión</a> tenetur nihil
                                quaerat suscipit, sunt dignissimos.
                            </p>
                    </div>
                    <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
                        <div class='max-w-md mx-auto'>
                            <div class='h-[236px]'
                                style='background-image:url(https://img.freepik.com/free-photo/pasta-spaghetti-with-shrimps-sauce_1220-5072.jpg?w=2000&t=st=1678041911~exp=1678042511~hmac=e4aa55e70f8c231d4d23832a611004f86eeb3b6ca067b3fa0c374ac78fe7aba6);background-size:cover;background-position:center'>
                            </div>
                            <div class='p-4 sm:p-6'>
                                <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>Hola
                                    {{ auth()->user()->name }}</p>
                                <div class='flex flex-row'>
                                    <p class='text-[#3C3C4399] text-[17px] mr-2'>Estado:</p>
                                    <p class='text-[17px] font-bold text-[#0FB478]'></p>
                                </div>
                                <p class='text-[#7C7C80] font-[15px] mt-6'>Realiza tu pedido y disfruta de la mejor
                                    comida
                                    en la comodidad de tu hogar.</p>

                                <form action="{{ route('delivery.store') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>Realiazar
                                        Pedido</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
