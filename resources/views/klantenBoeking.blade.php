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

  <div class="max-w-4xl mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-4 text-center">Boeking Vrij Vissen</h2>

    <form action="{{ route('boeken.store') }}" method="POST" class="space-y-6">
      @csrf

      {{-- Rij 1: Persoonsgegevens (links) & Datum/prijs/mollie_id (rechts) --}}
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Links --}}
        <div class="space-y-4 p-6 bg-[#2e3b47] rounded-xl shadow-md">
          <h3 class="text-lg font-semibold border-b pb-1">Persoonsgegevens</h3>
          <div>
            <label for="naam" class="block font-semibold">Naam</label>
            <input type="text" name="naam" id="naam" required class="w-full border rounded p-2 text-black" value="{{ old('naam') }}">
          </div>
          <div>
            <label for="telefoon" class="block font-semibold">Telefoon</label>
            <input type="text" name="telefoon" id="telefoon" required class="w-full border rounded p-2 text-black" value="{{ old('telefoon') }}">
          </div>
          <div>
            <label for="email" class="block font-semibold">E-mail</label>
            <input type="email" name="email" id="email" required class="w-full border rounded p-2 text-black" value="{{ old('email') }}">
          </div>
        </div>

        {{-- Rechts --}}
        <div class="space-y-4 p-6 bg-[#2e3b47] rounded-xl shadow-md">
          <h3 class="text-lg font-semibold border-b pb-1">Datum & Prijs</h3>
          <div >
            <input type="date" name="datum" id="datum" required class="w-full border rounded p-2 text-black" value="{{ old('datum') }}" >
            
            <?php
            $s = "today";
            if (old('datum') != null) {
              $s = old('datum');
            }

            ?>
            <div id="datepicker-inline" autoSelectToday="1" inline-datepicker data-date="{{ $s}}"></div>
            
          </div>
        </div>
      </div>

      {{-- Rij 2: Stek (volle breedte) --}}
      <div class="p-6 bg-[#2e3b47] rounded-xl shadow-md">
        <h3 class="text-lg font-semibold border-b pb-1 mb-4">Stek</h3>
        
        <div class="w-full h-full">
            <input type="text" name="stek" id="stek" class="w-full border rounded p-2 text-black"  value="{{ old('stek') }}">
              <svg class="w-full h-full" viewBox="0 0 1931 838" preserveAspectRatio="xMidYMid slice" fill="none" id="svg_img"
                  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <rect class="w-full h-full" fill="url(#pattern0_4_2)" />
                

                  <circle cx="920" cy="270" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="9"/>
                  <text x="920" y="285" text-anchor="middle" font-size="50" fill="black">9</text>
                  <circle cx="1018" cy="270" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="10"/>
                  <text x="1018" y="285" text-anchor="middle" font-size="50" fill="black">10</text>
                  <circle cx="1116" cy="270" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="11"/>
                  <text x="1116" y="285" text-anchor="middle" font-size="50" fill="black">11</text>
                  <circle cx="1214" cy="270" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="12"/>
                  <text x="1214" y="285" text-anchor="middle" font-size="50" fill="black">12</text>
                  <circle cx="1312" cy="270" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="13"/>
                  <text x="1312" y="285" text-anchor="middle" font-size="50" fill="black">13</text>
                  <circle cx="1410" cy="270" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="14"/>
                  <text x="1410" y="285" text-anchor="middle" font-size="50" fill="black">14</text>
                  <circle cx="1508" cy="270" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="15"/>
                  <text x="1508" y="285" text-anchor="middle" font-size="50" fill="black">15</text>
                  <circle cx="1606" cy="270" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="16"/>
                  <text x="1606" y="285" text-anchor="middle" font-size="50" fill="black">16</text>


                  
                  <circle cx="920" cy="640" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="8"/>
                  <text x="920" y="655" text-anchor="middle" font-size="50" fill="black">8</text>
                  <circle cx="1018" cy="640" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="7"/>
                  <text x="1018" y="655" text-anchor="middle" font-size="50" fill="black">7</text>
                  <circle cx="1116" cy="640" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="6"/>
                  <text x="1116" y="655" text-anchor="middle" font-size="50" fill="black">6</text>
                  <circle cx="1214" cy="640" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="5"/>
                  <text x="1214" y="655" text-anchor="middle" font-size="50" fill="black">5</text>
                  <circle cx="1312" cy="640" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="4"/>
                  <text x="1312" y="655" text-anchor="middle" font-size="50" fill="black">4</text>
                  <circle cx="1410" cy="640" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="3"/>
                  <text x="1410" y="655" text-anchor="middle" font-size="50" fill="black">3</text>
                  <circle cx="1508" cy="640" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="2"/>
                  <text x="1508" y="655" text-anchor="middle" font-size="50" fill="black">2</text>
                  <circle cx="1606" cy="640" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="1"/>
                  <text x="1606" y="655" text-anchor="middle" font-size="50" fill="black">1</text>


                  <circle cx="850" cy="420" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="9a"/>
                  <text x="850" y="435" text-anchor="middle" font-size="50" fill="black">9a</text>
                  <circle cx="850" cy="540" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="8a"/>
                  <text x="850" y="555" text-anchor="middle" font-size="50" fill="black">8a</text>

                  <circle cx="1680" cy="400" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="16a"/>
                  <text x="1680" y="415" text-anchor="middle" font-size="50" fill="black">16a</text>
                  <circle cx="1680" cy="520" r="35" fill="#b66465" stroke="black" stroke-width="0" data-id="1a"/>
                  <text x="1680" y="535" text-anchor="middle" font-size="50" fill="black">1a</text>


              </svg>
            

          
        </div>
      </div>



      {{-- Rij 3: Dagdelen + Arrangement (links) & Pallets (rechts) --}}
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Links --}}
        <div class="p-6 bg-[#2e3b47] rounded-xl shadow-md">
          <h3 class="text-lg font-semibold border-b pb-1 mb-2">Dagdelen & Opties</h3>

          <div class="h-4"></div>

