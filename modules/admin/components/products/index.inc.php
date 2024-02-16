<?php

switch (@$_GET['view']) {
    case 'insert':
        require_once(__DIR__."/insert.inc.php");
        break;

    case 'update':
        require_once(__DIR__."/update.inc.php");
        break;

    default:
        require_once(__DIR__."/view.inc.php");
        break;
}
