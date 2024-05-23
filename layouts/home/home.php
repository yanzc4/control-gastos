<div class="max-w-lg w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
  <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
    <div class="flex items-center">
      <div>
        <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Hola, Juan!</h5>
        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Buen día! 👋</p>
      </div>
    </div>
    <div>
      <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
        <img class="w-full h-full rounded-full" src="../assets/images/logocg.png" alt="">
      </div>
    </div>
  </div>

  <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
    <div class="flex items-center">
      <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
          <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
          <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
        </svg>
      </div>
      <div>
        <h5 id="lblTotal" class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">S./ 3,478.90</h5>
        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Total de dinero actual</p>
      </div>
    </div>
    <div>
      <span id="lblPorcentaje" class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
        <svg class="w-2.5 h-2.5 me-1.5 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
        </svg>
        <span>42.5%</span>
      </span>
    </div>
  </div>

  <div class="grid grid-cols-2">
    <dl class="flex items-center">
      <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Ingresos:</dt>
      <dd id="llbIngresos" class="text-gray-900 text-sm dark:text-white font-semibold">399,478.9</dd>
    </dl>
    <dl class="flex items-center justify-end">
      <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal me-1">Egresos:</dt>
      <dd id="lblEgresos" class="text-gray-900 text-sm dark:text-white font-semibold">999,999.9</dd>
    </dl>
  </div>

  <div id="column-chart"></div>
  
</div>