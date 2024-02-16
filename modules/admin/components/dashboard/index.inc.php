<?php

switch (@$_GET['view']) {
    case 'value':
        # code...
        break;

    default:
        require_once("modules/admin/components/dashboard/view.inc.php");
        break;
}
