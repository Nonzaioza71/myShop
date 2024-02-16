<?php
if (!array_key_exists('keyword', $_GET)) echo '<script>window.location.href = window.location.search+"&keyword="</script>';
if (!array_key_exists('type', $_GET)) echo '<script>window.location.href = window.location.search+"&type=3d"</script>';
?><style>
    .track-wrapper {
        height: 90vh;
        max-inline-size: var(--size-content-3);
        overflow: hidden;
        -webkit-mask: linear-gradient(90deg,
                transparent 0,
                black 15% 85%,
                transparent) 0 50% / 100% calc(100% - (2 * var(--size-4))) no-repeat,
            linear-gradient(0deg, black, black) 50% 0 / 100% var(--size-4) no-repeat,
            linear-gradient(0deg, black, black) 50% 100% / 100% var(--size-4) no-repeat;
    }

    img {
        height: 100%;
        width: 100%;
    }

    .track {
        --size: clamp(200px, 40vmin, 50rem);
        height: 100%;
        width: 100%;
        display: flex;
        overflow-x: overlay;
        overflow-y: hidden;
        gap: var(--size-4);
        list-style-type: none;
        margin: 0;
        /*background: hsl(0 0% 100% / 0.25);*/
        padding: var(--size-4) 33%;
        scroll-snap-type: x mandatory;
        /* Circular inverted */
        /* -webkit-mask-image: radial-gradient(ellipse at 50% 66%, black 0 30%, transparent 30%);
	/* No Scrollbar */
        /* -webkit-mask: radial-gradient(#0000 0 30%, #000 30%) 50% 20vmin / 240% 100%;*/
        /* Winner */
        /*-webkit-mask: radial-gradient(#0000 0 30%, #000 30%) 50% calc(var(--size) * 0.5) / 250% 100%,
								linear-gradient(0deg, black, black) 50% 0 / 100% var(--size-4) no-repeat,
								linear-gradient(0deg, black, black) 50% 100% / 100% var(--size-4) no-repeat;*/
        -webkit-mask: radial-gradient(#0000 0 30%, #000 30.5%) 50% calc(var(--size) * 0.5) / 300% 100%,
            linear-gradient(0deg, black, black) 50% 0 / 100% var(--size-4) no-repeat,
            linear-gradient(0deg, black, black) 50% 100% / 100% var(--size-4) no-repeat;

    }

    .track__item {
        height: 100%;
        aspect-ratio: 1;
        background: hsl(0 80% 50% / 1);
        /*background: var(--surface-2);*/
        scroll-snap-align: center;
        /*display: none;*/
    }
</style>
<h1 class="text-2xl text-gray-500">Popular Assets</h1>
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
            <div class="col-md-12 route" path="<?= $name ?>" param="view">
                <?php require_once(__DIR__ . '/components/' . $item); ?>
            </div>
    <?php }
    } ?>
</div>


<script>
    window.addEventListener("load", () => {
        if (!('view' in getHashParam())) {
            window.location.href = '#view=on_sale'
        }
        document.querySelectorAll('.popular-child').forEach(item => {
            // item.style.height = document.querySelector("#templ").clientHeight + 'px'
        })
        loadSuccess(false);
    })
</script>