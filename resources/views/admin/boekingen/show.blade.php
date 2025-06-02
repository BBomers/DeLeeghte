<x-app-layout>


    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-3 mb-6">
                <a href="{{ route('boeking.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded">
                    Terug
                </a>

                <form action="{{ route('boeking.destroy', $boeking) }}" method="POST"
                    onsubmit="return confirm('Weet je zeker dat je deze boeking wilt verwijderen?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">
                        <svg id='Bin_2_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'
                            xmlns:xlink='http://www.w3.org/1999/xlink'>
                            <rect width='24' height='24' stroke='none' fill='#000000' opacity='0' />

                            <g transform="matrix(0.83 0 0 0.83 12 12)">
                                <g style="">
                                    <g transform="matrix(1 0 0 1 0.93 3.75)">
                                        <path
                                            style="stroke: rgb(255, 255, 255); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"
                                            transform=" translate(-12.93, -15.75)"
                                            d="M 18.177 23.25 L 7.677 23.25 C 6.84857287525381 23.25 6.177 22.57842712474619 6.177 21.75 L 6.177 8.25 L 19.677 8.25 L 19.677 21.75 C 19.677 22.57842712474619 19.00542712474619 23.25 18.177 23.25 Z"
                                            stroke-linecap="round" />
                                    </g>
                                    <g transform="matrix(1 0 0 1 -1.32 3.75)">
                                        <path
                                            style="stroke: rgb(255, 255, 255); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"
                                            transform=" translate(-10.68, -15.75)" d="M 10.677 18.75 L 10.677 12.75"
                                            stroke-linecap="round" />
                                    </g>
                                    <g transform="matrix(1 0 0 1 3.18 3.75)">
                                        <path
                                            style="stroke: rgb(255, 255, 255); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"
                                            transform=" translate(-15.18, -15.75)" d="M 15.177 18.75 L 15.177 12.75"
                                            stroke-linecap="round" />
                                    </g>
                                    <g transform="matrix(1 0 0 1 -0.04 -7.81)">
                                        <path
                                            style="stroke: rgb(255, 255, 255); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"
                                            transform=" translate(-11.96, -4.19)" d="M 2.427 6.212 L 21.501 2.158"
                                            stroke-linecap="round" />
                                    </g>
                                    <g transform="matrix(1 0 0 1 -0.21 -9.14)">
                                        <path
                                            style="stroke: rgb(255, 255, 255); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"
                                            transform=" translate(-11.79, -2.86)"
                                            d="M 13.541 0.783 L 9.141 1.718 C 8.750945868281716 1.8003060709308976 8.409697993555893 2.0344922451029492 8.192613513470457 2.368843622382334 C 7.97552903338502 2.7031949996617186 7.900465840138368 3.1102070304394953 7.984 3.5000000000000004 L 8.3 4.965 L 15.636000000000001 3.405 L 15.32 1.938 C 15.147594071457373 1.127862269008928 14.351181151561573 0.6107982316398162 13.541 0.7830000000000001 Z"
                                            stroke-linecap="round" />
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </button>
                </form>
            </div>



            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- UUID Info (links) --}}
                <div class="bg-white p-6 shadow-xl sm:rounded-lg md:col-span-1">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Klantgegevens</h3>
                    <div class="space-y-2 text-sm text-gray-700">
                        <p><strong>Naam:</strong> {{ $boeking->uuid->naam ?? 'Onbekend' }}</p>
                        <p><strong>Telefoon:</strong> {{ $boeking->uuid->telefoon ?? 'Onbekend' }}</p>
                        <p><strong>Email:</strong> {{ $boeking->uuid->email ?? 'Onbekend' }}</p>
                    </div>
                </div>

                {{-- Boeking Details (rechts) --}}
                <div class="bg-white p-6 shadow-xl sm:rounded-lg md:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Boekingsgegevens</h3>
                    <div class="space-y-3 text-sm text-gray-700">
                        <p><strong>Datum:</strong> {{ \Carbon\Carbon::parse($boeking->datum)->format('d-m-Y') }}</p>
                        <p><strong>Prijs:</strong> €{{ number_format($boeking->prijs, 2, ',', '.') }}</p>
                        <p><strong>Voldaan:</strong> 
                            @if ($boeking->voldaan)
                                Ja
                            @else
                                @if ($boeking->mollie_id)
                                    Nee, Mollie
                                @else
                                    Nee, Contant betaling
                                @endif
                            @endif
                        </p>
                        <p><strong>Mollie ID:</strong> {{ $boeking->mollie_id ?? 'N.v.t.' }}</p>
                        <p><strong>Stek:</strong> {{ $boeking->stek }}</p>

                        <p><strong>Dagdelen:</strong>
                            @php
                            $delen = [];
                            if($boeking->dagdeel_1) $delen[] = '1';
                            if($boeking->dagdeel_2) $delen[] = '2';
                            if($boeking->dagdeel_3) $delen[] = '3';
                            @endphp
                            {{ implode(', ', $delen) ?: 'Geen' }}
                        </p>

                        <p><strong>Arrangement:</strong> {{ $boeking->arrangement ? 'Ja' : 'Nee' }}</p>
                        <p><strong>Betaling akkoord:</strong> {{ $boeking->betaling ? 'Ja' : 'Nee' }}</p>
                        <p><strong>Reglement geaccepteerd:</strong> {{ $boeking->regelement ? 'Ja' : 'Nee' }}</p>

                        <p><strong>Pallets 2mm:</strong> {{ $boeking->pallets_2mm }}</p>
                        <p><strong>Pallets 4mm:</strong> {{ $boeking->pallets_4mm }}</p>
                        <p><strong>Pallets 6mm:</strong> {{ $boeking->pallets_6mm }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>