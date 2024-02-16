<?php
    switch (@$_GET['module']) {
        case 'accounting':
            require_once('modules/admin/components/accounting/index.inc.php');
            break;
        
        case 'permissions':
            require_once('modules/admin/components/permissions/index.inc.php');
            break;
        
        case 'products':
            require_once('modules/admin/components/products/index.inc.php');
            break;
        
        case 'users':
            require_once('modules/admin/components/users/index.inc.php');
            break;
        
        
        case 'report':
            require_once('modules/admin/components/report/index.inc.php');
            break;
        
        default:
            require_once('modules/admin/components/dashboard/index.inc.php');
            break;
    }