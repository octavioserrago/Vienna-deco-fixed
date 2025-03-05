<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
                        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
                            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                                    <img class="w-full dark:hidden rounded-md" src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
                                    <img class="w-full hidden dark:block" src="{{ asset($product->image) }}" alt="{{ $product->name }}" />
                                </div>

                                <div class="mt-6 sm:mt-8 lg:mt-0">
                                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                                        {{ $product->name }}
                                    </h1>
                                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                                        <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                                            ${{ $product->price }}
                                        </p>
                                    </div>

                                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-white bg-rojo hover:bg-black focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center">
                                            Agregar al Carrito
                                        </button>
                                    </form>


                                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                                    <p class="mb-6 text-gray-500 dark:text-gray-400">
                                        {{ $product->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>