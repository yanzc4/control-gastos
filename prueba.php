<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Swiper demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

    <!-- Link Swiper's CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .menu {
            width: 60px;
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <!-- Swiper -->
    <?php for ($i = 1; $i < 10; $i++) { ?>
        <div class="swiper">
            <div class="swiper-wrapper pb-3 mb-3 border-b border-gray-200">
                <div class="swiper-slide menu">
                    <div class="w-10 h-10 rounded-lg bg-red-100 text-red-900 dark:bg-gray-700 flex items-center justify-center me-3 text-2xl">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
                        </svg>
                    </div>
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




    <?php } ?>





    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var menuButton = document.querySelector('.menu-button');
        var openMenu = function() {
            swiper.slidePrev();
        };
        var swiper = new Swiper('.swiper', {
            slidesPerView: 'auto',
            initialSlide: 1,
            resistanceRatio: 0,
            slideToClickedSlide: true,
            on: {
                slideChangeTransitionStart: function() {
                    var slider = this;
                    if (slider.activeIndex === 0) {
                        menuButton.classList.add('cross');
                        // required because of slideToClickedSlide
                        menuButton.removeEventListener('click', openMenu, true);
                    } else {
                        menuButton.classList.remove('cross');
                    }
                },
                slideChangeTransitionEnd: function() {
                    var slider = this;
                    if (slider.activeIndex === 1) {
                        menuButton.addEventListener('click', openMenu, true);
                    }
                },
            },
        });
    </script>
</body>

</html>