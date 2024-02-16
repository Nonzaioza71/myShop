<div class="container">
    <?php require_once('views/banner.inc.php'); ?>

    <div class="col-md-12 mt-4">
        <?php 
            switch (@$_GET['app']) {
                case 'auth':
                    require_once('modules/auth/index.inc.php');
                    break;
                
                case 'profile':
                    require_once('modules/profile/index.inc.php');
                    break;
                
                case 'admin':
                    require_once('modules/admin/index.inc.php');
                    break;
                
                default:
                    require_once('modules/home/index.inc.php');
                    break;
            }
            
        ?>
    </div>

    
</div>