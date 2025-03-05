<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Carrito de Compras
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Tu carrito de compras</h1>
                    
                    @if(session('success'))
                        <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    @if(count($cart) > 0)
                        <div class="space-y-4">
                            @foreach($cart as $id => $item)
                                <div class="flex items-center justify-between border-b py-4">
                                    <div class="flex items-center">
                                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover mr-4">
                                        <div>
                                            <h3 class="text-lg font-semibold">{{ $item['name'] }}</h3>
                                            <p class="text-sm text-gray-500">Precio: ${{ $item['price'] }}</p>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-sm">Cantidad: {{ $item['quantity'] }}</p>
                                        <p class="text-xl font-semibold">Subtotal: ${{ $item['price'] * $item['quantity'] }}</p>
                                    </div>
                                    <div>
                                        <!-- Formulario para eliminar el producto -->
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6 flex items-center justify-between">
                            <p class="text-xl font-semibold">Total: ${{ $total }}</p>
                            <div>
                                <a href="{{ route('checkout') }}" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">Proceder al pago</a>
                            </div>
                        </div>
                    @else
                        <p class="text-lg">Tu carrito está vacío. Agrega productos para continuar.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
