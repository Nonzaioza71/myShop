<!--
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<div class="bg-white">
    <div class="mx-auto max-w-2xl px-4 py-1 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-3xl text-dark flex items-center gap-2"><i class="fa-solid fa-star"></i> <span>Favorite Products</span></h2>
        <hr class="my-4" />

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

            <?php foreach ($products as $idx => $item) { ?>
                <a href="?app=home&v=detail&idx=<?= $item['id'] ?>" class="group">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="<?= $item['image'] ?>" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-full w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700"><?= $item['product_name'] ?></h3>
                    <p class="mt-1 text-lg font-medium text-gray-900">$<?= number_format($item['product_price']) ?></p>
                </a>
            <?php } ?>

            <!-- More products... -->
        </div>
    </div>
</div>

<script>
    window.addEventListener("load", () => {
        loadSuccess(false)
    })
</script>