<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">{{ __('Description') }}</label>
                            <textarea name="description" id="description" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="stock" class="block text-gray-700">{{ __('Stock') }}</label>
                            <input type="number" name="stock" id="stock" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700">{{ __('Price') }}</label>
                            <input type="number" step="0.01" name="price" id="price" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">{{ __('Image') }}</label>
                            <input type="text" name="image" id="image" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md">{{ __('Create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>