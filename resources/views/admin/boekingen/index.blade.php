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
        <div class="space-y-6">
            @forelse ($boekingen as $boeking)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="flex p-4">
                        <div class="w-full">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                                <a href="{{ route('boeking.show', $boeking) }}" class="hover:underline">{{ optional($boeking->uuid)->naam ?? 'Onbekende klant' }}</a>
                                
                            </h3>

                            <p class="text-sm text-gray-600 mb-1">
                                <strong>Datum:</strong> {{ \Carbon\Carbon::parse($boeking->datum)->format('d-m-Y') }}
                            </p>

                            <p class="text-sm text-gray-600 mb-1">
                                <strong>Dagdelen:</strong>
                                @php
                                    $delen = [];
                                    if($boeking->dagdeel_1) $delen[] = '1';
                                    if($boeking->dagdeel_2) $delen[] = '2';
                                    if($boeking->dagdeel_3) $delen[] = '3';
                                @endphp
                                {{ implode(', ', $delen) ?: 'Geen' }}
                            </p>

                            <p class="text-sm text-gray-600 mb-1">
                                <strong>Arrangement:</strong> {{ $boeking->arrangement ? 'Ja' : 'Nee' }}
                            </p>

                            <p class="text-sm text-gray-600 mb-1">
                                <strong>Voldaan:</strong> 
                                @if ($boeking->voldaan)
                                    Ja
                                @else
                                    @if ($boeking->mollie_id)
                                        (Nee, Mollie)
                                    @else
                                        Nee, (Contant betaling)
                                    @endif
                                @endif
                            </p>

                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 text-center">Er zijn nog geen boekingen beschikbaar.</p>
            @endforelse
        </div>

    </div>
</x-app-layout>
