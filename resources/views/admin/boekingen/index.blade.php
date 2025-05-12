<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Boekingen') }}
        </h2>
    </x-slot>
    
    @if (session('success'))
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-500 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-white">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('boeking.create') }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
            + Nieuwe Boeking
        </a>
    </div>

    <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="space-y-6">
            @foreach ($boekingen as $boeking)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="flex flex-col md:flex-row p-4 justify-between items-start md:items-center">
                        <div>
                            <h3 class="text-xl font-semibold text-gray-800">
                                <a href="{{ route('boeking.edit', $boeking) }}" class="hover:underline">{{ $boeking->naam }}</a>
                            </h3>
                            <p class="mt-2 text-sm text-gray-600">Email: {{ $boeking->email }}</p>
                            <p class="text-sm text-gray-600">Datum: {{ $boeking->datum }}</p>
                            <p class="text-sm text-gray-600">Stek: {{ $boeking->stek }}</p>
                            <p class="text-sm text-gray-600">Prijs: €{{ number_format($boeking->prijs, 2, ',', '.') }}</p>
                            <p class="text-sm text-gray-600">Betaling voldaan: {{ $boeking->voldaan ? 'Ja' : 'Nee' }}</p>
                        </div>
                        <div class="mt-4 md:mt-0 md:ml-auto">
                            <form action="{{ route('boekingen.destroy', $boeking) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
                                >
                                    Verwijderen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
