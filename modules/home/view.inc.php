<h1 class="text-2xl text-gray-500">Promotion assets</h1>
<div class="mt-3">

    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 border-gray-700 text-gray-400">
        <?php $comps = scandir(__DIR__ . '/components');
        foreach ($comps as $idx => $item) {
            $display = strtoupper(str_replace("_", " ", str_replace(".inc.php", "", $item)));
            $name = str_replace(".inc.php", "", $item);
            $class = @$_GET['view'] == $name ? "text-base inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active bg-gray-800 text-blue-500" : "text-base inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 hover:bg-gray-800 hover:text-gray-300";
            if ($idx > 1) {
        ?>
                <li class="me-2">
                    <a href="#view=<?= $name ?>" class="tablist" param="view" name="<?= $name ?>" isTrue="text-base inline-block p-4 text-white-600 bg-gray-100 rounded-t-lg active bg-gray-800 text-white" def="text-base inline-block p-4 rounded-t-lg hover:bg-gray-50 hover:bg-gray-800 hover:text-white">
                        <?= $display ?>
                    </a>
                </li>
        <?php }
        } ?>
    </ul>

</div>


<div>
    <?php
    foreach ($comps as $idx => $item) {
        $display = strtoupper(str_replace("_", " ", str_replace(".inc.php", "", $item)));
        $name = str_replace(".inc.php", "", $item);
        $class = @$_GET['view'] == $name ? "text-base inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active bg-gray-800 text-blue-500 shadow" : "text-base inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 hover:bg-gray-800 hover:text-gray-300";
        if ($idx > 1) { ?>
            <div class="col-md-12 route" path="<?= $name?>" param="view">
                <?php require_once(__DIR__.'/components/'.$item); ?>
            </div>
    <?php }
    } ?>
</div>


<script>
    window.addEventListener("load", () => {
        if (!('view' in getHashParam())) {
            window.location.href = '#view=on_sale'
        }
        loadSuccess(false);
    })
</script>