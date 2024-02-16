<?php $reports_list = getReportListsBy(); ?>
<div class="table-wrp block container">
    <table class="w-full">
        <thead class="bg-white border-b sticky top-0">
            <tr>
                <th class="text-center border w-1/12">No.</th>
                <th class="text-center border w-2/12">Report Type</th>
                <th class="text-center border w-2/12">Report Detail</th>
                <th class="text-center border w-2/12">Report By</th>
                <th class="text-center border w-2/12">The Suspect</th>
                <th class="text-center border w-2/12">Report Date</th>
                <th class="text-center border w-2/12">#</th>
            </tr>
        </thead>
        <tbody class="overflow-y-auto max-h-96">
            <?php foreach ($reports_list as $idx => $item) { ?>
                <tr>
                    <td class="text-center border"><?= $idx + 1 ?></td>
                    <td class="text-center border"><?= $item['report_type_msg'] ?></td>
                    <td class="text-center border"><?= $item['report_msg'] ?></td>
                    <td class="text-center border"><?= $item['reporter_name'] ?></td>
                    <td class="text-center border"><?= $item['target_name'] ?></td>
                    <td class="text-center border"><?= $item['report_add_date'] ?></td>
                    <td class="text-center border">
                        <div class="flex">
                            <div class="w-full">
                                <a href="?app=admin&module=report&view=report_detail&idx=<?= $item['id']?>" class="text-blue-500"><i class="fa-solid fa-gavel"></i></a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>