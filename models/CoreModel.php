<?php

    function connection() {
        return new mysqli('localhost', 'root', 'root', 'my_shop');
    }

    $files = scandir(__DIR__.'/components');

    foreach ($files as $key => $value) {
        if ($key > 1) {
            require_once(__DIR__.'/components/'.$value);
        }
    }