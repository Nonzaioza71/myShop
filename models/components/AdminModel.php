<?php

function getReportTypeBy()
{
    $sql = "SELECT * FROM `tb_report_type_list` WHERE is_del = 0;";
    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function getReportBy()
{
    $sql = "SELECT * FROM `tb_report_list`;";
    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function getReporterBy()
{
    $sql = "SELECT * FROM `tb_report_list` GROUP BY member_reporter_id;";
    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function getReportTargetBy()
{
    $sql = "SELECT * FROM `tb_report_list` GROUP BY member_target_id;";
    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function insertReportTypeBy($data)
{
    $sql = "INSERT INTO `tb_report_type_list` (
                `id`,
                `report_type_msg`,
                `report_type_detail`,
                `is_del`
            ) VALUES (
                NULL,
                '" . $data['report_type_msg'] . "',
                '" . $data['report_type_detail'] . "',
                '0'
                )
            ";
    return connection()->query($sql);
}

function deleteReportTypeBy($data)
{
    $sql = "UPDATE `tb_report_type_list` SET `is_del` = '1' WHERE `tb_report_type_list`.`id` = " . $data['id'];
    return connection()->query($sql);
}

function insertReportBy($data)
{
    $sql = "INSERT INTO `tb_report_list`(
        `id`,
        `member_target_id`,
        `member_reporter_id`,
        `report_msg`,
        `report_type`,
        `report_image`,
        `report_add_date`
    )
    VALUES(
        NULL,
        '" . $data['member_target_id'] . "',
        '" . $_SESSION['user']['memberid'] . "',
        '" . addslashes($data['report_msg']) . "',
        '" . $data['report_type'] . "',
        '" . addslashes($data['report_image']) . "',
        CURRENT_TIMESTAMP
    )";
    return connection()->query($sql);
}

function getReportListsBy()
{
    $sql = "SELECT
        tb_report_list.*,
        reporter.membername AS reporter_name,
        reporter.memberimage AS reporter_image,
        report_target.memberimage AS target_image,
        report_target.membername AS target_name,
        tb_report_type_list.report_type_msg
    FROM tb_report_list
    LEFT JOIN tb_member AS reporter ON reporter.memberid = tb_report_list.member_reporter_id
    LEFT JOIN tb_member AS report_target ON report_target.memberid = tb_report_list.member_target_id
    LEFT JOIN tb_report_type_list ON tb_report_type_list.id = tb_report_list.report_type;";
    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function getReportListsByID($data)
{
    $sql = "SELECT
        tb_report_list.*,
        reporter.membername AS reporter_name,
        reporter.memberimage AS reporter_image,
        report_target.memberimage AS target_image,
        report_target.membername AS target_name,
        tb_report_type_list.report_type_msg
    FROM tb_report_list
    LEFT JOIN tb_member AS reporter ON reporter.memberid = tb_report_list.member_reporter_id
    LEFT JOIN tb_member AS report_target ON report_target.memberid = tb_report_list.member_target_id
    LEFT JOIN tb_report_type_list ON tb_report_type_list.id = tb_report_list.report_type
    WHERE tb_report_list.id = " . $data['idx'] . "
    ;";
    $res = connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
    if ($res) {
        return $res[0];
    } else {
        return false;
    }
}

function getReportListsByTargetID($data)
{
    $sql = "SELECT
        tb_report_list.*,
        reporter.membername AS reporter_name,
        reporter.memberimage AS reporter_image,
        report_target.memberimage AS target_image,
        report_target.membername AS target_name,
        tb_report_type_list.report_type_msg
    FROM tb_report_list
    LEFT JOIN tb_member AS reporter ON reporter.memberid = tb_report_list.member_reporter_id
    LEFT JOIN tb_member AS report_target ON report_target.memberid = tb_report_list.member_target_id
    LEFT JOIN tb_report_type_list ON tb_report_type_list.id = tb_report_list.report_type
    WHERE tb_report_list.member_target_id = " . $data['member_target_id'] . "
    ;";
    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function insertUserBannedByID($data)
{
    $sql = "INSERT INTO `tb_users_banned`(
        `id`,
        `user_id`,
        `ban_detail`,
        `unbanned_date`
    )
    VALUES(
        NULL,
        '" . $data['member_target_id'] . "',
        '" . $data['ban_detail'] . "',
        NOW()
    )";

    $banned = connection()->query($sql);
    if ($banned) {
        return removeUserSuspectByID($data);
    } else {
        return false;
    }
}

function removeUserSuspectByID($data)
{
    $sql = "DELETE FROM tb_report_list WHERE tb_report_list.member_target_id = " . $data['member_target_id'];

    return connection()->query($sql);
}

function getBannedAccountsBy()
{
    $sql = "SELECT
        tb_users_banned.*,
        tb_member.membername,
        tb_member.memberimage,
        tb_member.memberperm
    FROM
        `tb_users_banned`
    LEFT JOIN tb_member ON tb_member.memberid = tb_users_banned.user_id";

    return connection()->query($sql)->fetch_all(MYSQLI_ASSOC);
}

function unbannedUserByID($data) {
    $sql = "DELETE FROM tb_users_banned WHERE tb_users_banned.user_id = ".$data['user_id'];
    return connection()->query($sql);
}