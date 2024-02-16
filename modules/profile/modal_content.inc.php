<!-- <hr class="my-3"> -->
<div class="border rounded shadow-2xl p-2">
    <div class="flex w-full">
        <div class="w-3/12">
            <img src="<?= $data['memberimage'] ?>" class="w-full" alt="" srcset="">
        </div>
        <div class="w-7/12 text-left pl-3">
            <p class="text-xl"><?= $data['membername'] ?></p>
            <p class="text-sm">Permission Level: <?= $data['memberperm'] ?></p>
        </div>
    </div>
    <hr class="my-2">
    <div class="w-full flex columns-3 justify-around gap-5">
        <label class="text-xs">56 Subscribers</label>
        <label class="text-xs">112 Followings</label>
        <label class="text-xs">27 Products</label>
    </div>
</div>
<hr class="my-4">
<div class="w-full border rounded-lg bg-white p-3 shadow">
    <div class="w-full">
        <form method="post">
            <input type="hidden" name="action" value="insertReportBy">
            <input type="hidden" name="member_target_id" value="<?= $data['memberid']?>">
            <label class="text-lg">Report Type</label>
            <select name="report_type" id="report_type" onchange="onChangeReportType(this.value)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?php foreach ($report_type_list as $idx => $item) { ?>
                    <option value="<?= $item['id'] ?>"><?= $item['report_type_msg'] ?></option>
                <?php } ?>
            </select>
            <label id="report_type_detail"></label>
            <textarea name="report_msg" id="report_msg" cols="30" rows="5" placeholder="Report Detail" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
            <input type="file" onchange="readURL(this.files[0])" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 my-2">
            <input type="hidden" name="report_image" id="report_image">
            <button type="submit" class="bg-green-300 text-black hover:bg-green-500 hover:text-white px-3 py-2 rounded mt-3 hover:shadow duration-200">Submit</button>
        </form>
    </div>
</div>

<script>
    function onChangeReportType(idx) {
        const reportList = {<?php foreach ($report_type_list as $idx => $item) {
                                echo $item['id'].":"."'" . $item['report_type_detail'] . "', ";
                            } ?>}
                            // console.log(reportList);
        document.querySelector('#report_type_detail').innerHTML = reportList[idx];
    }

    function readURL(file) {
        const reader = new FileReader();
        reader.readAsDataURL(file)
        reader.onload = () => {
            const { result } = reader
            document.querySelector('#report_image').value = result
        }
    }

    window.addEventListener("load", () => onChangeReportType(<?= $report_type_list[0]['id']?>))
</script>