<div class="col-md-12 py-5 px-5">
    <div class="col-md-12 row justify-between">
        <h1 class="text-3xl">Users Report</h1>
        <form id="searchUserForm" method="post" class="w-full flex">
            <input type="search" name="search" id="search" placeholder="Search user">
            <button type="submit">Search</button>
        </form>
    </div>
    <hr class="my-4" />
    <div class="shadow-lg rounded-lg overflow-hidden mx-4 md:mx-10">
        <table class="w-full table-fixed">
            <thead>
                <tr class="bg-gray-100">
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Name</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Email</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Phone</th>
                    <th class="w-1/4 py-4 px-6 text-left text-gray-600 font-bold uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white">


                <?php foreach ($users as $idx => $items) { ?>
                    <tr>
                        <td class="py-4 px-6 border-b border-gray-200"><?= $items['membername'] ?></td>
                        <td class="py-4 px-6 border-b border-gray-200 truncate"><?= $items['membermail'] ?></td>
                        <td class="py-4 px-6 border-b border-gray-200"><?= $items['memberphone'] ?></td>
                        <td class="py-4 px-6 border-b border-gray-200">
                            <?php if ($items['status'] == 'Active') { ?>
                                <span class="bg-green-500 text-white py-1 px-2 rounded-full text-xs"><?= $items['status'] ?></span>
                            <?php } else { ?>
                                <span class="bg-red-500 text-white py-1 px-2 rounded-full text-xs"><?= $items['status'] ?></span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>

<script>
    window.addEventListener("load", () => document.getElementById("searchUserForm").addEventListener("submit", setEventSearch))
    function setEventSearch(e) {
        e.preventDefault();
        window.location.href = `?app=admin&module=users&search=${document.getElementById('search').value}`
    }
</script>