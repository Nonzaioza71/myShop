<!-- component -->
<!-- This is an example component -->
<div class="font-sans">
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center" id="loginForm">
        <div class="relative sm:max-w-sm w-full shadow-2xl animate__animated animate__rotateInDownLeft animate__faster">
            <div class="card bg-green-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
            <!-- <div class="card bg-blue-200 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-5 animate__animated animate__rotateInDownRight animate__faster animate__delay-100ms"></div> -->
            <div class="relative w-full rounded-3xl  px-6 py-4 bg-green-100 shadow-md animate__animated animate__rotateInDownLeft animate__faster animate__delay-100ms">
                <label for="" class="block mt-3 text-3xl text-gray-700 text-center font-semibold">
                    Login
                </label>
                <form method="post" class="mt-10">
                    <input type="hidden" name="action" value="getUserLogin">
                    <div>
                        <input type="text" name="username" placeholder="Username" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100 focus:border-green-600 focus:ring-0 text-center">
                    </div>

                    <div class="mt-7">
                        <input type="password" name="password" placeholder="Password" class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-green-100 focus:bg-green-100 focus:border-green-600 focus:ring-0 text-center">
                    </div>

                    <div class="mt-7 flex text-center">
                        <label for="remember_me" class="w-full cursor-pointer justify-center">
                            <p class="text-red-500"><?= @str_replace("_", " ", @$_GET['error'])?></p>
                            <!-- <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember"> -->
                            <span class="ml-2 text-sm text-gray-600 w-100 border">
                                <hr class="text-dark">
                            </span>
                        </label>
                    </div>

                    <div class="mt-7">
                        <button type="submit" class="bg-green-500 w-full mb-2 py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-200 ease-in-out  transform hover:-translate-x hover:scale-105">
                            Login
                        </button>
                        <button type="button" onclick="window.location.href = '?app=auth&view=register'" class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-200 ease-in-out  transform hover:-translate-x hover:scale-105">
                            Register
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</div>

<script>
    window.addEventListener("load", ()=>{
        document.querySelector('#loginForm').scrollIntoView();
    })
</script>