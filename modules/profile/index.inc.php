<?php

$data = getUserByID($_GET);
checkAuthed();
if (array_key_exists('v', $_GET)) {
    $view = $_GET['v'];
    switch ($view) {
        case 'cart':
            require_once("modules/profile/cart.inc.php");
            break;
        
        default:
            require_once("modules/profile/view.inc.php");
            break;
    }
} else {
    require_once("modules/profile/view.inc.php");
}
