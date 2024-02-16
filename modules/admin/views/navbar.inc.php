<!-- follow me on twitter @asad_codes -->
<div class="flex flex-wrap">
    <section class="relative mx-auto">
        <!-- navbar -->
        <nav class="flex justify-between bg-gray-900 text-white w-screen h-20" id="admin_navbar">
            <div class="px-5 xl:px-12 py-6 flex w-full items-center">
                <div class="flex justify-between items-center me-3">
                    <!-- Ícono de Menú -->
                    <button id="menu-button" class="lg:hidden w-full">
                        <i class="fas fa-bars text-cyan-500 text-lg"></i>
                    </button>
                </div>
                <a class="text-3xl font-bold font-heading" href="#">
                    <!-- <img class="h-9" src="logo.png" alt="logo"> -->
                    EmpAdmin
                </a>
                <!-- Nav Links -->
                <ul class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
                    <!-- <li><a class="hover:text-gray-200" href="#">Home</a></li>
                    <li><a class="hover:text-gray-200" href="#">Catagory</a></li>
                    <li><a class="hover:text-gray-200" href="#">Collections</a></li>
                    <li><a class="hover:text-gray-200" href="#">Contact Us</a></li> -->
                </ul>
                <!-- Header Icons -->
                <div class="hidden xl:flex items-center space-x-5 items-center">

                    <a class="flex items-center hover:text-gray-200 gap-2" href="?app=profile&id=<?= $_SESSION['user']['memberid'] ?>">
                        <img src="<?= $_SESSION['user']['memberimage'] ?>" class="w-10 h-10" alt="" srcset="">
                        <span><?= $_SESSION['user']['membername'] ?></span>
                    </a>

                    <a class="hover:text-gray-200 bg-red-500 px-3 py-2 rounded hover:bg-red-700 duration-200" href="?app=home">
                        Store <i class="fa-solid fa-store"></i>
                    </a>


                    <!-- <a class="flex items-center hover:text-gray-200" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="flex absolute -mt-5 ml-4">
                            <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                            </span>
                        </span>
                    </a> -->

                    <!-- Sign In / Register      -->
                    <!-- <a class="flex items-center hover:text-gray-200" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a> -->

                </div>
            </div>
            <!-- Responsive navbar -->
            <!-- <a class="xl:hidden flex mr-6 items-center" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class="flex absolute -mt-5 ml-4">
                    <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                    </span>
                </span>
            </a> -->
            <a class="navbar-burger self-center mr-12 xl:hidden bg-red-400 p-2 px-4 rounded-xl" href="?app=home">
                <i class="fa-solid fa-store"></i>
            </a>
        </nav>

    </section>
</div>
<!-- Does this resource worth a follow? -->
<!-- <div class="absolute bottom-0 right-0 mb-4 mr-4 z-10">
    <div>
        <a title="Follow me on twitter" href="https://www.twitter.com/asad_codes" target="_blank" class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12">
            <img class="object-cover object-center w-full h-full rounded-full" src="https://www.imore.com/sites/imore.com/files/styles/large/public/field/image/2019/12/twitter-logo.jpg" />
        </a>
    </div>
</div> -->