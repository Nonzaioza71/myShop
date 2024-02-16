<div class="w-full card__media">
    <div id="bg" class="h-48 w-full rounded-2xl flex items-center">
        <label class="text-5xl w-full text-center" id="titleName"><?= $data['membername'] ?>'s profile</label>
    </div>
    <div class="  card__media--aside "></div>
    <div class="flex items-center p-4">
        <div class="relative flex flex-col items-center w-full">
            <div class="h-24 w-24 md rounded-full relative avatar flex items-end justify-end text-purple-600 min-w-max absolute -top-16 flex bg-purple-200 text-purple-100 row-start-1 row-end-3 text-purple-650 ring-1 ring-white">
                <img class="h-24 w-24 md rounded-full relative" id="imgProfile" src="<?= $data['memberimage'] ?>" alt="">
                <div class="absolute"></div>
            </div>
            <div class="flex flex-col space-y-1 justify-center items-center -mt-12 w-full">
                <span class="text-md whitespace-nowrap text-gray-800 font-semibold"><?= $data['membername'] ?></span><span class="text-md whitespace-nowrap text-gray-600">Permission level <?= $data['memberperm'] ?></span>
                <div class="py-2 ">
                    <button class="w-full justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  focus:border-green-300 rounded max-w-max border bg-transparent border-green-700 text-green-700 hover:border-green-800 hover:border-green-800 px-4 py-1 items-center hover:shadow-lg">
                        <span class="mr-2"></span>Subscribe<span class="ml-2"></span>
                    </button>

                    <?php if (@$_GET['id'] == $_SESSION['user']['memberid']) { ?>
                        <button onclick="window.location.href = 'logout.php'" class="w-full justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  focus:border-red-300 rounded max-w-max border bg-transparent border-red-700 text-red-700 hover:border-red-800 hover:border-red-800 px-4 py-1 items-center hover:shadow-lg">
                            <span class="mr-2"></span>Logout<span class="ml-2"></span>
                        </button>
                    <?php } else { ?>
                        <button onclick="toggleModal(true)" class="w-full justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  focus:border-gray-300 rounded max-w-max border bg-transparent border-gray-700 text-gray-700 hover:border-gray-800 hover:border-gray-800 px-4 py-1 items-center hover:shadow-lg">
                            <span class="mr-2"></span><i class="fa-solid fa-flag"></i><span class="ml-2"></span>
                        </button>
                        <button onclick="window.location.href = '?app=profile&id=<?= $_SESSION['user']['memberid']?>'" class="w-full justify-center  max-h-max whitespace-nowrap focus:outline-none  focus:ring  focus:border-blue-300 rounded max-w-max border bg-transparent border-blue-700 text-blue-700 hover:border-blue-800 hover:border-blue-800 px-4 py-1 items-center hover:shadow-lg">
                            <span class="mr-2"></span><i class="fa-solid fa-home"></i><span class="ml-2"></span>
                        </button>
                    <?php } ?>
                </div>
                <div class="py-4 flex justify-center items-center w-full divide-x divide-gray-400 divide-solid">
                    <span class="text-center px-2"><span class="font-bold text-gray-700">56</span><span class="text-gray-600"> Subscribers</span></span><span class="text-center px-2"><span class="font-bold text-gray-700">112</span><span class="text-gray-600"> Following</span></span><span class="text-center px-2"><span class="font-bold text-gray-700">27</span><span class="text-gray-600"> Products</span></span>
                </div>
            </div>
        </div>
    </div>
    <!---->
</div>

<script>
    let bgColor = "";
    window.addEventListener("load", () => {
        loadSuccess(false);
        bgColor = averageColor(document.querySelector('#imgProfile'))
        console.log(bgColor);
        document.querySelector('#bg').setAttribute('style', `background-color:rgb(${bgColor.r}, ${bgColor.g}, ${bgColor.b}, 0.25)`)
        document.querySelector('#titleName').setAttribute('style', `color:rgb(${bgColor.r}, ${bgColor.g}, ${bgColor.b}, 1)`)
    })
</script>

<?php if (@$_GET['id'] != $_SESSION['user']['memberid']) require_once("modules/profile/modal.inc.php"); ?>