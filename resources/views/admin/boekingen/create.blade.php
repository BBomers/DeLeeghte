<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nieuwe boeking') }}
        </h2>
    </x-slot>

    <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('boeking.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
            Terug naar boekingen
        </a>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('boeking.store') }}" method="POST">
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
                                <label for="telefoonnummer" class="block text-sm font-medium text-gray-700">Telefoonnummer</label>
                                <input type="text" name="telefoonnummer" id="telefoonnummer" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('telefoonnummer')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="email" id="email" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="datum" class="block text-sm font-medium text-gray-700">Datum</label>
                                <input type="date" name="datum" id="datum" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('datum')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="prijs" class="block text-sm font-medium text-gray-700">Prijs (€)</label>
                                <input type="number" name="prijs" id="prijs" required step="0.01" min="0"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('prijs')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="voldaan" class="block text-sm font-medium text-gray-700">Voldaan</label>
                                <input type="checkbox" name="voldaan" id="voldaan" class="mr-2">
                                @error('voldaan')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="mollie_id" class="block text-sm font-medium text-gray-700">Mollie ID</label>
                                <input type="text" name="mollie_id" id="mollie_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('mollie_id')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="stek" class="block text-sm font-medium text-gray-700">Stek</label>
                                <input type="number" name="stek" id="stek" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('stek')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Dagdeel --}}
                            <div class="mt-4">
                                <label for="dagdeel_1" class="block text-sm font-medium text-gray-700">Dagdeel 1</label>
                                <input type="checkbox" name="dagdeel_1" id="dagdeel_1" class="mr-2">
                                @error('dagdeel_1')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="dagdeel_2" class="block text-sm font-medium text-gray-700">Dagdeel 2</label>
                                <input type="checkbox" name="dagdeel_2" id="dagdeel_2" class="mr-2">
                                @error('dagdeel_2')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="dagdeel_3" class="block text-sm font-medium text-gray-700">Dagdeel 3</label>
                                <input type="checkbox" name="dagdeel_3" id="dagdeel_3" class="mr-2">
                                @error('dagdeel_3')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Arrangement --}}
                            <div class="mt-4">
                                <label for="arrangement" class="block text-sm font-medium text-gray-700">Arrangement</label>
                                <input type="checkbox" name="arrangement" id="arrangement" class="mr-2">
                                @error('arrangement')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Betaling --}}
                            <div class="mt-4">
                                <label for="betaling" class="block text-sm font-medium text-gray-700">Betaling</label>
                                <input type="checkbox" name="betaling" id="betaling" class="mr-2">
                                @error('betaling')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Reglement --}}
                            <div class="mt-4">
                                <label for="regelement" class="block text-sm font-medium text-gray-700">Reglement</label>
                                <input type="checkbox" name="regelement" id="regelement" class="mr-2">
                                @error('regelement')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Pallets --}}
                            <div class="mt-4">
                                <label for="pallets_2mm" class="block text-sm font-medium text-gray-700">Pallets 2mm</label>
                                <input type="number" name="pallets_2mm" id="pallets_2mm" value="0"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('pallets_2mm')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="pallets_4mm" class="block text-sm font-medium text-gray-700">Pallets 4mm</label>
                                <input type="number" name="pallets_4mm" id="pallets_4mm" value="0"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('pallets_4mm')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-4">
                                <label for="pallets_6mm" class="block text-sm font-medium text-gray-700">Pallets 6mm</label>
                                <input type="number" name="pallets_6mm" id="pallets_6mm" value="0"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @error('pallets_6mm')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="mt-8 mb-4">
                            <button type="submit"
                                class="inline-block bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
                                + Maak boeking aan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
