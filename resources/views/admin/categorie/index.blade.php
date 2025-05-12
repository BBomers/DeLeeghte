<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorie') }}
        </h2>
    </x-slot>
    
    @if (session('success'))
        <div class="py-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-500 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                    {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">

    
        
        <a href="{{ route('categorie.create') }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
            + Nieuwe categorie
        </a>
        <a href="{{ route('wedstrijd.index') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
            Terug naar wedstrijden
        </a>
        
        </div>
        <div class="py-3 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">
                @foreach ($Categorie as $category)
                    <div class="bg-white shadow-md rounded-lg overflow-hidden" onclick="{{ route('categorie.edit', $category) }}">
                        <div class="flex p-4">
                            <!-- Iframe aan de linkerzijde -->
                            <div class="w-40 h-40  pr-4">
                                <iframe src="{{ $category->iframe_url }}" class="w-40 h-40 rounded-md border" title="Iframe voor {{ $category->type }}"></iframe>
                            </div>
                            
                            <!-- Categorie gegevens aan de rechterzijde -->
                            <div class="w-full pl-4">
                                
                                <h3 class="ml-3 text-xl font-semibold text-gray-800">                            
                                    <a href="{{ route('categorie.edit', $category) }}" class="hover:underline">{{ $category->naam }}</a>
                                </h3>
                                <p class="ml-3 mt-2 text-sm text-gray-600">type: {{ $category->type }}</p>
                                <p class="ml-3 mt-2 text-sm text-gray-600">Beschrijving: {{ Str::limit($category->beschrijving, 100) }}</p>
                                <p class="ml-3 t-4 text-sm text-gray-600">Max deelnemers: {{ $category->max }}</p>
                                <p class="ml-3 text-sm text-gray-600">Aantal namen: {{ $category->aantal_namen }}</p>
                                <div class="flex justify-end p-4">
                                    <form action="{{ route('categorie.destroy', $category) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button
                                                type="submit"
                                                class="ml-auto inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                            >
                                            <svg id='Bin_2_24' width='24' height='24' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'><rect width='24' height='24' stroke='none' fill='#000000' opacity='0'/>

                                                <g transform="matrix(0.83 0 0 0.83 12 12)" >
                                                <g style="" >
                                                <g transform="matrix(1 0 0 1 0.93 3.75)" >
                                                <path style="stroke: rgb(255, 255, 255); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-12.93, -15.75)" d="M 18.177 23.25 L 7.677 23.25 C 6.84857287525381 23.25 6.177 22.57842712474619 6.177 21.75 L 6.177 8.25 L 19.677 8.25 L 19.677 21.75 C 19.677 22.57842712474619 19.00542712474619 23.25 18.177 23.25 Z" stroke-linecap="round" />
                                                </g>
                                                <g transform="matrix(1 0 0 1 -1.32 3.75)" >
                                                <path style="stroke: rgb(255, 255, 255); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-10.68, -15.75)" d="M 10.677 18.75 L 10.677 12.75" stroke-linecap="round" />
                                                </g>
                                                <g transform="matrix(1 0 0 1 3.18 3.75)" >
                                                <path style="stroke: rgb(255, 255, 255); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-15.18, -15.75)" d="M 15.177 18.75 L 15.177 12.75" stroke-linecap="round" />
                                                </g>
                                                <g transform="matrix(1 0 0 1 -0.04 -7.81)" >
                                                <path style="stroke: rgb(255, 255, 255); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-11.96, -4.19)" d="M 2.427 6.212 L 21.501 2.158" stroke-linecap="round" />
                                                </g>
                                                <g transform="matrix(1 0 0 1 -0.21 -9.14)" >
                                                <path style="stroke: rgb(255, 255, 255); stroke-width: 1.5; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;" transform=" translate(-11.79, -2.86)" d="M 13.541 0.783 L 9.141 1.718 C 8.750945868281716 1.8003060709308976 8.409697993555893 2.0344922451029492 8.192613513470457 2.368843622382334 C 7.97552903338502 2.7031949996617186 7.900465840138368 3.1102070304394953 7.984 3.5000000000000004 L 8.3 4.965 L 15.636000000000001 3.405 L 15.32 1.938 C 15.147594071457373 1.127862269008928 14.351181151561573 0.6107982316398162 13.541 0.7830000000000001 Z" stroke-linecap="round" />
                                                </g>
                                                </g>
                                                </g>
                                            </svg>

                                        </button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
