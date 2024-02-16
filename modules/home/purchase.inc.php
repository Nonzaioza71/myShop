<div class="fixed top-0 left-0 w-full h-full z-30 animate__animated animate__faster flex items-center justify-center" id="purchaseModal">
    <div class="fixed top-0 left-0 w-full h-full bg-dark opacity-50" onclick="purchaseModal.close()"></div>
    <div class="container px-0 bg-white shadow rounded-md z-40 ">
        <div class="flex justify-between w-full">
            <h1 class="text-3xl flex gap-2 pt-2 pl-4"><i class="fa-solid fa-cash-register"></i> Purchase Order</h1>
            <button onclick="purchaseModal.close()" class="bg-red-500 text-white hover:bg-red-700 px-3 rounded-tr-md"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <hr>
        <div class="w-full">
            <div class="w-full flex px-5 py-3 gap-4">
                <img src="<?= $images[0]['image'] ?>" alt="" class="w-96 rounded-md">
                <div class="w-full">
                    <h1 class="fw-bold text-start text-xl"><?= $data['product_name'] ?></h1>
                    <div class="h-28 overflow-auto border rounded-sm px-2 py-1 mt-3">
                        <pre style="white-space: pre-wrap;" class="text-xs"><?= $data['product_detail'] ?></pre>
                    </div>
                    <div class="w-full mt-3">
                        <form method="post">
                            <div class="flex gap-4">
                                <div class="flex gap-3 items-center w-1/3">
                                    <label for="count">Amount</label>
                                    <div class="relative flex items-center max-w-[8rem]">
                                        <button type="button" id="decrement-button" onclick="amountController.remove()" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                            </svg>
                                        </button>
                                        <input name="count" value="1" type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required>
                                        <button type="button" id="increment-button" onclick="amountController.add()" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="flex gap-3 items-center w-1/3">
                                    <label for="price">Price</label>
                                    <div class="relative flex items-center max-w-[8rem]">
                                        <input name="price" readonly value="1" type="text" id="price" data-input-counter aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" required>
                                        <div class="bg-gray-100 items-center dark:bg-gray-700 dark:border-gray-600 border border-gray-300 rounded-e-lg p-3 flex justify-start h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                            <i class="fa-solid fa-dollar-sign w-3 h-3 text-gray-900 dark:text-white"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex gap-3 w-1/3 bg-green-400 hover:bg-green-500 justify-center items-center cursor-pointer">
                                    <label>Purchase</label>
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener("load", () => {
        document.getElementById('purchaseModal').classList.add("hidden")
        _calculateAll()
    })
    const purchaseModal = {
        show: () => {
            document.getElementById('purchaseModal').classList.remove("hidden")
            document.getElementById('purchaseModal').classList.remove("animate__fadeOut")
            document.getElementById('purchaseModal').classList.add("animate__fadeIn")
            document.body.classList.add("overflow-hidden")
        },
        close: () => {
            document.getElementById('purchaseModal').classList.remove("animate__fadeIn")
            document.getElementById('purchaseModal').classList.add("animate__fadeOut")
            setTimeout(() => {
                document.getElementById('purchaseModal').classList.add("hidden")
                document.body.classList.remove("overflow-hidden")
            }, 500);
        },
    }

    const amountController = {
        add: () => {
            document.getElementById("quantity-input").value++
            _calculateAll()
        },
        remove: () => {
            document.getElementById("quantity-input").value > 1 && document.getElementById("quantity-input").value--
            _calculateAll()
        },
    }

    function _calculateAll() {
        document.getElementById("price").value = formatNumber(document.getElementById("quantity-input").value * parseFloat("<?= $data['product_price'] ?>"))
    }
</script>