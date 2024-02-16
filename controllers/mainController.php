<?php
    header('Access-Control-Allow-Headers: *');
    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json; charset=utf-8");

    require_once("../models/CoreModel.php");
    $post = json_decode(file_get_contents('php://input'), true);

    if (array_key_exists('action', $post)) {
        echo json_encode($post['action']($post));
    }else{
        echo json_encode(false);
    }
