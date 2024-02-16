<?php

    function getPermissionsBy() {
        $sql = "SELECT * FROM tb_user_permission WHERE TRUE";

        return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }