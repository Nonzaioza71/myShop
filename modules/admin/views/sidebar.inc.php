<!-- Barra lateral -->
<div id="sidebar" class="lg:block hidden bg-white w-64 h-screen fixed rounded-none border-none z-50">
    <!-- Items -->
    <!-- <label class="text-lg text-gray-600 w-full text-center">Administrator Panel Controls</label> -->
    <div class="p-4 space-y-4">
        <!-- Inicio -->
        <a href="?app=profile&id=<?= $_SESSION['user']['memberid'] ?>" aria-label="dashboard" class="relative sm:visible lg:hidden px-4 py-3 flex space-x-4 rounded-lg text-gray-900 bg-gradient-to-r from-sky-600 to-cyan-400">
            <div class="text-center w-full">
                <img src="<?= $_SESSION['user']['memberimage'] ?>" alt="" srcset="" class="w-12 h-12 m-auto">
                <p class="-mr-1 font-medium mt-2"><?= $_SESSION['user']['membername'] ?></p>
                <hr class="text-dark my-2">
            </div>
        </a>
        <a href="?app=admin" aria-label="dashboard" class="px-4 py-3 flex items-center space-x-4 rounded-md hover:text-gray-900 group <?php if((@$_GET['module'] == 'dashboard') || (@$_GET['module'] == '') || (!@array_key_exists('module', $_GET))){ echo "text-black"; }else{echo "text-gray-500";}?> ">
            <i class="fa-solid fa-chart-pie"></i>
            <span class="-mr-1 font-medium">Dashboard</span>
        </a>
        <a href="?app=admin&module=report" class="px-4 py-3 flex items-center space-x-4 rounded-md hover:text-gray-900 group <?php if(@$_GET['module'] == 'report'){ echo "text-black"; }else{echo "text-gray-500";}?> ">
            <i class="fa-solid fa-flag"></i>
            <span>Reports</span>
        </a>
        </a>
        <a href="?app=admin&module=products" class="px-4 py-3 flex items-center space-x-4 rounded-md hover:text-gray-900 group <?php if(@$_GET['module'] == 'products'){ echo "text-black"; }else{echo "text-gray-500";}?> ">
            <i class="fa-solid fa-box"></i>
            <span>Products</span>
        </a>

        <a href="?app=admin&module=users" class="px-4 py-3 flex items-center space-x-4 rounded-md hover:text-gray-900 group <?php if(@$_GET['module'] == 'users'){ echo "text-black"; }else{echo "text-gray-500";}?> ">
            <i class="fa-solid fa-users"></i>
            <span>Users</span>
        </a>
        <!-- <a href="?app=admin&module=accounting" class="px-4 py-3 flex items-center space-x-4 rounded-md hover:text-gray-900 group <?php if(@$_GET['module'] == 'accounting'){ echo "text-black"; }else{echo "text-gray-500";}?> ">
            <i class="fa-solid fa-money-check-dollar"></i>
            <span>Accounting</span>
        </a> -->
        <a href="./logout.php" class="px-4 py-3 flex items-center space-x-4 rounded-md text-red-500 hover:text-red-700 group">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </div>
</div>


<!-- Content -->
<!-- <div class="lg:w-full lg:ml-64 px-6 py-8">


    <div class="bg-white rounded-full border-none p-3 mb-4 shadow-md">
        <div class="flex items-center">
            <i class="px-3 fas fa-search ml-1"></i>
            <input type="text" placeholder="Buscar..." class="ml-3 focus:outline-none w-full">
        </div>
    </div>

    
    <div class="lg:flex gap-4 items-stretch">
        
        <div class="bg-white md:p-2 p-6 rounded-lg border border-gray-200 mb-4 lg:mb-0 shadow-md lg:w-[35%]">
            <div class="flex justify-center items-center space-x-5 h-full">
                <div>
                    <p>Saldo actual</p>
                    <h2 class="text-4xl font-bold text-gray-600">50.365</h2>
                    <p>25.365 $</p>
                </div>
                <img src="https://www.emprenderconactitud.com/img/Wallet.png" alt="wallet" class="h-24 md:h-20 w-38">
            </div>
        </div>

        
        <div class="bg-white p-4 rounded-lg xs:mb-4 max-w-full shadow-md lg:w-[65%]">
            
            <div class="flex flex-wrap justify-between h-full">
                <div class="flex-1 bg-gradient-to-r from-cyan-400 to-cyan-600 rounded-lg flex flex-col items-center justify-center p-4 space-y-2 border border-gray-200 m-2">
                    <i class="fas fa-hand-holding-usd text-white text-4xl"></i>
                    <p class="text-white">Depositar</p>
                </div>

                <div class="flex-1 bg-gradient-to-r from-cyan-400 to-cyan-600 rounded-lg flex flex-col items-center justify-center p-4 space-y-2 border border-gray-200 m-2">
                    <i class="fas fa-exchange-alt text-white text-4xl"></i>
                    <p class="text-white">Transferir</p>
                </div>

                <div class="flex-1 bg-gradient-to-r from-cyan-400 to-cyan-600 rounded-lg flex flex-col items-center justify-center p-4 space-y-2 border border-gray-200 m-2">
                    <i class="fas fa-qrcode text-white text-4xl"></i>
                    <p class="text-white">Canjear</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg p-4 shadow-md my-4">
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left border-b-2 w-full">
                        <h2 class="text-ml font-bold text-gray-600">Transacciones</h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b w-full">
                    <td class="px-4 py-2 text-left align-top w-1/2">
                        <div>
                            <h2>Comercio</h2>
                            <p>24/07/2023</p>
                        </div>
                    </td>
                    <td class="px-4 py-2 text-right text-cyan-500 w-1/2">
                        <p><span>150$</span></p>
                    </td>
                </tr>
                <tr class="border-b w-full">
                    <td class="px-4 py-2 text-left align-top w-1/2">
                        <div>
                            <h2>Comercio</h2>
                            <p>24/06/2023</p>
                        </div>
                    </td>
                    <td class="px-4 py-2 text-right text-cyan-500 w-1/2">
                        <p><span>15$</span></p>
                    </td>
                </tr>
                <tr class="border-b w-full">
                    <td class="px-4 py-2 text-left align-top w-1/2">
                        <div>
                            <h2>Comercio</h2>
                            <p>02/05/2023</p>
                        </div>
                    </td>
                    <td class="px-4 py-2 text-right text-cyan-500 w-1/2">
                        <p><span>50$</span></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>  -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var menuButton = document.getElementById('menu-button');
        var sidebar = document.getElementById('sidebar');

        menuButton.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
            sidebar.classList.toggle('lg:block');
        });
    });
</script>