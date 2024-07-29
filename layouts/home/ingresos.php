<div class="max-w-lg w-full bg-white rounded-lg shadow dark:bg-gray-800 px-4 md:p-6">

    <div class=" sticky z-50 top-0 bg-white">
        <div class="flex justify-between pb-4 pt-4 mb-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Ingresos</h5>
            </div>
            <div>
                <h5 class="leading-none text-lg font-bold text-green-500 pb-1">Ver Todos</h5>
            </div>
        </div>
    </div>

    <?php for ($i = 0; $i < 30; $i++) { ?>
        <div class="swiper border-b mb-3 border-gray-200">
            <div class="swiper-wrapper pb-3">
                <div class="swiper-slide menu">
                    <button onclick="eliminarIngreso('<?php echo $i; ?>')" class="w-10 h-10 rounded-lg bg-red-100 text-red-900 hover:bg-red-200 focus:bg-red-200 flex items-center justify-center me-3 text-2xl">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <div class="swiper-slide content">

                    <div class=" menu-button flex justify-between">
                        <div class="flex items-center">
                            <div>
                                <h5 class="leading-none text-md font-bold text-gray-900 dark:text-white pb-1">Compra de azucar</h5>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400">2024-11-23</p>
                            </div>
                        </div>
                        <div>
                            <h5 class="leading-none text-md font-bold text-gray-900 pb-1">S./22.00</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php
    } ?>


</div>