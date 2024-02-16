<?php

function getProductsBy($data = null)
{
    $search = "";
    $sort_by = "";
    $join = "WHERE TRUE";
    if ($data) {
        if (array_key_exists('keyword', $data)) $search = "AND tb_products.product_name LIKE '%" . $data['keyword'] . "%'";
        if (array_key_exists('sort_by', $data)) $sort_by = "ORDER BY tb_products." . $data['sort_by']['key'] . " " . $data['sort_by']['value'];
        if (array_key_exists('favorite', $data)) $join = "RIGHT JOIN tb_products_favorite ON tb_products_favorite.product_id = tb_products.id WHERE tb_products_favorite.user_id = " . $_SESSION['user']['memberid'];
        if (array_key_exists('cart', $data)) $join = "RIGHT JOIN tb_products_cart ON tb_products_cart.product_id = tb_products.id WHERE tb_products_cart.user_id = " . $_SESSION['user']['memberid'];
    }
    $sql = "SELECT
    tb_products.*,
    (
    SELECT
        tb_product_images.image
    FROM
        tb_product_images
    WHERE
        tb_product_images.product_images = tb_products.id
    ORDER BY
        `tb_product_images`.`id`
    DESC
LIMIT 1
) AS image,(
    SELECT
        tb_product_type_list.product_type_name
    FROM
        tb_product_type_list
    WHERE
        tb_product_type_list.id = tb_products.product_type
    LIMIT 1
) AS product_type_name,(
    SELECT
        tb_promotions_list.name
    FROM
        tb_promotions_list
    WHERE
        tb_promotions_list.id = tb_products.product_promotion
    LIMIT 1
) AS product_promotion_name
FROM
    `tb_products` $join $search $sort_by;";
    // logData($sql);
    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function getProductByID($data)
{
    // print_r($data);
    $sql_image = "SELECT * FROM `tb_product_images` WHERE tb_product_images.product_images = " . $data['idx'] . ";";


    $sql_data = "SELECT tb_products.*,
    (
        SELECT tb_product_images.image FROM tb_product_images WHERE tb_product_images.product_images = tb_products.id ORDER BY `tb_product_images`.`id` DESC LIMIT 1
    ) AS image,
(
    SELECT tb_product_type_list.product_type_name FROM tb_product_type_list WHERE tb_product_type_list.id = tb_products.product_type LIMIT 1
    ) AS product_type_name,
    tb_member.membername,
    tb_member.memberid,
    tb_member.memberimage,
    tb_member.memberperm,
    tb_member.username
    FROM `tb_products` 
    LEFT JOIN tb_member ON tb_member.memberid = tb_products.add_by
WHERE tb_products.id = " . $data['idx'] . ";";


    $data = [];
    $data['images'] = connection()->query($sql_image)->fetch_all(MYSQLI_ASSOC);
    $data['data'] = connection()->query($sql_data)->fetch_all(MYSQLI_ASSOC);
    return $data;
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
    $sql = "INSERT INTO `tb_products` (
            `id`,
            `product_name`,
            `product_solds`,
            `product_detail`,
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
                '" . $_SESSION['user']['memberid'] . "',
                '" . $_SESSION['user']['memberid'] . "',
                '" . $_SESSION['user']['memberid'] . "',
                NOW(),
                CURRENT_TIMESTAMP);
                ";
    // logData($sql);
    $inserted = connection()->query($sql);
    $details = false;
    if ($inserted) {
        $req = [];
        $req['sort_by']['key'] = "id";
        $req['sort_by']['value'] = "DESC";
        $latest_data = getProductsBy($req)[0];
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

function insertProductToCartByID($data)
{
    $sql = "INSERT INTO `tb_products_cart`(
        `id`,
        `user_id`,
        `product_id`,
        `product_count`
    )
    VALUES(
        NULL,
        '" . $_SESSION['user']['memberid'] . "',
        '" . $data['id'] . "',
        '1'
    )";

    return connection()->query($sql);
}

function insertProductToFavoriteByID($data)
{
    $sql = "INSERT INTO `tb_products_favorite`(`id`, `product_id`, `user_id`)
    VALUES(
        NULL,
        '" . $data['id'] . "',
        '" . $_SESSION['user']['memberid'] . "'
    )";

    return connection()->query($sql);
}

function deleteProductFavoriteByID($data)
{
    $sql = "DELETE FROM tb_products_favorite WHERE user_id = " . $_SESSION['user']['memberid'] . " AND product_id = " . $data['id'] . "";

    return connection()->query($sql);
}

function deleteProductCartByID($data)
{
    $sql = "DELETE FROM tb_products_cart WHERE user_id = " . $_SESSION['user']['memberid'] . " AND product_id = " . $data['id'] . "";

    return connection()->query($sql);
}

function checkProductInCartByID($data)
{
    $sql = "SELECT * FROM `tb_products_cart` WHERE user_id = " . $_SESSION['user']['memberid'] . " AND product_id = " . $data['id'] . "";

    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function checkProductFavoriteByID($data)
{
    $sql = "SELECT * FROM `tb_products_favorite` WHERE user_id = " . $_SESSION['user']['memberid'] . " AND product_id = " . $data['id'] . "";
    // logData($sql);
    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}
