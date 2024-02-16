<nav class="navbar navbar-expand-lg bg-gray-200">
    <div class="container container-fluid col-md-12 d-block">
        <div class="col-md-12 row mt-1">
            <div class="col-md-12 row justify-between">
                <div class="col-md-2 text-center">
                    <a class="navbar-brand text-green-600 text-4xl text-end" href="?app=home">
                        EmpStore
                    </a>
                </div>
                <div class="col-md-8 mt-1 mb-2">
                    <form class="d-flex" method="get" id="searchForm">
                        <div class='flex items-center justify-center w-100'>
                            <div class="flex w-full mx-10 bg-white rounded-xl">
                                <button type="submit" class="rounded px-4 py-2 text-gray-300 border-end">
                                    <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                                    </svg>
                                </button>
                                <input class=" w-full border-none bg-transparent px-4 py-1 text-gray-400 outline-none focus:outline-none " value="<?= @$_GET['keyword'] ?>" type="search" name="keyword" placeholder="Search for your assets" />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 d-flex justify-content-around align-self-center gap-3">
                    <?php if (array_key_exists('user', $_SESSION)) { ?>
                        <a class="text-center text-gray-500 hover:text-yellow-400 text-xl" href="?app=home&v=favorite&favorite=true"><i class="fa-solid fa-star"></i></a>
                    <?php } ?>
                    <?php if (isset($_SESSION['user'])) { ?>
                        <a class="text-center text-gray-500 text-xl" href="?app=profile&id=<?= $_SESSION['user']['memberid'] ?>&v=cart&cart=true"><i class="fa-solid fa-cart-shopping"></i></a>
                    <?php } ?>
                    <a class="text-center text-gray-500 text-xl" href="?app=auth">
                        <?php if (isset($_SESSION['user'])) { ?>
                            <img src="<?= $_SESSION['user']['memberimage'] ?>" alt="" class="w-7 h-7">
                        <?php } else { ?>
                            <i class="fa-solid fa-user"></i>
                        <?php } ?>
                    </a>
                </div>
            </div>
            <div class="btn btn-outline-light navbar-toggler border-gray-300 mt-2 container" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars text-dark"></i>
            </div>
        </div>
        <div class="collapse navbar-collapse col-md-12" id="navbarSupportedContent">
            <div class="col-md-12">
                <div class="col-md-12">
                    <ul class="navbar-nav me-auto mb-2 mt-2 mb-lg-0 justify-content-around">

                        <?php if (@$_SESSION['user']['memberperm'] == 2) { ?>
                            <li class="nav-item border border-solid border-gray-800 bg-gray-300 rounded-md">
                                <a class="nav-link text-red-400 hover:text-orange-500" href="?app=admin">Admin Panel</a>
                            </li>
                        <?php } ?>

                        <li class="nav-item">
                            <a class="nav-link text-green-600" href="?app=home&type=3d#view=on_sale">3D</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-green-600" href="?app=home&type=2d#view=on_sale">2D</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-green-600" href="?app=home&type=audio#view=on_sale">Audio</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-green-600" href="?app=home&type=ai#view=on_sale">AI</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-green-600" href="?app=home&type=essentials#view=on_sale">Essentials</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-green-600" href="?app=home&type=templates#view=on_sale">Templates</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-green-600" href="?app=home&type=tools#view=on_sale">Tools</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-green-600" href="?app=home&type=vfx#view=on_sale">VFX</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-red-400" target="_blank" href="https://assetstore.unity.com/">
                                <simple-icon name="unity" class="w-6" color="#000000" />
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-red-400" target="_blank" href="https://www.unrealengine.com/marketplace/">
                                <simple-icon name="unrealengine" class="w-6" color="#000000" />
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-red-400" target="_blank" href="https://godotmarketplace.com/">
                                <simple-icon name="godotengine" class="w-6" color="21ABEC" />
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    window.addEventListener("load", () => document.querySelector("#searchForm").addEventListener("submit", e => _handleSearch(e)))

    function _handleSearch(e) {
        e.preventDefault();
        let search = window.location.search;
        let url = new URL(window.location.href)
        let params = new URLSearchParams(url.search)
        search = (search.search("&keyword=") > -1) ? search.substr(0, search.indexOf('&keyword=')) + search.substr(search.indexOf('&keyword=') + 1).substr(search.substr(search.indexOf('&keyword=') + 1).indexOf('&')) : search
        // if (document.querySelector('[name="keyword"]').value == '') {
        //     window.location.href = params.delete('keyword') + window.location.hash
        // } else {
        //     // window.location.href = search + '&keyword=' + document.querySelector('[name="keyword"]').value + window.location.hash
        // }
        window.location.href = replaceUrlParam(window.location.search, 'keyword', document.querySelector('[name="keyword"]').value || '')
    }
</script>