<x-layouts.base>
  {{-- Errors --}}
  @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
      <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Success --}}
  @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif
  <div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md mt-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Boeking Vrij Vissen</h2>

    <form action="{{ route('boeken.store') }}" method="POST" class="space-y-6">
      @csrf

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="naam" class="block font-semibold">Naam</label>
          <input type="text" name="naam" id="naam" required class="w-full border rounded p-2">
        </div>
        <div>
          <label for="telefoon" class="block font-semibold">Telefoon</label>
          <input type="text" name="telefoon" id="telefoon" required class="w-full border rounded p-2">
        </div>
        <div class="md:col-span-2">
          <label for="email" class="block font-semibold">E-mail</label>
          <input type="email" name="email" id="email" required class="w-full border rounded p-2">
        </div>
      </div>

      <hr class="my-4">

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="datum" class="block font-semibold">Datum</label>
          <input type="date" name="datum" id="datum" required class="w-full border rounded p-2">
        </div>
        <div>
          <label for="prijs" class="block font-semibold">Prijs (€)</label>
          <input type="number" step="0.01" name="prijs" id="prijs" required class="w-full border rounded p-2">
        </div>
        <div>
          <label for="stek" class="block font-semibold">Stek</label>
          <input type="number" name="stek" id="stek" class="w-full border rounded p-2">
        </div>
        <div>
          <label for="mollie_id" class="block font-semibold">Mollie ID (optioneel)</label>
          <input type="text" name="mollie_id" id="mollie_id" class="w-full border rounded p-2">
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
        @foreach (['voldaan', 'dagdeel_1', 'dagdeel_2', 'dagdeel_3', 'arrangement', 'betaling', 'regelement'] as $field)
          <label class="inline-flex items-center space-x-2">
            <input type="checkbox" name="{{ $field }}" class="rounded border-gray-300">
            <span class="capitalize">{{ str_replace('_', ' ', $field) }}</span>
          </label>
        @endforeach
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-4">
        <div>
          <label for="pallets_2mm" class="block font-semibold">Pallets 2mm</label>
          <input type="number" name="pallets_2mm" id="pallets_2mm" class="w-full border rounded p-2">
        </div>
        <div>
          <label for="pallets_4mm" class="block font-semibold">Pallets 4mm</label>
          <input type="number" name="pallets_4mm" id="pallets_4mm" class="w-full border rounded p-2">
        </div>
        <div>
          <label for="pallets_6mm" class="block font-semibold">Pallets 6mm</label>
          <input type="number" name="pallets_6mm" id="pallets_6mm" class="w-full border rounded p-2">
        </div>
      </div>

      <div class="flex justify-center space-x-4 mt-6">
        <button type="submit" name="betalingstype" value="contant"
                class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
          Contant Betalen
        </button>

        <button type="submit" name="betalingstype" value="online"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow">
          Online Betalen
        </button>
      </div>
    </form>
  </div>

  {{-- Data containers (voor JS) --}}
  <div id="wedstrijdData" data-wedstrijden='@json($wedstrijden)' class="hidden"></div>
  <div id="boekingData" data-categorie='@json($boeking)' class="hidden"></div>
</x-layouts.base>
