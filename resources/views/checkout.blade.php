<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700">{{ __('Teléfono') }}</label>
                            <input type="text" name="phone" id="phone" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700">{{ __('Dirección de entrega') }}</label>
                            <input type="text" name="address" id="address" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold">{{ __('Resumen del pedido') }}</h3>
                            <ul>
                                @foreach ($cart as $item)
                                    <li>{{ $item['name'] }} x {{ $item['quantity'] }} - ${{ $item['price'] * $item['quantity'] }}</li>
                                @endforeach
                            </ul>
                            <p class="mt-4 font-bold">{{ __('Total') }}: ${{ $total }}</p>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md">{{ __('Realizar compra') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>