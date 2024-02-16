<?php
    $report_list = getReportBy();
    $reporter_list = getReporterBy();
    $report_target_list = getReportTargetBy();

    switch (@$_GET['view']) {
        case 'report_detail':
            require_once("modules/admin/components/report/report_detail.inc.php");
            break;
        
        default:
            require_once("modules/admin/components/report/view.inc.php");
            break;
    }