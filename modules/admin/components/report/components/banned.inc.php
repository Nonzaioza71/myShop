<?php $banned_list = getBannedAccountsBy(); ?>
<div class="table-wrp block container">
    <table class="w-full">
        <thead class="bg-white border-b sticky top-0">
            <tr>
                <th class="text-center border w-1/12">No.</th>
                <th class="text-center border w-2/12">Ban info</th>
                <th class="text-center border w-2/12">Banned date</th>
                <th class="text-center border w-2/12">Name</th>
                <th class="text-center border w-2/12">Image</th>
                <th class="text-center border w-2/12">Permission level</th>
                <th class="text-center border w-2/12">#</th>
            </tr>
        </thead>
        <tbody class="overflow-y-auto max-h-96">
            <?php foreach ($banned_list as $idx => $item) { ?>
                <tr>
                    <td class="text-center border"><?= $idx + 1 ?></td>
                    <td class="text-center border"><?= $item['ban_detail'] ?></td>
                    <td class="text-center border"><?= $item['unbanned_date'] ?></td>
                    <td class="text-center border"><?= $item['membername'] ?></td>
                    <td class="text-center border"><img src="<?= $item['memberimage'] ?>" class="w-10 align-middle self-center m-auto" alt="" srcset=""></td>
                    <td class="text-center border"><?= $item['memberperm'] ?></td>
                    <td class="text-center border">
                        <div class="flex">
                            <div class="w-full">
                                <form method="post">
                                    <input type="hidden" name="action" value="unbannedUserByID">
                                    <input type="hidden" name="user_id" value="<?= $item['user_id'] ?>">
                                    <button type="submit" class="text-blue-500"><i class="fa-solid fa-gavel"></i></button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>