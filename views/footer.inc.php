<footer>
        <div class="col-md-12 bg-gray-300 border-t p-5 mt-4 flex">
                <div class="col-md-4">
                        <p class="text-gray-500 text-sm">Ⓒ Powered by Empdev Studio</p>
                        <p class="text-gray-500 text-sm">empdev.studio@gmail.com</p>
                </div>
                <div class="col-md-4">
                        <p class="text-gray-500 text-sm">
                                <a href="https://assetstore.unity.com/">Unity Store</a>
                        </p>
                        <p class="text-gray-500 text-sm">
                                <a href="https://www.unrealengine.com/marketplace/">Unreal Engine Maketplace</a>
                        </p>
                        <p class="text-gray-500 text-sm">
                                <a href="https://godotmarketplace.com/">Godot Maketplace</a>
                        </p>
                </div>
        </div>
        <button type="button" data-te-ripple-init data-te-ripple-color="light" class="fixed bottom-5 right-5 hidden rounded-full bg-green-600 p-3 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg" id="btn-back-to-top">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" class="h-4 w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path>
                </svg>
        </button>
        <!-- <script src="https://cdn.tailwindcss.com/"></script> -->
        <script>
                function loadEvent() {
                        // loadSimpleIcon()
                        try {
                                document.querySelectorAll('#next').forEach(item => item.addEventListener("click", e => goNext(e)))
                                document.querySelectorAll('#prev').forEach(item => item.addEventListener("click", e => goPrev(e)))
                                mybutton.addEventListener("click", backToTop);
                        } catch (error) {

                                setTimeout(loadEvent, 10);
                        }
                }
        </script>
</footer>