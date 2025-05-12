<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorie Bewerken') }}
        </h2>
    </x-slot>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('categorie.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
            Terug naar categorie
        </a>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('categorie.update', $categorie->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Algemene Gegevens --}}
                        <div class="">
                            <div class="py-2">
                                <label for="naam" class="block text-sm font-medium text-gray-700">Naam</label>
                                <input type="text" name="naam" id="naam" value="{{ old('naam', $categorie->naam) }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('naam')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="py-2">
                                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                                <input type="text" name="type" id="type" value="{{ old('type', $categorie->type) }}" required
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('type')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="py-2">
                                <label for="beschrijving" class="block text-sm font-medium text-gray-700">Beschrijving</label>
                                <label for="beschrijving" class="block text-xs font-small text-gray-700">[type] veranderd in type, [max] veranderd in max</label>
                                <textarea name="beschrijving" id="beschrijving" style="height: 200px;"
                                          class="mt-1 block w-full resize-y rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('beschrijving', $categorie->beschrijving) }}</textarea>
                                @error('beschrijving')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                          class="mt-1 block w-full rounded-md border-                       @enderror
                            </div>

                            <div class="py-2">
                                <label for="kleur" class="block text-sm font-medium text-gray-700">Kleur (hex)</label>
                                <input type="color" name="kleur" id="kleur" value="{{ old('kleur', $categorie->kleur) }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('kleur')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="py-2">
                                <label for="max" class="block text-sm font-medium text-gray-700">Max</label>
                                <input type="number" name="max" id="max" value="{{ old('max', $categorie->max) }}"
      gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('max')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="py-2">
                                <label for="aantal_namen" class="block text-sm font-medium text-gray-700">Aantal Namen</label>
                                <input type="number" name="aantal_namen" id="aantal_namen" value="{{ old('aantal_namen', $categorie->aantal_namen) }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('aantal_namen')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>{{-- Dagdelen --}}
                            <div class="py-2">
                                <h3 class="text-lg font-semibold mt-8 mb-4">Dagdelen</h3>
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                                    <div class="flex items-center">
                                        <input type="checkbox" name="dagdeel_1" id="dagdeel_1" value="1"
                                            {{ $categorie->dagdeel_1 ? 'checked' : '' }} class="mr-2">
                                        <label for="dagdeel_1" class="text-sm text-gray-700">Dagdeel 1</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="dagdeel_2" id="dagdeel_2" value="1"
                                            {{ $categorie->dagdeel_2 ? 'checked' : '' }} class="mr-2">
                                        <label for="dagdeel_2" class="text-sm text-gray-700">Dagdeel 2</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="dagdeel_3" id="dagdeel_3" value="1"
                                            {{ $categorie->dagdeel_3 ? 'checked' : '' }} class="mr-2">
                                        <label for="dagdeel_3" class="text-sm text-gray-700">Dagdeel 3</label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Stekken 1-16 --}}
                        <div class="py-2">
                            <h3 class="text-lg font-semibold mt-8 mb-4">Stekken vijver 1</h3>
                            <div class="grid grid-cols-2 gap-4">
                                @for ($i = 1; $i <= 16; $i++)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="stek_{{ $i }}" id="stek_{{ $i }}" value="1" 
                                            {{ $categorie->{'stek_' . $i} ? 'checked' : '' }} class="stek-checkbox mr-2">
                                        <label for="stek_{{ $i }}" class="text-sm text-gray-700">Stek {{ $i }}</label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        {{-- Alternatieve Stekken vijver 1 --}}
                        <div class="py-2">
                            <h3 class="text-lg font-semibold mt-8 mb-4">Alternatieve Stekken vijver 1</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach (['1a', '8a', '9a', '16a'] as $alt)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="stek_{{ $alt }}" id="stek_{{ $alt }}" value="1"
                                            {{ $categorie->{'stek_' . $alt} ? 'checked' : '' }} class="mr-2">
                                        <label for="stek_{{ $alt }}" class="text-sm text-gray-700">Stek {{ $alt }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Stekken vijver 2 --}}
                        <div class="py-2">
                            <h3 class="text-lg font-semibold mt-8 mb-4">Stekken vijver 2</h3>
                            <div class="grid grid-cols-2 gap-4">
                                @for ($i = 17; $i <= 26; $i++)
                                    <div class="flex items-center">
                                        <input type="checkbox" name="stek_{{ $i }}" id="stek_{{ $i }}" value="1"
                                            {{ $categorie->{'stek_' . $i} ? 'checked' : '' }} class="stek-checkbox mr-2">
                                        <label for="stek_{{ $i }}" class="text-sm text-gray-700">Stek {{ $i }}</label>
                                    </div>
                                @endfor
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="mt-8 mb-4">
                            <button type="submit" class="inline-block bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
                                Pas categorie aan
                            </button>
                                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
