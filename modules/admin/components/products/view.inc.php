<?php
if (!array_key_exists('type', $_GET)) {
    echo "<script>window.location.href = '?app=admin&module=products&type=all'</script>";
}
?>
<div class="w-full">
    <div class="mx-auto max-w-2xl px-4 py-16 pt-3 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="text-xl tracking-tight text-gray-900">Products list</h2>
        <div class="flex-col w-full relative">

            <a href="?app=admin&module=products&type=all" class="border-blue-500 border-solid border rounded-t-md border-b-0 <?php if($_GET['type'] == 'all') echo "bg-blue-500"; ?> hover:bg-blue-500 hover:rounded-sm hover:text-white duration-200 px-4">
                All
            </a>
            <?php foreach ($product_type_list as $idx => $item) { ?>
                <a href="?app=admin&module=products&type=<?= ($item['product_type_name']) ?>" class="border-blue-500 border-solid border rounded-t-md border-b-0 <?php if($item['product_type_name'] == $_GET['type']) echo "bg-blue-500";?> hover:bg-blue-500 hover:rounded-sm hover:text-white duration-200 px-4">
                    <?= strtoupper($item['product_type_name']) ?>
                </a>
            <?php } ?>

            <a href="?app=admin&module=products&view=insert&type=3d" class="border-green-500 bg-green-400 border-solid border rounded-t-md border-b-0 hover:bg-green-600 hover:rounded-sm hover:text-white duration-200 px-4 ml-auto">
                Add Product
            </a>

        </div>
        <hr>
        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

            <?php foreach ($products as $idx => $item) {
                if (($item['product_type_name'] == $_GET['type']) || (!array_key_exists('type', $_GET)) || ($_GET['type'] == 'all')) { ?>
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
                            <p class="text-sm font-medium text-gray-900"><?= number_format($item['product_price']) ?>$</p>
                        </div>
                    </div>
            <?php }
            } ?>

        </div>
    </div>
</div>