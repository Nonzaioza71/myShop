<div class="table-wrp block container">
    <table class="w-full">
        <thead class="bg-white border-b sticky top-0">
            <tr>
                <th class="text-center border w-1/12">No.</th>
                <th class="text-center border w-4/12">Msg.</th>
                <th class="text-center border w-5/12">Detail</th>
                <th class="text-center border w-2/12">#</th>
            </tr>
        </thead>
        <tbody class="overflow-y-auto max-h-96">
            <?php foreach ($report_type_list as $idx => $item) { ?>
                <tr>
                    <td class="text-center border"><?= $idx+1 ?></td>
                    <td class="text-center border"><?= $item['report_type_msg'] ?></td>
                    <td class="text-center border"><?= $item['report_type_detail'] ?></td>
                    <td class="text-center border">
                        <form method="post">
                            <input type="hidden" name="action" value="deleteReportTypeBy">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>">
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="mt-3">
        <label class="px-1 border-b mb-2 w-full">Add Report Type</label>
        <form method="post">
            <input type="hidden" name="action" value="insertReportTypeBy">
            <input required type="text" placeholder="Report Type Msg." name="report_type_msg" id="report_type_msg" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <textarea required placeholder="Report Type Detail" name="report_type_detail" id="report_type_detail" cols="30" rows="10" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
            <div class="flex justify-end w-full">
                <button type="submit" class="bg-green-400 hover:bg-green-500 rounded-lg py-2 px-4 text-white hover:text-gray-600 duration-200">Submit</button>
            </div>
        </form>
    </div>
</div>