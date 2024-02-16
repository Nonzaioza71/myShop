<?php

function connection()
{
    $host = "localhost";
    $port = "3306";
    $user = "root";
    $pass = "root";
    $db   = "my_shop";
    return new mysqli("$host:$port", "$user", "$pass", "$db");
}

function init()
{
    connection()->multi_query("
        SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
        set global net_buffer_length=1000000; 
        set global max_allowed_packet=1000000000;
        ");
}

function logData($data) { 
    file_put_contents(__DIR__."/log.txt", $data);
    echo file_get_contents(__DIR__."/log.txt");
}

$files = scandir(__DIR__ . '/components');

foreach ($files as $key => $value) {
    if ($key > 1) {
        require_once(__DIR__ . '/components/' . $value);
    }
}


init();