<input type="checkbox" name="dagdeel_1" id="dagdeel_1" class="rounded border-gray-300">
<input type="checkbox" name="dagdeel_2" id="dagdeel_2" class="rounded border-gray-300">
<input type="checkbox" name="dagdeel_3" id="dagdeel_3" class="rounded border-gray-300">
<input type="checkbox" name="arrangement" id="arrangement" class="rounded border-gray-300">

    <div class="space-y-2 w-[90%] mx-auto">
      <!-- Dagdeel 1 -->
      <div class="flex items-center gap-2">
        <div id="dagdeel_status_1" class="h-8 w-[5%] bg-lime-500 rounded"></div>
        <div onclick="Select_Dagdeel('1')" id="vdagdeel_1"
             class="flex-1 bg-sky-400/30 text-white text-sm p-2 rounded border border-slate-700 cursor-pointer border-3">
          1e Dagdeel (8:00 tot 12:00)
        </div>
      </div>

      <!-- Dagdeel 2 -->
      <div class="flex items-center gap-2">
        <div id="dagdeel_status_2" class="h-8 w-[5%] bg-lime-500 rounded"></div>
        <div onclick="Select_Dagdeel('2')" id="vdagdeel_2"
             class="flex-1 bg-sky-400/30 text-white text-sm p-2 rounded border border-slate-700 cursor-pointer border-3">
          2e Dagdeel (12:00 tot 16:00)
        </div>
      </div>

      <!-- Dagdeel 3 -->
      <div class="flex items-center gap-2">
        <div id="dagdeel_status_3" class="h-8 w-[5%] bg-lime-500 rounded"></div>
        <div onclick="Select_Dagdeel('3')" id="vdagdeel_3"
             class="flex-1 bg-sky-400/30 text-white text-sm p-2 rounded border border-slate-700 cursor-pointer border-3">
          3e Dagdeel (16:00 tot 20:00)
        </div>
      </div>

      <!-- 1e & 2e -->
      <div class="flex items-center gap-2">
        <div id="dagdeel_status_12" class="h-8 w-[5%] bg-lime-500 rounded"></div>
        <div onclick="Select_Dagdeel('12')" id="vdagdeel_12"
             class="flex-1 bg-sky-400/30 text-white text-sm p-2 rounded border border-slate-700 cursor-pointer border-3">
          1e & 2e Dagdeel (8:00 tot 16:00)
        </div>
      </div>

      <!-- 2e & 3e -->
      <div class="flex items-center gap-2">
        <div id="dagdeel_status_23" class="h-8 w-[5%] bg-lime-500 rounded"></div>
        <div onclick="Select_Dagdeel('23')" id="vdagdeel_23"
             class="flex-1 bg-sky-400/30 text-white text-sm p-2 rounded border border-slate-700 cursor-pointe border-3r">
          2e & 3e Dagdeel (12:00 tot 20:00)
        </div>
      </div>

      <!-- 1e t/m 3e -->
      <div class="flex items-center gap-2">
        <div id="dagdeel_status_123" class="h-8 w-[5%] bg-lime-500 rounded"></div>
        <div onclick="Select_Dagdeel('123')" id="vdagdeel_123"
             class="flex-1 bg-sky-400/30 text-white text-sm p-2 rounded border border-slate-700 cursor-pointer border-3">
          1e t/m 3e Dagdeel (8:00 tot 20:00)
        </div>
      </div>

      <!-- Arrangement -->
      <div class="flex items-center gap-2 relative">
        <div id="dagdeel_status_arrangement" class="h-8 w-[5%] bg-lime-500 rounded"></div>
        <div onclick="Select_Dagdeel('arrangement')" id="vdagdeel_arrangement"
             class="flex-1 bg-yellow-200/40 text-white text-sm p-2 rounded border border-slate-700 cursor-pointer border-3">
          + Arrangement
        </div>
      </div>
    </div>

        </div>

        {{-- Rechts --}}
        <div class="p-6 bg-[#2e3b47] rounded-xl shadow-md">
          <h3 class="text-lg font-semibold border-b pb-1 mb-2">Pallets</h3>
          <div class="space-y-4">
            <div>
              <label for="pallets_2mm" class="block font-semibold">Pallets 2mm</label>
              <input type="number" name="pallets_2mm" id="pallets_2mm" class="w-full border rounded p-2 text-black" value="0" onchange="calculatePrice()">
            </div>
            <div>
              <label for="pallets_4mm" class="block font-semibold">Pallets 4mm</label>
              <input type="number" name="pallets_4mm" id="pallets_4mm" class="w-full border rounded p-2 text-black" value="0" onchange="calculatePrice()">
            </div>
            <div>
              <label for="pallets_6mm" class="block font-semibold">Pallets 6mm</label>
              <input type="number" name="pallets_6mm" id="pallets_6mm" class="w-full border rounded p-2 text-black" value="0" onchange="calculatePrice()">
            </div>
          </div>
        </div>
      </div>
            @foreach (['betaling', 'regelement'] as $field)
              <label class="inline-flex items-center space-x-2">
                <input type="checkbox" name="{{ $field }}" class="rounded border-gray-300">
                <span class="capitalize">{{ str_replace('_', ' ', $field) }}</span>
              </label>
            @endforeach

      {{-- Rij 4: Betalingsknoppen --}}
      <div class="flex justify-center space-x-4 mt-6">
              <input type="number" name="prijs" id="prijs" class="w-[200px] border rounded p-2 text-black text-center" value="0.00" step="0.01">
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

