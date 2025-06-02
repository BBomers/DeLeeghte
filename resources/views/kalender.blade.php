<x-layouts.base>


  <section class="relative bg-stone-50">
    <div class="w-full py-24 relative z-10 backdrop-blur-3xl">
      <div class="w-full max-w-7xl mx-auto px-2 lg:px-8">
        <div class="grid grid-cols-12 gap-8 max-w-4xl mx-auto xl:max-w-full">
          <div class="col-span-12 xl:col-span-5">
            <h2 class="font-manrope text-3xl leading-tight text-gray-900 mb-1.5">Aankomenden Events</h2>
            <p class="text-lg font-normal text-gray-600 mb-8">Mis geen evenement</p>
            <div class="flex gap-5 flex-col">


              @foreach ($aankomend as $wedstrijd)
              <div class="p-6 rounded-xl bg-white">
                <div class="flex items-center justify-between mb-3">
                  <div class="flex items-center gap-2.5">
                    <span class="w-2.5 h-2.5 rounded-full"
                      style="background-color: {{ $wedstrijd->categorie->kleur }}"></span>
                    <p class="text-base font-medium text-gray-900">{{
                      \Carbon\Carbon::parse($wedstrijd->date)->translatedFormat('d F Y') }}</p>
                  </div>
                </div>
                <h6 class="text-xl leading-8 font-semibold text-black mb-1">{{ $wedstrijd->naam }}</h6>
                <p class="text-base font-normal text-gray-600">{{ $wedstrijd->categorie->type }}</p>
              </div>
              @endforeach
            </div>
          </div>
          <div
            class="col-span-12 xl:col-span-7 px-2.5 py-5 sm:p-8 bg-gradient-to-b from-white/25 to-white xl:bg-white rounded-2xl max-xl:row-start-1">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between mb-5">
              <div class="flex items-center gap-4">
                @php
                $monthYear = \Carbon\Carbon::now()->translatedFormat('F Y');
                $monthYear = ucfirst($monthYear); // Eerste letter hoofdletter maken
                @endphp
                <h5 class="text-xl leading-8 font-semibold text-gray-900">{{ $monthYear }}</h5>
                <div class="flex items-center">
                  <button
                    class="text-indigo-600 p-1 rounded transition-all duration-300 hover:text-white hover:bg-indigo-600"
                    onclick="previos()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                      <path d="M10.0002 11.9999L6 7.99971L10.0025 3.99719" stroke="currentcolor" stroke-width="1.3"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </button>
                  <button
                    class="text-indigo-600 p-1 rounded transition-all duration-300 hover:text-white hover:bg-indigo-600"
                    onclick="next()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                      <path d="M6.00236 3.99707L10.0025 7.99723L6 11.9998" stroke="currentcolor" stroke-width="1.3"
                        stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </button>
                </div>
              </div>
            </div>
            <div class="border border-indigo-200 rounded-xl">
              <div class="grid grid-cols-7 rounded-t-3xl border-b border-indigo-200">
                <div
                  class="py-3.5 border-r rounded-tl-xl border-indigo-200 bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">
                  Sun</div>
                <div
                  class="py-3.5 border-r border-indigo-200 bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">
                  Mon</div>
                <div
                  class="py-3.5 border-r border-indigo-200 bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">
                  Tue</div>
                <div
                  class="py-3.5 border-r border-indigo-200 bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">
                  Wed</div>
                <div
                  class="py-3.5 border-r border-indigo-200 bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">
                  Thu</div>
                <div
                  class="py-3.5 border-r border-indigo-200 bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">
                  Fri</div>
                <div
                  class="py-3.5 rounded-tr-xl bg-indigo-50 flex items-center justify-center text-sm font-medium text-indigo-600">
                  Sat</div>
              </div>
              <div class="grid grid-cols-7 rounded-b-xl">
                <div id="0"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50">
                  <span class="text-xs font-semibold text-gray-400">∞</span>
                </div>
                <div id="1"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-400">∞</span>
                </div>
                <div id="2"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-400">∞</span>
                </div>
                <div id="3"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-400">∞</span>
                </div>
                <div id="4"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-400">∞</span>
                </div>
                <div id="5"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="6"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="7"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 relative bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="8"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="9"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="10"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="11"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white relative border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="12"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="13"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span
                    class="text-xs font-semibold text-indigo-600 sm:text-white sm:w-6 sm:h-6 rounded-full sm:flex items-center justify-center sm:bg-indigo-600">∞</span>
                </div>
                <div id="14"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="15"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="16"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="17"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="18"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="19"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="20"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="21"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="22"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="23"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 relative bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="24"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="25"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="26"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="27"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="28"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="29"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="30"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="31"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="32"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="33"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="34"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-b border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="35"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-white border-r border-indigo-200 rounded-bl-xl transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-900">∞</span>
                </div>
                <div id="36"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-400">∞</span>
                </div>
                <div id="37"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-400">∞</span>
                </div>
                <div id="38"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-400">∞</span>
                </div>
                <div id="39"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 relative bg-gray-50 border-r border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-400">∞</span>
                </div>
                <div id="40"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-r border-indigo-200 transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-400">∞</span>
                </div>
                <div id="41"
                  class="flex xl:aspect-square max-xl:min-h-[60px] p-3.5 bg-gray-50 border-indigo-200 rounded-br-xl transition-all duration-300 hover:bg-indigo-50 cursor-pointer">
                  <span class="text-xs font-semibold text-gray-400">∞</span>
                </div>

              </div>
              <div id="calendar-grid" class="grid grid-cols-7 rounded-b-xl"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    // Initialize date and month
    let currentDate = new Date();
    let selectedView = "month"; // Default view
    let currentMonth = currentDate.getMonth(); // 0 = January, 11 = December
    let currentYear = currentDate.getFullYear();

    // Function to update calendar grid based on month and year
    const updateCalendar = () => {
      // Set month title
      document.getElementById('month-title').innerText = currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });

      const firstDay = new Date(currentYear, currentMonth, 1);
      const lastDay = new Date(currentYear, currentMonth + 1, 0);
      const daysInMonth = lastDay.getDate();
      const startingDay = firstDay.getDay(); // Day of the week the month starts

      const calendarGrid = document.getElementById('calendar-grid');
      calendarGrid.innerHTML = ''; // Clear previous grid

      // Empty slots before the start of the month
      for (let i = 0; i < startingDay; i++) {
        const emptyCell = document.createElement('div');
        emptyCell.classList.add('flex', 'xl:aspect-square', 'max-xl:min-h-[60px]', 'p-3.5', 'bg-gray-50', 'border-r', 'border-b', 'border-indigo-200');
        calendarGrid.appendChild(emptyCell);
      }

      // Fill in the days of the month
      for (let day = 1; day <= daysInMonth; day++) {
        const dayCell = document.createElement('div');
        dayCell.classList.add('flex', 'xl:aspect-square', 'max-xl:min-h-[60px]', 'p-3.5', 'bg-white', 'border-r', 'border-b', 'border-indigo-200', 'transition-all', 'duration-300', 'hover:bg-indigo-50', 'cursor-pointer');
        dayCell.innerHTML = `<span class="text-xs font-semibold text-gray-900">${day}</span>`;
        calendarGrid.appendChild(dayCell);
      }
    };

    // Handle month navigation
    document.getElementById('prev-month').addEventListener('click', () => {
      currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
      currentDate.setMonth(currentMonth);
      updateCalendar();
    });

    document.getElementById('next-month').addEventListener('click', () => {
      currentMonth = (currentMonth === 11) ? 0 : currentMonth + 1;
      currentDate.setMonth(currentMonth);
      updateCalendar();
    });

    // Handle view change
    document.getElementById('day-view').addEventListener('click', () => {
      selectedView = 'day';
      updateCalendar();
    });

    document.getElementById('week-view').addEventListener('click', () => {
      selectedView = 'week';
      updateCalendar();
    });

    document.getElementById('month-view').addEventListener('click', () => {
      selectedView = 'month';
      updateCalendar();
    });

    // Initialize the calendar with the current month
    updateCalendar();
  </script>

</x-layouts.base>
<!-- Dit moet in je script onderaan je pagina -->