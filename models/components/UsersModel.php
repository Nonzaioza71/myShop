<?php

    function getUsersBy() {
        $sql = 'SELECT * FROM tbl_member';

        $res = connection()->query($sql);
        $data = [];
        while ($rows = mysqli_fetch_assoc($res)) {
            $data[] = $rows;
        }
        return $data;
    }

    function insertUserBy($data) {
        $sql = "INSERT INTO `tbl_member` (
            `memberid`,
            `membername`,
            `memberphone`,
            `membermail`,
            `memberaddress`,
            `memberimage`,
            `memberperm`,
            `username`,
            `password`
            ) VALUES (
                NULL,
                '".$data['membername']."',
                '".$data['memberphone']."',
                '".$data['membermail']."',
                '".$data['memberaddress']."',
                '".$data['memberimage']."',
                0,
                '".$data['username']."',
                '".$data['password']."'
                )";
        $res = connection()->query($sql);
        return $res;
    }


    