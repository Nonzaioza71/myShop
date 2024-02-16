<div class="hidden min-w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover animate__animated animate__faster" id="report_modal_bg">
    <div class="absolute bg-black opacity-50 inset-0 z-0" onclick="toggleModal(false)"></div>
    <div class="w-full  max-w-lg pt-0 relative mx-auto my-auto rounded-xl shadow-lg  bg-white animate__animated animate__faster" id="modal_window">
        <!--content-->
        <div class="">
            <!--body-->
            <div class="text-center pt-0 flex-auto justify-center">
                <?php require_once("modules/profile/modal_header.inc.php"); ?>
                <div class="p-3">
                    <?php require_once("modules/profile/modal_content.inc.php"); ?>
                </div>
            </div>
            <!--footer-->
            <div class="text-center space-x-4 md:block">
                <!-- <button class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                    Cancel
                </button>
                <button class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600">Delete</button> -->
            </div>
        </div>
    </div>
</div>

<script>
    function toggleModal(_modalOpen) {
        const report_modal_bg = document.querySelector('#report_modal_bg')
        const modal_window = document.querySelector('#modal_window')
        if (_modalOpen) {
            report_modal_bg.classList.remove('hidden')
            report_modal_bg.classList.remove('animate__fadeOut')
            report_modal_bg.classList.add('animate__fadeIn')
            
            modal_window.classList.remove('hidden')
            modal_window.classList.remove('animate__fadeOutDown')
            modal_window.classList.add('animate__fadeInDown')

            document.body.classList.add('overflow-hidden')
        }else{
            report_modal_bg.classList.remove('animate__fadeIn')
            report_modal_bg.classList.add('animate__fadeOut')
            
            modal_window.classList.remove('animate__fadeInDown')
            modal_window.classList.add('animate__fadeOutDown')
            
            document.body.classList.remove('overflow-hidden')
            setTimeout(() => {
                report_modal_bg.classList.add('hidden')
                modal_window.classList.add('hidden')
            }, 550);
        }
    }
</script>