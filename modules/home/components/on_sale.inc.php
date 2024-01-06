<div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4">
    <div class="w-full relative flex items-center justify-center">

        <button aria-label="slide backward" control-slide="#slider_on_sale" class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prev">
            <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>

        <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
            <div id="slider_on_sale" class="h-full flex lg:gap-8 md:gap-6 gap-14 items-center justify-start transition ease-out duration-700">

                <a href="?app=home&v=insert&type=3d" class="flex flex-shrink-0 relative w-25 md:w-full sm:w-auto shadow">
                    <img id="templ" src="templates/assets/images/light-tech-bg.png" alt="black chair and white table" class="object-cover object-center w-full" />
                    <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                        <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Add On Sale</h2>
                        <div class="flex h-full items-center pb-6">
                            <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900 m-auto">Insert</h3>
                        </div>
                    </div>
                </a>

                <?php foreach ($products as $idx => $item) { ?>
                    <a href="?app=home&v=detail&idx=<?=$idx?>" class="flex flex-shrink-0 relative w-25 md:w-full sm:w-auto shadow">
                        <img src="<?= $item['image']?>" alt="black chair and white table" class="object-cover object-center w-full popular-child" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900"></h2>
                            <div class="flex h-full pb-6">
                                <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900 mt-auto w-100 text-center"><?= $item['product_name']?></h3>
                            </div>
                        </div>
                    </a>
                <?php } ?>

            </div>
        </div>

        <button aria-label="slide forward" control-slide="#slider_on_sale" class="absolute z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" id="next">
            <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>

    </div>
</div>


<hr class="mb-5 mt-3">


<div class="grid grid-cols-2 md:grid-cols-4 gap-4">

    <div class="hover:shadow-2xl hover:fixed hover:scale-200 duration-200 transition-shadow">
        <a href="?app=home&v=detail" class="text-dark">
            <img class="max-w-full rounded-t-lg" style="height: 20rem;" src="templates/assets/temps/knight_low_poly_model.png" alt="">
            <div class="card rounded-t-none rounded-b-lg">
                <div class="card-header fw-bold text-center text-lg">
                    Low poly knight model and animations
                </div>
                <div class="card-body">
                    <pre>
Assets
    - Model
Animation
    - Walk 4 dir
    </pre>
                </div>
            </div>
        </a>
    </div>

    <div class="hover:shadow-2xl hover:fixed hover:scale-200 duration-200 transition-shadow border rounded-lg">
        <img class="max-w-full w-full rounded-t-lg" style="height: 30rem !important;" src="templates/assets/images/light-tech-bg.png" alt="">
        <div class="rounded-t-none rounded-b-lg">
            <div class="fw-bold text-center text-xl pt-2">
                Insert
            </div>
        </div>
    </div>

</div>