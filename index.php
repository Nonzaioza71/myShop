<!DOCTYPE html>
<html lang="en">
<?php
@session_start();

function href($path)
{
    echo "<script>window.location.href = '$path'</script>";
}

function checkAuthed($perm = true)
{
    if (@isset($_SESSION['user'])) {
        if (!$perm) {
            echo "<script>window.location.href = '?app=home'</script>";
        }
    } else {
        echo "<script>window.location.href = '?app=home'</script>";
    }
}

function checkPerm($permission_list, $perm_need) {
    return ((@$_SESSION['user']['memberperm'] >= array_filter($permission_list, function($item) use ($perm_need) { return $item['module'] == $perm_need; })[array_key_first(array_filter($permission_list, function($item) use ($perm_need) { return $item['module'] == $perm_need; }))]['perm_level']) && (isset($_SESSION['user'])));
}
// header("Refresh:0");
// new HotReloader\HotReloader('http://localhost/myShop/phrwatcher.php');
require_once('models/CoreModel.php');

if (array_key_exists('action', $_POST)) $_POST['action']($_POST);
$product_type_list = getProductTypesList(null);
$product_promotion_list = getProductPromotionsList(null);
$product_tags_list = getProductTagsList(null);
$products = getProductsBy($_GET);
$permission = getPermissionsBy();
$report_type_list = getReportTypeBy();

require_once('views/header.inc.php');
if(@$_GET['app'] != 'admin') require_once('views/loading.inc.php');
require_once('views/body.inc.php');
if(@$_GET['app'] == 'admin') require_once('views/loading.inc.php');
?>

</html>