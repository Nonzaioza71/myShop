<div class="fixed-top h-full bg-light w-full">
    <?php require_once("modules/admin/views/navbar.inc.php"); ?>
    <?php require_once("modules/admin/views/sidebar.inc.php"); ?>
    <div class="lg:pl-64 overflow-auto" id="admin_content"><?php require_once("modules/admin/views/content.inc.php"); ?></div>
</div>
<script>
    window.addEventListener("load", ()=>{
        const navH = document.querySelector('#admin_navbar').clientHeight
        document.querySelector('#admin_content').setAttribute("style", `height: ${window.innerHeight - navH}px;`)
    })
</script>