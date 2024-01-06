<?php

function getProductsBy($data)
{
    $sql = "SELECT *,
    (
        SELECT tb_product_images.image FROM tb_product_images WHERE tb_product_images.product_images = tb_products.id LIMIT 1
    ) AS image
    FROM `tb_products`";
    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function getProductTypesList($data)
{
    $sql = "SELECT * FROM `tb_product_type_list`";

    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function getProductPromotionsList($data)
{
    $sql = "SELECT * FROM `tb_promotions_list`";

    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function getProductTagsList($data)
{
    $sql = "SELECT * FROM `tb_tags_list` GROUP BY tag_name";

    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function insertProduct($data)
{
    // $_SESSION['user']['id']
    $sql = "INSERT INTO `tb_products` (
            `id`,
            `product_name`,
            `product_solds`,
            `produt_detail`,
            `product_type`,
            `product_price`,
            `product_iframe`,
            `product_tags`,
            `product_promotion`,
            `sale_by`,
            `add_by`,
            `update_by`,
            `add_date`,
            `update_date`
            ) VALUES (
                NULL,
                '" . $data['product_name'] . "',
                '0',
                '" . addslashes($data['product_detail']) . "',
                '" . $data['product_type'] . "',
                '" . $data['product_price'] . "',
                '" . $data['product_iframe'] . "',
                '" . $data['product_tags'] . "',
                '" . $data['product_promotion'] . "',
                '" . 1 . "',
                '" . 1 . "',
                '" . 1 . "',
                NOW(),
                CURRENT_TIMESTAMP);
                ";

    $inserted = connection()->query($sql);
    $details = false;
    if ($inserted) {
        $latest_data = @end(getProductsBy(null));
        // print_r($latest_data);
        $images = json_decode($data['product_images'], true);
        $tags = json_decode($data['product_tags'], true);
        $sql_imgs = "";
        $sql_tags = "";
        foreach ($images as $idx => $item) {
            $sql_imgs .= "INSERT INTO `tb_product_images` (`id`, `image`, `product_images`) VALUES (NULL, '" . $item . "', '" . $latest_data['id'] . "');";
        }
        foreach ($tags as $idx => $item) {
            $sql_tags .= "INSERT INTO `tb_tags_list` (`id`, `tag_name`, `tag_color`) VALUES (NULL, '" . $item . "', 'FF5733');";
        }

        $details = boolval((connection()->multi_query($sql_imgs)) && (connection()->multi_query($sql_tags)));
    }

    return boolval($inserted && $details);
}
