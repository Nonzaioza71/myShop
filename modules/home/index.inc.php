<?php
    if(!array_key_exists('app', $_GET)) echo '<script>window.location.href = "?app=home"</script>';
    $route = (array_key_exists('v', $_GET)) ? $_GET['v'] : 'view';
    
    switch ($route) {
        case 'insert':
            require_once(__DIR__.'/insert.inc.php');
            break;

        case 'detail':
            require_once(__DIR__.'/detail.inc.php');
            break;
        
        default:
            require_once(__DIR__.'/view.inc.php');
            break;
    }