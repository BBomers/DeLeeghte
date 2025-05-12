<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wedstrijd Details') }}
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
                <h3 class="text-2xl font-semibold text-gray-800">{{ $wedstrijd->naam }}</h3>
                <p class="mt-2 text-sm text-gray-600"><strong>Categorie:</strong> {{ $wedstrijd->categorie->type }}</p>
                <p class="mt-2 text-sm text-gray-600"><strong>Datum:</strong> {{ $wedstrijd->date }}</p>
                <p class="mt-4 text-sm text-gray-600"><strong>Zichtbaarheid:</strong> {{ $wedstrijd->zichtbaarheid ? 'Zichtbaar' : 'Verborgen' }}</p>

                <a href="{{ route('wedstrijd.edit', $wedstrijd) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg mt-4 inline-block">Bewerken</a>
            </div>
        </div>
    </div>
</x-app-layout>
