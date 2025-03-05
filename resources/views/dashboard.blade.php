<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (Auth::user()->isAdmin())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">{{ __('Products') }}</h3>
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200">{{ __('ID') }}</th>
                                    <th class="py-2 px-4 border-b border-gray-200">{{ __('Name') }}</th>
                                    <th class="py-2 px-4 border-b border-gray-200">{{ __('Description') }}</th>
                                    <th class="py-2 px-4 border-b border-gray-200">{{ __('Stock') }}</th>
                                    <th class="py-2 px-4 border-b border-gray-200">{{ __('Price') }}</th>
                                    <th class="py-2 px-4 border-b border-gray-200">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->id }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->name }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->description }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->stock }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->price }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <a href="{{ route('products.edit', $product) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md">{{ __('Edit') }}</a>
                                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900">
                        <a href="{{ route('products.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md">{{ __('Crear Producto') }}</a>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">{{ __('Todas las Ventas') }}</h3>
                        @if ($allSales->isEmpty())
                            <p>{{ __('No se han realizado ventas') }}</p>
                        @else
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('ID') }}</th>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('Usuario') }}</th>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('Telefono') }}</th>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('Dirección') }}</th>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('Total') }}</th>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('Fecha') }}</th>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('Estado') }}</th>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('Detalles') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allSales as $sale)
                                        <tr>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $sale->id }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $sale->user->name }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $sale->phone }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $sale->address }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">${{ $sale->total }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $sale->created_at->format('d/m/Y') }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">
                                                <form action="{{ route('sales.updateStatus', $sale) }}" method="POST">
                                                    @csrf
                                                    <select name="status" onchange="this.form.submit()" class="px-2 py-1 border rounded-md">
                                                        <option value="pending" {{ $sale->status == 'pending' ? 'selected' : '' }}>{{ __('Pending') }}</option>
                                                        <option value="completed" {{ $sale->status == 'completed' ? 'selected' : '' }}>{{ __('Completed') }}</option>
                                                        <option value="cancelled" {{ $sale->status == 'cancelled' ? 'selected' : '' }}>{{ __('Cancelled') }}</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td class="py-2 px-4 border-b border-gray-200">
                                                <button onclick="showDetails({{ $sale->id }})" class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ __('Ver Detalles') }}</button>
                                                <div id="details-{{ $sale->id }}" style="display: none;">
                                                    <ul>
                                                        @foreach ($sale->items as $item)
                                                            {{ $item->product->name }} x {{ $item->quantity }} - ${{ $item->price * $item->quantity }}
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @endif

            @if (!Auth::user()->isAdmin())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">{{ __('Mis Compras') }}</h3>
                        @if ($sales->isEmpty())
                            <p>{{ __('Aún no has realizado ninguna compra') }}</p>
                        @else
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('ID') }}</th>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('Dirección') }}</th>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('Total') }}</th>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('Fecha') }}</th>
                                        <th class="py-2 px-4 border-b border-gray-200">{{ __('Detalles') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $sale->id }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $sale->address }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">${{ $sale->total }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">{{ $sale->created_at->format('d/m/Y') }}</td>
                                            <td class="py-2 px-4 border-b border-gray-200">
                                                <button onclick="showDetails({{ $sale->id }})" class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ __('Ver Detalles') }}</button>
                                                <div id="details-{{ $sale->id }}" style="display: none;">
                                                    <ul>
                                                        @foreach ($sale->items as $item)
                                                            {{ $item->product->name }} x {{ $item->quantity }} - ${{ $item->price * $item->quantity }}
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

<script>
    function showDetails(saleId) {
        const details = document.getElementById(`details-${saleId}`);
        const detailsList = details.querySelector('ul').innerHTML;
        alert(detailsList);
    }
</script>