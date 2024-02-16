<?php
$tab_list   =   [];
$tab_list[] =   '<i class="fa-solid fa-list"></i> Reports type';
$tab_list[] =   '<i class="fa-solid fa-list"></i> Reports list';
$tab_list[] =   '<i class="fa-solid fa-list"></i> Banned list';
?>
<div class="w-full container pt-3">
    <label class="text-xl">Reports System</label>
    <hr>
    <div class="w-full flex justify-around mt-3 gap-2">
        <div class="border text-center w-50 shadow rounded px-10 py-5">
            <h1 class="text-center mb-2">
                <i class="fa-solid fa-list text-3xl"></i>
            </h1>
            Report Type : <?= number_format(count($report_type_list)) ?>
        </div>
        <div class="border text-center w-50 shadow rounded px-10 py-5">
            <h1 class="text-center mb-2">
                <i class="fa-solid fa-flag text-3xl"></i>
            </h1>
            Reported Count : <?= number_format(count($report_list)) ?>
        </div>
        <div class="border text-center w-50 shadow rounded px-10 py-5">
            <h1 class="text-center mb-2">
                <i class="fa-solid fa-user-tag text-3xl"></i>
            </h1>
            Reporter Count : <?= number_format(count($reporter_list)) ?>
        </div>
        <div class="border text-center w-50 shadow rounded px-10 py-5">
            <h1 class="text-center mb-2">
                <i class="fa-solid fa-users-viewfinder text-3xl"></i>
            </h1>
            Report Target Count : <?= number_format(count($report_target_list)) ?>
        </div>
    </div>

    <div class="my-3">
        <ul class="flex border-b">
            <?php for ($i = 0; $i < count($tab_list); $i++) { ?>
                <?php if (@$_GET['tab'] == $i) { ?>
                    <li class="-mb-px mr-1">
                        <a href="?app=admin&module=report&tab=<?= $i?>" class="bg-white inline-block py-2 px-4 font-semibold text-gray-700 border-l border-t border-r rounded-t" href="#"><?= $tab_list[$i]?></a>
                    </li>
                <?php } else { ?>
                    <li class="mr-1">
                        <a href="?app=admin&module=report&tab=<?= $i?>" class="bg-white inline-block py-2 px-4 font-semibold text-gray-500 hover:text-gray-800" href="#"><?= $tab_list[$i]?></a>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
        <div class="border-r border-l border-b bg-white shadow overflow-auto rounded-b-xl rounded-r-xl p-3">
            <?php 
                switch (@$_GET['tab']) {
                    case 1:
                        require_once(__DIR__.'/components/report_list.inc.php');
                        break;
                    
                    case 2:
                        require_once(__DIR__.'/components/banned.inc.php');
                        break;
                    
                    default:
                        require_once(__DIR__.'/components/report_type.inc.php');
                        break;
                }
            ?>
        </div>
    </div>
</div>