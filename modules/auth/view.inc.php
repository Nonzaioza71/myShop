<?php

    switch (@$_GET['view']) {
        case 'register':
            require_once("modules/auth/components/register.inc.php");
            break;
        
        default:
            require_once("modules/auth/components/login.inc.php");
            break;
    }
?>

<script>
    window.addEventListener("load", () => {
        loadSuccess(false);
    })
</script>