<?php
$data = getReportListsByID($_GET);
$reporters = $data ? getReportListsByTargetID($data) : [];
$reporters_limit = 5;

if (!$data) {
    echo "<script>window.location.href = '?app=admin&module=report&tab=1'</script>";
}
?>
<div class="h-full w-full">
    <div class="w-full pt-5 pl-10">
        <a href="?app=admin&module=report&tab=1" class="text-xl text-dark hover:text-gray-500"><i class="fa-solid fa-chevron-left"></i> Back</a>
    </div>
    <div class="lg:flex justify-center mt-5 items-start">
        <div class="bg-blue-900 lg:w-1/8 p-10 shadow">
            <div class="flex items-center justify-center mb-10">
                <img src="<?= $data['target_image'] ?>" alt="" class="rounded-full w-32 border-2 border-gray-300">
            </div>
            <h1 class="text-gray-300 uppercase tracking-widest text-lg font-bold text-center"><?= $data['target_name'] ?></h1>
            <hr class="w-1/6 mb-5">
            <h1 class="text-gray-300 mt-2 uppercase tracking-widest text-lg font-bold">Reporter (<?= count($reporters) ?>)</h1>
            <?php foreach ($reporters as $idx => $item) { ?>
                <?php if ($idx < $reporters_limit) { ?>
                    <div class="w-full rounded-lg bg-blue-500 p-3 mt-1">
                        <h1 class="flex  gap-2 text-white text-sm uppercase font-semibold tracking-wider"><img src="<?= $item['reporter_image'] ?>" alt="" srcset="" class="w-5 rounded-lg"><?= $item['reporter_name'] ?></h1>
                        <h1 class="text-gray-100 text-sm"><span class="italic">Report date</span> <?= $item['report_add_date']; ?></h1>
                    </div>
                <?php } else { ?>
                    <div class="w-full rounded-lg bg-blue-500 p-3 mt-1">
                        <h1 class="text-gray-100 text-sm"><span class="italic">And <?= count($reporters) - $reporters_limit ?> peoples...</span></h1>
                    </div>
                <?php } ?>
            <?php } ?>

            <hr class="my-5">
            <h1 class="text-gray-300 mt-0 uppercase tracking-widest text-lg font-bold">Social</h1>
            <hr class="w-1/6 mb-1">
            <ul>
                <li class="text-gray-400 text-sm list-disc ml-4">Subscribers: 121</li>
                <li class="text-gray-400 text-sm list-disc ml-4">Followings: 91</li>
                <li class="text-gray-400 text-sm list-disc ml-4">Products: 117</li>
            </ul>
        </div>





        <div class="bg-white lg:w-7/12 p-10 shadow-xl">
            <div class="w-full flex justify-between">
                <h1 class="font-semibold uppercase tracking-wider my-6 text-gray-500 w-1/2 text-xl">Reports list</h1>
                <div class="w-1/2 flex gap-3 justify-end">
                    <form method="post">
                        <input type="hidden" name="action" value="removeUserSuspectByID">
                        <input type="hidden" name="member_target_id" value="<?= $data['member_target_id'] ?>">
                        <button type="submit" class="" id="btn_negative"><i class="fa-regular fa-face-smile bg-green-500 text-3xl text-white px-3 py-1 rounded shadow hover:bg-green-600 hover:text-gray-300"></i></button>
                    </form>
                    <form method="post">
                        <input type="hidden" name="action" value="insertUserBannedByID">
                        <input type="hidden" name="member_target_id" value="<?= $data['member_target_id'] ?>">
                        <input type="hidden" name="ban_detail" value="<?php foreach ($reporters as $idx => $item) {
                            echo $item['report_type_msg'].", ";
                        }?>">
                        <button type="submit" class="" id="btn_ban"><i class="fa-solid fa-ban bg-red-500 text-3xl text-white px-3 py-1 rounded shadow hover:bg-red-600 hover:text-gray-300"></i></button>
                    </form>
                </div>
            </div>
            <hr class="mb-3">



            <div id="carouselReportersList" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <?php
                    for ($i = 0; $i < count($reporters); $i++) { ?>

                        <?php if ($i == 0) { ?>
                            <button type="button" data-bs-target="#carouselReportersList" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <?php } else { ?>
                            <button type="button" data-bs-target="#carouselReportersList" data-bs-slide-to="<?= $i ?>" aria-label="Slide <?= $i + 1 ?>"></button>
                    <?php }
                    } ?>
                </div>
                <div class="carousel-inner">

                    <?php foreach ($reporters as $idx => $item) { ?>
                        <div class="carousel-item <?php if($idx == 0) echo "active"; ?>">
                            <div class="w-full border rounded-xl shadow p-5">
                                <h1 class="flex gap-2 text-gray-600 font-semibold text-lg items-center"><img src="<?= $item['reporter_image'] ?>" alt="" srcset="" style="width: 3rem;"><?= $item['reporter_name'] ?></h1>
                                <hr class="my-2">
                                <ul class="list-disc ml-5 text-gray-500">
                                    <li><span class="italic">Report date</span> <?= $item['report_add_date']; ?></li>
                                    <li><span class="italic">Report type</span> <?= $item['report_type_msg']; ?></li>
                                    <li><span class="italic">Report detail</span>
                                        <pre><?= $item['report_msg']; ?></pre>
                                    </li>
                                </ul>
                                <img src="<?= $item['report_image']; ?>" class="w-full mt-3" alt="" srcset="">
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselReportersList" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselReportersList" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </div>
</div>
<script>
    tippy('#btn_negative', {
        content: 'Negative this report.'
    });
    tippy('#btn_ban', {
        content: 'Ban this user.'
    });
</script>