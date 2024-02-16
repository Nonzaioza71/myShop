<div class="flex" style="align-items: center;">

    <div class="track-wrapper w-auto">
        <ul class="track grid grid-cols-5 overflow-hidden" id="track_on_sale">

            <?php if (checkPerm($permission, 'product_insert')) { ?>
                <li onclick="window.location.href = '?app=home&v=insert&type=<?= $_GET['type'] ?>'" class="flex flex-shrink-0 relative w-25 md:w-full sm:w-auto shadow track__item">
                    <img id="templ" src="templates/assets/images/light-tech-bg.png" alt="black chair and white table" class="object-cover object-center w-full" />
                    <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                        <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900">Add On Sale</h2>
                        <div class="flex h-full items-center pb-6">
                            <h3 class="text-xl lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900 m-auto">Insert</h3>
                        </div>
                    </div>
                </li>
            <?php } ?>

            <?php foreach ($products as $idx => $item) {
                if ((@$item['product_promotion_name'] == 'On Sale')) { ?>
                    <li id="track_on_sale_item" onclick="window.location.href = '?app=home&v=detail&idx=<?= $item['id'] ?>'" class="flex flex-shrink-0 relative w-25 md:w-full sm:w-auto shadow track__item hover:shadow-2xl hover:shadow-green-500 cursor-pointer transform scale-100 hover:scale-125 z-0 hover:z-40 duration-200">
                        <img src="<?= $image = $item['image'] ? $item['image'] : "https://png.pngtree.com/png-vector/20190820/ourmid/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg" ?>" alt="black chair and white table" class="object-cover object-center w-full popular-child" />
                        <div class="bg-gray-800 bg-opacity-30 absolute w-full h-full p-6">
                            <h2 class="lg:text-xl leading-4 text-base lg:leading-5 text-white dark:text-gray-900"></h2>
                            <div class="flex h-full pb-6 mt-5 opacity-0 hover:opacity-100 duration-200 pt-60">
                                <h3 class="text-lg lg:text-2xl font-semibold leading-5 lg:leading-6 text-white dark:text-gray-900 m-auto w-full text-center bg-black p-3 rounded-s-3xl"><?= $item['product_name'] ?></h3>
                            </div>
                        </div>
                    </li>
            <?php }
            } ?>

        </ul>

    </div>

    <div class="start-5 absolute align-middle m-auto ps-2">
        <button onclick="new OnSale()._goPrev()" class="rounded-full border border-5 p-1 border-opacity-100 bg-white hover:text-gray-500 hover:bg-gray-950 duration-300">
            <svg class="dark:text-gray-900" width="64" height="64" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    <div class="absolute align-middle m-auto ps-2 right-24">
        <button onclick="new OnSale()._goNext()" class="rounded-full border border-5 p-1 border-opacity-100 bg-white hover:text-gray-500 hover:bg-gray-950 duration-300">
            <svg class="dark:text-gray-900" width="64" height="64" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>
</div>


<div class="w-full mt-3">
    <div class="w-50 m-auto grid grid-cols-3">
        <div class="text-end self-center">
            <svg class="dark:text-gray-900 m-auto animate__animated animate__shakeX animate__slower animate__infinite" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
        <div class="text-center">
            <span>Scroll to see more</span>
        </div>
        <div class="self-center">
            <svg class="dark:text-gray-900 m-auto animate__animated animate__shakeX animate__slower animate__infinite" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    </div>
</div>


<hr class="mb-5 mt-3">



<!-- <div class="hover:shadow-2xl hover:fixed hover:scale-200 transition-shadow transform scale-100 hover:scale-105 duration-200 ">
        <a href="?app=home&v=detail" class="text-dark">
            <img class="max-w-full rounded-t-lg" style="height: 20rem;" src="templates/assets/temps/knight_low_poly_model.png" alt="">
            <div class="card rounded-t-none rounded-b-lg">
                <div class="card-header fw-bold text-center text-lg">
                    Low poly knight model and animations
                </div>
                <div class="card-body">
                    <pre></pre>
                </div>
            </div>
        </a>
    </div> -->

<div class="w-full">
    <h1 class="text-3xl">
        <?php $type = $_GET['type'];
        $_count = array_filter($products, function ($item) use ($type) {
            return $item['product_type_name'] == $type;
        }); ?>
        <?= count($_count) ?> Products</h1>
    <div class="w-full">
        <div class="mx-auto max-w-2xl px-4 py-16 pt-3 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

                <?php if (checkPerm($permission, 'product_insert')) { ?>

                    <div class="group relative shadow-lg pb-2 rounded-lg">
                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                            <img src="templates/assets/images/light-tech-bg.png" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div class="w-full">
                                <h3 class="text-xl text-center w-full text-gray-700">
                                    <a href="?app=home&v=insert&type=<?= $_GET['type'] ?>">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        Insert Product
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500 w-full text-center"><?= strtoupper($_GET['type']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php foreach ($products as $idx => $item) {
                    if ($item['product_type_name'] == $_GET['type']) { ?>
                        <div class="group relative">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                <img src="<?php if ($item['image']) {
                                                echo $item['image'];
                                            } else {
                                                echo "https://png.pngtree.com/png-vector/20190820/ourmid/pngtree-no-image-vector-illustration-isolated-png-image_1694547.jpg";
                                            } ?>" alt="Front of men&#039;s Basic Tee in black." class="h-full w-full object-cover object-center lg:h-full lg:w-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a href="?app=home&v=detail&idx=<?= $item['id'] ?>">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            <?= $item['product_name'] ?>
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500"><?= strtoupper($item['product_type_name']) ?></p>
                                </div>
                                <p class="text-md font-bold text-green-500"><?= number_format($item['product_price']) ?>$</p>
                            </div>
                        </div>
                <?php }
                } ?>

            </div>
        </div>
    </div>
</div>


<script>
    class OnSale {
        init() {
            const element = document.querySelector('#track_on_sale')
            setTimeout(() => element.scrollTo({
                left: 0,
                behavior: "smooth"
            }), 10);

        }

        _goNext() {
            const element = document.querySelector('#track_on_sale')
            const step = document.querySelector('#track_on_sale_item').clientWidth * 1
            element.scrollTo({
                left: (element.scrollLeft + step) * 1,
                behavior: "smooth"
            })
        }

        _goPrev() {
            const element = document.querySelector('#track_on_sale')
            const step = document.querySelector('#track_on_sale_item').clientWidth * 1
            element.scrollTo({
                left: (element.scrollLeft - step) * 1,
                behavior: "smooth"
            })
        }
    }

    window.addEventListener("load", () => {
        new OnSale().init()
    })
</script>