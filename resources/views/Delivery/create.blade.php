@extends('layouts.landingClient')

@section('title', 'Inicio')
@section('content-landing-client')
    @extends('layouts.partials.headerClient')

    <div class="container m-auto px-6 pt-32 md:px-12 lg:pt-[4.8rem] lg:px-7">
        <div class="flex items-center flex-wrap px-2 md:px-0">
            <div class="relative lg:w-6/12 lg:py-24 xl:py-32">
                <h1 class="font-bold text-4xl text-yellow-900 dark:text-yellow-50 md:text-5xl lg:w-10/12">Tus platos
                    favoritos, directamente en tu puerta</h1>
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
                            <p class='text-[#3C3C4399] text-[17px] mr-2'>Estado:
                                {{ isset($delivery) && $delivery->status === 'cooking' ? 'En preparación' : 'Sin pedido' }}
                            </p>
                            <p class='text-[17px] font-bold text-[#0FB478]'></p>
                        </div>
                        <p class='text-[#7C7C80] font-[15px] mt-6'>Realiza tu pedido y disfruta de la mejor
                            comida
                            en la comodidad de tu hogar.</p>

                        <form action="{{ route('delivery.store') }}" method="POST">
                            @csrf
                            @if (!$delivery)
                                <button type="submit"
                                    class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>Realizar
                                    Pedido</button>
                            @elseif($delivery->status === 'cooking')
                                <button type="submit"
                                    class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>ver
                                    Pedido</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
