<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nieuwe Wedstrijd') }}
        </h2>
    </x-slot>

    <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('wedstrijd.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
            Terug naar wedstrijden
        </a>
    </div>

    <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6 text-gray-900">
                <form action="{{ route('wedstrijd.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="naam" class="block text-sm font-medium text-gray-700">Naam</label>
                        <input type="text" name="naam" id="naam" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="categorie_id" class="block text-sm font-medium text-gray-700">Categorie</label>
                        <select name="categorie_id" id="categorie_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->naam }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="zichtbaarheid" class="block text-sm font-medium text-gray-700">Zichtbaarheid</label>
                        <input type="hidden" name="zichtbaarheid" value="0">
                        <input type="checkbox" name="zichtbaarheid" id="zichtbaarheid" value="1" class="mt-1">
                    </div>

                    <div class="mb-4">
                        <label for="date" class="block text-sm font-medium text-gray-700">Datum</label>
                        <input type="date" name="date" id="date" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                    <button type="submit" class="inline-block bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">+ Voeg Wedstrijd toe</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
