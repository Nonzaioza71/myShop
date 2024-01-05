<?php

    function getProductsBy($data) {
        
    }

    function getProductTypesList($data) {
        $sql = "SELECT * FROM `tb_product_type_list`";

        return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    function getProductPromotionsList($data) {
        $sql = "SELECT * FROM `tb_promotions_list`";

        return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    function getProductTagsList($data) {
        $sql = "SELECT * FROM `tb_tags_list`";

        return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }