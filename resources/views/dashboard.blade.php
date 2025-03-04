<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            @if (Auth::user()->isAdmin())
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">{{ __('Products') }}</h3>
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b border-gray-200">{{ __('Name') }}</th>
                                    <th class="py-2 px-4 border-b border-gray-200">{{ __('Description') }}</th>
                                    <th class="py-2 px-4 border-b border-gray-200">{{ __('Price') }}</th>
                                    <th class="py-2 px-4 border-b border-gray-200">{{ __('Image') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->name }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->description }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">{{ $product->price }}</td>
                                        <td class="py-2 px-4 border-b border-gray-200">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-10 w-10 object-cover">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                    <div class="p-6 text-gray-900">
                        <a  class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ __('Manage Users') }}</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>