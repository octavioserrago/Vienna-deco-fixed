<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('products.create') }}" class="px-4 py-2 bg-green-500 text-white rounded-md">{{ __('Create Product') }}</a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
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
        </div>
    </div>
</x-app-layout>