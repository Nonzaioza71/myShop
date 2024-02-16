<?php
$users = getUsersBy($_GET);
switch (@$_GET['view']) {
    case 'value':
        # code...
        break;

    default:
        require_once(__DIR__."/view.inc.php");
        break;
}