<script>
function calculatePrice() {
  const dl1 = document.getElementById("dagdeel_1");
  const dl2 = document.getElementById("dagdeel_2");
  const dl3 = document.getElementById("dagdeel_3");
  const arrangement = document.getElementById("arrangement");
  let prijs = 0;
  let dagdelen = 0;

  if (dl1.checked) dagdelen++;
  if (dl2.checked) dagdelen++;
  if (dl3.checked) dagdelen++;

  if (!arrangement.checked) {
    if (dagdelen === 1) prijs = 10;
    else if (dagdelen === 2) prijs = 16;
    else if (dagdelen === 3) prijs = 24;
  } else {
    if (dagdelen === 1) prijs = 22.50;
    else if (dagdelen === 2) prijs = 45;
    else if (dagdelen === 3) prijs = 67.50;
  }

  const pallets_2mm = Number(document.getElementById("pallets_2mm").value);
  const pallets_4mm = Number(document.getElementById("pallets_4mm").value);
  const pallets_6mm = Number(document.getElementById("pallets_6mm").value);

  prijs += (pallets_2mm * 6);
  prijs += (pallets_4mm * 6);
  prijs += (pallets_6mm * 6);

  document.getElementById("prijs").value = prijs.toFixed(2);
}



  function Select_Dagdeel(arg1) {
    const arrangement = document.getElementById("arrangement");
    if (arg1 == "arrangement" ) {
      document.getElementById("vdagdeel_arrangement").classList.add("border-yellow-300");
      arrangement.checked = true;
      calculatePrice();
      return;
    }
    document.getElementById("vdagdeel_1").classList.remove("border-yellow-300");
    document.getElementById("vdagdeel_2").classList.remove("border-yellow-300");
    document.getElementById("vdagdeel_3").classList.remove("border-yellow-300");
    document.getElementById("vdagdeel_12").classList.remove("border-yellow-300");
    document.getElementById("vdagdeel_123").classList.remove("border-yellow-300");
    document.getElementById("vdagdeel_23").classList.remove("border-yellow-300");
    document.getElementById("vdagdeel_arrangement").classList.remove("border-yellow-300");


    const dl1 = document.getElementById("dagdeel_1");
    const dl2 = document.getElementById("dagdeel_2");
    const dl3 = document.getElementById("dagdeel_3");
    switch (arg1) {
      case "1":
          document.getElementById("vdagdeel_1").classList.add("border-yellow-300");
          dl1.checked = true;
          dl2.checked = false;
          dl3.checked = false;
          arrangement.checked = false;
        break;
      case '2':
          document.getElementById("vdagdeel_2").classList.add("border-yellow-300");
          dl1.checked = false;
          dl2.checked = true;
          dl3.checked = false;
          arrangement.checked = false;
        break;
      case '3':
          document.getElementById("vdagdeel_3").classList.add("border-yellow-300");
          dl1.checked = false;
          dl2.checked = false;
          dl3.checked = true;
          arrangement.checked = false;
        break;
      case '12':
          document.getElementById("vdagdeel_12").classList.add("border-yellow-300");
          dl1.checked = true;
          dl2.checked = true;
          dl3.checked = false;
          arrangement.checked = false;
        break;
      case '123':
          document.getElementById("vdagdeel_123").classList.add("border-yellow-300");
          dl1.checked = true;
          dl2.checked = true;
          dl3.checked = true;
          arrangement.checked = false;
        break;
      case '23':
          document.getElementById("vdagdeel_23").classList.add("border-yellow-300");
          dl1.checked = false;
          dl2.checked = true;
          dl3.checked = true;
          arrangement.checked = false;
        break;
    
      default:
          dl1.checked = false;
          dl2.checked = false;
          dl3.checked = false;
          arrangement.checked = false;
        break;
    }
    calculatePrice();
    
    
  }






  const circles = document.querySelectorAll('#svg_img circle');

  circles.forEach((circle, index) => {
    circle.addEventListener('click', () => {
      const vijverId = circle.getAttribute('data-id');
      console.log("test: "+vijverId);
      selectVijver(vijverId);
    });

    circle.setAttribute('fill', '#b66465');
  });

  const textes = document.querySelectorAll('#svg_img text');

  textes.forEach((text, index) => {
    text.addEventListener('click', () => {
      const vijverId = text.textContent;
      console.log("test: "+vijverId);
      selectVijver(vijverId);
    });

  });

  function changecolor(value) {
    const circles = document.querySelectorAll('#svg_img circle');
    circles.forEach((circle, index) => {
      
      const vijverId = circle.getAttribute('data-id');
      if (vijverId == value) {
        circle.setAttribute('fill', 'orange');
      } else {
        circle.setAttribute('fill', '#b66465');
      }
    });

  }



  function selectVijver(nr) {
    changecolor(nr);
    console.log('Vijver ' + nr + ' geselecteerd');
    stek.value = nr;
  }




  document.addEventListener('DOMContentLoaded', function () {
    const datepickerEl = document.getElementById('datepicker-inline');

    const datepicker = new Datepicker(datepickerEl, {
      autohide: true,
      format: 'yyyy-mm-dd',
      defaultViewDate: new Date(),
      todayHighlight: true,
      inline: true,
    });

    // Event listener voor selectie
    datepickerEl.addEventListener('changeDate', function (e) {
      document.getElementById('datum').value = e.detail.date.toISOString().split('T')[0];
    });
  });




</script>

<style>
.datepicker-picker {
  background-color: #2e3b47;
}
</style>