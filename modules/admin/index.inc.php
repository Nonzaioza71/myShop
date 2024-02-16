<?php

checkAuthed($_SESSION['user']['memberperm'] == 2);
require_once("modules/admin/view.inc.php");

?>


<script>
    let bgColor = "";
    window.addEventListener("load", () => {
        loadSuccess(false);
    })
</script>

<style>
    body{
        overflow: hidden;
    }
</style>