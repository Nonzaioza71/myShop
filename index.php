<!DOCTYPE html>
<html lang="en">
<?php

    // header("Refresh:0");
    // new HotReloader\HotReloader('http://localhost/myShop/phrwatcher.php');
    require_once('models/CoreModel.php');
    $product_type_list = getProductTypesList(null);
    $product_promotion_list = getProductPromotionsList(null);
    $product_tags_list = getProductTagsList(null);
    require_once('views/header.inc.php');
    require_once('views/body.inc.php');
    require_once('views/loading.inc.php');
?>
</html>