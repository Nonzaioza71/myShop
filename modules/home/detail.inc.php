<?php
// print_r($_GET);
$product = getProductByID($_GET);
$data = $product['data'][0];
$images = $product['images'];

// echo "<pre>";
// print_r($data);
// echo "</pre>";
?>

<div class="rounded mt-4">
    <div id="carouselPreviewModel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php $controll_count = $data['product_iframe'] ? 1 : 0;
            $controll_count = $controll_count + count($images);

            for ($i = 0; $i < $controll_count; $i++) { ?>

                <?php if ($i == 0) { ?>
                    <button type="button" data-bs-target="#carouselPreviewModel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <?php } else { ?>
                    <button type="button" data-bs-target="#carouselPreviewModel" data-bs-slide-to="<?= $i ?>" aria-label="Slide <?= $i + 1 ?>"></button>
            <?php }
            } ?>
        </div>
        <div class="carousel-inner">

            <?php if ($data['product_iframe']) { ?>
                <div class="carousel-item active">
                    <div class="w-full">
                        <div class="sketchfab-embed-wrapper w-full">
                            <iframe onload="try{loadSuccess(false)}catch(e){}" class="w-full" style="height:calc(90vw / 2)" title="Low Poly Knight" frameborder="0" mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="<?= $data['product_iframe'] ?>"> </iframe>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php foreach ($images as $idx => $item) { ?>
                <div class="carousel-item">
                    <img src="<?= $item['image'] ?>" class="d-block w-100" style="height:calc(90vw / 2)" alt="...">
                </div>
            <?php } ?>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselPreviewModel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselPreviewModel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="col-md-12 row">
    <div class="col-md-8">
        <div class="pt-2">
            <div class="fw-bold text-start text-xl">
                <?= $data['product_name'] ?>
            </div>
            <div class="col-md-12 row">
                <div class="col-md-6 d-flex mt-2 gap-3">
                    <img src="<?= $profile = $data['memberimage'] ? $data['memberimage'] : "templates/assets/temps/user.png" ?>" alt="Profile Image" style="width: 4rem; height: 4rem; overflow: hidden;">
                    <div class="d-grid">
                        <span class="fw-bold text-lg mt-auto"><?= $data['membername'] ?></span>
                        <span class="text-gray-400 text-sm mb-auto">300 follower</span>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-success">Subscript</button>
                    </div>
                </div>
            </div>
            <div class="text-sm mt-4">
                <pre style="white-space: pre-wrap;"><?= $data['product_detail'] ?></pre>
            </div>
        </div>
    </div>

    <div class="col-md-4 pt-4">
        <div class="card shadow p-2 d-grid gap-2">
            <div class="col-md-12 d-flex justify-content-between">
                <h2 class="text-end fw-bold text-xl">Price</h2>
                <h2 class="text-end fw-bold text-xl"><?= $data['product_price'] ?>$</h2>
            </div>
            <hr>
            <button onclick="purchaseModal.show()" class="bg-green-300 hover:bg-green-400 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center d-flex gap-2">
                <i class="fa-solid fa-cart-shopping fill-current w-4 h-4 mr-2"></i>
                <span>Purchase</span>
            </button>
            <?php if (array_key_exists('user', $_SESSION)) { ?>

                <?php if (count(checkProductInCartByID($data)) > 0) { ?>
                    <form method="post" class="w-full">
                        <input type="hidden" name="action" value="deleteProductToCartByID">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <button type="submit" class="bg-yellow-300 hover:bg-yellow-400 text-yellow-800 font-bold py-2 px-4 rounded inline-flex items-center d-flex gap-2 w-full">
                            <i class="fa-solid fa-check fill-current w-4 h-4 mr-2"></i>
                            <span>Remove from cart</span>
                        </button>
                    </form>
                <?php } else { ?>
                    <form method="post" class="w-full">
                        <input type="hidden" name="action" value="insertProductToCartByID">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <button type="submit" class="bg-yellow-300 hover:bg-yellow-400 text-yellow-800 font-bold py-2 px-4 rounded inline-flex items-center d-flex gap-2 w-full">
                            <i class="fa-solid fa-cart-plus fill-current w-4 h-4 mr-2"></i>
                            <span>Add to cart</span>
                        </button>
                    </form>
                <?php } ?>

                <hr>

                <?php if (count(checkProductFavoriteByID($data)) > 0) { ?>
                    <form method="post" class="w-full">
                        <input type="hidden" name="action" value="deleteProductFavoriteByID">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <button type="submit" class="bg-pink-300 hover:bg-pink-400 text-pink-800 font-bold py-2 px-4 rounded inline-flex items-center d-flex gap-2 w-full">
                            <i class="fa-regular fa-star fill-current w-4 h-4 mr-2"></i>
                            <span>Remove from favorite</span>
                        </button>
                    </form>
                <?php } else { ?>
                    <form method="post" class="w-full">
                        <input type="hidden" name="action" value="insertProductToFavoriteByID">
                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                        <button type="submit" class="bg-pink-300 hover:bg-pink-400 text-pink-800 font-bold py-2 px-4 rounded inline-flex items-center d-flex gap-2 w-full">
                            <i class="fa-regular fa-star fill-current w-4 h-4 mr-2"></i>
                            <span>Add to favorite</span>
                        </button>
                    </form>
                <?php } ?>

            <?php } else { ?>
                <button class="bg-yellow-300 hover:bg-yellow-400 text-yellow-800 font-bold py-2 px-4 rounded inline-flex items-center d-flex gap-2" onclick="window.location.href = '?app=auth'">
                    <i class="fa-regular fa-star fill-current w-4 h-4 mr-2"></i>
                    <span>Add to cart</span>
                </button>
                <hr>
                <button class="bg-pink-300 hover:bg-pink-400 text-pink-800 font-bold py-2 px-4 rounded inline-flex items-center d-flex gap-2" onclick="window.location.href = '?app=auth'">
                    <i class="fa-regular fa-star fill-current w-4 h-4 mr-2"></i>
                    <span>Add to favorite</span>
                </button>
            <?php } ?>
            <?php if (@checkPerm($permission, 'product_update')) { ?>
                <a href="?app=home&v=update&idx=<?= $data['id'] ?>&type=<?= $data['product_type_name'] ?>" class="bg-blue-300 hover:bg-blue-400 text-blue-800 font-bold py-2 px-4 rounded inline-flex items-center d-flex gap-2">
                    <i class="fa-regular fa-edit fill-current w-4 h-4 mr-2"></i>
                    <span>Edit Product</span>
                </a>
            <?php } ?>

        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/purchase.inc.php"); ?>