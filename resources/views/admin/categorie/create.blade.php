<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nieuwe categorie') }}
        </h2>
    </x-slot>
    <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <a href="{{ route('categorie.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
            Terug naar categorie
        </a>
    </div>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('categorie.store') }}" method="POST">
                        @csrf

                        {{-- Algemene Gegevens --}}
                        <div>
                            <div>
                                <label for="naam" class="block text-sm font-medium text-gray-700">Naam</label>
                                <input type="text" name="naam" id="naam" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('naam')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                <input type="text" name="type" id="type" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('type')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="resize-y">
                                <label for="beschrijving"
                                    class="block text-sm font-medium text-gray-700">Beschrijving</label>
                                    <label for="beschrijving"
                                        class="block text-sm font-small text-gray-700">[type] veranderd in type, [max] veranderd in max</label>
                                <textarea type="text"
                                style="height: 200px;" name="beschrijving" id="beschrijving"
                                    class="mt-1 block w-full h-auto resize-y rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
- Aanvang 10.00u, tot 15.30u
- Loten aan het water om 8.30u
- [type]
- Maximaal [max] deelnemers (min. [max / 2])
- Inschrijfgeld €20,- 2 vakken 2 prijzen per vak bij volle deelname
- Prijzen volgens wedstrijden prijzen schema
- Schrijf je in via de site: www.deleeghte.nl</textarea>
                                @error('beschrijving')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="kleur" class="block text-sm font-medium text-gray-700">Kleur (hex)</label>
                                <input type="color" name="kleur" id="kleur"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('kleur')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="max" class="block text-sm font-medium text-gray-700">Max</label>
                                <input type="number" name="max" id="max" value="16"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('max')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="aantal_namen" class="block text-sm font-medium text-gray-700">Aantal
                                    Namen</label>
                                <input type="number" name="aantal_namen" id="aantal_namen" value="1"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('aantal_namen')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="py-2">
                                <h3 class="text-lg font-semibold mt-8 mb-2">Dagdelen</h3>
                                <div class="flex flex-col sm:flex-row sm:space-x-6 space-y-2 sm:space-y-0">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="dagdeel_1" id="dagdeel_1" value="1" checked
                                            {{ old('dagdeel_1', $categorie->dagdeel_1 ?? false) ? 'checked' : '' }}
                                            class="rounded text-indigo-600 border-gray-300 shadow-sm focus:ring-indigo-500">
                                        <span class="ml-2 text-gray-700">Dagdeel 1</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="dagdeel_2" id="dagdeel_2" value="1" checked
                                            {{ old('dagdeel_2', $categorie->dagdeel_2 ?? false) ? 'checked' : '' }}
                                            class="rounded text-indigo-600 border-gray-300 shadow-sm focus:ring-indigo-500">
                                        <span class="ml-2 text-gray-700">Dagdeel 2</span>
                                    </label>
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="dagdeel_3" id="dagdeel_3" value="1"
                                            {{ old('dagdeel_3', $categorie->dagdeel_3 ?? false) ? 'checked' : '' }}
                                            class="rounded text-indigo-600 border-gray-300 shadow-sm focus:ring-indigo-500">
                                        <span class="ml-2 text-gray-700">Dagdeel 3</span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        {{-- Stekken 1-16 in Twee Kolommen --}}
                        <div>
                            <h3 class="text-lg font-semibold mt-8 mb-4">Stekken vijver 1</h3>
                            <div class="grid grid-cols-2 gap-4">
                                @for ($i = 1; $i <= 16; $i++) <div class="flex items-center">
                                    <input type="checkbox" name="stek_{{ $i }}" id="stek_{{ $i }}" value="1"
                                        class="stek-checkbox mr-2" checked>
                                    <label for="stek_{{ $i }}" class="text-sm text-gray-700">Stek {{ $i }}</label>
                            </div>
                            @endfor
                        </div>
                {{-- Alternatieve Stekken --}}
                <div>
                    <h3 class="text-lg font-semibold mt-8 mb-4">Alternatieve Stekken vijver 1</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        @foreach (['1a', '8a', '9a', '16a'] as $alt)
                        <div class="flex items-center">
                            <input type="checkbox" name="stek_{{ $alt }}" id="stek_{{ $alt }}" value="1" class="mr-2">
                            <label for="stek_{{ $alt }}" class="text-sm text-gray-700">Stek {{ $alt }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- vijver 2 Stekken --}}
                <div>
                    <h3 class="text-lg font-semibold mt-8 mb-4">Stekken vijver 2</h3>
                    <div class="grid grid-cols-2 gap-4">
                        @for ($i = 17; $i <= 26; $i++) <div class="flex items-center">
                            <input type="checkbox" name="stek_{{ $i }}" id="stek_{{ $i }}" value="1"
                                class="stek-checkbox mr-2">
                            <label for="stek_{{ $i }}" class="text-sm text-gray-700">Stek {{ $i }}</label>
                    </div>
                    @endfor
                </div>

                {{-- Submit --}}
                <div class="mt-8 mb-4">
                    <button type="submit"
                        class="inline-block bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
                        + Maak categorie aan
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>