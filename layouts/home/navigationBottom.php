<div class="fixed z-40 w-full px-4 h-16 max-w-lg -translate-x-1/2 bottom-4 left-1/2">
    <div class="grid h-full max-w-lg grid-cols-5 mx-auto rounded-full bg-[#050708]">
        <button onclick="cargarHome()" type="button" class=" relleno-btn inline-flex flex-col items-center justify-center px-5 rounded-s-full hover:text-white dark:hover:bg-gray-800 group">
            <svg class="w-6 h-6 text-gray-400 active" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
            </svg>

            <span class="sr-only">Home</span>
        </button>

        <button onclick="cargarIngresos()" type="button" class=" relleno-btn inline-flex flex-col items-center justify-center px-5 hover:text-white dark:hover:bg-gray-800 group">
            <svg class="w-6 h-6 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01" />
            </svg>

            <span class="sr-only">Ingresos</span>
        </button>

        <div class="flex items-center justify-center">
            <button id="dropdownTopButton" data-dropdown-toggle="dropdownTop" data-dropdown-placement="top" type="button" class="inline-flex items-center justify-center w-10 h-10 font-medium bg-gray-50 rounded-full hover:bg-gray-50 group focus:ring-4 focus:ring-gray-200 focus:outline-none dark:focus:ring-gray-300">
                <svg class="w-4 h-4 text-gray-900 transition-transform" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                </svg>
                <span class="sr-only">New item</span>
            </button>
        </div>

        <!-- Dropdown menu -->
        <div id="dropdownTop" class="z-10 hidden w-44">
            <div class="grid p-2 mx-w-lg grid-cols-2 mb-2 bg-[#050708] rounded-full mx-auto">
                <button data-modal-target="crud-ingreso" data-modal-toggle="crud-ingreso" class="inline-flex flex-col items-center justify-center px-5 rounded-s-full text-green-500">Ingresos</button>
                <button class="inline-flex flex-col items-center justify-center px-5 rounded-s-full text-red-500">Egresos</button>
            </div>
        </div>

        <button onclick="cargarEgresos()" type="button" class=" relleno-btn inline-flex flex-col items-center justify-center px-5 hover:text-white dark:hover:bg-gray-800 group">
            <svg class="w-6 h-6 text-gray-400 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11v5m0 0 2-2m-2 2-2-2M3 6v1a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1Zm2 2v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8H5Z" />
            </svg>
            <span class="sr-only">Egresos</span>
        </button>

        <button type="button" class=" relleno-btn inline-flex flex-col items-center justify-center px-5 rounded-e-full hover:text-white dark:hover:bg-gray-800 group">
            <svg class="w-6 h-6 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
            </svg>

            <span class="sr-only">Reportes</span>
        </button>
    </div>
</div>