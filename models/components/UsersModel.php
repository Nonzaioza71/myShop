<?php
@session_start();
function getUsersBy($data = null)
{
    $search = "";
    if (isset($data)) {
        if (array_key_exists('search', $data)) $search = "AND membername LIKE '%" . $data['search'] . "%' OR membermail LIKE '%" . $data['search'] . "%' OR memberphone LIKE '%" . $data['search'] . "%'";
    }
    $sql = 'SELECT *, (IF((SELECT COUNT(tb_users_banned.id) FROM tb_users_banned WHERE tb_users_banned.user_id = tb_member.memberid GROUP BY tb_users_banned.user_id) > 0, "Banned", "Active")) AS "status" FROM `tb_member` WHERE TRUE ' . $search . ';';

    $res = connection()->query($sql);
    $data = [];
    while ($rows = mysqli_fetch_assoc($res)) {
        $data[] = $rows;
    }
    return $data;
}

function getUserByID($data)
{
    $sql = "SELECT * FROM tb_member WHERE memberid = " . $data['id'];
    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC)[0];
}

function getUserLogin($data)
{
    $sql = "SELECT * FROM `tb_member`
    WHERE username = '" . $data['username'] . "'
    AND password = '" . $data['password'] . "';";

    $res = connection()->query($sql)->fetch_all(MYSQLI_ASSOC);

    if ((isset($res)) && (count($res) > 0)) {
        $checkBanned = checkUserBannedByID($res[0]);
        if (count($checkBanned) > 0) {
            return header("Location: ?app=auth&view=login&error=This_account_is_banned.");
        } else {
            $_SESSION['user'] = $res[0];
            return header("Location: ?app=home");
        }
    } else {
        return header("Location: ?app=auth&view=login&error=username_or_password_is_not_correct.");
    }
}

function insertUserBy($data)
{
    $phone = array_key_exists('memberphone', $data) ? $data['memberphone'] : "";
    $address = array_key_exists('memberaddress', $data) ? $data['memberaddress'] : "";
    $image = array_key_exists('memberimage', $data) ? $data['memberimage'] : "templates/assets/temps/user.png";

    $sql = "INSERT INTO `tb_member` (
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
                '" . $data['membername'] . "',
                '" . $phone . "',
                '" . $data['membermail'] . "',
                '" . $address . "',
                '" . $image . "',
                0,
                '" . $data['username'] . "',
                '" . $data['password'] . "'
                )";
    $res = connection()->query($sql);
    if ($res) {
        echo "<script>window.location.href = '?app=auth'</script>";
    }
    return $res;
}

function checkUserBannedByID($data)
{
    $sql = "SELECT * FROM `tb_users_banned` WHERE tb_users_banned.user_id = " . $data['memberid'];
    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

// echo "UserModel!!";